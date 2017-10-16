<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Validator;

use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman='Pengguna';
        $pengguna = User::all();
        $list_pengguna = $pengguna->where('level', 'user');
        return view('home',compact('list_pengguna','halaman'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|
            unique:users,email',
            'password' => 'required|confirmed|max:25',
            'level' => 'required|in:admin,user',
            ]);
        if ($validasi->fails()) {
            return redirect("pengguna/create")->withErrors($validasi)->withInput();
        }
            //Hash password
            $data['password'] = bcrypt($data['password']);
        
        User::create($data);
        Session::flash('flash_message', 'Data user berhasil disimpan');
        return redirect('pengguna');
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

     public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|
            unique:users,email,' . $id,
            'password' => 'sometimes|confirmed|min:6',
            'level' => 'required|in:admin,user',
            ]);
        if ($validasi->fails()) {
            return redirect("pengguna/$id/edit")->withErrors($validasi)->withInput();
        }
        if ($request->has('password')){
            //Hash password
            $data['password'] = bcrypt($data['password']);
             }else{
            //hapus password / password tidak diupdate
            $data = array_except($data, ['password']);
            }
        
        $user->update($data);
        Session::flash('flash_message', 'Data pengguna berhasil diedit');
        return redirect('pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function delete($id){
        $user = User::findOrFail($id);
        return view('user.delete', compact('user'));
    }
    protected function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('flash_message', 'Data pengguna berhasil dihapus');
        return redirect('pengguna');
    }
}
