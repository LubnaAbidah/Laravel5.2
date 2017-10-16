@extends('template')

@section('content')
<h4>Edit Profil</h4>
	{{ link_to('profil', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::model($profil, ['method' => 'PATCH', 'class' => 'form', 'action' => ['ProfilController@update', $profil->id]]) !!}
		<div class="form-group{{ $errors->has('no_identitas') ? ' has-error' : '' }}">
			{!! Form::label('no_identitas','No Identitas / NISN / NPM :', ['class' => 'control-label']) !!}
			{!! Form::number('no_identitas',null, ['class' => 'form-control']) !!}
			@if ($errors->has('no_identitas'))
        		<span class="help-block">{{ $errors->first('no_identitas') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
			{!! Form::label('nama','Nama :', ['class' => 'control-label']) !!}
			{!! Form::text('nama',null, ['class' => 'form-control']) !!}
			@if ($errors->has('nama'))
        		<span class="help-block">{{ $errors->first('nama') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
			{!! Form::label('tanggal_lahir','Tanggal Lahir:', ['class' => 'control-label']) !!}
			{!! Form::date ('tanggal_lahir', !empty($profil) ? $profil->tanggal_lahir->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
			@if ($errors->has('tanggal_lahir'))
        		<span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
			{!! Form::label('jenis_kelamin','Jenis Kelamin:', ['class' => 'control-label']) !!}
			<div class="radio">
				<label>
					{!! Form::radio('jenis_kelamin','L') !!}Laki-Laki
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('jenis_kelamin','P') !!}Perempuan
				</label>
			</div>
			@if ($errors->has('jenis_kelamin'))
        		<span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
			{!! Form::label('status','Status:', ['class' => 'control-label']) !!}
			<div class="radio">
				<label>
					{!! Form::radio('status','U') !!}Umum
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('status','M') !!}Mahasiswa
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('status','S') !!}Siswa
				</label>
			</div>
			@if ($errors->has('status'))
        		<span class="help-block">{{ $errors->first('status') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('id_instansi') ? ' has-error' : '' }}">
		{!! Form::label('id_instansi','Instansi :', ['class' => 'control-label']) !!}
			@if(count($list_instansi) > 0)
				{!! Form::select('id_instansi', $list_instansi, null, ['class' => 'form-control', 'id' => 'id_instansi', 'placeholder' =>'-- Pilih Instansi --']) !!}
			@else
				<p>Tidak ada pilihan Instansi, buat dulu</p>
			@endif
			@if ($errors->has('id_instansi'))
        		<span class="help-block">{{ $errors->first('id_instansi') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('id_jurusan') ? ' has-error' : '' }}">
		{!! Form::label('id_jurusan','Jurusan / Bidang Keahlian :', ['class' => 'control-label']) !!}
			@if(count($list_jurusan) > 0)
				{!! Form::select('id_jurusan', $list_jurusan, null, ['class' => 'form-control', 'id' => 'id_jurusan', 'placeholder' =>'-- Pilih Jurusan --']) !!}
			@else
				<p>Tidak ada pilihan Jurusan, buat dulu</p>
			@endif
			@if ($errors->has('id_jurusan'))
        		<span class="help-block">{{ $errors->first('id_jurusan') }}</span>
   			@endif
		</div>
			<br>
		<div class="form-group">
			{!! Form::submit('Update Profil Magang', ['class' => 'btn btn-warning form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection