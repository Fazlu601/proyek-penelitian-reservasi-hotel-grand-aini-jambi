<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background: url('img/kamar2.jpg')
            no-repeat center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-backrgound-size: cover;
            background-size: cover;
        }

    </style>
    <title>Booking</title>
</head>
<body>
    @include('layout.nav.nav')
    <nav class="navbar navbar-expand-lg p-0 navbar-dark bg-dark" style="opacity: 0">
        <div class="container-fluid">
            <a class="navbar-brand bolder" href="/">
                <img src="img/logo aini.jpg" width="30" height="24" class="d-inline-block align-text-top rounded-circle m-1" alt="">
                AINI HOTEL & BALLROOM</a>
            </div>
            
            <a href="#" class="btn btn-outline-success mx-3">Login</a>
            
        </div>
    </nav>
    <div class="container-md mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="bookGambar col-lg-5 d-flex align-items-center rounded-start p-0" style="background-color: #c5cb08">
                <h3 class="mt-3 bookText fs-1 fw-bold text-light text-center flex-fill p-2 position-absolute" style="background-color: rgba(0, 0, 0, 0.5)"></h3>
                <img src="img/book.png" class="mt-2" style="width:100%; height:auto" alt="">
            </div>
            <div class="reservasiNow col-lg-7 bg-light rounded-end p-4">
                        <h5 class="text-center text-warning fw-bold fs-3 mb-3" style="font-variant: small-caps;">Reservasi Sekarang</h5>
                        <form action="/book" method="post">
                        <div class="row d-flex justify-content-center">
                        <div class="form-group col-sm-6 mb-2">
                            <label for="nama" >Nama</label>
                            <input type="text" id="nama" style="width:280px" class="form-control">
                        </div>
                        <div class="form-group col-sm-6 mb-2">
                            <label for="no-hp">No. HP</label>
                            <input type="number" id="no-hp" style="width:280px" class="form-control">
                        </div>
                        <div class="form-group col-sm-6 mb-2">
                            <label for="tgl-masuk">Check-In-Date</label>
                            <input type="date" id="tgl-masuk" name="tgl-masuk" style="width:280px" class="form-control">
                        </div>
                        <div class="form-group col-sm-6 mb-2">
                            <label for="tgl-keluar">Check-Out-Date</label>
                            <input type="date" id="tgl-keluar" name="tgl-keluar" style="width:280px" class="form-control">
                        </div>
                        <div class="form-group col-sm-6 mb-2">
                            <label for="tipe-kamar">Tipe Kamar</label>
                                <select name="" class="form-control" style="width:280px" id="tipe-kamar">
                                    <option value="">Ekonomi</option>
                                </select>
                        </div>
                        <div class="form-group col-sm-6 mb-2">
                            <label for="catatan">Catatan</label>
                            <textarea name="" class="form-control" id="" cols="1" rows="2">

                            </textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" id="email" style="width:280px" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <button class="btn btn-warning" type="submit" name="Reser" style="width: 280px">Pesan Sekarang</button>
                        </div>
                    </form>
                        <div class="form-group col-sm-6">
                            <a href="/" class="btn btn-danger border-0" style="width: 280px">Kembali</a>
                        </div>
                    </div>
                </div>
                 
            </div>
        </div>
    </div>


   

    @include('layout.footer.footer')

      <script src="https://kit.fontawesome.com/9cd80ebe7a.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>