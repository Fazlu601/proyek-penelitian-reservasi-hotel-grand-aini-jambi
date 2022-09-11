@extends('layout.header.main')

@section('container')
@include('layout.nav.alterNav')

  <div class="container-lg p-0  mb-4" style="margin-top: 75px; height:85vh; ">
      <div class="row bg-light rounded p-3">
        <div class="col-lg-2">
            <div class="row d-flex align-items-center border-bottom pb-3">
                <div class="col-4">
                    @if (Auth()->user()->image)
                    <img src="{{ asset('storage/'.$user->image) }}" style="width: 40px;height:40px" class=" rounded-circle" alt="">     
                    @else    
                    <img src="{{ asset('img/default.jpg') }}" style="width: 40px;height:40px" class=" rounded-circle" alt="">
                    @endif
                </div>
                <div class="col-8">
                    <p class="fw-bold">{{ $user->username }}</p>
                </div>
            </div>
            <div class="row">
               <a href="#akun-list" data-bs-toggle="collapse" class="text-decoration-none fw-bold text-dark mb-3"><i class="fa fa-user"></i> &nbsp; Akun Saya</a>
               <ul class="list-menu ms-4 collapse show" id="akun-list">
                    <li class="list-group mb-2" style="cursor: pointer" id="profilButton">Profil</li>
                    <li class="list-group mb-2" style="cursor: pointer" id="alamatButton">Alamat</li>
                    {{-- <li class="list-group mb-2" style="cursor: pointer"><a href="{{ Route('password.request') }}" class="text-decoration-none text-dark">Ubah Password</a></li> --}}
               </ul>
               <a href="/history_pemesanan" class="fw-bold text-decoration-none text-dark"><i class="fa fa-bed"></i> &nbsp; Pesanan Saya</a>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="card mx-auto">
               
                <div class="card-body" id="profile" style="display: block">
                    <div class="row">
                        @if (session()->has('success'))
                            <div class="alert alert-success fw-bold p-2">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="title border-bottom pb-2">
                            <h5>Profile Saya</h5>
                            <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                        </div>
                        <div class="col-lg-8">
                <form action="/profile/ubah/{{ $user->id }}" enctype="multipart/form-data" method="POST">
                                @method('put')
                                @csrf
                                <input type="hidden" name="oldimage" value="{{ $user->image }}">
                            <table cellpadding="20">
                                <tr>
                                    <td><p class="fw-light">Username</p></td>
                                    <td>
                                        <input type="text" name="username" value="{{ Auth()->user()->username }}" readonly id="" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle"><p class="fw-light">Nama</p></td>
                                    <td>
                                        <input type="text" required name="name" value="{{ $user->name }}" id="" class="form-control">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle"><p class="fw-light">Email</p></td>
                                    <td>
                                        <input type="email" required name="email" value="{{ $user->email }}" id="" class="form-control">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle"><p class="fw-light">Nomor Telepon</p></td>
                                    <td>
                                        <input type="number" min="0" name="no_hp" value="{{ $user->no_hp }}" id="" class="form-control">
                                        @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group p-3">
                                @if (Auth()->user()->image)
                                <img src="{{ asset('storage/'.$user->image) }}" style="width: 80px; height:80px" class="rounded-circle mb-3" alt="">
                                @else
                                <img src="{{ asset('img/default.jpg') }}" style="width: 80px; height:80px" class="rounded-circle mb-3" alt="">
                                @endif
                                <input type="file" name="image" id="" class="form-control">
                            </div>
                            <p class="caption-image-rule">Ukuran gambar: maks. 1 MB <br> Format gambar: .JPEG, .PNG</p>
                        </div>
                    </div>
                        </div>
                <div class="card-body" id="alamat" style="display: none">
                    <div class="row">
                        <div class="title border-bottom pb-2">
                            <h5>Alamat</h5>
                            <p>Kelola informasi alamat anda</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group my-3">
                                <label for="alamat" >Alamat</label>
                                <textarea id="alamat" readonly style="resize: none" cols="1" rows="2" class="form-control">{{ $user->address }}</textarea>
                            </div>
                            <div class="form-group my-3">
                                <label for="alamat" >Alamat Baru</label>
                                <textarea name="address" id="alamat" cols="1" style="resize: none" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <a href="/" class="btn btn-danger rounded-0 fw-bold mx-2">Kembali</a>
                                <button type="submit" class="btn btn-success rounded-0 fw-bold mx-2">Simpan</button>
                            </div>
                </form>
                </div>
            </div>
        </div>
     </div>
  </div>


  @include('layout.footer.footer')


@endsection