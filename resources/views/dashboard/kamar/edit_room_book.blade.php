@extends('dashboard.layout.main')

@section('container2')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-success">

                    </div>
                    <div class="card-body p-4">
                        @if ($data->room_id === 1)
                        <h3 class="text-title fw-bold text-center">STD{{ $data->kode_kamar }}</h3>
                        @else
                        <h3 class="text-title fw-bold text-center">SPR No. {{ $data->kode_kamar }}</h3>
                        @endif
                        <div class="form-group mb-3">
                            <form action="/dashboard/rooms/book/{{ $data->id }}" method="POST">
                                @method('put')
                                @csrf
                            <label for="editActivity">Ubah Status Kamar</label>
                            <select name="active" id="editActivity" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                                <option value="2">Di Booking</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button>
                            <a href="/dashboard/rooms/book/{{ $data->room_id }}" class="btn btn-danger w-100">Kembali</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection