@extends('template')

@section('content')
{{ link_to('nilai/'. $row->id_nilai . '/print', '', ['class' => 'btnPrint btn btn-primary btn-sm glyphicon glyphicon-print','data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'CETAK']) }}
{{ link_to('nilai/', 'Kembali', ['class' => 'btn btn-danger btn-sm']) }}
	<h3>Detail Nilai dan Profil Magang {{ $row->jadwalmagang->nama }}</h3>
		<div class="panel panel-danger">
		  	<div class="panel-heading">Data Profil</div>
		  	<div class="panel-body">
					<table class="table table-striped">
					<tr>
						<th>No Identitas</th>
						<td>{{ $row->jadwalmagang->profil->no_identitas }}</td>
					</tr>
					<tr>
						<th>Nama</th>
						<td>{{ $row->jadwalmagang->profil->nama }}</td>
					</tr>
					<tr>
						<th>Tanggal Lahir</th>
						<td>{{ $row->jadwalmagang->profil->tanggal_lahir->format('d-m-Y') }}</td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td><?php if($row->jadwalmagang->profil->jenis_kelamin =='L')
							{
				             	echo "Laki-Laki";
				           	}elseif($row->jadwalmagang->profil->jenis_kelamin =='P'){
				           	 	echo "Perempuan";
				          	}
				            ?>
				        </td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
						<?php if($row->jadwalmagang->profil->status =='M')
							{
				               echo "Mahasiswa";
				            }elseif($row->jadwalmagang->profil->status =='S')
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
		  	<div class="panel-heading">Data Nilai</div>
		  		<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>Nilai Absen</th>
							<td>{{ $row->nilai_absen }}</td>
						</tr>
						<tr>
							<th>Nilai Tugas</th>
							<td>{{ $row->nilai_tugas}}</td>
						</tr>
						<tr>
							<th>Nilai Tanggungjawab</th>
							<td>{{ $row->nilai_kejujuran }}</td>
						</tr>
						<tr>
							<th>Nilai Akhir</th>
							<td>{{ ($row->nilai_absen+$row->nilai_tugas+$row->nilai_kejujuran)/3 }}</td>
						</tr>
						<tr>
							<th>Rekomendasi</th>
							<td>@if (($row->nilai_absen+$row->nilai_tugas+$row->nilai_kejujuran)/3 >= 90))
                    Terekomendasi
                    @else
                     Tidak Terekomendasi
                     @endif</td>
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
							<td>{{ $row->jadwalmagang->profil->jurusan->nama_jurusan }}</td>
						</tr>
						<tr>
							<th>Instansi</th>
							<td>{{ $row->jadwalmagang->profil->instansi->nama_instansi }}</td>
						</tr>
						<tr>
							<th>Alamat </th>
							<td>{{ $row->jadwalmagang->profil->instansi->alamat }}</td>
						</tr>
						<tr>
							<th>No Telepon</th>
							<td>{{ $row->jadwalmagang->profil->instansi->no_telp }}</td>
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
						<td>{{ $row->jadwalmagang->bagian_magang->nama_bagian }}</td>
					</tr>
					<tr>
						<th>Lama Waktu </th>
						<td>{{ $row->jadwalmagang->tanggal_mulai->diffInDays($row->jadwalmagang->tanggal_selesai) }} Hari</td>
					</tr>
					<tr>
						<th>Tanggal Mulai s/d Selesai</th>
		            <td>{{ $row->jadwalmagang->tanggal_selesai->format('d-m-Y') }} sampai {{ $row->jadwalmagang->tanggal_mulai->format('d-m-Y') }}</td>
					</tr>
				</table>
 			</div>
		</div>
@endsection
