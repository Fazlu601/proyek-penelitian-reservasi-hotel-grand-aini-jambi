@extends('layout.header.main')

    @section('container')
    @include('layout.nav.alterNav')
    
    
        <div class="container mb-3 p-3" style="margin-top: 70px;height:85vh;">
            @empty($data[0])
            <div class="row" style="height: 73vh">
                <h3 class="fw-bold text-center bg-light rounded text-dark p-3">Belum Ada Pemesanan!</h3>
            </div>
            @endempty
            @foreach ( $data as $order )
                
            <div class="card p-3">
                <div class="card-header d-flex justify-content-between rounded bg-success text-light">
                    <h3>{{ $order->check_in }}</h3>
                    <a href="/history_pemesanan/{{ $order->id }}" class="btn btn-sm btn-primary fw-bold h5 border-0"><i class="fas fa-fw fa-info"></i> Detail Reservasi</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <ul class="list-group">
                                <li class="list-group-item fw-bold">Check-in dari : {{ $order->check_in . ' s/d ' . $order->check_out }}</li>
                                <li class="list-group-item fw-bold">Kamar Tipe : {{ $order->room_name }}</li>
                                <li class="list-group-item fw-bold">Rp {{ number_format($order->gross_amount,0,',','.') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    
    
    @include('layout.footer.footer')
    @endsection