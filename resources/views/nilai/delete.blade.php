@extends('template')

@section('content')

        
<h4>Nilai Manajemen Pengguna</h4>
			<center>
				Yakin ingin menghapus nilai magang dengan nama <b>{!! $row->jadwalmagang->profil->nama !!} </b> dan instansi <b>{!! $row->jadwalmagang->profil->instansi->nama_instansi !!} </b>? <br>
				<hr>
			{!! Form::open(['method' => 'DELETE', 'action' => ['NilaiController@destroy', $row->id_nilai]]) !!}
			    {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
			{!! Form::close() !!}
				<br>
			{{ link_to('nilai', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
			</center>
        
 
@endsection