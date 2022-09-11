@extends('dashboard.layout.main')

@section('container2')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user me-1"></i>
                          <!-- Navbar Search-->
                        <form action="" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                            @csrf
                            <div class="input-group">
                                <input class="form-control" type="search" name="search" placeholder="Cari..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-light">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Bergabung sejak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @empty($data[0])
                        <tr>
                            <td colspan="5" align="center">Tidak Ada Data!</td>
                        </tr>
                    @endempty
                    @foreach ($data as $d )     
                    <tr class="text-center">
                        <td>{{ $data->firstItem() + $loop->index }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->created_at }}</td>
                        <td>
                            <a href="/dashboard/users/{{ $d->id }}" class="btn btn-sm mx-1 btn-primary"><i class="fa-solid fa-detail"></i></a>
                            @can('owner')
                            <a href="/dashboard/users/{{ $d->id }}/edit" class="btn btn-sm mx-1 btn-warning"><i class="fa-solid fa-edit text-light"></i></a>
                            @endcan
                            <form action="/dashboard/users/{{ $d->id }}" class="d-inline" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm mx-1 border-0 btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data berikut?')" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
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



<script>
   
</script>


@endsection