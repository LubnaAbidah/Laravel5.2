<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Institusi;

use App\Profil;

use App\Jurusan;

use App\JadwalMagang;

use Validator;

use Session;

class ProfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => [
           'index',
          ]]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
        $halaman='DataMagang';
        $profil_list = Profil::all();
        return view('profil.index', compact('halaman','profil_list'));
	}

    public function index2()
    {
        $profil_list = Profil::all();
        return view('profil.index2', compact('profil_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_instansi = Institusi::lists('nama_instansi', 'id');
        $list_jurusan = Jurusan::lists('nama_jurusan', 'id');
    	return view('profil.create', compact('list_instansi','list_jurusan'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'no_identitas' => 'required|unique:profil,no_identitas',
            'nama' => 'required|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status' => 'required|in:U,M,S',
            'id_instansi' => 'required',
            'id_jurusan' => 'required',
            ]);
        if ($validator->fails())
        {
            return redirect('profil/create')->withInput($input)->withErrors($validator);
        }
    	Profil::create($request->all());
        Session::flash('flash_message', 'Data profil magang berhasil disimpan');
        return redirect('profil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = Profil::findOrFail($id);
        return view('profil.show', compact('profil'));
    }

    public function show2($id)
    {
        $profil = Profil::findOrFail($id);
        return view('profil.show2', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        $list_instansi = Institusi::lists('nama_instansi', 'id');
        $list_jurusan = Jurusan::lists('nama_jurusan', 'id');
        return view('profil.edit', compact('profil','list_instansi','list_jurusan'));
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
        $profil = Profil::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'no_identitas' => 'required|max:10|unique:profil,no_identitas,' . $id,
            'nama' => 'required|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status' => 'required|in:U,M,S',
            'id_instansi' => 'required',
            'id_jurusan' => 'required',
            ]);
        if ($validator->fails())
        {
            return redirect('profil/' . $id . '/edit')->withInput($input)->withErrors($validator);
        }
        $profil ->update($request->all());
        Session::flash('flash_message', 'Data profil magang berhasil diedit');
        return redirect('profil');
    }
     public function delete($id)
    {
        $profil = Profil::findOrFail($id);
        return view('profil.delete', compact('profil'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();
        Session::flash('flash_message', 'Data profil magang berhasil dihapus');
        return redirect('profil');
    }

    public function cari(Request $request)
    {
        $halaman='DataMagang';
        $kata_kunci    = $request->input('status');
          // Query
            $profil_list     = Profil::where('status', 'LIKE', '%' . $kata_kunci . '%')->get();
            // URL Links
            return view('profil.index3', compact('profil_list', 'kata_kunci', 'halaman'));
    }

      public function dateMutator()
    {
      $collection = Profil::all();
      return $collection;
    }
   
}
