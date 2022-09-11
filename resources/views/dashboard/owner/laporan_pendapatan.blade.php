@extends('dashboard.layout.main')

@section('container2')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
                <table class="table table-hover table-light">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Pendapatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @empty(!$data[0])
                        @foreach ($data as $p )     
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->per_bulan }}</td>
                            <td>Rp. {{ number_format($p->total_pendapatan,0,',','.')}}</td>
                            <td>
                                <a href="{{ 'laporan_pendapatan/pdf?bulan=' . $p->per_bulan . '&total=' . $p->total_pendapatan }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-print mx-1"></i>Cetak PDF
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="5" align="center">Tidak Ada Data!</td>
                            </tr>
                        @endempty
                       
                    </tbody>
                </table>
    </div>
</div>
            </div>
        </div>
    </div>



<script>
   
</script>


@endsection