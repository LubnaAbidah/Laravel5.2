<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TugasMagang;

use App\User;

use Validator;

use Session;

class TugasMagangController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman='TugasMagang';
        $tugasmagang_list = TugasMagang::all();
        return view('tugas.index', compact('halaman','tugasmagang_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugasmagang_list = TugasMagang::all();
        $list_pengguna = User::where('level', 'user')->lists('name', 'id');
        return view('tugas.create', compact('list_pengguna','tugasmagang_list'));
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
            'id_user' => 'required',
            'tugas' => 'required|max:20',
            'deskripsi' => 'required|max:200',
            'tanggal_tugas' => 'required|date',
            'status' => 'required',
            ]);
        if ($validator->fails())
        {
            return redirect('tugas/create')->withInput($input)->withErrors($validator);
        }
        TugasMagang::create($request->all());
        Session::flash('flash_message', 'Data tugas magang berhasil disimpan');
        return redirect('tugas');
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
        return view('tugas.show', compact('halaman','tugas'));
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
        return view('tugas.edit', compact('tugas','list_pengguna'));
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
            'id_user' => 'required',
            'tugas' => 'required|max:20',
            'deskripsi' => 'required|max:200',
            'tanggal_tugas' => 'required|date',
            'status' => 'required',
            ]);
        if ($validator->fails())
        {
            return redirect('tugas/' . $id . '/edit')->withInput($input)->withErrors($validator);
        }
        $tugas ->update($request->all());
        Session::flash('flash_message', 'Data tugas magang berhasil diedit');
        return redirect('tugas');
    }

    public function delete($id)
    {
        $tugas = TugasMagang::findOrFail($id);
        return view('tugas.delete', compact('tugas'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = TugasMagang::findOrFail($id);
        $tugas->delete();
        Session::flash('flash_message', 'Data tugas magang berhasil dihapus');
        return redirect('tugas');
    }

    public function cari(Request $request)
    {
      // Query 
      $fromDate = $request->input('fromDate');
      $toDate = $request->input('toDate');
      $tugasmagang_list = TugasMagang::whereBetween('tanggal_tugas', [$fromDate, $toDate])->get(); 
      // URL Links
      return view('tugas.index2', compact('tugasmagang_list','fromDate','toDate]'));
    }
}
