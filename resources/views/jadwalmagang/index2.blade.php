<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<body onLoad="window.print()">
  <div class="container">
  <div class="row">
    <hr>
      <h4>Jadwal Magang</h4>
        <br>
          <div class="col-md-12 table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Instansi</th>
                  <th>Nama</th>
                  <th>Bagian Magang</th>
                  <th>Lama Waktu</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                </tr>
              </thead>
              <tbody>
            <?php foreach ($jadwalmagang_list as $instansi): ?>
              <tr>
                <td>{{ $instansi->profil->instansi->nama_instansi }}</td>
                <td>{{ $instansi->profil->nama }}</td>
                <td>{{ $instansi->bagian_magang->nama_bagian }}</td>
                <td>{{ $instansi->tanggal_mulai->diffInDays($instansi->tanggal_selesai) }} Hari</td>
                <td>{{ $instansi->tanggal_mulai->format('d-m-Y') }}</td>
                <td>{{ $instansi->tanggal_selesai->format('d-m-Y') }}</td>
              </tr>
         <?php endforeach ?>
          </div> 
              </tbody>
            </table>
          </div>
  </div>
  </div>
</body>