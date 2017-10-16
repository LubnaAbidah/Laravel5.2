@extends('template')

@section('content')

        
<h4>Hapus Manajemen Pengguna</h4>
			<center>
				Yakin ingin menghapus <b>{!! $user->name !!} </b> dengan email <b>{!! $user->email !!} </b>? <br>
				<hr>
			{!! Form::open(['method' => 'DELETE', 'action' => ['HomeController@destroy', $user->id]]) !!}
			    {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
			{!! Form::close() !!}
				<br>
			{{ link_to('pengguna', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
			</center>
        
 
@endsection