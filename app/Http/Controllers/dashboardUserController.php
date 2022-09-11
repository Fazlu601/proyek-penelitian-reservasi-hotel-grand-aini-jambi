<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class dashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->get('search')){
            return view('dashboard.user.index',[
                'title' => 'Data Pelanggan',
                'data' => User::Where('username', 'like' , "%{$request->get('search')}%")->orWhere('name', 'like' , "%{$request->get('search')}%")->paginate(5)
            ]);
        }else{
            return view('dashboard.user.index',[
                'title' => 'Data Pelanggan',
                'data' => User::where('is_admin', 0)->paginate(5)
            ]);
        }

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
        $validateData = $request->validate([
            "username" => "required|min:5|unique:users",
            "name" => "required",
            "email" => "required|email",
            "no_hp" => "required",
            "password" => "required",
            "is_admin" => "required"
        ]);

        $validateData["password"] = Hash::make($validateData["password"]);

        User::create($validateData);

        return back()->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.user.detail',[
            'title' => 'Data Tamu',
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit_role', [
            "title" => "Edit Role",
            "data" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        

        User::where('id', $user->id)
            ->update(['is_admin' => $request->post('is_admin')]);

            return redirect('dashboard/role_access')->with('success', 'Role Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        
        return redirect('/dashboard/users')->with('success', 'Pengunjung Berhasil Dihapus');
    }

}
