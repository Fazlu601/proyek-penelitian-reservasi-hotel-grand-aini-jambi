@extends('dashboard.layout.main')

@section('container2')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-light">
                        <thead align="center">
                            <tr>
                                <th>No.</th>
                                <th>Kode Kamar</th>
                                <th>Status Kamar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach ($data as $book)
                                <tr>
                                    <td>{{ $data->firstItem() + $loop->index }}</td>
                                    @if ($book->room_id === 1)
                                    <td>STD{{ $book->kode_kamar }}</td>
                                    @else
                                    <td>SPR{{ $book->kode_kamar }}</td>
                                    @endif
                                    @if ($book->active === 0)
                                    <td>
                                        <span class="btn btn-sm text-light fw-bold" style="background-color: grey">Tidak Aktif</span>
                                    </td>
                                    @elseif($book->active === 1)
                                    <td>
                                        <span class="btn btn-sm btn-success text-light fw-bold">Kosong</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="btn btn-sm text-light fw-bold" style="background-color: red">Di booking</span>
                                    </td>
                                    @endif
                                    <td>
                                        <a href="/dashboard/rooms/book/{{ $book->id }}/edit" id="edit-tombol" data-id="{{ $book->id }}"  class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
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
                <form action="" method="post">

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