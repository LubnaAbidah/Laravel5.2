@extends('template')

@section('content')

<h4>Tambah Manajemen Pengguna</h4>
{{ link_to('pengguna', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::open(['url' => 'pengguna', 'class' => 'form']) !!}
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			{!! Form::label('name','Nama  :', ['class' => 'control-label']) !!}
			{!! Form::text('name',null, ['class' => 'form-control']) !!}
			@if ($errors->has('name'))
        		<span class="help-block">{{ $errors->first('name') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			{!! Form::label('email','Email :', ['class' => 'control-label']) !!}
			{!! Form::text('email',null, ['class' => 'form-control']) !!}
			@if ($errors->has('email'))
        		<span class="help-block">{{ $errors->first('email') }}</span>
   			@endif
		</div>	
		<div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
			{!! Form::label('level','Level:', ['class' => 'control-label']) !!}
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
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			{!! Form::label('password','Password Baru :', ['class' => 'control-label']) !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
			@if ($errors->has('password'))
        		<span class="help-block">{{ $errors->first('password') }}</span>
   			@endif
		</div>
	{{-- Password Konfirmasi--}}
		<div class="form group">
			<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			{!! Form::label('password_confirmation','Konfirmasi Password Baru :', ['class' => 'control-label']) !!}
			{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
			@if ($errors->has('password_confirmation'))
        		<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
   			@endif
		</div>
			<br>
		<div class="form group">
			{!! Form::submit('Tambah Manajemen Pengguna', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection