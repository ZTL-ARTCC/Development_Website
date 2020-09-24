<?php

use Illuminate\Database\Seeder;

class AirportWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AirportWeather::class, 100)->create();
    }
}
