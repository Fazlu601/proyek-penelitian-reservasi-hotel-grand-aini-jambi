@extends('dashboard.layout.main')

@section('container2')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
    <div class="card-header">
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary tampilModaluser" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data Admin
                </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-light">
              <thead>
                  <tr class="text-center">
                      <th>No.</th>
                      <th>Role</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Bergabung sejak</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($data as $d ) 
                  @if (!$d->is_owner)
                    
                  <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      @if ($d->is_owner)
                      Owner
                      @elseif($d->is_admin)
                              Administrator
                              @endif
                            </td>
                            <td>{{ $d->username }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->created_at }}</td>
                            <td>
                              <a href="/dashboard/users/{{ $d->username }}" class="btn btn-sm mx-1 btn-primary"><i class="fa-solid fa-detail"></i></a>
                              <a href="/dashboard/users/{{ $d->id }}/edit" class="btn btn-sm mx-1 btn-warning tampilModalubah"><i class="fa-solid fa-edit text-light"></i></a>
                            </td>
                          </tr>
                          @endif    
                      @endforeach
              </tbody>
          </table>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title fw-bold" id="staticBackdropLabel">Tambah User Baru</h5>
        </div>
        <div class="modal-body">
            <form action="/dashboard/users" method="POST">
                @csrf
            <div class="form-floating mb-3">
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="floatingUsername" placeholder="name@example.com">
                <label for="floatingUsername">Username</label>
              </div>
            <div class="form-floating mb-3">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nama Lengkap</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="floatingEmail" placeholder="Password">
                <label for="floatingEmail">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="form-control" id="floatingEmail" placeholder="Password">
                <label for="floatingNoTlp">No. Telp</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="form-group mb-3 d-flex">
                <label for="">Admin : </label>
                  <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" value="1" name="is_admin" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      True
                    </label>
                  </div>
                  <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" value="0" name="is_admin" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      False
                    </label>
                  </div>
              </div>

            
             
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
          <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Kembali</button>
        </div>
    </form>
      </div>
    </div>
  </div>




<script>
   
</script>


@endsection