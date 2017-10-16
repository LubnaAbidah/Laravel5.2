<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Institusi;

use Validator;

use Session;

class InstitusiController extends Controller
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
    	$list_instansi = Institusi::all();
    	return view('instansi.index', compact('halaman','list_instansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('instansi.create');
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
            'nama_instansi' => 'required|unique:instansi,nama_instansi|max:40',
            'alamat' => 'required|max:100',
            'no_telp' => 'required|max:20',
            ]);
        if ($validator->fails())
        {
            return redirect('instansi/create')->withInput()->withErrors($validator);
        }
       Institusi::create($input);

        Session::flash('flash_message', 'Data instansi berhasil disimpan');

    	return redirect('instansi');
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
        $instansi = Institusi::findOrFail($id);
        return view('instansi.edit', compact('instansi'));
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
        $instansi = Institusi::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_instansi' => 'required|unique:instansi,nama_instansi,' . $id,
            'alamat' => 'required|max:100',
            'no_telp' => 'required|max:20',
            ]);
        if ($validator->fails())
        {
            return redirect('instansi/' . $id . '/edit')->withInput()->withErrors($validator);
        }
        $instansi ->update($request->all());

        Session::flash('flash_message', 'Data instansi berhasil diedit');

        return redirect('instansi');
    }

    public function delete($id)
    {
        $instansi = Institusi::findOrFail($id);
        return view('instansi.delete', compact('instansi'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instansi = Institusi::findOrFail($id);
        $instansi->delete();
        Session::flash('flash_message', 'Data instansi berhasil dihapus');
        return redirect('instansi');
    }
}
