<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Calendar::class, function(Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "title" => $faker->realText(40),
        "date" => $time,
        "time" => $time,
        "body" => $faker->realText(),
        "created_by" => $faker->randomNumber(6),
        "updated_by" => $faker->randomNumber(6),
        "created_at" => $time,
        "updated_at" => $time
    ];
});
