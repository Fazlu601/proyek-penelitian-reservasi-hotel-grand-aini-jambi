<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Room;
use App\Models\Facility;
use App\Models\Room_image;
use App\Models\Room_book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory(30)->create();
        // User::create([
        //     "username" => "Okky001",
        //     "name" => "Okky Octora Firdana",
        //     "email" => "okky11@gmail.com",
        //     "password" => Hash::make('12345'),
        //     "no_hp" => '08956593948',
        //     "is_admin" => '1',
        //     "address" => "Kumpeh"
        // ]);

        // User::create([
        //     "username" => "Fazlu06",
        //     "name" => "Fazlu Rachman",
        //     "email" => "fazrlu9575@gmail.com",
        //     "password" => Hash::make('12345'),
        //     "no_hp" => '0895639394873',
        //     "is_owner" => 1,
        //     "address" => "Kenali Asam Bawah",
        // ]);

    //     Room::create([
    //         "room_name" => "Standar",
    //         "harga_nginap" => 250000,
    //         "jumlah_kamar" => 10,
    //         "tipe_bed" => "1 Double(s)",
    //         "akomodasi" => "2",
    //         "deskripsi_kamar" => "Kamar yang lebih luas dengan tampilan yang elegan dan view kamar langung menghadap ke Jalan Raya membuat hidup anda semakin penuh berkah.",
    //         "image" => "standarClass.jpeg"

    //     ]);
    //     Room::create([
    //         "room_name" => "Superior",
    //         "harga_nginap" => 300000,
    //         "jumlah_kamar" => 10,
    //         "tipe_bed" => "Twin Bed(s)",
    //         "akomodasi" => "2",
    //         "deskripsi_kamar" => "Dengan Kasur yang terpisah anda akan mendapatkan privasi dan kenyamanan yang lebih.",
    //         "image" => "twinClass.jpeg"

    //     ]);

    //     Room_image::create([
    //         "room_id" => 1,
    //         "image" => "standarClass2.jpeg"
    //     ]);
    //     Room_image::create([
    //         "room_id" => 1,
    //         "image" => "standarClassTv.jpeg"
    //     ]);
    //     Room_image::create([
    //         "room_id" => 1,
    //         "image" => "standarClass3.jpeg"
    //     ]);
    //     Room_image::create([
    //         "room_id" => 1,
    //         "image" => "toiletStandar.jpeg"
    //     ]);

    //     Room_image::create([
    //         "room_id" => 2,
    //         "image" => "superiorClass2.jpeg"
    //     ]);
    //     Room_image::create([
    //         "room_id" => 2,
    //         "image" => "superiorClassTv.jpeg"
    //     ]);
    //     Room_image::create([
    //         "room_id" => 2,
    //         "image" => "superiorAc.jpeg"
    //     ]);
    //     Room_image::create([
    //         "room_id" => 2,
    //         "image" => "toiletSuperior.jpeg"
    //     ]);
        

    //     Facility::create([
    //         "room_id" => 1,
    //         "facility_name" => "A/C",
    //         "facility_icon" => "fa-solid fa-temperature-arrow-down fs-3"
    //     ]);
    //     Facility::create([
    //         "room_id" => 1,
    //         "facility_name" => "Wifi",
    //         "facility_icon" => "fa-solid fa-wifi fs-3"
    //     ]);
    //     Facility::create([
    //         "room_id" => 1,
    //         "facility_name" => "TV",
    //         "facility_icon" => "fa-solid fa-tv fs-3"
    //     ]);
    //     Facility::create([
    //         "room_id" => 1,
    //         "facility_name" => "Shower",
    //         "facility_icon" => "fa-solid fa-shower fs-3"
    //     ]);

        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '21'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '22'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '23'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '24'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '25'
        // ]);
        
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '26'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '27'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '28'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '29'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '30'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '31'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '32'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '37'
        // ]);
        // Room_book::create([
        //     "room_id" => 1,
        //     "kode_kamar" => '38'
        // ]);
    }
}
