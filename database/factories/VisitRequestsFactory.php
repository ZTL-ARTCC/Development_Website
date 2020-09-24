<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Visitor::class, function(Faker\Generator $faker) {
    $time = Carbon::now();
    $icaos = array("KATL", "KCLT",
                   "KBHM", "KGSP", "KAVL", "KGSO", "KTYS", "KCHA", "KFTY", "KRYY", "KAHN",
                   "KAGS", "KGMU", "KGYH", "KTCL", "KMXF", "KMGM", "KLSF", "KCSG", "KMCN",
                   "KWRB", "KJQF", "KVUJ", "KINT", "KTRI", "KLZU", "KASN", "KHKY", "KPDK");

    return [
        "cid" => $faker->randomNumber(6),
        "name" => $faker->name,
        "email" => $faker->text(10),
        "rating" => $faker->numberBetween(0, 10),
        "home" => $icaos[array_rand($icaos)],
        "reason" => $faker->realText(),
        "status" => $faker->numberBetween(0, 1),
        "updated_by" => $faker->randomNumber(6),
        "created_at" => $time,
        "updated_at" => $time
    ];
});