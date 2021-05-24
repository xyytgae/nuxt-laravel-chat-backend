<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return Room::all();
    }

    public function store(Request $request)
    {
        return Room::create($request->all());
    }

    public function getCurrentRoom($id)
    {
        return Room::where('id', $id)->get();
    }
}
