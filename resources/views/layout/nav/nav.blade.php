<nav class="navbar navbar-expand-lg p-0 navbar-dark bg-success fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" style="color: #eaeaea; font-size:30px; font-family:Verdana, Geneva, Tahoma, sans-serif;
      " href="/">
        <img src="{{ asset('img/logo.jpeg') }}" style="width:30px; " class="d-inline-block align-text-top rounded-circle m-1" alt="">
        GRAND AINI HOTEL</a>
    </div>

    @guest
    <li id="daftar-btn"><a href="/register" class="px-2 border-2 fs-5 mt-2 fw-bold mx-3">Daftar</a>    </li>
    <li id="login-btn"><a href="{{ Route('login') }}" class="px-2 border-2 fs-5 mt-2 fw-bold mx-3">Login</a>    </li>
    @endguest
    @auth
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
            @if (Auth()->User()->image)
            <img src="{{ asset('storage/'.Auth()->User()->image) }}" class="rounded-circle me-2" style="width:35px; height:35px" alt="{{ Auth()->User()->image }}">
            @else
            <img src="{{ asset('img/default.jpg') }}" class="rounded-circle me-2" style="width:35px; height:35px" alt="{{ Auth()->User()->image }}">
            @endif
         </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            @can('admin')
            <li><a class="dropdown-item" href="/dashboard/orders">Admin Dashboard</a></li>    
            @endcan
              <li><a class="dropdown-item" href="/profile">Profile</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <form action="{{ Route('logout'); }}" method="POST">
                @csrf
                <button class="dropdown-item" onclick="return confirm('apakah anda yakin ingin keluar?')" type="submit">Logout</button>
              </form>
              </li>
          </ul>
      </li>
  </ul>
      {{-- <form action="/logout" method="post">
      @csrf
      <button class="btn btn-outline-danger mx-3" type="submit" onclick="return confirm('Apakah anda yakin ingin keluar?')"><i class="fa-solid fa-right-to-bracket text-danger" onmousemove="style.color='red';"></i> Logout</button>
    </form> --}}
    @endauth

  </div>
  </nav>