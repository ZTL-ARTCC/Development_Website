<?php

use Illuminate\Database\Seeder;

class TrainingInfoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Models\TrainingInformation::class, 100)->create();
    }
}