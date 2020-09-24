<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\TrainingTicket::class, function(Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "controller_id" => $faker->randomNumber(6),
        "trainer_id" => $faker->randomNumber(6),
        "position" => $faker->text(6),
        "type" => $faker->text(10),
        "date" => $time,
        "start_time" => $time,
        "end_time" => $time,
        "duration" => $faker->numberBetween(0, 3600),
        "comments" => $faker->realText(100),
        "ins_comments" => $faker->realText(100),
        "created_at" => $time,
        "updated_at" => $time
    ];
});
