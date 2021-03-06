<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<body onLoad="window.print()">
<div class="container">
	<div class="row">
<hr>

		<h3>Detail Profil Magang {{ $profil->nama }}</h3>
				<div class="panel panel-danger">
			  		<div class="panel-heading">Data Profil</div>
			  		<div class="panel-body">
						<table class="table table-striped">
							<tr>
								<th>No Identitas</th>
								<td>{{ $profil->no_identitas }}</td>
							</tr>
							<tr>
								<th>Nama</th>
								<td>{{ $profil->nama }}</td>
							</tr>
							<tr>
								<th>Tanggal Lahir</th>
								<td>{{ $profil->tanggal_lahir->format('d-m-Y') }}</td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td><?php if($profil->jenis_kelamin =='L')
								{
						            echo "Laki-Laki";
						        }elseif($profil->jenis_kelamin =='P')
						        {
						            echo "Perempuan";
						        }
						        ?>
						        </td>
							</tr>
							<tr>
								<th>Status</th>
								<td>
								<?php if($profil->status =='M')
								{
					               echo "Mahasiswa";
					            }elseif($profil->status =='S')
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
								<td>{{ $profil->jurusan->nama_jurusan }}</td>
							</tr>
							<tr>
								<th>Instansi</th>
								<td>{{ $profil->instansi->nama_instansi }}</td>
							</tr>
							<tr>
								<th>Alamat </th>
								<td>{{ $profil->instansi->alamat }}</td>
							</tr>
							<tr>
								<th>No Telepon</th>
								<td>{{ $profil->instansi->no_telp }}</td>
							</tr>
						</table>
				 </div>
				</div>
	</div>
</div>
</body>	