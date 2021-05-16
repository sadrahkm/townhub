<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show()
    {
        $events = Event::all();
        $cities = City::withCount('events')->get();
        return view('front.homepage.main',compact('events','cities'));
    }
}
