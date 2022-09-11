<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function role_access()
    {
        return view('dashboard.user.role_access', [
            "title" => "Hak Akses",
            "data" => User::where('is_admin', 1)->get()
        ]);
    }


    public function laporan_pendapatan(Request $request)
    {
        if($request->get('bulan')){
            return view('dashboard.owner.laporan_pendapatan', [
                "title" => "Laporan Pendapatan",
                "data" => Order::select(
                    "id" ,
                    DB::raw("(sum(gross_amount)) as total_pendapatan"),
                    DB::raw("(DATE_FORMAT(created_at, '%M-%Y')) as per_bulan")
                    )
                    ->orderBy('created_at')
                    ->where('created_at', 'like' ,  '%' . $request->get('bulan') . '%')->get()
            ]);

        }else{
            return view('dashboard.owner.laporan_pendapatan', [
                "title" => "Laporan Pendapatan",
                "data" => Order::select(
                    "id" ,
                    DB::raw("(sum(gross_amount)) as total_pendapatan"),
                    DB::raw("(DATE_FORMAT(created_at, '%M-%Y')) as per_bulan")
                    )
                    ->orderBy('created_at')
                    ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
                    ->where('status', 'settlement')->paginate(8)
            ]);

        }
    }

    public function laporan_pdf(Request $request)
    {

        $data = [
            "title" => "Laporan Pendapatan PDF",
                "bulan" => $request->get('bulan'),
                "total_pendapatan" => $request->get('total')
            ];

            $html = view('dashboard.owner.laporan_pendapatan_pdf', $data);

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream();
    }
}
