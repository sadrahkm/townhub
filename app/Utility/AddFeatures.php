<?php


namespace App\Utility;


class AddFeatures
{
    public function facility($event, $facilities)
    {
        $facilitiesJsonObject = json_encode($facilities);
        $createdData = $event->features()->create([
            'type' => 'facility',
            'content' => $facilitiesJsonObject
        ]);
    }

    public function accordion($event, $accordions)
    {
        $accordionsJsonObject = json_encode($accordions);
        $createdData = $event->features()->create([
            'type' => 'accordion',
            'content' => $accordionsJsonObject
        ]);
    }

    public function working_hour($event, $working_hours)
    {
        $workingHoursJsonObject = json_encode($working_hours);
        $createdData = $event->features()->create([
            'type' => 'workingHours',
            'content' => $workingHoursJsonObject
        ]);
    }
    public function booking($event, $booking_feature)
    {
        $bookingJsonObject = json_encode($booking_feature);
        $createdData = $event->features()->create([
            'type' => 'booking',
            'content' => $bookingJsonObject
        ]);
    }
}
