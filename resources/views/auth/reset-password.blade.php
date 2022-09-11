@extends('layout.header.main')

@include('layout.nav.alterNav')
@section('container')
    <div class="container-fluid mb-3" style="margin-top:100px; height:75vh;">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <div class="card header bg-warning p-2">
                        <h5 class="text-title text-center text-light fw-bold p-1">Masukan Password Barumu</h5>
                    </div>
                    <div class="card body p-4">
                        <form action="{{ Route('password.update'); }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group mb-3">
                                <input type="email" placeholder="Email" name="email" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" placeholder="Password" id="floatingEmail" class="form-control @error('email')
                                    is-invalid
                                @enderror">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password_confirmation" placeholder="Konfrimasi Password" id="floatingEmail" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark fw-bold w-100">Ubah Password!</button>
                            </div>
                        </form>
                    </div>
                </div>
          
            </div>
        </div>
    </div>

    @include('layout.footer.footer')
@endsection