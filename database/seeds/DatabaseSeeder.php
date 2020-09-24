<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
                        AirportsSeeder::class,
                        AirportWeatherSeeder::class,
                        AnnouncementSeeder::class,
                        AuditsSeeder::class,
                        BronzeMicSeeder::class,
                        CalendarSeeder::class,
                        ChatRoomSeeder::class,
                        ControllerLogSeeder::class,
                        ControllerUpdateSeeder::class,
                        FlightsWithinArtccSeeder::class,
                        LaratrustSeeder::class,
                        RolesSeeder::class,
                        RosterSeeder::class,
                        SoloCertsSeeder::class,
                        TrainingInfoSeeder::class,
                        TrainingTicketsSeeder::class,
                        VisitAgreementRejectSeeder::class,
                        VisitRequestSeeder::class
                    ]);
    }
}
