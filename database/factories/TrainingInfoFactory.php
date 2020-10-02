<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Models\TrainingInformation::class, function(Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "number" => $faker->randomNumber(2),
        "section" => $faker->randomNumber(2),
        "info" => $faker->realText(),
        "created_at" => $time,
        "updated_at" => $time
    ];
});
