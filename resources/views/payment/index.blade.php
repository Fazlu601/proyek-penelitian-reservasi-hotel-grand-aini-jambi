@extends('layout.header.main')

@section('container')
    <div class="container-fluid" style="height: 91vh">
        <div class="row p-5">
            <div class="col-lg-8 p-3 bg-light" data-aos="fade-left" data-aos-duration="1500">
                <div class="row">
                        <h3 class="fw-bold border-bottom border-dark mb-3">Details</h3>
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <label for="username">Username : </label>
                                <input type="text" disabled name="username" value="{{ Auth()->user()->username }}" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="username">Alamat Email : </label>
                                <input type="email" disabled name="email" id="" value="{{ Auth()->user()->email }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="username">Catatan Pemesanan : </label>
                                <textarea name="note" id="" style="resize: none" class="form-control" cols="3" rows="3"></textarea>
                            </div>
                        
                        </div>
                        <div class="col-md-5">
                            <div class="form-group mb-3">
                                <label for="name">Nama Lengkap : </label>
                                <input type="text" disabled name="name" value="{{ Auth()->user()->name }}" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Nomor Telepon : </label>
                                <input type="number" disabled min="0" name="no_hp" value="{{ Auth()->user()->no_hp }}" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group mb-3">
                                <form action="/order/payment" method="POST">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $data_room->id }}">
                                    <input type="hidden" name="checkIn" value="{{ $data_order['checkIn'] }}">
                                    <input type="hidden" name="checkOut" value="{{ $data_order['checkOut'] }}">
                                    <input type="hidden" name="night" value="{{ $data_order['night'] }}">
                                    <button type="submit" class="btn btn-success w-100">Continue To Payment Detail!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            <div class="col-lg-4 p-3" style="background-color:rgb(242, 240, 240)">
                <div class="row">
                    <h3 class="fw-bold border-bottom border-dark mb-3">Data Order</h3>
                    <img src="{{ asset('storage/'. $data_room->image) }}" alt="" data-aos="zoom-in" data-aos-duration="2000" class="img-fluid rounded p-5">
                    <table class="table table-hover w-100" data-aos="fade-up" data-aos-duration="2000">
                        <tr>
                            <td>Room Type</td>
                            <th>{{ $data_room->room_name }}</th>
                        </tr>
                        <tr>
                            <td>No. Room</td>
                            <th>{{ $data_order['kode_kamar'] }}</th>
                        </tr>
                        <tr>
                            <td>CheckIn</td>
                            <th>{{ $data_order['checkIn']}}</th>
                        </tr>
                        <tr>           
                            <td>CheckOut</td>
                            <th>{{ $data_order['checkOut'] }}</th>
                        </tr>
                        <tr>
                            <td>No. of nights</td>
                            <th>{{ $data_order['night'] }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@include('layout.footer.footer')
@endsection