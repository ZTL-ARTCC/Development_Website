<?php

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    $time = Carbon::now();

    return [
        "name" => $faker->name,
        "display_name" => $faker->userName,
        "description" => $faker->realText(),
        "updated_at" => $time,
        "created_at" => $time
    ];
});