@extends('template')

@section('content')

<h4>Edit Manajemen Pengguna</h4>
<div class="alert alert-info alert-dismissible fade in" role="alert"> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">X</span></button> Untuk mengganti password ketikan password baru yang diinginkan. 
		Apabila tidak ingin mengganti password cukup kosongkan kolom password </div>
{{ link_to('pengguna', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::model($user, ['method' => 'PATCH', 'class' => 'form', 'action' => ['HomeController@update', $user->id]]) !!}
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			{!! Form::label('name','Nama  :', ['class' => 'control-label']) !!}
			{!! Form::text('name',$user->name, ['class' => 'form-control']) !!}
			@if ($errors->has('name'))
        		<span class="help-block">{{ $errors->first('name') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			{!! Form::label('email','Email :', ['class' => 'control-label']) !!}
			{!! Form::text('email',$user->email, ['class' => 'form-control']) !!}
			@if ($errors->has('email'))
        		<span class="help-block">{{ $errors->first('email') }}</span>
   			@endif
		</div>	
		<div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
			{!! Form::label('level','Level:', ['class' => 'control-label']) !!}
			<div class="radio">
				<label>
					{!! Form::radio('level','admin') !!}admin
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('level','user') !!}user
				</label>
			</div>
			@if ($errors->has('level'))
        		<span class="help-block">{{ $errors->first('level') }}</span>
   			@endif
		</div>
	{{-- Password --}}
		<div class="form group">
			{!! Form::label('password','Password Baru :', ['class' => 'control-label']) !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
	{{-- Password Konfirmasi--}}
		<div class="form group">
			{!! Form::label('password_confirmation','Konfirmasi Password Baru :', ['class' => 'control-label']) !!}
			{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
		</div>
			<br>
		<div class="form group">
			{!! Form::submit('Edit Manajemen Pengguna', ['class' => 'btn btn-warning form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection