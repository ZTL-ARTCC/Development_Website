<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Models\BronzeMic::class, function(Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "controller_id" => $faker->randomNumber(6),
        "month" => $faker->month,
        "year" => $faker->year,
        "month_hours" => $faker->randomFloat(2, 1, 50),
        "created_at" => $time,
        "updated_at" => $time
    ];
});
