<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'id' => 'required|numeric'
        ]);
        $user->wishlist()->attach($validatedData['id']);
        return true;
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'id' => 'required|numeric'
        ]);
        $user->wishlist()->detach($validatedData['id']);
        return true;
    }
}
