<?php

use Illuminate\Database\Seeder;

class TrainingInfoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\TrainingInfo::class, 100)->create();
    }
}