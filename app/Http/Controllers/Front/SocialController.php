<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->validate([
            'fb' => 'nullable|url',
            'tw' => 'nullable|url',
            'tl' => 'nullable|url',
            'insta' => 'nullable|url',
        ]);

    }
}
