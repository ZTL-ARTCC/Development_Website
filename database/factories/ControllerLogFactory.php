<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\ControllerLog::class, function (Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "cid" => $faker->randomNumber(6),
        "name" => $faker->name,
        "position" => $faker->text(10),
        "duration" => $faker->randomNumber(4),
        "date" => $time,
        "time_logon" => $time,
        "streamupdate" => $time,
        "created_at" => $time,
        "updated_at" => $time
    ];
});
