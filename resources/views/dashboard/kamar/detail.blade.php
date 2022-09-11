@extends('dashboard.layout.main')

@section('container2')

<div class="container-lg mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-11 bg-light p-5 rounded">
            <div class="row mb-4">
              <div class="col-md-6" style="text-transform: uppercase">
                <a href="/dashboard/rooms" class="btn btn-danger border-0 w-100 fw-bold">Kembali</a>
              </div>
              <div class="col-md-6" style="text-transform: uppercase">
                <a href="/dashboard/rooms/book/{{ $data->id }}" class="btn btn-primary border-0 w-100 fw-bold">Lihat Aktivitas Kamar</a>
              </div>
            </div>
              <h3 class="hotel-judul fs-3 text-dark">Tipe Kamar :{{ $data->room_name }}</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="row p-0 m-0">
                  <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid rounded" alt="">
                </div>
                <div class="row p-0 m-0 mt-1">
                  <div class=" slider-multi multiple-items mb-3">
                    @foreach ($data->Room_image as $m)
                    <div data-aos="zoom-in" class="col-md-4">
                        <img src="{{ asset('storage/'.$m->image) }}" class="img-fluid" style="width: 100%; heigh:auto" alt="">
                    </div>
                    @endforeach
                 
                     </div>
                </div>
              </div>
              <div class="col-md-6 p-3 border border-3 border-success rounded " style="height: 200px">
                  <div class="paragraph text-center fw-bold mb-3 mt-3 p-2">
                    Dari
                    <h3 class="hotel-judul fs-3 text-dark">{{"Rp. " . number_format($data->harga_nginap,2,',','.'); }}</h3>
                    Per Malam
                  </div>
                  
              </div>
            <div class="row d-flex justify-content-between m-0 border-bottom border-success py-3">
              <div class="col-md-3 mt-3">
                <p class="fs-5 fw-bold">Jumlah Kamar yang Tersedia : {{ $data->jumlah_kamar }}</p>
              </div>
              <div class="col-md-3 mt-3">
                <p class="fs-5">{{ $data->tipe_bed }}</p>
              </div>
            </div>
            <div class="row d-flex justify-content-between m-0 border-bottom border-success py-3">
              <div class="col-md-3 mt-3">
                <p class="fs-5 fw-bold">More Info :</p>
              </div>
              <div class="col-md-9 mt-3">
                <h5 class="fw-light">{!! $data->deskripsi_kamar !!}</h5>
              </div>
              <div class="col-md-3 mt-3">
                <p class="fs-5"></p>
              </div>
            </div>
            <div class="row m-0 border-bottom border-success py-3">
                <div class="card">
                    <div class="col-md-6 mt-3 mx-auto">
                      <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah Fasilitas
                      </button>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-light">
                            <thead>
                                <tr align="center">
                                    <th>No.</th>
                                    <th>Fasilitas</th>
                                    <th>Ikon</th>
                                    <th style="width: 100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @empty ($data->facility[0]->id)
                                <tr>
                                  <td colspan="3" align="center">Tidak Ada Data!</td>
                                </tr>
                              @endempty
                                @foreach ($data->facility as $f)
                                <tr align="center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $f->facility_name }}</td>
                                    <td>{{ $f->facility_icon }}</td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-sm btn-warning mx-2">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>

                                        <form action="/dashboard/rooms/hapusFacility/{{ $f->id }}" method="post">
                                          @method('delete')
                                            @csrf
                                            <button onclick="return confirm('Apakah anda yakin ingin menghapus fasilitas berikut?')" class="btn btn-sm btn btn-danger border-0">
                                              <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 border-bottom border-success py-3">
                <div class="card">
                    <div class="col-md-6 mt-3 mx-auto">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticFootage" class="btn btn-primary w-100">Tambah Footage</button>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-light">
                            <thead>
                                <tr align="center">
                                    <th style="width:80px">No.</th>
                                    <th>Footage Kamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @empty ($data->room_image[0]->id)
                              <tr>
                                <td colspan="3" align="center">Tidak Ada Data!</td>
                              </tr>
                            @endempty
                                @foreach ($data->room_image as $m)
                                <tr align="center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$m->image) }}" style="width: 80px;" class="img-fluid rounded" alt="">
                                    </td>
                                    <td>
                                      <form action="/dashboard/rooms/hapusFootage/{{ $m->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Apakah anda yakin ingin menghapus footage berikut?')" class="btn btn-sm btn-danger border-0">
                                          <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                      </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>









  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-md modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title fw-bold" id="staticBackdropLabel">Tambah Fasilitas Baru</h5>
        </div>
        <form action="/dashboard/rooms/tambahFacility" method="POST">
          @csrf
            <div class="modal-body">
                  <div class="form-group">
                    <input type="hidden" name="room_id" value="{{ $data->id }}" id="" class="form-control">
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" name="facility_name" id="floating_name" class="form-control">
                    <label for="floatingName">Nama Fasilitas</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" name="facility_icon" id="floating_icon" class="form-control">
                    <label for="floating_icon">Icon Fasilitas</label>
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



  <!-- Modal -->
<div class="modal fade" id="staticFootage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-md modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title fw-bold" id="staticBackdropLabel">Tambah Footage Baru</h5>
        </div>
        <form action="/dashboard/rooms/tambahFootage" enctype="multipart/form-data" method="POST">
          @csrf
            <div class="modal-body">
              <input type="hidden" value="{{ $data->id }}" name="room_id">
                    <div class="form-group">
                     <input type="file" name="image" id="" class="form-control">
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