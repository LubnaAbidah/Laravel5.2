@extends('template')

@section('content')
<h4>Edit Tugas Magang</h4>
	{{ link_to('tugas', 'Kembali', ['class' => 'btn btn-default btn-sm']) }}
	{!! Form::model($tugas, ['method' => 'PATCH', 'class' => 'form', 'action' => ['TugasMagangController@update', $tugas->id]]) !!}
		<div class="form-group{{ $errors->has('id_user') ? ' has-error' : '' }}">
			{!! Form::label('id_user','Nama :', ['class' => 'control-label']) !!}
				@if(count($list_pengguna) > 0)
					{!! Form::select('id_user', $list_pengguna, null, ['class' => 'form-control', 'id' => 'id_user', 'placeholder' =>'-- Pilih Nama Pengguna --']) !!}
				@else
					<p>Tidak ada pilihan Pengguna, buat dulu</p>
				@endif
			@if ($errors->has('id_user'))
        		<span class="help-block">{{ $errors->first('id_user') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('tugas') ? ' has-error' : '' }}">
			{!! Form::label('tugas','Tugas :', ['class' => 'control-label']) !!}
			{!! Form::text('tugas',null, ['class' => 'form-control']) !!}
			@if ($errors->has('tugas'))
        		<span class="help-block">{{ $errors->first('tugas') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			{!! Form::label('deskripsi','Deskripsi Tugas :', ['class' => 'control-label']) !!}
			{!! Form::textarea('deskripsi',null, ['class' => 'form-control']) !!}
			@if ($errors->has('deskripsi'))
        		<span class="help-block">{{ $errors->first('deskripsi') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('tanggal_tugas') ? ' has-error' : '' }}">
			{!! Form::label('tanggal_tugas','Tanggal Tugas:', ['class' => 'control-label']) !!}
			{!! Form::date ('tanggal_tugas', !empty($tugas) ? $tugas->tanggal_tugas->format('Y-m-d'): null, ['class' => 'form-control', 'id' => 'tanggal_tugas']) !!}
			@if ($errors->has('tanggal_tugas'))
        		<span class="help-block">{{ $errors->first('tanggal_tugas') }}</span>
   			@endif
		</div>
		<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
			{!! Form::label('status','Status:', ['class' => 'control-label']) !!}
					<div class="radio">
						<label>
							{!! Form::radio('status','B') !!}Mulai<br>
							{!! Form::radio('status','S') !!}Selesai
						</label>
					</div>
			@if ($errors->has('status'))
        		<span class="help-block">{{ $errors->first('status') }}</span>
   			@endif
		</div>
			<br>
		<div class="form group">
			{!! Form::submit('Update Tugas Magang', ['class' => 'btn btn-warning form-control']) !!}
		</div>
	{!! Form::close() !!}
@endsection