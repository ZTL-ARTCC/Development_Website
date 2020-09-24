<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Announcement::class, function(Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "body" => $faker->realText(),
        "staff_member" => $faker->randomNumber(6),
        "created_at" => $time,
        "updated_at" => $time
    ];
});
