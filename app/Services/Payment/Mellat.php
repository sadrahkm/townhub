<?php


namespace App\Services\Payment;


use App\Models\Payment;
use Carbon\Carbon;
use http\Env\Request;
use nusoap_client;

class Mellat
{
    private $terminalId;
    private $username;
    private $password;
    private $client;
    private $namespace;

    public function __construct()
    {
        $this->terminalId = config('gateways.mellat.terminalId');
        $this->username = config('gateways.mellat.username');
        $this->password = config('gateways.mellat.password');
        $this->client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $this->namespace = 'http://interfaces.core.sw.bps.com/';
    }

    public function redirectMellat(array $params)
    {
        $args = [
            'terminalId' => $this->terminalId,
            'userName' => $this->username,
            'userPassword' => $this->password,
            'orderId' => $params['orderId'],
            'amount' => $params['amount'],
            'localDate' => date('Ymd'),
            'localTime' => date('hms'),
            'additionalData' => '',
            'callBackUrl' => route('front.payment.verify'),
            'payerId' => $params['user_id'],
        ];
        $result = $this->client->call('bpPayRequest', $args, $this->namespace);
        if (!$this->client->fault) {
            $res = explode(',', $result);
            $statusCode = $res[0];
            if ($statusCode == "0") {
                $paymentItem = Payment::create([
                    'user_id' => $params['user_id'],
                    'method' => Payment::ONLINE,
                    'gateway' => 'Mellat',
                    'status' => Payment::INCOMPLETE,
                    'res_num' => $params['orderId'],
                    'amount' => $params['amount'],
                ]);
                if ($paymentItem) {
                    $this->redirectToBank($statusCode[1]);
                }
            }
        }
        return false;
    }

    public function verify(array $params)
    {
        if($params['ResCode'] != "0"){
            return [
                'success' => false,
                'message' => 'پاسخ معتبری از بانک دریافت نشد.',
            ];
        }
        $args = [
            'terminalId' => $this->terminalId,
            'userName' => $this->username,
            'userPassword' => $this->password,
            'orderId' => $params['SaleOrderId'],
            'saleOrderId' => $params['SaleOrderId'],
            'saleReferenceId' => $params['SaleReferenceId']
        ];
        $response = $this->client->call('bpVerifyRequest', $args, $this->namespace);
        if (!$response && empty($response)) {
            return false;
        }
        $result = $response['return'];
        if ($result != '0') {
            return false;
        }
        $paymentItem = Payment::where( 'res_num', $params[ 'SaleOrderId' ] )->get();
        $paymentItem->ref_num = $params[ 'SaleReferenceId' ];
        $paymentItem->status  = Payment::COMPLETE;
        $paymentItem->save();
        $settleArgs = [
            'terminalId'      => $this->terminalID,
            'userName'        => $this->userName,
            'userPassword'    => $this->password,
            'orderId'         => $params['SaleReferenceId'],
            'saleOrderId'     => $params[ 'SaleOrderId' ],
            'saleReferenceId' => $params[ 'SaleReferenceId' ]
        ];
        $settleResponse = $this->client->call( 'bpSettleRequest', $settleArgs, $this->namespace );

        if ( $settleResponse && $settleResponse[ 'return' ] == "0" ) {
            //
        }

        return TRUE;
    }

    public function redirectToBank($code)
    {
        ?>
        <form name='myform' action='https://bpm.shaparak.ir/pgwchannel/startpay.mellat' method='POST'><input
                type='hidden' id='RefId' name='RefId' value='<?php echo $code ?>'></form>
        <script type='text/javascript'>window.onload = formSubmit;

            function formSubmit() {
                document.forms[0].submit();
            }</script>
        <?php
    }
}
