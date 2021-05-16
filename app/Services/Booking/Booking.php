<?php


namespace App\Services\Booking;


use App\Models\Booking as BookingModel;
use App\Models\Event;
use App\Models\Payment;
use App\User;
use Carbon\Carbon;
use http\Exception;

class Booking
{
    public function doBookingForUser(int $user_id, int $event_id)
    {
        $eventItem = Event::find($event_id);
        $user = User::find($user_id);
        if (!$eventItem) {
            throw new \Exception('An Invalid Event Item');
        }
        $quantity = session('booking')['quantity'];
        $dateTime = key_exists('date-time', session('booking')) ? session('booking')['date-time'] : null;
        $option = key_exists('option', session('booking')) ? session('booking')['option'] : null;
        $bookingItem = $user->bookings()->create([
            'event_id' => $event_id,
            'price' => 111,
            'status' => BookingModel::WAITING,
            'quantity' => $quantity,
            'date' => $dateTime,
            'options' => $option
        ]);
        return ($bookingItem && $bookingItem instanceof BookingModel);
    }
}
