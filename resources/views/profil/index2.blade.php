<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<body onLoad="window.print()">
<div class="container">
	<div class="row">
		<br>
		  <h4>Laporan Data Magang </h4>
		<hr>
		<br>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Instansi</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profil_list as $profil): ?>
                <tr>
                  <td>{{ $profil->instansi->nama_instansi }}</td>
                  <td>{{ $profil->nama }}</td>
                  <td>{{ $profil->jurusan->nama_jurusan }}</td>
                  <td>{{ $profil->tanggal_lahir->format('d-m-Y') }}</td>
                  <td><?php if($profil->jenis_kelamin =='L')
                    {
                      echo "Laki-Laki";
                    }elseif($profil->jenis_kelamin =='P'){
                      echo "Perempuan";
                    }
                    ?>
                 </td>
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
               <?php endforeach ?>
            </tbody>
        </table>
  </div>
</div>
</body>