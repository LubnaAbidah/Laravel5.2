@extends('template')

@section('content')
<h4>Hapus Jurusan</h4>
	<center>
		Yakin ingin menghapus Jurusan <b>{!! $jurusan->nama_jurusan !!} </b> ? <br>
		<hr>
			{!! Form::open(['method' => 'DELETE', 'action' => ['JurusanController@destroy', $jurusan->id]]) !!}
			     {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
			{!! Form::close() !!}
		<br>
		{{ link_to('jurusan', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	</center>
@endsection