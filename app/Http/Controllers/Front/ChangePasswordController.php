<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    
    public function index()
    {

        return view('front.dashboard.password');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'cpass' => 'required',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required'
        ]);
        if (!Hash::check($request->input('cpass'),$user->password)) {
            return redirect()->back()->with(['error' => true, 'message' => 'Your previous password is incorrect.']);
        }
        $savedPassword = $user->update([
            'password' => $request->input('password')
        ]);
        if ($savedPassword) {
            return redirect()->back()->with(['success' => true, 'message' => 'Your password changed Successfully.']);
        }
        return redirect()->back()->with(['error' => true, 'message' => 'There is problem with changing your password.']);
    }
}
