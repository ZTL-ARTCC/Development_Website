<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Models\AirportWeather::class, function(Faker\Generator $faker) {
    $time = Carbon::now();
    $icaos = array("KATL", "KCLT",
                   "KBHM", "KGSP", "KAVL", "KGSO", "KTYS", "KCHA", "KFTY", "KRYY", "KAHN",
                   "KAGS", "KGMU", "KGYH", "KTCL", "KMXF", "KMGM", "KLSF", "KCSG", "KMCN",
                   "KWRB", "KJQF", "KVUJ", "KINT", "KTRI", "KLZU", "KASN", "KHKY", "KPDK");
    $randomIcao = $icaos[array_rand($icaos)];
    $visConds = array("VFR", "IFR");

    return [
        "icao" => $randomIcao,
        "metar" => "$randomIcao 212252Z 08013KT 10SM FEW200 SCT250 19/07 A3030 RMK AO2 SLP256 T01940067",
        "taf" => "$randomIcao 212201Z 2122/2224 08011KT P6SM SCT200 FM221500 08008KT P6SM SCT030 FM221900 07004KT P6SM SCT050",
        "visual_conditions" => $visConds[array_rand($visConds)],
        "altimeter" => $faker->randomFloat(2, 28, 31),
        "wind" => "{$faker->randomNumber(3)}@{$faker->randomNumber(2, false)}",
        "temp" => $faker->randomNumber(2),
        "dp" => $faker->randomNumber(2),
        "created_at" => $time,
        "updated_at" => $time
    ];
});