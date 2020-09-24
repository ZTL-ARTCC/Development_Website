<?php

use Illuminate\Database\Seeder;

class TrainingTicketsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\TrainingTicket::class, 100)->create();
    }
}