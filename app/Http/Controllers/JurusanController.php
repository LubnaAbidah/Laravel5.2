<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jurusan;

use Validator;

use Session;

class JurusanController extends Controller
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
        $halaman='DataMaster';
    	$list_jurusan = Jurusan::all();
    	return view('jurusan.index', compact('halaman','list_jurusan'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('jurusan.create');
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
            'nama_jurusan' => 'required|unique:jurusan,nama_jurusan|max:30',
            ]);
        if ($validator->fails())
        {
            return redirect('jurusan/create')->withInput($input)->withErrors($validator);
        }
    	Jurusan::create($input);
        Session::flash('flash_message', 'Data jurusan berhasil disimpan');
    	return redirect('jurusan');
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
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
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
        $jurusan = Jurusan::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_jurusan' => 'required|unique:jurusan,nama_jurusan,' . $id,
            ]);
        if ($validator->fails())
        {
            return redirect('jurusan/' . $id . '/edit')->withInput($input)->withErrors($validator);
        }
        $jurusan ->update($request->all());
        Session::flash('flash_message', 'Data jurusan berhasil diedit');
        return redirect('jurusan');
    }

    public function delete($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.delete', compact('jurusan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        Session::flash('flash_message', 'Data jurusan berhasil dihapus');
        return redirect('jurusan');
    }
    
}
