<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function foo\func;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::withCount('events')->find($user_id);
        $followings_count = $user->followings()->count();
        $followers_count = $user->followers()->count();
        $hasBeenAdded = false;
        $addedUser = null;
        if(Auth::check()) {
            $currentUser = Auth::user();
            $addedUser = $currentUser->followings()->wherePivot('following_id', $user->id)->get()->first();
        }
        if($addedUser && !empty($addedUser) && $addedUser instanceof User){
            $hasBeenAdded = true;
        }
        $events = $user->events()->with(['features' => function($query){
            $query->where('type','facility');
        }])->withCount('comments')->get();
        $facilities = [];
        foreach ($events as $event){
            $facilities[] = $event->features()->where('type','facility')->pluck('content')->first();
        }
        return view('front.profile.main', compact('user','hasBeenAdded','followers_count','followings_count','events','facilities'));
    }

}
