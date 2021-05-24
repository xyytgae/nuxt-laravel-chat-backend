<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * room_idを元にチャット一覧を取得
     * 
     * @return array
     */
    public function index($id)
    {
        // return Chat::where('room_id', $id)->get();
        return Chat::where('room_id', $id)->orderBy('created_at', 'desc')
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
        // event(new ChatMessageReceive($request->all()));
        // return Chat::create($request->all());
    }
}
