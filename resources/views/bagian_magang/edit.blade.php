@extends('template')

@section('content')
	<h4>Edit Bagian Magang </h4>
		{{ link_to('bagian', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
		{!! Form::model($bagian, ['method' => 'PATCH','class' => 'form', 'action' => ['BagianMagangController@update', $bagian->id]]) !!}
			<div class="form-group{{ $errors->has('nama_bagian') ? ' has-error' : '' }}">
				{!! Form::label('nama_bagian','Bagian Magang :', ['class' => 'control-label']) !!}
				{!! Form::text('nama_bagian',null, ['class' => 'form-control']) !!}
				@if ($errors->has('nama_bagian'))
        			<span class="help-block">{{ $errors->first('nama_bagian') }}</span>
   				@endif
			</div>
				<br>
			<div class="form group">
				{!! Form::submit('Update Bagian Magang', ['class' => 'btn btn-warning form-control']) !!}
			</div>
		{!! Form::close() !!}

@endsection