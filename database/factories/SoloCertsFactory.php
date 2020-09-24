<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\SoloCert::class, function(Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "cid" => $faker->randomNumber(6),
        "pos" => $faker->numberBetween(0, 4),
        "expiration" => $time,
        "status" => $faker->numberBetween(0, 1),
        "created_at" => $time,
        "updated_at" => $time
    ];
});
