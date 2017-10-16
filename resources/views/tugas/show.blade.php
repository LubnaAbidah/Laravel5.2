@extends('template')

@section('content')
{{ link_to('tugas', 'Kembali', ['class' => 'btn btn-danger btn-sm']) }}
		<h3>Detail Tugas Magang {{ $tugas->user->name }}</h3>
				<div class="panel panel-danger">
			  		<div class="panel-heading">Tugas Magang</div>
			  		<div class="panel-body">
						<table class="table table-striped">
							<tr>
								<th>Nama Pengguna</th>
								<td>{{ $tugas->user->name }}</td>
							</tr>
							<tr>
								<th>Tugas Magang</th>
								<td>{{ $tugas->tugas }}</td>
							</tr>
							<tr>
								<th>Deskripsi</th>
								<td>{{ $tugas->deskripsi }}</td>
							</tr>
							<tr>
								<th>Tanggal Tugas</th>
								<td>{{ $tugas->tanggal_tugas->format('d-m-Y') }}</td>
							</tr>
							<tr>
								<th>Status</th>
								<td>
								<?php if( $tugas->status =='B')
			                    {
			                      echo "Mulai";
			                    }elseif($tugas->status =='S')
			                    {
			                      echo "Selesai";
			                    }
			                    ?>
								</td>
							</tr>
						</table>	
	 				</div>
				</div>
@endsection
