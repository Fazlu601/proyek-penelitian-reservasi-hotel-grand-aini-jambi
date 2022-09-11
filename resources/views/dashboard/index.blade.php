@extends('dashboard.layout.main')
@section('container2')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body d-flex justify-content-between">
                <h3 class="text-white stretched-link">{{ $data_transaksi }}</h3>
                <i class="fa fa-sticky-note" style="font-size: 3rem" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
        <div class="card-body d-flex justify-content-between">
            <h3 class="text-white stretched-link">{{ $data_pending }}</h3>
            <i class="fa fa-clock" style="font-size: 3rem" aria-hidden="true"></i>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body d-flex justify-content-between">
                <h3 class="text-white stretched-link">{{ $data_sukses }}</h3>
                <i class="fa fa-check-square" style="font-size: 3rem" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body d-flex justify-content-between">
                <h3 class="text-white stretched-link">{{ $data_cancel }}</h3>
                <i class="fa fa-minus-square" style="font-size: 3rem" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
             <!-- Navbar Search-->
             <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input type="month" name="bulan" class="form-control" id="inlineFormInputGroupUsername">
                    <button type="submit" class="btn btn-primary rounded-0">Search</button>
                </div>
            </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light">
                <thead align="center">
                    <tr>
                        <th>No.</th>
                        <th>status</th>
                        <th>Kode Pembayaran</th>
                        <th>Nama Pemesan</th>
                        <th>No. hp</th>
                        <th>Tipe Pembayaran</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @empty(!$data[0])
                    @foreach ($data as $order) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($order->status === 'settlement')
                                <span class="btn btn-sm btn-success p-1">Berhasil</span>
                            @elseif ($order->status === 'pending')
                                <span class="btn btn-sm btn-warning p-1">Menunggu</span>
                            @elseif ($order->status === 'failure')
                                <span class="btn btn-sm btn-danger p-1">Gagal</span>
                            @endif
                        </td>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->no_hp }}</td>
                        <td>{{ $order->payment_type }}</td>
                        <td>Rp. {{ number_format($order->gross_amount,0,',','.') }}</td>
                        <td class="d-flex">
                            <a href="/dashboard/orders/{{ $order->id }}" class="btn btn-sm btn-primary mx-1 border-0">
                                <i class="fa fa-detail"></i>
                            </a>
                            <form action="/dashboard/orders/{{ $order->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus pemesanan berikut?')" class="btn btn-sm btn-danger mx-1 border-0">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" align="center">Tidak Ada Data Pemesanan!</td>
                    </tr>
                    @endempty
                </tbody>
            </table>
            {{ $data->links() }}
        </div>

    </div>
</div>
@endsection