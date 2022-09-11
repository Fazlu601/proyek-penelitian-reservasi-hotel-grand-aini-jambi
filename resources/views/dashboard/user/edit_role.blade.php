@extends('dashboard.layout.main')

@section('container2')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-success">

                    </div>
                    <div class="card-body p-4">
                   
                        <h3 class="text-title fw-bold text-center">{{ $data->name }}</h3>
                        <div class="form-group mb-3">
                            <form action="/dashboard/users/{{ $data->id }}" method="POST">
                                @method('put')
                                @csrf
                            <label for="editActivity">Ubah Role</label>
                            <select name="is_admin" id="editActivity" class="form-control">
                                @if ($data->is_admin)
                                <option value="1">Admin</option>
                                <option value="0">Pelanggan User</option>
                                @else
                                <option value="0">Pelanggan User</option>
                                <option value="1">Admin</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button>
                            <a href="dashboard/role_access" class="btn btn-danger w-100">Kembali</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection