<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Validator;

use Session;

class PenggunaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman='Akun';
        $profil_list = User::all();
        $user_list = $profil_list->where('name', '{{Auth::user()->name}}');
        return view('profil.profilku', compact('halaman','user_list'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profil.profilkuedit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|
            unique:users,email,' . $id,
            ]);
        if ($validasi->fails()) {
            return redirect("profilku/$id/edit")->withErrors($validasi)->withInput();
        }
        if ($request->has('password')){
            //Hash password
            $data['password'] = bcrypt($data['password']);
             }else{
            //hapus password / password tidak diupdate
            $data = array_except($data, ['password']);
            }
        
        $user->update($data);
        Session::flash('flash_message', 'Pengaturan akun berhasil diedit');
        return redirect('profilku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
