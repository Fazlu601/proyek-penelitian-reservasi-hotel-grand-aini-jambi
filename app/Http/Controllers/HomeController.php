<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room_book;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $checkOut = Order::where('check_out', date('Y-m-d'))->get();

        $book = ['active' => 1];
        
        if(isset($checkOut)){
            foreach($checkOut as $data){
                Room_book::where('kode_kamar', $data['room_code'])
                                ->update($book);
            }
        }
    
        return view('index',[
            'title' => 'homepage'
        ]);
    }
}
