<?php

use Illuminate\Database\Seeder;

class SoloCertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SoloCert::class, 100)->create();
    }
}