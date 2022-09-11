@extends('layout.header.main')

@section('container')
@include('layout.nav.alterNav')

    <div class="container-lg mb-5" style="margin-top: 100px">
        <div class="row d-flex justify-content-center rounded">
            <div class="gambarHotel col-lg-6 p-0 bg-primary" >
                <img src="img/hotel.png" class="mt-3" style="width: 100%; height:auto;">
                <hr class="text-light">
                <h2 class="fw-bold gambar-text text-white bg-dark fs-2 p-2 text-center mt-3" style="font-family: Tungsten bold"></h2>
            </div>
            <div class="loginForm col-lg-6 bg-light" style="background-color: #fffff">
              @if (session()->Has('success'))
                      <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                        <h3 class="fs-5 fw-bold">
                          {{ session('success') }}
                        </h3>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @elseif (session('danger'))
                    <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                      <h3 class="fs-5 fw-bold">
                        {{ session('danger') }}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
                <main class="form-signin p-5">
                    <form action="/login" method="POST">
                      @csrf
                      <h1 class="h2 mb-3 text-center text-warning fw-bold" style="font-variant:small-caps;">Login</h1>
                  
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email')
                          is-invalid
                        @enderror" autofocus value="{{ old('email') }}" required name="email" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password')
                          is-invalid
                        @enderror mb-3" required name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group mb-3">
                        <label for="remember">Remember Me</label>
                        <input type="checkbox" name="remember" id="" >
                      </div>
                  
                      <button class="w-100 btn btn-lg btn-dark rounded-pill text-light mb-2" type="submit">Login</button>
                      <p class="text-center askRes"></p>
                      <p class="text-center lupa-pw">
                        <a href="{{ Route('password.request') }}" class="text-decoration-none">Lupa Password?</a>
                      </p>
                      <p class="mt-5 mb-3 text-muted text-center">&copy; {{ date('Y') }}</p>
                    </form>
                  </main>
            </div>
        </div>
    </div>

    @include('layout.footer.footer')

@endsection