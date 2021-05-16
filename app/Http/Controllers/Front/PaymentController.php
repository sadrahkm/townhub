<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\Booking\Booking;
use App\Services\Payment\Mellat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $mellatGateway;

    public function __construct()
    {
        $this->mellatGateway = new Mellat();
    }

    /* TODO use session flash for confirm flag and set middleware for this route ( confirm ) */

    public function doPayment(Request $request)
    {
        $data = [
            'orderId' => rand(1,100),
            'amount' => 13500,
            'user_id' => Auth::id(),
        ];
        echo $data['orderId'];
        // TODO : delete comment of below line
//        $result = $this->mellatGateway->redirectMellat($data);
        $result = [
            'success' => true,
        ];
        // TODO : delete this in production version
        $paymentItem = Payment::create([
            'user_id' => Auth::id(),
            'method' => Payment::ONLINE,
            'gateway' => 'Mellat',
            'status' => Payment::INCOMPLETE,
            'res_num' => $data['orderId'],
            'amount' => $data['amount'],
        ]);
        // -----------
        if ($result && isset($result['success']) && !$result['success'])
            return back()->with([
                'success' => false,
                'message' => 'Error in paying round !'
            ]);
    }

    public function verifyPayment(Request $request)
    {
//        if ($request->has('resCode')) {
//            $res_code = $request->input('ResCode');
            $order_id = $request->input('SaleOrderId');
//            $ref_id = $request->input('SaleReferenceId');
            $params = [
//                'ResCode' => $res_code,
                'SaleOrderId' => $order_id,
//                'SaleReferenceId' => $ref_id
            ];
            /*
            $verifyResult = $this->mellatGateway->verify($params);
            if ($verifyResult) {
            */
                $event_id = session('booking')['event_id'];
                $user_id = Auth::id();
                $newBooking = new Booking();
                try {
                    $isBookingReserved = $newBooking->doBookingForUser($user_id, $event_id);
                } catch (\Exception $exception) {
                    return redirect()->route('front.booking.confirm')->with([
                        'success' => false,
                        'message' => $exception->getMessage(),
                    ]);
                }
                if ($isBookingReserved) {
                    Payment::where('res_num',$order_id)->update([
                        'status' => Payment::COMPLETE,
                    ]);
                    return redirect()->route('front.booking.confirm')->with([
                        'success' => true,
                        'message' => 'Your payment was successfully done and your booking is waiting for verify !'
                    ]);
                }
                return redirect()->route('front.booking.confirm')->with([
                    'success' => false,
                    'message' => 'There is a problem while your reservation',
                ]);
/*            }
        }
        return redirect()->route('front.booking.confirm')->with([
            'success' => false,
            'message' => 'Invalid Payment !',
        ]);
*/
    }
}
