<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = ['あいうえお', 'かきくけこかきくけこ', 'さしすせそさしすせそ', 'たちつてとたちつてとたちつてと', 'なにぬねの'];
        for ($i = 0; $i < 5; $i++) {
            Chat::create([
                'comment' => $comments[$i],
                'user_id' => $i % 2,
                'room_id' => 18,
            ]);
        }
    }
}
