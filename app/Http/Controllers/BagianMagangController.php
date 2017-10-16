<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BagianMagang;

use Validator;

use Session;

class BagianMagangController extends Controller
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
    	$list_bagian = BagianMagang::all();
    	return view('bagian_magang.index', compact('halaman','list_bagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('bagian_magang.create');
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
            'nama_bagian' => 'required|unique:bagian_magang,nama_bagian|max:20',
            ]);
        if ($validator->fails())
        {
            return redirect('bagian/create')->withInput($input)->withErrors($validator);
        }
    	BagianMagang::create($request->all());

        Session::flash('flash_message', 'Data bagian magang berhasil disimpan');

    	return redirect('bagian');
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
        $bagian = BagianMagang::findOrFail($id);
        return view('bagian_magang.edit', compact('bagian'));
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
        $bagian = BagianMagang::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_bagian' => 'required|unique:bagian_magang,nama_bagian,' . $id,
            ]);
        if ($validator->fails())
        {
            return redirect('bagian/' . $id . '/edit')->withInput($input)->withErrors($validator);
        }
        $bagian ->update($request->all());

        Session::flash('flash_message', 'Data bagian magang berhasil diedit');

        return redirect('bagian');
    }

    public function delete($id)
    {
        $bagian = BagianMagang::findOrFail($id);
        return view('bagian_magang.delete', compact('bagian'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bagian = BagianMagang::findOrFail($id);
        $bagian->delete();
        Session::flash('flash_message', 'Data bagian magang berhasil dihapus');
        return redirect('bagian');
    }
}
