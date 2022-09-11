@extends('layout.header.main')
@include('layout.nav.alterNav')
@section('container')


    <div class="container mt-5 mb-3 p-3">
        <div class="card p-3">
            <div class="row d-flex flex-fill mb-3">
                <div class="col-sm-3" style="text-transform: uppercase">
                    <h1 class="hotel-judul fs-1 text-dark fw-bold">Grand Aini Hotel</h1>
                </div>
                <div class="col-9 garis" style="border-bottom:4px dashed black;">

                </div>
            </div>
            <div class="row d-flex justify-content-around rounded pb-3 mb-3">
                <div class="col-lg-6">
                    <p>HOTEL GRAND AINI mengusungkan konsep go green, karena ramah lingkungan yang mana semua penggunaan produk di dalam hotel seperti furniturnya yang terbuat dari kayu ataupun bahan-bahan yang tidak akan meninggalkan limbah.</p>
                    <p>Jumlah kamar di hotel ini sebanyak 55 kamar yang terdiri dari kelas standar dan superior. Dan juga meeting room dan ballroom</p>
                </div>
                <div class="col-lg-6 slider demo aini d-flex justify-content-end" style="overflow: hidden">
                    <img src="{{ asset('img/dashboard.jpeg') }}" style="width: 100%; height:auto" alt="Aini">
                    <img src="{{ asset('img/view.jpeg') }}" style="width: 100%; height:auto" alt="Aini">
                </div>
            </div>
            <div class="row">
                  <h4 class="text-center fw-bold text-dark pt-2" style="text-transform: uppercase;border-top: 4px dashed black">Fasilitas</h4>
                  <div class=" slider-multi slide-thumblr multiple-items mb-3" style="overflow: hidden">
                    <div data-aos="zoom-in" id="kantin" class="col-md-4 thumblr">
                        <img src="{{ asset('img/kantin.jpeg') }}" style="width: 100%; heigh:auto" alt="">
                    </div>
                    <div  data-aos="zoom-in" id="parkir" class="col-md-4 thumblr">
                        <img src="{{ asset('img/parkir.jpeg') }}" style="width: 100%; heigh:auto" alt="">
                    </div>
                    <div data-aos="zoom-in" id="wifi" class="col-md-4 thumblr">
                        <img src="{{ asset('img/wifi.jpeg') }}" style="width: 100%; heigh:auto" alt="">
                    </div>
                    <div  data-aos="zoom-in" id="ballroom" class="col-md-4 thumblr">
                        <img src="{{ asset('img/ballroom.jpeg') }}" style="width: 100%; heigh:auto" alt="">
                    </div>
                    <div  data-aos="zoom-in" id="kebun" class="col-md-4 thumblr">
                        <img src="{{ asset('img/kebun2.jpeg') }}" style="width: 100%; heigh:auto;" alt="">
                    </div>
                  </div>
            </div>
                 <div id="deskripsi-f" class="row mb-3 d-flex justify-content-between p-2">
                        <div class="col-md-5" style="display:none;" id="gambar-parkir">
                            <img src="{{ asset('img/parkir.jpeg') }}" width="100%" alt="">
                          </div>
                      <div class="col-md-7 " style="display: none" id="deskripsi-parkir">
                        <h3 class="fw-bold">Lapangan Parkir</h3>
                        <p>Hotel Grand Aini memiliki fasilitas lapangan parkir yang sangat luas dan dapat memuat berbagai kendaraan seperti mobil truck, mobil pribadi, kendaraan bermotor yang memiliki keperluan di dalam hotel grand aini.</p>
                      </div>
                      <div class="col-md-5" style="display:none;" id="gambar-kantin">
                        <img src="{{ asset('img/kantin.jpeg') }}" width="100%" alt="">
                      </div>
                      <div class="col-md-7 " style="display: none" id="deskripsi-kantin">
                        <h3 class="fw-bold">Kantin</h3>
                        <p>Hotel Grand Aini juga memiliki fasilitas kantin untuk para tamu yang menginap dan akan melayani makanan untuk sarapan, makan siang, dan makan malam, dan juga tersedia snack dan minuman seperti kopi maupun air putih yang dapat diambil setiap saat.</p>
                      </div>
                      <div class="col-md-5" style="display:none;" id="gambar-wifi">
                        <img src="{{ asset('img/wifi.jpeg') }}" width="100%" alt="">
                      </div>
                      <div class="col-md-7 " style="display: none" id="deskripsi-wifi">
                        <h3 class="fw-bold">Wifi</h3>
                        <p>Grand Aini juga memiliki layanan free wifi untuk memudahkan para tamu bisnis maupun tamu biasa untuk bisa berinteraksi dengan pembisnis lain dan mengakses berbagai sosmed dengan layanan internet dengan sangat cepat</p>
                      </div>
                      <div class="col-md-5" style="display:none;" id="gambar-ballroom">
                        <img src="{{ asset('img/ballroom.jpeg') }}" width="100%" alt="">
                      </div>
                      <div class="col-md-7 " style="display: none" id="deskripsi-ballroom">
                        <h3 class="fw-bold">Ballroom</h3>
                        <p>Grand Aini juga memiliki ballroom yang dapat digunakan untuk berbagai acara seperti pernikahan ataupun launching produk yang dapat menampung kapasitas sebanyak 1000 orang dan khusus untuk pernikahan hotel juga melayani pelayanan penyewaan cathering.</p>
                      </div>
                      <div class="col-md-5" style="display:none;" id="gambar-kebun">
                        <img src="{{ asset('img/kebun2.jpeg') }}" width="100%" alt="">
                      </div>
                      <div class="col-md-7 " style="display: none" id="deskripsi-kebun">
                        <h3 class="fw-bold">Taman</h3>
                        <p>Hotel ini mengusung konsep asri yang mana ditempatkannya beberapa tanaman hijau sebagai bentuk memperindah lingkungan disekitar hotel</p>
                      </div>
                    </div>

                  <div class="row d-flex justify-content-center">
                    <div class="col-md-11 mb-3 p-0">
                         <h4 class="text-center fw-bold text-dark p-2" style="margin-bottom: -5px;border-top:4px dashed black;text-transform:uppercase">Lokasi Hotel</h4>
                           <div class="ratio ratio-21x9 p-0">
                               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.241309972497!2d103.60223217698073!3d-1.6109892808601343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258892dcb39fc7%3A0x90ee2421ed1a568c!2sAini%20Hotel%20%26%20Ballroom%20Jambi!5e0!3m2!1sen!2sid!4v1650085538208!5m2!1sen!2sid" style="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                           </div>
                     </div>
                  </div>
                  
        </div>
    </div>
    <script>

      // const tumbler = document.querySelectorAll('.thumblr');
      // const sliderTumbler = document.querySelector('.slide-thumblr');
      // tumbler.forEach((tumb)=>{
      // tumb.addEventListener('click', (e)=>{
  
      //       if(tumb.classList.contains('actives')){
      //         tumb.classList.remove('actives');
      //       }else{
      //         tumb.classList.add('actives');
      //       }
            
      //     });
      //   });


    </script>

    @include('layout.footer.footer')

@endsection

