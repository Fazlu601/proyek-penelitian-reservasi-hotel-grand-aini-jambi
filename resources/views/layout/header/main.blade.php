<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="{{ asset('img/logo.jpeg') }}" rel="shortcut icon">
  <link href="//db.onlinewebfonts.com/c/aea2dccfb7cc00dd6b896944afb0cbc2?family=MonotypeScriptW01-Bold" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('aos/dist/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('js/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('js/jquery-modal/src/themes/light-theme.css') }}" /> --}}
  <link rel="stylesheet" href="{{ asset('js/slick/slick-theme.css') }}">
  <script src="https://apps.elfsight.com/p/platform.js" defer></script>
  <div class="elfsight-app-5e454b1e-771c-4fa1-b6e3-9bb62fc723b3">
    <a href="google.com"></a>
  </div>
  <title>{{ $title }}</title>
</head>
<body style="background-color: yellowgreen">
  


  @yield('container')

</body>
</html>
