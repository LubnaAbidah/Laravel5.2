@extends('template')

@section('content')
<h4>Tambah Jadwal Magang</h4>
	{{ link_to('jadwalmagang', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::open(['url' => 'jadwalmagang', 'class' => 'form']) !!}

	<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
		{!! Form::label('id','Nama Profil :', ['class' => 'control-label']) !!}
			@if(count($profil_list) > 0)
				{!! Form::select('id', $profil_list, null, ['class' => 'form-control', 'id' => 'id', 'placeholder' =>'-- Pilih Nama Profil --']) !!}
			@else
				<p>Tidak ada pilihan Profil, buat dulu</p>
			@endif
			@if ($errors->has('id'))
        		<span class="help-block">{{ $errors->first('id') }}</span>
   			@endif
	</div>
	<div class="form-group{{ $errors->has('id_bagian_magang') ? ' has-error' : '' }}">
		{!! Form::label('id_bagian_magang','Bagian Magang :', ['class' => 'control-label']) !!}
			@if(count($list_bagian) > 0)
				{!! Form::select('id_bagian_magang', $list_bagian, null, ['class' => 'form-control', 'id' => '', 'placeholder' =>'-- Pilih Bagian Magang --']) !!}
			@else
				<p>Tidak ada pilihan Bagian Magang, buat dulu</p>
			@endif
			@if ($errors->has('id_bagian_magang'))
        		<span class="help-block">{{ $errors->first('id_bagian_magang') }}</span>
   			@endif
	</div>
	<div class="form-group{{ $errors->has('tanggal_mulai') ? ' has-error' : '' }}">
		{!! Form::label('tanggal_mulai','Tanggal Mulai Magang:', ['class' => 'control-label']) !!}
		{!! Form::date ('tanggal_mulai', !empty($jadwalmagang) ? $jadwalmagang->tanggal_mulai->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_mulai']) !!}
			@if ($errors->has('tanggal_mulai'))
        		<span class="help-block">{{ $errors->first('tanggal_mulai') }}</span>
   			@endif
	</div>	
	<div class="form-group{{ $errors->has('tanggal_selesai') ? ' has-error' : '' }}">
		{!! Form::label('tanggal_selesai','Tanggal Selesai Magang:', ['class' => 'control-label']) !!}
		{!! Form::date ('tanggal_selesai', !empty($jadwalmagang) ? $jadwalmagang->tanggal_selesai->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_selesai']) !!}
			@if ($errors->has('tanggal_selesai'))
        		<span class="help-block">{{ $errors->first('tanggal_selesai') }}</span>
   			@endif
	</div>
		<br>
	<div class="form group">
		{!! Form::submit('Tambah Jadwal Magang', ['class' => 'btn btn-primary form-control']) !!}
	</div>
	
	{!! Form::close() !!}
@endsection