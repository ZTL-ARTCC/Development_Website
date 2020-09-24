<?php

use Illuminate\Database\Seeder;

class BronzeMicSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Bronze::class, 100)->create();
    }
}