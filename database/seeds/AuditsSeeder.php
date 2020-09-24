<?php

use Illuminate\Database\Seeder;

class AuditsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Audit::class, 100)->create();
    }
}
