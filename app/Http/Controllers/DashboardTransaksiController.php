<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('bulan')){
            return view('dashboard.index', [
                "title" => "Dashboard",
                "data_transaksi" => Order::all()->count(),
                "data_pending" => Order::where('status', 'pending')->count(),
                "data_sukses" => Order::where('status', 'settlement')->count(),
                "data_cancel" => Order::where('status', 'failure')->count(),
                "data" => Order::where('created_at', 'like' ,  "%{$request->get('bulan')}%")->paginate(5)
            ]);
        }else{
            return view('dashboard.index', [
                "title" => "Dashboard",
                "data_transaksi" => Order::all()->count(),
                "data_pending" => Order::where('status', 'pending')->count(),
                "data_sukses" => Order::where('status', 'settlement')->count(),
                "data_cancel" => Order::where('status', 'failure')->count(),
                "data" => Order::latest()->paginate(5)
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('dashboard.detail', [
            'title' => 'Detail Reservasi',
            'data' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);

        return back()->with('success', 'Data Pemesanan Berhasil Dihapus!');
    }
}
