<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FollowController extends Controller
{
    public function doFollow(Request $request)
    {
        if ($request->has('id') && intval($request->input('id')) > 0) {
            $currentUser = Auth::user();
            $user_id = intval($request->input('id'));
            $hasFollowedUser = User::find($user_id);
            User::      
            $hey = Auth::user()->id;
            $hasBeenAdded = $currentUser->followings()->wherePivot('following_id', $hasFollowedUser->id)->get()->first();
            if (!$hasBeenAdded && !($hasBeenAdded instanceof User)) {
                $currentUser->followings()->attach($hasFollowedUser);
                return true;
            }
        }
        return false;
    }

    public function doUnfollow(Request $request)
    {
        if ($request->has('id') && intval($request->input('id')) > 0) {
            $user_id = intval($request->input('id'));
            $hasFollowedUser = User::find($user_id);
            $currentUser = Auth::user();
            $UnFollowingRequst = $currentUser->followings()->detach($hasFollowedUser);
            if ($UnFollowingRequst) {
                return true;
            }
            return false;
        }
    }
}
