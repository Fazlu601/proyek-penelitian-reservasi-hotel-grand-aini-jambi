<?php

namespace App\Http\Controllers;

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Room_book;
use App\Models\Order;
use App\Models\Booking;
use Illuminate\Support\Facades\Redis;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $room = Room::where('id', $request->room_id)->first();

       $validateOrder = $request->validate([
            "checkIn" => "required|date|date_format:Y-m-d|before:checkOut",
            "checkOut" => "required|date|date_format:Y-m-d|after:checkIn",
            "night" => "required",
            "kode_kamar" => "required"
       ]);

       $cart = session("book");
       $cart[0] = [
           "kode_kamar" => $room->id,
           "nomor_kamar" => $validateOrder['kode_kamar'],
           "nama_kamar" => $room->room_name,
           "check_in" => $validateOrder['checkIn'],
           "check_out" => $validateOrder['checkOut'],
       ];
       session(["cart" => $cart]);

        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
         
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        $validateOrder['checkIn'] = tgl_indo($validateOrder['checkIn']);
        $validateOrder['checkOut'] = tgl_indo($validateOrder['checkOut']);

        return view('payment.index', [
            'title' => 'Order',
            'data_order' => $validateOrder,
            'data_room' => $room
        ]);
    }


    public function payment(Request $request)
    { 
        $cart = session("cart");
        $room = Room::where('id', $request->room_id)->first();

        $validateData = $request->validate([
            "room_id" => "required",
            "checkIn" => "required",
            "checkOut" => "required",
            "night" => "required"
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $payload = [
            'transaction_details' => [
                'order_id'      => rand(),
                'gross_amount'  => $room->harga_nginap * $validateData['night'],
            ],
            'customer_details' => [
                'first_name'    => Auth()->user()->name,
                'email'         => Auth()->user()->email,
                'phone'         => Auth()->user()->no_hp,
            ],
            'item_details' => [
                [
                    'id'       => mt_rand(),
                    'price'    => $room->harga_nginap,
                    'quantity' => $validateData['night'],
                    'name'     => $room->room_name,

                ]
            ]
        ];
 
        $snapToken = \Midtrans\Snap::getSnapToken($payload);

        return view('payment.payment', [
            'snap_token' => $snapToken,
            'data_room' => $room,
            'data_pesan' => $validateData['night']
        ]);
    }

    public function payment_post(Request $request)
    {

        $cart = session("cart");
        Room_book::where('kode_kamar', $cart[0]['nomor_kamar'])
                ->update(["active" => 2]);

        $json = json_decode($request->get('json'));


       $orderId = Order::create([
            "status" => $json->transaction_status,
            "name" => Auth()->user()->name,
            "email" => Auth()->user()->email,
            "no_hp" => Auth()->user()->no_hp,
            "check_in" => $cart[0]['check_in'],
            "check_out" => $cart[0]['check_out'],
            "room_code" => $cart[0]['nomor_kamar'],
            "room_name" => $cart[0]['nama_kamar'],
            "transaction_id" => $json->transaction_id,
            "order_id" => $json->order_id,
            "gross_amount" => $json->gross_amount,
            "payment_type" => $json->payment_type,
            "payment_code" => isset($json->payment_code) ? $json->payment_code : null ,
            "pdf_url" => isset($json->pdf_url) ? $json->pdf_url : null,
        
        ])->id;
        return  redirect(url('/history_pemesanan/'.$orderId))->with('success', 'Transaksi Berhasil Diproses!');

    }

    public function history()
    {
        session()->forget("cart");
        return view('history_booking.history_booking',[
            'title' => 'History Booking',
            'data' => Order::where('name', Auth()->user()->name)->get()
        ]);
    }

    public function history_detail($id)
    {
        $order = Order::find($id);

        return view('history_booking.detail_booking', [
            'title' => 'Detail Reservasi',
            'data' => $order
        ]);
    }

    public function booking_pdf($id)
    {
        $data = [
            'title' => 'Laporan PDF',
            'data' => Order::find($id)
        ];
       $html = view('history_booking.booking_pdf', $data);

        // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'potrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream();
    }
}
