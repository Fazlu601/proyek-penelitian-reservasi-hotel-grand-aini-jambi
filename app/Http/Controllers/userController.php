<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public function index()
    {
        return view('profile', [
            'title' => 'profile user',
            "user" => User::where('username', Auth()->User()->username)->first()
        ]);
    }

    public function indexDash()
    {
        return view('dashboard/profile_admin',[
            'title' => 'profile admin',
            "user" => User::where('username', Auth()->User()->username)->first()
        ]);
    }

    public function update(ProfileRequest $request, $id)
    {
        $validateData = [
            "name" => $request->name,
            "email" => $request->email,
            "no_hp" => $request->no_hp,
            "address" => $request->address
        ];

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                
                Storage::delete($request->oldImage);
                
            }
            $validateData['image'] = $request->file('image')->store('profil-images');
        }
       
        User::where('id', $id)
                ->update($validateData);
            return redirect('/profile')->with('success', 'Data Berhasil Di Ubah');
    }
}
