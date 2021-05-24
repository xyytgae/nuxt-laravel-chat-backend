<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            Room::create([
                'title' => 'Title' . $i,
                'user_id' => $i,
                'users_id' => [1, 3, 5],
            ]);
        }
    }
}
