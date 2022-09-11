<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Room_book;

class RoomController extends Controller
{
    public function index()
    {
        return view('room', [
            "title" => "room",
            "data" => Room::all()
        ]);
    }

    public function checkin($id)
    {
        return view('checkin', [
            "title" => "checkin",
            "data" => Room::find($id),
            "data_book" => Room_book::all(),
            "cekKamarTersedia" => Room_book::roomcall($id)->active()->count()
        ]);
    }


}
