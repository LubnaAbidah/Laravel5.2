@extends('template')

@section('content')
{{ link_to('jadwalmagang/'. $jadwalmagang->id . '/print', '', ['class' => 'btnPrint btn btn-primary btn-sm glyphicon glyphicon-print','data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'CETAK']) }}
{{ link_to('jadwalmagang', 'Kembali', ['class' => 'btn btn-danger btn-sm']) }}
	<h3>Detail Profil Magang {{ $jadwalmagang->nama }}</h3>
		<div class="panel panel-danger">
		  	<div class="panel-heading">Data Profil</div>
		  	<div class="panel-body">
					<table class="table table-striped">
					<tr>
						<th>No Identitas</th>
						<td>{{ $jadwalmagang->profil->no_identitas }}</td>
					</tr>
					<tr>
						<th>Nama</th>
						<td>{{ $jadwalmagang->profil->nama }}</td>
					</tr>
					<tr>
						<th>Tanggal Lahir</th>
						<td>{{ $jadwalmagang->profil->tanggal_lahir->format('d-m-Y') }}</td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td><?php if($jadwalmagang->profil->jenis_kelamin =='L')
							{
				             	echo "Laki-Laki";
				           	}elseif($jadwalmagang->profil->jenis_kelamin =='P'){
				           	 	echo "Perempuan";
				          	}
				            ?>
				        </td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
						<?php if($jadwalmagang->profil->status =='M')
							{
				               echo "Mahasiswa";
				            }elseif($jadwalmagang->profil->status =='S')
				            {
				              echo "Siswa";
				            }else
				            {
				              echo "Umum";
				            }
				               ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel panel-danger">
		  	<div class="panel-heading">Data Instansi dan Jurusan</div>
		  		<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>Jurusan</th>
							<td>{{ $jadwalmagang->profil->jurusan->nama_jurusan }}</td>
						</tr>
						<tr>
							<th>Instansi</th>
							<td>{{ $jadwalmagang->profil->instansi->nama_instansi }}</td>
						</tr>
						<tr>
							<th>Alamat </th>
							<td>{{ $jadwalmagang->profil->instansi->alamat }}</td>
						</tr>
						<tr>
							<th>No Telepon</th>
							<td>{{ $jadwalmagang->profil->instansi->no_telp }}</td>
						</tr>
					</table>
 				</div>
		</div>
		<div class="panel panel-danger">
		  	<div class="panel-heading">Data Bagian Magang dan Jadwal Magang</div>
		  	<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<th>Bagian Magang</th>
						<td>{{ $jadwalmagang->bagian_magang->nama_bagian }}</td>
					</tr>
					<tr>
						<th>Lama Waktu </th>
						<td>{{ $jadwalmagang->tanggal_mulai->diffInDays($jadwalmagang->tanggal_selesai) }} Hari</td>
					</tr>
					<tr>
						<th>Tanggal Mulai s/d Selesai</th>
		            <td>{{ $jadwalmagang->tanggal_selesai->format('d-m-Y') }} sampai {{ $jadwalmagang->tanggal_mulai->format('d-m-Y') }}</td>
					</tr>
				</table>
 			</div>
		</div>
@endsection
