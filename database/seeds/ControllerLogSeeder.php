<?php

use Illuminate\Database\Seeder;

class ControllerLogSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Models\ControllerLog::class, 100)->create();
    }
}