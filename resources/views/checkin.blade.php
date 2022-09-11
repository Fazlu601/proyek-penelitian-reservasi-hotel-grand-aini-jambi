@extends('layout.header.main')
@section('container')
@include('layout.nav.alterNav')
  <div class="container-lg mb-3" style="margin-top: 70px">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-12 bg-light p-5 rounded">
          <div class="row mb-4">
            <div class="col-sm-3" data-aos="zoom-in-right" style="text-transform: uppercase">
              <h3 class="hotel-judul fs-3 text-dark fw-bold">The Rooms</h3>
          </div>
          <div class="col-9 garis" data-aos="zoom-in-left" style="border-bottom:3px dashed black;margin-left:-30px">
          </div>
          </div>
            <h3 class="hotel-judul fs-3 text-dark">{{ $data->room_name }}</h3>
          <div class="row">
            <div class="col-md-9 gallery-room" data-aos="zoom-in">
              <div class="row p-0 m-0">
                <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid img-thumbnail rounded" alt="">
              </div>
              <div class="row p-0 m-0 mt-1">
                <div class=" slider-multi multiple-items mb-3">
                  @foreach ($data->Room_image as $m)
                  <div data-aos="zoom-in" class="col-md-4">
                      <img src="{{ asset('storage/'.$m->image) }}" class="img-fluid thumb" style="width: 100%; heigh:auto" alt="">
                  </div>
                  @endforeach
               
                   </div>
              </div>
            </div>
            <div data-aos="zoom-out-down" data-aos-duration="2000" class="col-md-3 p-3 border border-success rounded ">
              <form action="/order" method="post">
                @csrf
                <div class="paragraph border-start border-success mb-3 mt-3 p-2">
                  Dari
                  <input type="hidden" id="id" name="room_id" value="{{ $data->id }}">
                  <input type="hidden" id="night" name="night" value="{{ $data->id }}">
                  <input type="hidden" id="Harga" name="harga_total" value="{{ $data->harga_nginap }}">
                  <h3 class="hotel-judul fs-3 text-dark">Rp.{{ number_format($data->harga_nginap,0,',','.') }}</h3>
                  Per Malam
                </div>
                <div class="form-floating border border-success">
                  <input type="date" class="form-control" name="checkIn" min="{{ date('Y-m-d'); }}" id="checkIn" placeholder="name@example.com">
                  <label for="checkIn">Check-in</label>
                </div>
                @error('checkIn')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-floating mb-3 border border-success">
                  <input type="Date" class="form-control" name="checkOut" disabled id="checkOut" min="{{ date('Y-m-d'); }}" style="margin-top: -1px" placeholder="Date">
                  <label for="checkOut">Check-out</label>
                </div>
                @error('checkOut')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-group mb-3">
                  @empty ($cekKamarTersedia)
                  <p class="fw-bold btn btn-sm btn-danger text-light p-2 text-wrap">Tidak ada kamar tersedia untuk saat ini! </p>
                    @else
                  <label for="">Kode Kamar</label>
                  <select name="kode_kamar" class="form-control" id="book">
                    @foreach ( $data->Room_book as $book )
                    @if ($book->active === 1)
                    <option>{{ $book->kode_kamar }}</option>
                    @endif
                    @endforeach
                  </select>
                  @endempty
                </div>
                <div class="form-group text-center mt-3">
                  <input type="hidden" name="total_harga" id="Total">
                  <h3 id="TotalTampil" class="text-dark hotel-judul fs-4"></h3>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" id="booking" class="btn btn-success rounded-0 w-100">Booking Sekarang</button>
                </div>
              </form>
              <div class="row">
                <p>*Untuk melihat denah kamar, <a class="text-success" href="#denah-kamar">bisa klik disini!</a></p>
              </div>
            </div>
          <div class="row d-flex justify-content-between m-0 border-bottom border-success py-3">
            <div class="col-md-3 mt-3" data-aos="fade-up-right">
              <p class="fs-5 fw-bold">Jumlah Kamar Tersedia :</p>
            </div>
            <div class="col-md-3 mt-3" data-aos="fade-up-left">
              <p class="fs-5">{{ $data->jumlah_kamar }}</p>
            </div>
            <div class="col-md-3 mt-3" data-aos="fade-up-left">
              <p class="fs-5">{{ $data->tipe_bed }}</p>
            </div>
          </div>
          <div class="row d-flex justify-content-between m-0 border-bottom border-success py-3">
            <div class="col-md-3 mt-3" data-aos="fade-up-right">
              <p class="fs-5 fw-bold">More Info :</p>
            </div>
            <div class="col-md-9 mt-3" data-aos="fade-up-left">
              <h5 class="fw-light">{!! $data->deskripsi_kamar !!}</h5>
            </div>
          </div>
          <div id="denah-kamar" class="row d-flex justify-content-between m-0 border-bottom border-success py-3">
            <p class="fs-5 fw-bold text-center">Denah Kamar</p>
           <div class="col-lg-6 table-responsive">
            <table cellpadding="10" class="table table-bordered" style="border: 3px solid black">
              <tr>
                <td class="fw-bold bg-dark text-light" colspan="6" align="center">Gedung B</td>
              </tr>
                <tr align="center">
                  @if($data_book[16]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[16]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[16]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[16]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[16]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if($data_book[17]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[17]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[17]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[17]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[17]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if($data_book[18]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[18]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @elseif($data_book[18]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[18]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[18]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>

                  @endif
                  @if($data_book[19]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[19]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @elseif($data_book[19]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[19]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[19]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>

                  @endif
                  @if($data_book[20]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[20]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @elseif($data_book[20]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[20]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[20]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>

                  @endif
                  @if($data_book[21]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[21]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @elseif($data_book[21]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[21]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[21]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>

                  @endif
                 
                <tr>
                  <td class="text-dark fw-bold" colspan="6" align="center">Jalan Masuk</td>
                </tr>
                <tr align="center">
                  @if($data_book[10]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[10]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[10]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[10]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[10]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if($data_book[11]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[11]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[11]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[11]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[11]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if($data_book[12]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[12]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @elseif($data_book[12]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[12]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[12]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>

                  @endif
                  @if($data_book[13]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[13]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @elseif($data_book[13]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[13]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[13]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>

                  @endif
                  @if($data_book[14]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[14]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @elseif($data_book[14]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[14]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[14]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>

                  @endif
                  @if($data_book[15]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[15]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @elseif($data_book[15]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[15]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[15]->kode_kamar }}</p>
                    <p>SPR</p>
                  </td>

                  @endif
                 
                </tr>
                <tr>
                  <td class="text-dark fw-bold" colspan="6" class="fw-bold" align="center">*semua kamar tersedia di lantai dasar</td>
                </tr>
                <tr>
                  <td class="text-dark fw-bold" class="fw-bold" align="center" colspan="6">STD : Standar | SPR : Superior</td>
                </tr>
                <tr align="center">
                  <td colspan="2">
                     <p class="fw-bold">Kosong <span class="bg-success text-success px-2">.</span></p> 
                  </td>
                  <td colspan="2">
                     <p class="fw-bold">Tidak Aktif <span style="background-color: grey;color:grey;" class="px-2">.</span></p> 
                  </td>
                  <td colspan="2">
                     <p class="fw-bold">Ditempati <span style="background-color: red;color:red;" class="px-2">.</span></p> 
                  </td>
                </tr>
            </table>
           </div>
           <div class="col-lg-6 table-responsive">
            <table cellpadding="10" class="table table-bordered" style="border: 3px solid black">
              <tr>
                <td class="fw-bold bg-dark text-light" colspan="7" align="center">Gedung A</td>
              </tr>
                <tr align="center">
                  @if ($data_book[0]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[0]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[0]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[0]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[0]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  
                  @if ($data_book[1]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[1]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[1]->active === 2)
                  <td class="text-light"  style="background-color: red;">
                    <p>{{ $data_book[1]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[1]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if ($data_book[2]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[2]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[2]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[2]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[2]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if ($data_book[3]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[3]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[3]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[3]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[3]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if ($data_book[4]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[4]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[4]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[4]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[4]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if ($data_book[5]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[5]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[5]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[5]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[5]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if ($data_book[6]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[6]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[6]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[6]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[6]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  
                <tr>
                  <td class="fw-bold" colspan="7" align="center">Jalan Masuk</td>
                </tr>
                <tr align="center">
                  <td class="fw-bold" colspan="4" style="line-height: 5">Tangga ke lantai 2</td>
                  @if ($data_book[7]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[7]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[7]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[7]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[7]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if ($data_book[8]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[8]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[8]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[8]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[8]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                  @if ($data_book[9]->active === 1)
                  <td class="text-light bg-success">
                    <p>{{ $data_book[9]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @elseif($data_book[9]->active === 2)
                  <td class="text-light" style="background-color: red;">
                    <p>{{ $data_book[9]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>
                  @else
                  <td class="text-light" style="background-color: grey">
                    <p>{{ $data_book[9]->kode_kamar }}</p>
                    <p>STD</p>
                  </td>

                  @endif
                </tr>
                <tr>
                  <td colspan="7" class="fw-bold" align="center">*semua kamar tersedia di lantai dasar</td>
                </tr>
                <tr>
                  <td class="fw-bold" align="center" colspan="7">STD : Standar | SPR : Superior</td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                      <p class="fw-bold">Kosong <span class="bg-success text-success px-2">.</span></p> 
                    </td>
                    <td colspan="3">
                      <p class="fw-bold">Tidak Aktif <span style="background-color: grey;color:grey;" class="px-2">.</span></p> 
                    </td>
                    <td colspan="2">
                      <p class="fw-bold">Ditempati <span style="background-color: red;color:red;" class="px-2">.</span></p> 
                    </td>
                </tr>
            </table>
           </div>
          </div>
          <div class="row d-flex justify-content-start m-0 py-3">
           <div class="col-md-9 m-0 p-0" data-aos="zoom-in">
            <div class="ratio ratio-21x9">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.241309972497!2d103.60223217698073!3d-1.6109892808601343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258892dcb39fc7%3A0x90ee2421ed1a568c!2sAini%20Hotel%20%26%20Ballroom%20Jambi!5e0!3m2!1sen!2sid!4v1650085538208!5m2!1sen!2sid" style="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
           </div>
          </div>
      </div>
    </div>
  </div>

  <script>

    const Book = document.getElementById('book');
    const tombolBooking = document.getElementById('booking');
    onload = ()=>{
      if(!Book){
        tombolBooking.style.display = 'none';
      }
      else{
        tombolBooking.style.display = 'block';
      }
   
     

    
    const checkIn = document.querySelector('#checkIn');
    const checkOut = document.querySelector('#checkOut');
    const Total = document.querySelector('#Total');
    const Night = document.querySelector('#night');
    const TotalTampil = document.querySelector('#TotalTampil');
    const Harga = document.querySelector('#Harga');

    

    checkIn.addEventListener('change', (e)=>{
      e.preventDefault();
      checkOut.setAttribute("min", checkIn.value);
        checkOut.disabled = false;
      if(checkIn.value === checkOut.value){
        checkOut.value = null;
        Total.value = 0;
        TotalTampil.innerHTML = rupiah(0);
        return false;
      }

            // mengatur dua tanggal menjadi dua variabel
          var date1 = new Date(checkIn.value);
          var date2 = new Date(checkOut.value);
          
          // hitung perbedaan waktu dari dua tanggal
          var Difference_In_Time = date2.getTime() - date1.getTime();
          
          // hitung jml hari antara dua tanggal
          var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
      
          Night.value =  Difference_In_Days;
          Total.value =  Difference_In_Days * Harga.value;
          harga =  Difference_In_Days * Harga.value;

          if(hargaTotal.isNaN()){

            Total.value = 0;
            TotalTampil.innerHTML = rupiah(0);
            
            }

          TotalTampil.innerHTML = rupiah(harga);


    });

    checkOut.addEventListener('change', (e)=>{
      e.preventDefault();

      if(checkIn.value === checkOut.value){
        checkOut.value = null
        Total.value = 0;
        TotalTampil.innerHTML = rupiah(0);
        return false;
      }
       
      checkIn.setAttribute("max", checkOut.value);
       // mengatur dua tanggal menjadi dua variabel
    var date1 = new Date(checkIn.value);
    var date2 = new Date(checkOut.value);
    
    // hitung perbedaan waktu dari dua tanggal
    var Difference_In_Time = date2.getTime() - date1.getTime();
    
    // hitung jml hari antara dua tanggal
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
 
    Night.value = Difference_In_Days;
    Total.value = Difference_In_Days * Harga.value;
    hargaTotal =  Difference_In_Days * Harga.value;

    if(isNaN(hargaTotal)){

      Total.value = 0;
      TotalTampil.innerHTML = rupiah(0);
      
    }
    TotalTampil.innerHTML = rupiah(hargaTotal);

    });

    const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }

}
const galleryRoom = document.querySelector('.gallery-room');
const thumbGallery = document.querySelectorAll('.thumb');
const imgRoom = document.querySelector('.img-thumbnail');

  galleryRoom.addEventListener('click', (e)=>{
     if(e.target.classList.contains('thumb')){
        imgRoom.src = e.target.src;
        imgRoom.classList.add('fade');
        setTimeout(() => {
          imgRoom.classList.remove('fade');
        }, 500);

        thumbGallery.forEach((thumb)=>{
          if(thumb.classList.contains('actives')){
            thumb.classList.remove('actives');
          }
        });
        e.target.classList.add('actives');
     }
});
  </script>

  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/slick/slick.js') }}"></script>
  <script src="https://kit.fontawesome.com/9cd80ebe7a.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  {{-- <script src="{{ asset('js/jquery-modal/src/xsalert.js') }}"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/TextPlugin.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
    
@endsection