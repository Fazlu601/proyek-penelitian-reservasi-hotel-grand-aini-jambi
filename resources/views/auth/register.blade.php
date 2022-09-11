@extends('layout.header.main')

@include('layout.nav.alterNav')

@section('container')


    <div class="container-lg mb-5" style="margin-top: 75px;">
        <div class="row d-flex justify-content-center p-4">
            <div class="col-lg-12 regisForm p-2">
                <div class="card">
                    <div class="card-header bg-danger fw-bold text-light">
                        <p>Selamat Datang di Grand Aini Hotel, untuk dapat masuk ke website kami silahkan lakukan registrasi akun terlebih dahulu, dengan menginputkan data seperti username, nama lengkap, email, nomor telepon, dan juga password.</p>
                    </div>
                    <div class="card-body">
                        @if (session()->Has('success'))
                        <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                          <h3 class="fs-5 fw-bold">
                            {{ session('success') }}
                          </h3>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                        <h3 class="fs-3 fw-bold text-center text-danger" style="font-variant:small-caps">
                        Daftar Akun</h3>
                        <form action="{{ Route('register') }}" method="POST">
                            @csrf
        
                            <div class="row d-flex justify-content-between p-3">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" placeholder="Masukan Username Baru" required autofocus value="{{ old('username') }}" name="username" class="form-control @error('username')
                                        is-invalid
                                    @enderror">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>        
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" id="nama" placeholder="Masukan Nama Lengkap" required value="{{ old('name') }}" name="name" class="form-control @error('name')
                                        is-invalid
                                        @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" placeholder="Masukan Email Baru" required value="{{ old('email') }}" name="email" class="form-control @error('email')
                                            is-invalid
                                        @enderror">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="no-telp">Nomor Telepon</label>
                                        <input type="number" placeholder="Masukan No. Telepon" id="no-telp" required value="{{ old('no_hp') }}" name="no_hp" class="form-control @error('no_hp')
                                            is_invalid
                                        @enderror">
                                        @error('no-hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" placeholder="Password harus terdiri dari gabungan A,0, dan ]" id="password" name="password" class="form-control @error('password')
                                            is-invalid
                                        @enderror">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-5">
                                        <label for="kon-pass">Konfirmasi Password</label>
                                        <input type="password" id="kon-pass" placeholder="Masukan Konfirmasi Password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="w-100 btn btn-lg btn-dark rounded-pill mb-3">Daftar</button>
                                </form>
                                    <p class="text-muted text-center">Sudah punya akun? <a href="{{ Route('login'); }}" class="text-decoration-none">Login sekarang</a></p>
                                </div>
                       
                    </div>
                </div>
                    </div>
            </div>
        </div>
    </div>

    @include('layout.footer.footer')
@endsection