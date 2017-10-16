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

class JadwalMagangController extends Controller
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
  
         // $this->middleware('auth', ['except' => [
        //    'index',
       //     ]]);
//$this->middleware('admin', ['except' => [
         //   'index',
          //  ]]);
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
      $halaman='DataMagang';
      $list_bagian = BagianMagang::lists('nama_bagian', 'id');
      $list_nilai = Nilai::lists('nilai_absen', 'id_nilai');
      $jadwalmagang_list = JadwalMagang::all();
      return view('jadwalmagang.index', compact('halaman','jadwalmagang_list','list_bagian','list_nilai'));
    }

    public function index2()
    {
        $jadwalmagang_list = JadwalMagang::all();
        return view('jadwalmagang.index2', compact('jadwalmagang_list'));
    }

    public function search()
    {
        $halaman='Laporan';
        $list_bagian = BagianMagang::lists('nama_bagian', 'id');
        $jadwalmagang_list = JadwalMagang::all();
        return view('jadwalmagang.search', compact('halaman','jadwalmagang_list','list_bagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profil_list = Profil::orderBy('nama')->lists('nama', 'id');
        $list_bagian = BagianMagang::lists('nama_bagian', 'id');
        return view('jadwalmagang.create', compact('profil_list','list_bagian'));   
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
            'id' => 'required|unique:jadwal_magang,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'id_bagian_magang' => 'required',
            ]);
        if ($validator->fails())
        {
            return redirect('jadwalmagang/create')->withInput($input)->withErrors($validator);
        }
        JadwalMagang::create($input);
        Session::flash('flash_message', 'Data jadwal magang berhasil disimpan');
        return redirect('jadwalmagang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $jadwalmagang = JadwalMagang::findOrFail($id);
        return view('jadwalmagang.show', compact('jadwalmagang'));
    }

     public function show2($id)
    {
        $jadwalmagang = JadwalMagang::findOrFail($id);
        return view('jadwalmagang.show2', compact('jadwalmagang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwalmagang = JadwalMagang::findOrFail($id);
        $profil_list = Profil::orderBy('nama')->lists('nama', 'id');
        $list_bagian = BagianMagang::lists('nama_bagian', 'id');
        return view('jadwalmagang.edit', compact('jadwalmagang','profil_list','list_bagian'));
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
        $jadwalmagang = JadwalMagang::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'unique:jadwal_magang,id,' . $id,
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'id_bagian_magang' => 'required',
            ]);
        if ($validator->fails())
        {
            return redirect('jadwalmagang/' . $id . '/edit')->withInput($input)->withErrors($validator);
        }
        $jadwalmagang ->update($request->all());
        Session::flash('flash_message', 'Data jadwal magang berhasil diedit');
        return redirect('jadwalmagang');
    }

    public function delete($id)
    {
        $jadwalmagang = JadwalMagang::findOrFail($id);
        return view('jadwalmagang.delete', compact('jadwalmagang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwalmagang = JadwalMagang::findOrFail($id);
        $jadwalmagang->delete();
        Session::flash('flash_message', 'Data jadwal magang berhasil dihapus');
        return redirect('jadwalmagang');
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
    //test collection range date
    public function test()
    {
        $fromDate = date('2017-01-01'); 
        $toDate = date('2017-06-01'); 
        $posts = JadwalMagang::whereBetween('tanggal_mulai', [$fromDate, $toDate])->get(); 
         return view('jadwalmagang.index', compact('posts'));  
    }

}
