@extends('dashboard.layout.main')

@section('container2')

<div class="container-fluid mt-3 mb-3">
    <div class="card">
        <div class="card-header">
            <h4 class="fw-bold text-dark">Edit Data Kamar</h4>
        </div>
        <div class="card-body">
            <form action="/dashboard/rooms/{{ $data->id }}" enctype="multipart/form-data" method="POST">
            <div class="row d-flex justify-content-center">
                    @method('put')
                    @csrf
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="">Nama Kamar</label>
                        <input type="text" name="room_name" value="{{ $data->room_name }}" placeholder="Nama kamar" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Jumlah Kamar</label>
                        <input type="number" name="jumlah_kamar" value="{{ $data->jumlah_kamar }}" placeholder="Jumlah kamar" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Tipe kasur</label>
                        <input type="text" name="tipe_bed" value="{{ $data->tipe_bed }}" placeholder="Tipe Kasur" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Harga Nginap / malam</label>
                        <input type="number" name="harga_nginap" value="{{ $data->harga_nginap }}" placeholder="Harga Nginap/Malam" id="" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <input type="hidden" name="oldImage" value="{{ $data->image }}">
                    <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid rounded" alt="">
                    <div class="form-group mt-3">
                        <input type="file" name="image" class="form-control" id="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="">Deskripsi</label>
                        <input type="hidden" name="deskripsi_kamar" value="{{ $data->deskripsi_kamar }}" id="deskripsi_kamar">
                        <trix-editor input="deskripsi_kamar" class="trix-content"></trix-editor>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/dashboard/rooms" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
            </div>
            
    </div>
</div>

@endsection