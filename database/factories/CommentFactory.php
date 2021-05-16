<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'point' => $faker->numberBetween(0,20),
        'likes' => $faker->numberBetween(0,30),
        'description' => $faker->text(100),
        'gallery' => json_encode('your gallery data'),
    ];
});
