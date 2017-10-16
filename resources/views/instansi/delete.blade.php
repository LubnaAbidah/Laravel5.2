@extends('template')

@section('content')
	<h4>Hapus Instansi</h4>
		<center>
			Yakin ingin menghapus Instansi <b>{!! $instansi->nama_instansi !!} </b> ? 
				<br>
				<hr>
	{!! Form::open(['method' => 'DELETE', 'action' => ['InstitusiController@destroy', $instansi->id]]) !!}
            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
				<br>
	{{ link_to('instansi', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
		</center>
@endsection