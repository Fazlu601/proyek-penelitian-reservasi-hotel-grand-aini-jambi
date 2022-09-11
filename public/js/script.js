AOS.init({
    once: false,
  });
  
  
  $(document).ready(function(){
   $('.demo').slick();
   $('.multiple-items').slick({
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 3
    });

});

const DS = document.getElementById('deskripsi-f');

// Komponen Parkir
const parkir = document.querySelector('#parkir');
const gambarParkir = document.querySelector('#gambar-parkir');
const deskripsiParkir = document.querySelector('#deskripsi-parkir');

// Komponen Kantin
const kantin = document.querySelector('#kantin');
const gambarKantin = document.querySelector('#gambar-kantin');
const deskripsiKantin = document.querySelector('#deskripsi-kantin');

// Komponen Wifi
const wifi = document.querySelector('#wifi');
const gambarWifi = document.querySelector('#gambar-wifi');
const deskripsiWifi = document.querySelector('#deskripsi-wifi');

// Komponen Ballroom
const ballroom = document.querySelector('#ballroom');
const gambarBallroom = document.querySelector('#gambar-ballroom');
const deskripsiBallroom = document.querySelector('#deskripsi-ballroom');

// Komponen Ballroom
const kebun = document.querySelector('#kebun');
const gambarKebun = document.querySelector('#gambar-kebun');
const deskripsiKebun = document.querySelector('#deskripsi-kebun');

// Event Parkir
parkir.addEventListener('click', function(){

    deskripsiParkir.style.display ="block";
    deskripsiKebun.style.display = "none";
    deskripsiKantin.style.display = "none";
    deskripsiWifi.style.display = "none";
    deskripsiBallroom.style.display = "none";

    gambarParkir.style.display ="block";
    gambarKebun.style.display = "none";
    gambarKantin.style.display = "none";
    gambarWifi.style.display = "none";
    gambarBallroom.style.display = "none";
    
})

// Event Kantin
kantin.addEventListener('click', function(){

    deskripsiKantin.style.display = "block";
    deskripsiKebun.style.display = "none";
    deskripsiParkir.style.display = "none";
    deskripsiWifi.style.display = "none";
    deskripsiBallroom.style.display = "none";

    gambarKantin.style.display = "block";
    gambarKebun.style.display = "none";
    gambarParkir.style.display = "none";
    gambarWifi.style.display = "none";
    gambarBallroom.style.display = "none";
})

// Event Wifi
wifi.addEventListener('click', function(){

    deskripsiWifi.style.display = "block";
    deskripsiKebun.style.display = "none";
    deskripsiParkir.style.display = "none";
    deskripsiKantin.style.display = "none";
    deskripsiBallroom.style.display = "none";

    gambarWifi.style.display = "block";
    gambarKebun.style.display = "none";
    gambarParkir.style.display = "none";
    gambarKantin.style.display = "none";
    gambarBallroom.style.display = "none";
})

// Event Ballroom
ballroom.addEventListener('click', function(){

    deskripsiBallroom.style.display = "block";
    deskripsiKebun.style.display = "none";
    deskripsiWifi.style.display = "none";
    deskripsiParkir.style.display = "none";
    deskripsiKantin.style.display = "none";

    gambarBallroom.style.display = "block";
    gambarKebun.style.display = "none";
    gambarWifi.style.display = "none";
    gambarParkir.style.display = "none";
    gambarKantin.style.display = "none";
})

// Event Tanaman
kebun.addEventListener('click', function(){
    deskripsiKebun.style.display = "block";
    deskripsiBallroom.style.display = "none";
    deskripsiWifi.style.display = "none";
    deskripsiParkir.style.display = "none";
    deskripsiKantin.style.display = "none";

    gambarKebun.style.display = "block";
    gambarBallroom.style.display = "none";
    gambarWifi.style.display = "none";
    gambarParkir.style.display = "none";
    gambarKantin.style.display = "none";
})


    const Profile = document.getElementById('profile');
    const ProfilButton = document.getElementById('profilButton');
    const Alamat = document.getElementById('alamat');
    const AlamatButton = document.getElementById('alamatButton');

    ProfilButton.addEventListener('click', function(e){
        e.preventDefault();
        Profile.style.display = "block";
        Alamat.style.display = "none";
    });

    AlamatButton.addEventListener('click', function(e){
        e.preventDefault();

        Alamat.style.display = "block";
        Profile.style.display = "none";
    });


   