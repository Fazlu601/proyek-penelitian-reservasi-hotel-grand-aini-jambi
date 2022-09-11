<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class registrationController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'registrasi'
        ]);
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
              "username" => "required|min:5|max:13|unique:users,username",
              "name" => "required|max:100",
              "email" => "required|email|max:100|unique:users,email",
              "no_hp" => "required|max:15",
              "password" => "required|max:50",
              "password_confirmation" => "required|same:password"
        ]);
        // [
        //     'required',
        //     'confirmed',
        //     Password::min(8)
        //         ->mixedCase()
        //         ->letters()
        //         ->numbers()
        //         ->symbols()
        //         ->uncompromised(),
        //   ]

        // if($validationData['password'] === $validationData['password2'])
        // {
        // }
        
        $validationData['password'] = Hash::make($validationData['password']);
        User::create($validationData);
        return redirect(Route('login'))->with('success', 'Akun anda sudah terdaftar, silahkan login terlebih dahulu!');
    }
};
