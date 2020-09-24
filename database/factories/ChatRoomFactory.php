<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Chat::class, function(Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "cid" => $faker->randomNumber(6),
        "c_name" => $faker->name,
        "message" => $faker->realText(),
        "deleted" => $faker->numberBetween(0, 1),
        "format_time" => $time,
        "created_at" => $time,
        "updated_at" => $time
    ];
});
