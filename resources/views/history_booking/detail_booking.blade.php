@extends('layout.header.main')
@section('container')
@include('layout.nav.alterNav')

    <div class="container mb-3" style="margin-top: 70px">
        <div class="card p-5">
            <div class="row d-flex flex-fill mb-3">
                <div class="col-sm-3" style="text-transform: uppercase">
                    <h5 class="hotel-judul fs-1 text-dark fw-bold">The Rooms</h5>
                </div>
                <div class="col-9 garis" style="border-bottom:4px dashed black;">
                </div>  
            </div>
            <div class="row">
                <div class="row pt-4">
                    <div class="col-lg-10">
                     <p class="caption mb-3">Waktu pengambilan kamar dan batas waktu meninggalkan kamar bebas dalam 24 jam. </p>
                     <h1 class="fw-light">
                        @if ($data->status === 'settlement')
                        Kamarmu Berhasil DiBooking!
                        @else
                        Menunggu Pembayaran!
                        @endif
                    </h1>
                     <h3 class="pb-5 mt-3 border-bottom border-success">Nama Pemesan : {{ $data->name }}</h3>
                    </div>
                    @if ($data->status === 'settlement')
                    <div class="col-lg-2">
                        <a href="/booking_pdf/{{ $data->id }}" class="btn shadow-sm btn-danger btn-sm">
                            <i class="fa fa-print"></i>
                            Download PDF</a>
                        </div>
                    @endif
                </div>
                <div class="row mt-3">
                    <div class="col-lg-8">
                        <h3 class="border border-success p-4">Kode Reservasi: {{ $data->order_id }}
                           <br> 
                           @if ($data->status === 'settlement')
                           Notifikasi email akan segera muncul
                           @endif
                        </h3>

                        <h5 class="fw-bold border-bottom border-success mt-5 pb-3">Hotel Detail</h5>
                        <table class="table">
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
                        <table class="table border border-success">
                            <tr>
                                <th>Check In : </th>
                                <th>{{ $data->check_in }}</th>
                            </tr>
                            <tr>
                                <th>Check Out : </th>
                                <th>{{ $data->check_out }}</th>
                            </tr>
                            <tr>
                                <th align="right">Room Type : </th>
                                <th>{{ $data->room_name }}</th>
                            </tr>
                            <tr>
                                <th align="right">No. Room : </th>
                                <th>{{ $data->room_code }}</th>
                            </tr>
                            <tr style="margin-top: 30px">
                                <td style="font-size: 20px;">Total Harga :</td>
                                <th style="font-size: 20px;">Rp {{ number_format($data->gross_amount,0,',','.') }}</th>
                            </tr>
                        </table>

                        <div class="ratio ratio-1x1">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.241309972497!2d103.60223217698073!3d-1.6109892808601343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258892dcb39fc7%3A0x90ee2421ed1a568c!2sAini%20Hotel%20%26%20Ballroom%20Jambi!5e0!3m2!1sen!2sid!4v1650085538208!5m2!1sen!2sid" style="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                          </div>
                    </div>
                </div>
            </div>
       
            
        </div>
    </div>

 @include('layout.footer.footer')
@endsection

