<?php

use Illuminate\Database\Seeder;

class VisitRequestSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Visitor::class, 100)->create();
    }
}