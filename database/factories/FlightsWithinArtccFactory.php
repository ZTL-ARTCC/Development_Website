<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Overflight::class, function (Faker\Generator $faker) {
    $time = Carbon::now();
    $icaos = array("KATL", "KCLT",
        "KBHM", "KGSP", "KAVL", "KGSO", "KTYS", "KCHA", "KFTY", "KRYY", "KAHN",
        "KAGS", "KGMU", "KGYH", "KTCL", "KMXF", "KMGM", "KLSF", "KCSG", "KMCN",
        "KWRB", "KJQF", "KVUJ", "KINT", "KTRI", "KLZU", "KASN", "KHKY", "KPDK");

    return [
        "pilot_cid" => $faker->randomNumber(6),
        "pilot_name" => $faker->name,
        "callsign" => $faker->text(6),
        "type" => $faker->text(6),
        "dep" => $icaos[array_rand($icaos)],
        "arr" => $icaos[array_rand($icaos)],
        "route" => "ENDED8 LACEN AMORY Q110 DAWWN BEORN GNDLF2",
        "created_at" => $time,
        "updated_at" => $time
    ];
});
