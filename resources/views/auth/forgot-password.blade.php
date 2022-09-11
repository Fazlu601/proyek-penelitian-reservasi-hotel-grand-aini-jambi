@extends('layout.header.main')

@include('layout.nav.alterNav')
@section('container')
    <div class="container-fluid mb-3" style="margin-top:100px; height:75vh;">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                @if (session()->has('status'))
                    <div class="alert alert-success fw-bold p-3">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card header bg-warning p-2">
                        <h5 class="text-title text-center text-light fw-bold p-1">Masukan Email Aktif Anda</h5>
                    </div>
                    <div class="card body p-4">
                        <form action="{{ Route('password.email') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" name="email" placeholder="example@mail.com" id="floatingEmail" class="form-control @error('email')
                                    is-invalid
                                @enderror">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark fw-bold w-100">Kirim Link Verifikasi!</button>
                            </div>
                        </form>
                    </div>
                </div>
          
            </div>
        </div>
    </div>


    @include('layout.footer.footer')
@endsection