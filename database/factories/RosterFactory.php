<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $time = Carbon::now();
    $firstName = $faker->firstName;
    $lastName = $faker->lastName;
    $icaos = array("KATL", "KCLT",
        "KBHM", "KGSP", "KAVL", "KGSO", "KTYS", "KCHA", "KFTY", "KRYY", "KAHN",
        "KAGS", "KGMU", "KGYH", "KTCL", "KMXF", "KMGM", "KLSF", "KCSG", "KMCN",
        "KWRB", "KJQF", "KVUJ", "KINT", "KTRI", "KLZU", "KASN", "KHKY", "KPDK");

    return [
        "fname" => $firstName,
        "lname" => $lastName,
        "initials" => substr($firstName, -1, 1).substr($firstName, -1, 1),
        "email" => $faker->email,
        "rating_id" => $faker->numberBetween(0, 10),
        "canTrain" => $faker->numberBetween(0, 1),
        "canEvents" => $faker->numberBetween(0, 1),
        "visitor" => $faker->numberBetween(0, 1),
        "visitor_from" => $icaos[array_rand($icaos)],
        "api_exempt" => $faker->numberBetween(0, 1),
        "status" => $faker->numberBetween(0, 1),
        "loa" => $faker->numberBetween(0, 1),
        "del" => $faker->numberBetween(0, 1),
        "gnd" => $faker->numberBetween(0, 1),
        "twr" => $faker->numberBetween(0, 1),
        "app" => $faker->numberBetween(0, 1),
        "ctr" => $faker->numberBetween(0, 1),
        "train_pwr" => $faker->randomNumber(6),
        "monitor_pwr" => $faker->numberBetween(0, 4),
        "opt" => $faker->numberBetween(0, 1),
        "remember_token" => $faker->text(100),
        "json_token" => $faker->text(100),
        "created_at" => $time,
        "updated_at" => $time,
        "added_to_facility" => $time,
        "training_power" => $faker->numberBetween(0, 1),
        "mentor_power" => $faker->numberBetween(0, 1),
        "max" => $faker->numberBetween(0, 1),
        "path" => $faker->text(100),
    ];
});
