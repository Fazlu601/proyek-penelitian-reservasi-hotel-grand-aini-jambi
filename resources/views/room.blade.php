@extends('layout.header.main')

@section('container')
@include('layout.nav.alterNav')

  
    <div class="container-lg mb-3" style="margin-top: 70px;height:80vh">
        <div class="row">
            @if (session()->has('success'))
                <h2 class="fs-3 fw-bold text-light rounded p-3 text-center mb-5 bg-success">
                    {{ session('success') }} <br>
                    Silahkan pilih kamar yang ingin anda Booking!
                </h2>
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center fs-3">The Room</h5>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row d-flex justify-content-center">
                            <div class="col-md-2 p-0 m-0">
                               <input type="date" name="" id="" class="form-control rounded-0"> 
                            </div>
                            <div class="col-md-2 p-0 m-0">
                               <input type="date" name="" id="" class="form-control rounded-0"> 
                            </div>
                            <div class="col-md-2 p-0 m-0">
                                <input type="number" name="" id="" class="form-control w-25 rounded-0 w-50">
                            </div>
                            <div class="col-md-2 p-0 m-0">
                                <button class="btn btn-danger rounded-0">Filter</button>
                            </div>
                        </div> --}}
                        <hr>

                        @foreach ( $data as $d )
                            
                        <div class="row mb-3">
                            <div class="col-md-4" data-aos="zoom-in">
                                <img src="{{ asset('storage/'.$d->image) }}" class="img-fluid rounded shadow" style="width: 100%; height:auto" alt="">
                            </div>
                            <div class="col-md-5" data-aos="fade-in-top" data-aos-duration="2000">
                                <h3 class="fs-3 fw-bold">{{ $d->room_name }}</h3>
                                <p>{!! $d->deskripsi_kamar !!}</p>
                                <li class="border-bottom list-group fw-bold border-success pb-2">Beds: {{ $d->tipe_bed }}</li>
                                <ul data-aos="fade-up" data-aos-duration="1000" class="list-group list-group-horizontal mt-2">
                                    @foreach ( $d->Facility as $f)
                                    <li class="list-group-item fasilitas-ikon border-0"><i class="{{ $f->facility_icon }} text-success"></i>
                                        <p class="fasilitas-caption bg-light text-center">{{ $f->facility_name }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h4 class="fs-4 fw-bold text-center">Harga</h4>
                                <div class="row d-flex align-items-center mx-auto">
                                    <h2 class="fs-2 fw-bold">{{"Rp. " . number_format($d->harga_nginap,2,',','.'); }}</h2>
                                </div>
                                <a href="/checkin/{{ $d->id }}" data-aos="flip-up" data-aos-duration="1000"  class="btn btn-success text-light border-0 fw-bold w-100 mt-5">Booking</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer.footer')
@endsection
