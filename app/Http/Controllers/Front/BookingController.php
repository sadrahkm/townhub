<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use function foo\func;

class BookingController extends Controller
{
    public function storeSession(Request $request)
    {
        if (!is_numeric($request->input('event_id')))
            return false;
        $eventContent = optional(Event::find($request->event_id)->features()->where('type', 'booking')->first())->content;
        $validatedData = $request->validate([
            'event_id' => 'required|numeric',
            'quantity' => 'required|numeric|max:100',
            'date-time' => [Rule::requiredIf(function () use ($eventContent) {
                return ($eventContent && key_exists('date', $eventContent));
            })],
            'option' => [Rule::requiredIf(function () use ($eventContent) {
                return ($eventContent && key_exists('option', $eventContent));
            })],
        ]);
        session()->put('booking', $validatedData);
        session()->save();
        return redirect()->route('front.booking.checkUser');
    }

    /**
     * user information page for payment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkUser()
    {
        return view('front.booking.info');
    }

    public function billing()
    {
        $user = Auth::user();
        $event_id = session('booking')['event_id'];
        $event = Event::find($event_id);
        return view('front.booking.billing', compact('user', 'event'));
    }

    public function paymentMethod()
    {
        $event_id = session('booking')['event_id'];
        $event = Event::find($event_id);
        return view('front.booking.method', compact('event'));
    }

    public function confirm()
    {
        $event_id = session('booking')['event_id'];
        $event = Event::find($event_id);

//        session()->forget('booking');
        return view('front.booking.confirm', compact('event'));
    }

}
