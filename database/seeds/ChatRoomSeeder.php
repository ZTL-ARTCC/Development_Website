<?php

use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Models\Chat::class, 100)->create();
    }
}