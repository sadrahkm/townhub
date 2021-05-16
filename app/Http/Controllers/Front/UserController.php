<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function doRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($request->input('check') != 'on') {
            return redirect()->back()->with(['status' => false, 'message' => 'Please agree the Privacy Policy']);
        }
        $user = User::create($data);
        if ($user && $user instanceof User) {
            Auth::login($user);
            return redirect()->route('front.home')->with(['status' => true, 'message' => 'You have been registered successfully']);
        }
        return redirect()->route('front.home')->with(['status' => false, 'message' => 'There is a problem with your registration']);
    }

    public function doLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $remember = $request->has('remember');
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
            return redirect()->back()->with(['status' => true, 'message' => 'You Logged in']);
        }
        return redirect()->back()->with(['status' => false, 'message' => 'There is a problem']);
    }

    public function doLogout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->back();
    }

}
