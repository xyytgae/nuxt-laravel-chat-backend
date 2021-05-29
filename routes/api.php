<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Events\ChatPusher;

Route::middleware(['cors'])->group(function () {

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
    // ログアウト
    Route::get('/logout', [LoginController::class, 'logout']);


    // ログイン
    Route::get('/login', [LoginController::class, 'login']);
    Route::post('/login', [LoginController::class, 'login']);

    // 新規登録
    Route::post('/register', [RegisterController::class, 'register']);

    // Route::middleware(['auth'])->group(function () {
    // Route::group(['middleware' => ['auth']], function () {

    // ルーム一覧を取得
    Route::get('/rooms', [RoomController::class, 'index']);

    // ルーム作成
    Route::post('/rooms', [RoomController::class, 'store']);

    // 入室中のルームを取得
    Route::get('/rooms/{id}', [RoomController::class, 'getCurrentRoom']);

    // チャット一覧
    Route::get('/chats/{id}', [ChatController::class, 'index']);

    // チャット投稿
    Route::get('/chats', [ChatController::class, 'store']);
    Route::post('/chats', [ChatController::class, 'store']);

    // Pusherを実行
    Route::get('/chat/pusher', [ChatPusher::class, 'pusher']);
    Route::post('/chat/pusher', [ChatPusher::class, 'pusher']);
});
// });
