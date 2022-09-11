@extends('dashboard.layout.main')
@section('container2')

    <div class="container mb-3" style="margin-top: 70px">
        <div class="card p-5">
            <div class="row">
                <div class="row pt-4">
                    <div class="col-lg-10">
                     <h1 class="fw-light">
                        @if ($data->status === 'settlement')
                        Berhasil Dibayar!
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
                        </h3>

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
                                <th>Room Type : </th>
                                <th>{{ $data->room_name }}</th>
                            </tr>
                            <tr>
                                <th>Room Type : </th>
                                <th>{{ $data->room_code }}</th>
                            </tr>
                            <tr>
                                <td style="font-size: 20px;">Total Harga :</td>
                                <th style="font-size: 20px;">Rp {{ number_format($data->gross_amount,0,',','.') }}</th>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
       
            
        </div>
    </div>

@endsection

