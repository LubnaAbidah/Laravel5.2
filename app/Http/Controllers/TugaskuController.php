<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TugasMagang;

use App\User;

use Validator;

use Illuminate\Support\Facades\Auth;

use Session;

class TugaskuController extends Controller
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
        $halaman='TugasKu';
        $profil = TugasMagang::all();
        $tugasmagang_list = $profil->where('id_user', Auth::user()->id);
        return view('tugasku.index', compact('halaman','profil','tugasmagang_list'));
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
        $tugas = TugasMagang::findOrFail($id);
        return view('tugasku.show', compact('halaman','tugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = TugasMagang::findOrFail($id);
        $list_pengguna = User::where('level', 'user')->lists('name', 'id');
        return view('tugasku.edit', compact('tugas','list_pengguna'));
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
        $tugas = TugasMagang::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'status' => 'required',
            ]);
        if ($validator->fails())
        {
            return redirect('tugasku/' . $id . '/edit')->withInput($input)->withErrors($validator);
        }
        $tugas ->update($request->all());
        Session::flash('flash_message', 'Tugas Anda berhasil diedit');
        return redirect('tugasku');
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
