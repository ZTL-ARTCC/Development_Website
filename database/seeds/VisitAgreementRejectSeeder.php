<?php

use Illuminate\Database\Seeder;

class VisitAgreementRejectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\VisitRej::class, 100)->create();
    }
}