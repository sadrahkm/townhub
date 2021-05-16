<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function foo\func;

class ListingController extends Controller
{
    public function index()
    {
        $events = Event::with(['user', 'category', 'features' => function ($query) {
            $query->where('type', '=', 'facility');
        }])->withCount('comments')->paginate(2);
        $categories = Category::withCount('events')->get();
        return view('front.listing.index', compact('events', 'categories'));
    }
}
