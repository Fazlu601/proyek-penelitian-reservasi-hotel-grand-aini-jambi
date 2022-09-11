@extends('dashboard.layout.main')

@section('container2')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
    <div class="card-header">
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data Kamar
                </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-light">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Tipe Kamar</th>
                    <th>Tampilan</th>
                    <th>Jumlah Kamar</th>
                    <th>Harga/Malam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d )     
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->room_name }}</td>
                    <td class="col-1">
                      <img src="{{ asset('storage/'.$d->image) }}" class="img-fluid rounded" alt="">
                    </td>
                    <td>{{ $d->jumlah_kamar }}</td>
                    <td>{{ $d->harga_nginap }}</td>
                    <td>
                        <a href="/dashboard/rooms/{{ $d->id }}" class="btn btn-sm mx-1 btn-primary"><i class="fa-solid fa-detail"></i></a>
                        <a href="/dashboard/rooms/{{ $d->id }}/edit" class="btn btn-sm mx-1 btn-warning"><i class="fa-solid fa-edit text-light"></i></a>
                        <form action="/dashboard/rooms/{{ $d->id }}" class="d-inline" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm mx-1 border-0 btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data berikut?')" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
      </div>
    </div>
</div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title fw-bold" id="staticBackdropLabel">Tambah Data Kamar Baru</h5>
        </div>
        <div class="modal-body">
            <form action="/dashboard/rooms" enctype="multipart/form-data" method="POST">
                @csrf
            <div class="form-floating mb-3">
                <input type="text" name="room_name" required value="{{ old('room_name') }}" class="form-control" id="floatingUsername" placeholder="name@example.com">
                <label for="floatingUsername">Nama Tipe Kamar</label>
              </div>
            <div class="form-group mb-3">
              <label for="floatingInput">Foto Kamar :</label>
                <input type="file" name="image" required value="{{ old('image') }}" class="form-control" id="floatingInput" placeholder="name@example.com">
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="jumlah_kamar" required min="0" value="{{ old('jumlah_kamar') }}" class="form-control w-25" id="floatingEmail" placeholder="Password">
                <label for="floatingEmail">Jumlah Kamar</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="tipe_bed" required value="{{ old('tipe_bed') }}" class="form-control" id="floatingEmail" placeholder="Password">
                <label for="floatingNoTlp">Tipe Kasur</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="harga_nginap" required value="{{ old('harga_nginap') }}" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Harga Nginap/Malam</label>
              </div>
              <div class="form-group">
                <input type="hidden" name="deskripsi_kamar" required value="{{ old('deskripsi_kamar') }}" id="deskripsi_kamar">
                <trix-editor input="deskripsi_kamar" class="trix-content"></trix-editor>
              </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-25">Simpan</button>
          <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Kembali</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection