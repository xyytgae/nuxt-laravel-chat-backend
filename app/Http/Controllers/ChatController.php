<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * room_idを元にチャット一覧を取得
     * 
     * @return array
     */
    public function index($id)
    {
        return DB::table('chats')
            ->where('room_id', $id)
            ->join('users', 'chats.user_id', '=', 'users.id')
            ->select('chats.*', 'users.name')
            ->latest()
            ->take(15)
            ->get();
    }

    /**
     * チャットを投稿
     * 
     * @return void
     */
    public function store(Request $request)
    {
        $message = Chat::create($request->all());
        // return $message;
    }
}
