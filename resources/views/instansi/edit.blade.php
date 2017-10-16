@extends('template')

@section('content')
<h4>Edit Instansi</h4>
	{{ link_to('instansi', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::model($instansi, ['method' => 'PATCH',  'class' => 'form', 'action' => ['InstitusiController@update', $instansi->id]]) !!}
		<div class="form-group{{ $errors->has('nama_instansi') ? ' has-error' : '' }}">
			{!! Form::label('nama_instansi','Instansi :', ['class' => 'control-label']) !!}
			{!! Form::text('nama_instansi',null, ['class' => 'form-control']) !!}
			@if ($errors->has('nama_instansi'))
        		<span class="help-block">{{ $errors->first('nama_instansi') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
			{!! Form::label('alamat','Alamat :', ['class' => 'control-label']) !!}
			{!! Form::text('alamat',null, ['class' => 'form-control']) !!}
			@if ($errors->has('alamat'))
        		<span class="help-block">{{ $errors->first('alamat') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
			{!! Form::label('no_telp','No Telepon :', ['class' => 'control-label']) !!}
			{!! Form::number('no_telp',null, ['class' => 'form-control']) !!}
			@if ($errors->has('no_telp'))
        		<span class="help-block">{{ $errors->first('no_telp') }}</span>
   			@endif
		</div>
			<br>
		<div class="form group">
			{!! Form::submit('Update Instansi', ['class' => 'btn btn-warning form-control']) !!}
		</div>
	{!! Form::close() !!}

@endsection