
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('js/jquery-modal/src/themes/light-theme.css') }}" />
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

      <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
      <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-rJa9vCBJKrt8-Gy4"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery-modal/src/xsalert.js') }}"></script>
      <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    </head>
   
    <body style="background-color: yellowgreen">
      <div class="container">
        <div class="row">
          <div class="card mx-auto p-0 mt-3 mb-3" data-aos="flip-left" data-aos-duration="1500" style="width: 33rem;">
              <img src="{{ asset('storage/'.$data_room->image) }}" style="position: relative" class="card-img-top" alt="">
              <h2 class="text-light w-100 p-4" style="position: absolute; text-align:center; background-color:rgba(0, 0, 0, 0.8); top:180">Confirmation!</h2>
            <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item text-center d-flex justify-content-between list-group-item-action">
                          <h5 class="mb-1">Type Room : </h5>
                            <h5 class="mb-1">{{ $data_room->room_name }}</h5>        
                        </div>
                        <div class="list-group-item text-center d-flex justify-content-between list-group-item-action">
                          <h5 class="mb-1">Harga : </h5>
                          <h5 class="mb-1">Rp.{{ number_format($data_room->harga_nginap,0,',','.') }} x {{ $data_pesan }}/Night</h5>
                      </div>
                        <div class="list-group-item text-center d-flex justify-content-between list-group-item-action">
                          <h5 class="mb-1">Total Payment :</h5>
                          <h5 class="mb-1">Rp.{{ number_format($data_room->harga_nginap*$data_pesan,0,',','.') }}</h5>
                      </div>
                      <button class="btn btn-primary w-100 rounded-0 fw-bold mt-3 mb-3" id="pay-button">Pay Now !</button>
                      <a href="/room" class="btn btn-danger w-100 rounded-0 fw-bold" onclick="return confirm('Yakin ingin membatalkan pesanan?')" id="pay-button">Cancel</a>
            </div>
          </div>
        </div>
      </div>


      <form action="/order/payment/verify" id="submit_form" method="post">
        @csrf
        <input type="hidden" name="json" id="json_callback">
      </form>
   
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script type="text/javascript">
        
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snap_token }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            XSAlert({
              title: 'Pesanan Berhasil Dibuat!',
              position: 'center',
              imageURL: "{{ asset('js/jquery-modal/icons/success.png') }}",
              imageWidth: 10,
              message: 'Transaksi Telah Selesai',
              hideCancelButton : true
            }); console.log(result);
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("Menunggu Pembayaran!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("Pembayaran Gagal!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            XSAlert({
              title: 'Order Canceled',
              position: 'center',
              imageURL: "{{ asset('js/jquery-modal/icons/error.png') }}",
              imageWidth: 10,
              hideCancelButton : true
            });
          }
        })
        });


        function send_response_to_form(result){
            const respond = document.getElementById('json_callback').value = JSON.stringify(result);

            $('#submit_form').submit();
        }
        AOS.init({
           once: false,
         });
      </script>
       
    </body>
  </html>