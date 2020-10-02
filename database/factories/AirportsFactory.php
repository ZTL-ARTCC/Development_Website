<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Airport::class, function(Faker\Generator $faker) {
    $icaos = array("KATL", "KCLT",
                   "KBHM", "KGSP", "KAVL", "KGSO", "KTYS", "KCHA", "KFTY", "KRYY", "KAHN",
                   "KAGS", "KGMU", "KGYH", "KTCL", "KMXF", "KMGM", "KLSF", "KCSG", "KMCN",
                   "KWRB", "KJQF", "KVUJ", "KINT", "KTRI", "KLZU", "KASN", "KHKY", "KPDK");
    $randomIcao = $icaos[array_rand($icaos)];

    return [
        "name" => $faker->text(10),
        "front_pg" => $faker->numberBetween(0, 1),
        "iata" => substr($randomIcao, 1),
        "icao" => $randomIcao
    ];
});
