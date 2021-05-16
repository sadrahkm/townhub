<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Rules\Website;
use App\Services\Redirect;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EditProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('front.dashboard.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'fullname' => 'required|max:15',
            'username' => ['required', 'max:15', Rule::unique(User::class, 'username')->ignore($user)],
            'email' => 'required|email',
            'website' => ['nullable', new Website],
            'company' => 'string|nullable',
            'phone' => 'required|numeric',
        ]);
        $data = $request->except(['_token', 'avatar']);
        if ($request->has('avatar')) {
            $avatar = $user->avatar_name;
            Storage::disk('public')->delete($avatar);
            $path = $request->file('avatar')->store('avatar');
            $data = array_merge($data, ['avatar_name' => $path]);
        }
        if ($request->has('header_background')) {
            $avatar = $user->header_background;
            Storage::disk('public')->delete($avatar);
            $path = $request->file('header_background')->store('header_bgs');
            $data = array_merge($data, ['header_background' => $path]);
        }
        $updatedData = $user->update($data);
        if ($updatedData) {
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function delivery(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'city' => 'nullable',
            'address' => 'nullable',
            'country' => 'nullable',
            'state' => 'nullable',
            'postal_code' => 'nullable',
        ]);
        $dataToInsert = [
            'city' => $validatedData['city'],
            'address' => $validatedData['address'],
            'country' => $validatedData['country'],
            'state' => $validatedData['state'],
            'postal_code' => $validatedData['postal_code'],
        ];
        if ($user->delivery()->exists()) {
            $savedDelivery = $user->delivery()->update($dataToInsert);
        } else {
            $savedDelivery = $user->delivery()->create($dataToInsert);
        }
        if ($savedDelivery || $savedDelivery instanceof Delivery) {
            return redirect()->back()->with(['status' => true, 'message' => 'Your delivery information has been updated !']);
        }
        return redirect()->back()->with(['status' => false, 'message' => 'There was a problem with updating your delivery information !']);
    }
}
