@extends('template')

@section('content')
<h4>Hapus Profil</h4>
	<center>
		Yakin ingin menghapus profil <b>{!! $profil->nama !!} </b> dengan No Identitas <b>{!! $profil->no_identitas !!} </b> ? <br>
			<hr>
	{!! Form::open(['method' => 'DELETE', 'action' => ['ProfilController@destroy', $profil->id]]) !!}
        {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
			<br>
	{{ link_to('profil', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	</center>
@endsection