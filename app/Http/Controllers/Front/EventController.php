<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function foo\func;

class EventController extends Controller
{
    /**
     * show event single page
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Event $event)
    {
        $eventWithWishlistCount = $event->loadCount('users');
        $wishlist_count = $eventWithWishlistCount->users_count;
        $eventFeatures = $event->features;
        $features = [];
        foreach ($eventFeatures as $feature){
            $features[$feature['type']] = $feature['content'];
        }
        $author = $event->user;
        $category = $event->category;
        $comments = $event->comments()->with('user')->get();
        $isSavedEvent = null;
        if(Auth::check()) {
            $user = Auth::user();
            $isSavedEvent = $user->wishlist()->where('event_id', $event->id)->exists();
        }
        return view('front.event.single', compact('event','author','category','features','comments','isSavedEvent','wishlist_count'));
    }

}
