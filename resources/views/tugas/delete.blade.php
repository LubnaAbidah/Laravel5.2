@extends('template')

@section('content')
<h4>Hapus Tugas Magang</h4>
	<center>
		Yakin ingin menghapus tugas <b>{!! $tugas->user->name !!} </b> dengan judul tugas <b>{!! $tugas->tugas !!} </b> ? <br>
			<hr>
	{!! Form::open(['method' => 'DELETE', 'action' => ['TugasMagangController@destroy', $tugas->id]]) !!}
        {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
			<br>
	{{ link_to('tugas', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	</center>
@endsection