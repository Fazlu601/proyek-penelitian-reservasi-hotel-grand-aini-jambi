@extends('dashboard.layout.main')

@section('container2')
    <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center fw-bold">
                        Status : @if ($data->is_owner)
                        Owner
                        @elseif($data->is_admin)
                        Admin
                        @else
                        Tamu
                        @endif
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-3 mt-2">
                            @if ($data->image)
                            <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid rounded-circle" style="width: 100%; height:255px" alt="">
                            @else
                            <img src="{{ asset('img/default.jpg') }}" class="img-fluid rounded-circle" style="width: 100%; height:255px" alt="">
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item fw-bold">Username : {{ $data->username }}</li>
                                    <li class="list-group-item fw-bold">Nama Lengkap : {{ $data->name }}</li>
                                    <li class="list-group-item fw-bold">Alamat Email : {{ $data->email }}</li>
                                    <li class="list-group-item fw-bold">Alamat Lokasi : {{ $data->address }}</li>
                                  </ul>
                                  <div class="row text-center">
                                    <p class="fw-bold">Hubungi</p>
                                    <div class="col-sm-6 mb-2">
                                        <a href="https://api.whatsapp.com/send?phone={{ $data->no_hp }}&text=Halo%20Selamat%20Datang%20Di%20Hotel%20Kami" class="btn btn-sm w-100 btn-success">
                                            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                        {{ $data->no_hp }}</a>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <a href="mailto:{{ $data->email }}?subject=" class="btn btn-sm w-100 btn-danger">
                                            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                                        {{ $data->email }}</a>
                                    </div>
                                  </div>
                                                               
                            </div>
                        </div>
                        <div class="card-footer">
                            <h6 class="fw-bold text-center">Bergabung Sejak : {{ $data->created_at->diffForHumans() }}</h6>
                            <a href="/dashboard/users" class="btn btn-sm btn-danger ms-3 mt-3"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>
                    </div>
         
                </div>
            </div>
        </div>
    </div>
@endsection