<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'description' => $faker->text,
        'views' => $faker->numberBetween(0,10),
        'address' => $faker->address,
        'phone' => $faker->numberBetween(0,10000),
        'email' => $faker->email,
        'website' => $faker->text(40),
        'points' => $faker->numberBetween(0,20),
        'header_media' => json_encode("Hello"),
    ];
});
