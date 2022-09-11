<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Facility;
use App\Models\Room_image;
use App\Models\Room_book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dashboardRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kamar.index',[
            "title" => "Data Kamar",
            "data" => Room::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            "room_name" => "required|unique:rooms",
            "image" => "required|file|max:1024",
            "jumlah_kamar" => "required",
            "tipe_bed" => "required",
            "harga_nginap" => "required|numeric",
            "deskripsi_kamar" => "required"
        ]);

            if($request['image']){
                $validationData['image'] = $request->file('image')->store('room-images');
            }

            Room::create($validationData);

            return back()->with('success', 'Data Kamar Kamar Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('dashboard.kamar.detail', [
            "title" => 'Detail Tipe Kamar',
            "data" => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('dashboard.kamar.edit', [
            "title" => "Edit Data Kamar",
            "data" => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $room)
    {
        $rules = [
            "room_name" => "required",
            "harga_nginap" => "required|numeric",
            "jumlah_kamar" => "required",
            "tipe_bed" => "required",
            "deskripsi_kamar" => "required",
            "image" => "file|max:1024"
        ];

        $validateData = $request->validate($rules);

        if($request->file('image'))
        {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('room-images');
        }

        Room::where('id', $room)
            ->update($validateData);

            return redirect('/dashboard/rooms')->with('success', 'Data Kamar Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        if($room->image){
            Storage::delete($room->image);
        }
        Facility::where('room_id', $room->id)->delete();
        Room_image::where('room_id', $room->id)->delete();
        Room::destroy($room->id);

        return back()->with('success', 'Data Kamar Berhasil Dihapus!');
    }

    public function tambahFacility(Request $request)
    {
        $validateData = $request->validate([
            "facility_name" => "required|max:20",
            "facility_icon" => "required|max:50"
        ]);

        $validateData['room_id'] = $request->room_id;
        Facility::create($validateData);

        return back()->with('success', 'Fasilitas Berhasil Ditambahkan!');

    }

    public function hapusFacility($id)
    {
        Facility::destroy($id);

        return back()->with('success', 'Fasilitas Kamar Berhasil Dihapus!');
    }





    public function tambahFootage(Request $request)
    {
        $validateData = $request->validate([
            "image" => "required|file|max:1024"
        ]);

        if($request['image']){
            $validateData['image'] = $request->file('image')->store('footage-images');
        }
        $validateData['room_id'] = $request->room_id;

        Room_image::create($validateData);

        return back()->with('success', 'Footage Kamar Berhasil Ditambahkan!');
        
    }


    public function hapusFootage($id)
    {
        $room_image = Room_image::where('id', $id)->first();

        Storage::delete($room_image->image);

        Room_image::destroy($room_image->id);
        return back()->with('success', 'Footage Kamar Berhasil Dihapus');
    }

    public function room_book($id)
    {
        $room_book = Room_book::where('room_id', $id)->paginate(10);

        return view('dashboard.kamar.room_book', [
            "title" => "Buku Kamar",
            "data" => $room_book
        ]);
    }

    public function room_book_edit($id)
    {
        return view('dashboard.kamar.edit_room_book', [
            "title" => "Edit Aktifitas Kamar",
            "data" => Room_book::find($id)
        ]);
    }

    public function room_book_update(Request $request, $id)
    {
        $room_book = Room_book::find($id);
        $validateData = $request->validate(['active' => 'required']);
        Room_book::where('id', $room_book->id)
            ->update($validateData);

            return redirect('dashboard/rooms/book/'.$room_book->room_id)->with('success', 'Status Berhasil Diubah!');
    }
}
