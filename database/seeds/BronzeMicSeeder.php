<?php

use Illuminate\Database\Seeder;

class BronzeMicSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Models\BronzeMic::class, 100)->create();
    }
}