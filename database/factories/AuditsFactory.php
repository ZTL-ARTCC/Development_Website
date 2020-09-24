<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Audit::class, function (Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "cid" => $faker->randomNumber(6),
        "ip" => $faker->ipv4,
        "what" => $faker->realText(),
        "created_at" => $time,
        "updated_at" => $time
    ];
});
