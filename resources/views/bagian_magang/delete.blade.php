@extends('template')

@section('content')
	<h4>Hapus Bagian Magang </h4>
		<center>
			Yakin ingin menghapus Bagian Magang <b>{!! $bagian->nama_bagian !!} </b> ? <br>
				<hr>
					{!! Form::open(['method' => 'DELETE', 'action' => ['BagianMagangController@destroy', $bagian->id]]) !!}
		            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
		            {!! Form::close() !!}
				<br>
			{{ link_to('bagian', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
		</center>
@endsection