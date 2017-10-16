<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Profil;

use App\JadwalMagang;

use App\BagianMagang;

use App\Nilai;

use Validator;

use Session;

class NilaiController extends Controller
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
      $nilai_list = Nilai::all();
      return view('nilai.index', compact('halaman','nilai_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        $profil_list = Profil::orderBy('nama')->lists('nama', 'id');
        return view('nilai.create', compact('profil_list'));   
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
        'id' => 'required|unique:nilai,id_nilai',
            'nilai_absen' => 'required',
            'nilai_tugas' => 'required',
            'nilai_kejujuran' => 'required',
            ]);
        if ($validator->fails())
        {
            return redirect('nilai/create')->withInput($input)->withErrors($validator);
        }
        Nilai::create($input);
        Session::flash('flash_message', 'Data jadwal magang berhasil disimpan');
        return redirect('nilai');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $row = Nilai::findOrFail($id);
        return view('nilai.show', compact('row'));
    }

     public function show2($id)
    {
        $row = Nilai::findOrFail($id);
        return view('nilai.show2', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Nilai::findOrFail($id);
        $jadwalmagang = JadwalMagang::all();
        $profil_list = Profil::orderBy('nama')->lists('nama', 'id');
        $list_bagian = BagianMagang::lists('nama_bagian', 'id');
        return view('nilai.edit', compact('row','jadwalmagang','profil_list','list_bagian'));
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
        $row = Nilai::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'unique:id,' . $id,
            'nilai_absen' => 'required|max:2',
            'nilai_tugas' => 'required|max:2',
            'nilai_kejujuran' => 'required|max:2',
            ]);
        if ($validator->fails())
        {
            return redirect('nilai/' . $id . '/edit')->withInput($input)->withErrors($validator);
        }
        $row ->update($request->all());
        Session::flash('flash_message', 'Data nilai magang berhasil diedit');
        return redirect('nilai');
    }

    public function delete($id)
    {
         $row = Nilai::findOrFail($id);
        return view('nilai.delete', compact('row'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Nilai::findOrFail($id);
        $row->delete();
        Session::flash('flash_message', 'Data jadwal magang berhasil dihapus');
        return redirect('nilai');
    }

    public function cari(Request $request)
    {
        $halaman='DataMagang';
        $id_bagian_magang = $request->input('id_bagian_magang');
        $list_bagian = BagianMagang::lists('nama_bagian', 'id');
            // Query 
            $jadwalmagang_list = JadwalMagang::where('id_bagian_magang', 'LIKE', '%' . $id_bagian_magang . '%')->get();
            // URL Links
            return view('jadwalmagang.index3', compact('jadwalmagang_list', 'id_bagian_magang','list_bagian','halaman'));
    }

    public function searchaction(Request $request)
    {
      $halaman='Laporan';
      // Query 
      $fromDate = $request->input('fromDate');
      $toDate = $request->input('toDate');
      $jadwalmagang_list = JadwalMagang::whereBetween('tanggal_mulai', [$fromDate, $toDate])->get(); 
      // URL Links
      return view('jadwalmagang.search2', compact('jadwalmagang_list','halaman','fromDate','toDate]'));
    }
}
