@extends('layout.header.main')
@include('layout.carousel.carousel')

@section('container')


  <div data-aos="fade-up" class="container-lg mt-5">

    <div class="row d-flex justify-content-center">
      <div class="col-md-4">
        <p class="text-center fs-5" style="font-family: MonotypeScriptW01-Bold">Call us to book</p>
        <p class="text-center">089658130101</p>
      </div>
      <div class="col-md-4">
        <p class="text-center fs-5" style="font-family: MonotypeScriptW01-Bold">Find Us</p>
        <p class="text-center">Jl.Prof.DR.Moh. Yamin No.07 Kel, Payo Lebar, Kec.Jelutung, <br> Kota Jambi, Jambi 36135</p>
      </div>
      <div class="col-md-4">
        <p class="text-center fs-5" style="font-family: MonotypeScriptW01-Bold">Email Us</p>
        <p class="text-center">ainihotel&ballroom@gmail.com</p>
      </div>
    </div>
  </div>



  <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="text-success fw-bold fs-5">
        MENU
      </div>
      
    
    </div>
  </div>

  @include('layout.footer.footer')

  @endsection

 