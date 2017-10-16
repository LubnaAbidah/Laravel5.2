@extends('template')

@section('content')
<h4>Tambah Nilai Magang</h4>
	{{ link_to('nilai', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::open(['url' => 'nilai', 'class' => 'form']) !!}

		<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
		{!! Form::label('id','Nama Profil :', ['class' => 'control-label']) !!}
			@if(count($profil_list) > 0)
				{!! Form::select('id', $profil_list, null, ['class' => 'form-control', 'id' => 'id', 'placeholder' =>'-- Pilih Nama Profil --']) !!}
			@else
				<p>Tidak ada pilihan Jadwal, buat dulu</p>
			@endif
			@if ($errors->has('id'))
        		<span class="help-block">{{ $errors->first('id') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('nilai_absen') ? ' has-error' : '' }}">
			{!! Form::label('nilai_absen','Nilai Absen:', ['class' => 'control-label']) !!}
			{!! Form::number('nilai_absen',null, ['class' => 'form-control']) !!}
			@if ($errors->has('nilai_absen'))
        		<span class="help-block">{{ $errors->first('nilai_absen') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('nilai_tugas') ? ' has-error' : '' }}">
			{!! Form::label('nilai_tugas','Nilai Tugas:', ['class' => 'control-label']) !!}
			{!! Form::number('nilai_tugas',null, ['class' => 'form-control']) !!}
			@if ($errors->has('nilai_tugas'))
        		<span class="help-block">{{ $errors->first('nilai_tugas') }}</span>
   			@endif
		</div>	
		<div class="form-group{{ $errors->has('nilai_kejujuran') ? ' has-error' : '' }}">
			{!! Form::label('nilai_kejujuran','Nilai Tanggungjawab:', ['class' => 'control-label']) !!}
			{!! Form::number('nilai_kejujuran',null, ['class' => 'form-control']) !!}
			@if ($errors->has('nilai_kejujuran'))
        		<span class="help-block">{{ $errors->first('nilai_kejujuran') }}</span>
   			@endif
		</div>	
		<br>
	<div class="form group">
		{!! Form::submit('Tambah Nilai Magang', ['class' => 'btn btn-primary form-control']) !!}
	</div>
	
	{!! Form::close() !!}
@endsection