<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - {{ $title }}</title>
        <link href="{{ asset('img/logo.jpeg') }}" rel="shortcut icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('css/stylesDashboard.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
        <link rel="stylesheet" href="{{ asset('js/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('js/slick/slick-theme.css') }}">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" style="background-color:yellowgreen">
        @include('dashboard.layout.topbar')
        @include('dashboard.layout.nav')

                <main>
                    @if (session()->Has('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                         <h3 class="fs-5 fw-bold">  {{ session('success') }}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->Has('deleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h3 class="fs-5 fw-bold">
                        {{ session('deleted') }}
                        </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endif
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">{{ $title }}</h1>
                        @yield('container2')
                    </div>
                </main>
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="text-light fw-bold">Copyright &copy; GRAND AINI HOTEL - 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scriptsDashboard.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/slick/slick.js') }}"></script>
        
  <script>
      $(document).ready(function(){
     $('.demo').slick();
     $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
      });
});


</script>
    </body>
</html>
