<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardTransaksiController;
use App\Http\Controllers\dashboardUserController;
use App\Http\Controllers\dashboardRoomController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\userController;
use App\Http\Controllers\PaymentController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Guest
//Homepage
Route::get('/', [HomeController::class, 'index']);
   
//Hotel
Route::get('/hotel', function(){
    return view('hotel',[
        'title' => 'The Hotel'
    ]);
});

//Room
Route::get('/room', [RoomController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    
    //REGISTRASI AKUN
    Route::prefix('register')->group(function () {
    
        Route::get('/', [registrationController::class, 'index'])->name('register');
        Route::post('/', [registrationController::class, 'store'])->name('register');
        
    });
    
});

//GRUP MIDDLEWARE SETELAH AUTHENTICATE
Route::middleware(['auth'])->group(function () {


            //Route CheckIn Kamar dan Nomor Kamar
             Route::get('checkin/{id}', [RoomController::class, 'checkin'])->middleware('auth');

            //ORDER(BOOKING) KAMAR
            Route::prefix('order')->group(function () {  
                Route::post('/', [PaymentController::class, 'index']);
                Route::post('/payment', [PaymentController::class, 'payment']);
                Route::post('/payment/verify', [PaymentController::class, 'payment_post']);

            });

            //RIWAYAT ORDER(BOOKING)
            Route::prefix('history_pemesanan')->group(function () {   

                    Route::get('/', [PaymentController::class, 'history']);
                    Route::get('/{id}', [PaymentController::class, 'history_detail']);

            });

            //KWITANSI BUKTI PEMBAYARAN
            Route::get('/booking_pdf/{id}', [PaymentController::class, 'booking_pdf']);




            //Route Profile User
            Route::prefix('profile')->group(function () {
                //Profile User
                Route::get('/', [userController::class, 'index']);
                //Edit Profil User
                Route::put('/ubah/{id}', [userController::class, 'update']);
            });



});


//GROUP DASHBOARD
Route::prefix('dashboard')->group(function () {

            //ADMINISTRATOR
            Route::middleware(['is_admin'])->group(function () {
                //Dashboard Admin
                Route::resource('/orders', DashboardTransaksiController::class);

                // Profil-Admin
                Route::get('/profile', [userController::class, 'indexDash']);

                // User(CRUD)
                Route::resource('/users', dashboardUserController::class);                 

                // Room(CRUD)
                Route::resource('/rooms', dashboardRoomController::class);

                // Room/Tambah facility
                Route::post('/rooms/tambahFacility', [dashboardRoomController::class, 'tambahFacility']);

                // Room/Hapus facility
                Route::delete('/rooms/hapusFacility/{id}', [dashboardRoomController::class, 'hapusFacility']);

                // Room/Tambah Footage Image
                Route::post('/rooms/tambahFootage', [dashboardRoomController::class, 'tambahFootage']);

                // Room/Hapus Footage Image
                Route::delete('/rooms/hapusFootage/{id}', [dashboardRoomController::class, 'hapusFootage']);
                Route::get('/rooms/book/{id}', [dashboardRoomController::class, 'room_book']);
                Route::get('/rooms/book/{id}/edit', [dashboardRoomController::class, 'room_book_edit']);
                Route::put('/rooms/book/{id}', [dashboardRoomController::class, 'room_book_update']);

            });
                    
           

            //OWNER(PEMILIK)
            Route::middleware(['is_admin', 'is_owner'])->group(function () {

                 // Role-Access
                 Route::get('/role_access', [OwnerController::class, 'role_access']);

                //Laporan Pendapatan Owner
                Route::get('/laporan_pendapatan/', [OwnerController::class, 'laporan_pendapatan']);

                Route::get('/laporan_pendapatan/pdf/', [OwnerController::class, 'laporan_pdf']);

            });

          



});






