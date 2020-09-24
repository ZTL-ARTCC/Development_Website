<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\VisitRej::class, function(Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "cid" => $faker->randomNumber(6),
        "staff_cid" => $faker->randomNumber(6),
        "created_at" => $time,
        "updated_at" => $time
    ];
});
