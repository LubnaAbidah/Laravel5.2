@extends('template')

@section('content')
<h4>Hapus Jadwal Magang</h4>
	<center>
		Yakin ingin menghapus jadwal magang <b>{!! $jadwalmagang->profil->nama !!} </b> dengan Bagian Magang <b>{!! $jadwalmagang->nama_bagian !!} </b> ? <br>
		<hr>
	{!! Form::open(['method' => 'DELETE', 'action' => ['JadwalMagangController@destroy', $jadwalmagang->id]]) !!}
        {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
		<br>
	{{ link_to('jadwalmagang', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	</center>
@endsection