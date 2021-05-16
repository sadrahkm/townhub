<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Rules\Website;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('front.dashboard.main', compact('user'));
    }

}
