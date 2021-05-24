<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;


    /**
     * モデルのタイムスタンプを更新するかの指示
     *
     * @var bool
     */
    // public $timestamps = false;

    protected $fillable = [
        'user_id',
        'room_id',
        'comment',
    ];
}
