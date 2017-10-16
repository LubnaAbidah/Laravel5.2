@extends('template')

@section('content')
<h4>Tambah Jurusan</h4>
	{{ link_to('jurusan', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::open(['url' => 'jurusan', 'class' => 'form']) !!}
		<div class="form-group{{ $errors->has('nama_jurusan') ? ' has-error' : '' }}">
			{!! Form::label('nama_jurusan','Jurusan :', ['class' => 'control-label']) !!}
			{!! Form::text('nama_jurusan',null, ['class' => 'form-control']) !!}
			@if ($errors->has('nama_jurusan'))
        		<span class="help-block">{{ $errors->first('nama_jurusan') }}</span>
   			@endif
		</div>
			<br>
		<div class="form group">
			{!! Form::submit('Tambah Jurusan', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection