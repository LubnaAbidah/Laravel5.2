@extends('template')

@section('content')
<h4>Edit Nilai Magang</h4>
	{{ link_to('nilai', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::model($row, ['method' => 'PATCH', 'class' => 'form', 'action' => ['NilaiController@update', $row->id_nilai]]) !!}
		<div class="form group">
			{!! Form::label('nama','Nama Profil :', ['class' => 'control-label']) !!}
			{!! Form::text('nama',$row->jadwalmagang->profil->nama, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
		</div>
		<div class="form group">
			{!! Form::label('nama_instansi','Nama Instansi :', ['class' => 'control-label']) !!}
			{!! Form::text('nama_instansi',$row->jadwalmagang->profil->instansi->nama_instansi, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
		</div>	
			<hr>
		<div class="form-group{{ $errors->has('nilai_absen') ? ' has-error' : '' }}">
			{!! Form::label('nilai_absen','Nilai Absen:', ['class' => 'control-label']) !!}
			{!! Form::number('nilai_absen',$row->jadwalmagang->nilai_absen, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group{{ $errors->has('nilai_tugas') ? ' has-error' : '' }}">
			{!! Form::label('nilai_tugas','Nilai Tugas:', ['class' => 'control-label']) !!}
			{!! Form::number('nilai_tugas',$row->jadwalmagang->nilai_tugas, ['class' => 'form-control']) !!}
		</div>	
		<div class="form-group{{ $errors->has('nilai_kejujuran') ? ' has-error' : '' }}">
			{!! Form::label('nilai_kejujuran','Nilai Tanggungjawab:', ['class' => 'control-label']) !!}
			{!! Form::number('nilai_kejujuran',$row->jadwalmagang->nilai_kejujuran, ['class' => 'form-control']) !!}
		</div>
			<br>
		<div class="form group">
			{!! Form::submit('Edit Nilai Magang', ['class' => 'btn btn-warning form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection