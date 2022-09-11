<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman {{ $title }}</title>
</head>
<body>
    <div class="container mb-3" style="margin-top: 5px">
        <div class="card p-5">
            <div class="row d-flex flex-fill mb-3">
                <div class="col-sm-3" style="text-transform: uppercase">
                    <h3 class="hotel-judul fs-1 text-dark fw-bold">GRAND AINI HOTEL</h3>
                </div>
                <div class="col-9 garis" style="border-bottom:4px solid black;">
                </div>  
            </div>
            <div class="row">
                <div class="row pt-4">
                    <div class="col-lg-10">
                     <p class="caption mb-3">Waktu pengambilan kamar dan batas waktu meninggalkan kamar bebas dalam 24 jam. </p>
                     <h1 class="fw-light">Surat Bukti Pemesanan Kamar!</h1>
                     <h3 class="pb-5 mt-3 border-bottom border-success">Nama Pemesan : {{ $data->name }}</h3>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-8">
                        <h3 style="border: 2px solid black; padding:10px">Kode Reservasi: {{ $data->order_id }}</h3>
                        <h5 class="fw-bold border-bottom border-success mt-5 pb-3">Hotel Detail</h5>
                        <table cellpadding="10">
                            <tr>
                                <td>Phone Number</td>
                                <td>089658130101</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>ainihotel&ballroom@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Jl.Prof.DR.Moh. Yamin No.07 Kel, Payo Lebar, Kec.Jelutung,
                                    Kota Jambi, Jambi 36135</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table cellpadding="10">
                            <tr align="left">
                                <th>Room Type : </th>
                                <th>{{ $data->room_name }}</th>
                            </tr>
                            <tr align="left">
                                <th>No. Room : </th>
                                <th>{{ $data->room_code }}</th>
                                    <th>Check In : </th>
                                    <th>{{ $data->check_in }}</th>
                            </tr>
                            <tr align="left">
                                <th>Metode Pembayaran : </th>
                                <th>{{ $data->payment_type }}</th>
                                <th>Check Out : </th>
                                <th>{{ $data->check_out }}</th>
                            </tr>
                            <tr>
                                <td style="font-size: 20px;">Total Harga :</td>
                                <th style="font-size: 20px;">Rp {{ number_format($data->gross_amount,0,',','.') }}</th>
                            </tr>
                            <tr>
                                <td style="font-size: 20px;">Status Pembayaran :</td>
                                <th style="font-size: 20px;">BERHASIL!</th>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
       
            
        </div>
    </div>
</body>
</html>