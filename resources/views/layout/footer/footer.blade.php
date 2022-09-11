<footer class="py-4 bg-dark mt-auto">
  <div class="container-fluid px-4">
      <div class="d-flex align-items-center justify-content-center">
          <div class="text-light fw-bold">Copyright &copy; GRAND AINI HOTEL - 2022</div>
      </div>
  </div>
</footer>
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/slick/slick.js') }}"></script>
  <script src="{{ asset('fontawesome-free-5.15.4-web/js/all.js') }}"></script>
  <script src="{{ asset('fontawesome-free-5.15.4-web/js/all.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('aos/dist/aos.js') }}"></script>
  {{-- <script src="{{ asset('js/jquery-modal/src/xsalert.js') }}"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/TextPlugin.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script>
    
gsap.registerPlugin(TextPlugin);
    gsap.to('.gambar-text', {duration: 2, delay:0.5, text: 'Buat Akun Sekarang <br>Dan Booking Kamarmu!'})
    gsap.to('.askRes', {duration: 1.5, delay:0.5, text: 'Belum punya akun? <a href="/register" class="text-decoration-none">Daftar Sekarang!</a>'})
    // gsap.to('.bookText', {duration: 2, delay:0.5, text: 'Ayo Reservasi Kamarmu <br> Sekarang!'})
    gsap.from('.lupa-pw', {duration: 1, y: '100%',  opacity: 0, delay:2, ease: 'power3' })
    gsap.from('a .card', { duration: 1.5, rotateY: 360, opacity: 0 });
    gsap.from('.carousel-item img', { duration: 1, y: '-100%', opacity: 0, ease: 'power4' });
    gsap.from('h1.text-lg', { duration: 3, y: '-100%', opacity: 0, ease: 'bounce' });
    gsap.from('.alterNav', { duration: 2, y: '-100%', opacity: 0, delay:1, ease: 'bounce' });
    gsap.from('h1.hotel-judul', { duration: 1, x: -50, opacity: 0, delay:0.5 });
    gsap.from('.aini img', { duration: 1, x: 50, opacity: 0, delay:0.5 });
    gsap.from('.gambarHotel', { duration: 1, x: -50, opacity: 0, delay:0.5, ease:'power3' });
    gsap.from('.loginForm', { duration: 1, x: 50, opacity: 0, delay:0.5, ease:'power3' });
    gsap.from('.regisForm', { duration: 1, y: -50, opacity: 0, delay:0.5, ease:'power3' });
    // gsap.from('.facility', { duration: 1, y: -50, opacity: 0, delay:0.5, ease:'power3' });
    gsap.from('.bookGambar', { duration: 1, x: -50, opacity: 0, delay:0.5, ease:'power3' });
    gsap.from('.reservasiNow', { duration: 1, x: 50, opacity: 0, delay:0.5, ease:'power3' });

  
  </script>
