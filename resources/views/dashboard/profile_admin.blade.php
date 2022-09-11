@extends('layout.header.main')

@section('container')
<nav class="navbar navbar-expand-lg p-0 navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand ps-3" href="/dashboard">
        AINI HOTEL & BALLROOM</a>
    </div>
  </div>
  </nav>

  <div class="container-lg mt-4">
      <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title fs-4 text-center">Data Profile</h5>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-8 d-flex justify-content-center">
                                    @if (!empty(Auth()->User()->image))
                                    <img src="{{ asset('storage/'.Auth()->User()->image) }}" class="rounded-circle" style="width: 150px; height:150px" alt="">
                                    @else   
                                    <img src="{{ asset('img/default.jpg') }}" class="rounded-circle" style="width: 150px; height:150px" alt="">
                                    @endif
                                </div>
                                <div class="col-8">
                                    <form action="/profile/ubah/{{ $user->username }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <input type="hidden" name="oldImage" value="{{ $user->image }}">
                                    <div class="form-group mb-3">
                                        <label for="image" class="fs-5">Foto Profil</label>
                                        <input type="file" id="image" name="image" class="form-control @error('image')
                                            is-invalid
                                        @enderror">
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="username" class="fs-5">Username</label>
                                        <input type="text" id="username" name="username" value="{{ $user->username }}" class="form-control @error('username')
                                            is-invalid
                                        @enderror">
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="fs-5">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control @error('name')
                                            is-invalid
                                        @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="fs-5">Email</label>
                                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control @error('email')
                                            is-invalid
                                        @enderror">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="No. Telp" class="fs-5">No. Telp</label>
                                        <input type="number" name="no_hp" value="{{ $user->no_hp }}"  id="No. Telp" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="alamat" class="fs-5">Alamat</label>
                                        <textarea class="form-control" name="address" id="address" cols="1" rows="3">{{ $user->address }}</textarea>
                                    </div>
                                    <div class="row mb-4 d-flex justify-content-between">
                                        <div class="col-md-4">
                                            <a href="/dashboard" class="btn btn-danger mb-3 border-0"><i class="fa-solid fa-arrow-left"></i> Kembali</a>    
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary w-100" type="submit">Ubah Data</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
  </div>

@endsection