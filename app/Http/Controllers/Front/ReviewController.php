<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $events = $user->events()->get();
        $comments = Comment::whereIn('commentable_id', $events->pluck('id'))->where('commentable_type', Event::class)->orderBy('created_at', 'desc')->with('user','commentable')->paginate(5);
        return view('front.dashboard.review', compact('comments'));
    }
}
