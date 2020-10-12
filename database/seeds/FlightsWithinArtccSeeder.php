<?php

use Illuminate\Database\Seeder;

class FlightsWithinArtccSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Models\FlightWithinArtcc::class, 100)->create();
    }
}