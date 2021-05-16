<?php


namespace App\Services;


use phpDocumentor\Reflection\Types\Boolean;

class Redirect
{
    static public function redirectBack(String $message,bool $status)
    {
        return redirect()->route('home');
    }

    public function redirectTo($route, $status, $message)
    {
        return redirect()->route($route)->with(['status' => $status, 'message', $message]);
    }
}
