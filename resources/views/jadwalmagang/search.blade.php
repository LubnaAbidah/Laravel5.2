@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-danger">
      <div class="panel-heading">Laporan Per Periode Jadwal Magang
      </div>
        <div class="panel-body">
          <div class="box-button">
            <div class="row">
            {!! Form::open(['url' => '/laporan/search', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
                    <div class="col-md-5"> 
                      <div class='form-group'>
                          Masukkan Tanggal Awal
                        <div class='input-group date'>
                          <input class='form-control' type='date' name='fromDate' id='fromDate'>
                        <span class='input-group-addon'>
                          <span class='glyphicon glyphicon-calendar'></span>
                          </span>
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-5">   
                      <div class='form-group'>
                          Masukkan Tanggal Akhir
                        <div class='input-group date'>
                          <input class='form-control' type='date' name='toDate' id='toDate'>
                        <span class='input-group-addon'>
                          <span class='glyphicon glyphicon-calendar'></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  <div class="col-md-2"> 
                    <br>
                     {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
                    <a href="{{URL::to('laporan')}}" class='btn btn-default'><span class='glyphicon glyphicon-refresh'></span> Bersihkan</a>
                  </div>
            {!! Form::close() !!}
            </div>
          </div>
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
                      <td>{{ $instansi->profil->nama }} </td>
                      <td>{{ $instansi->bagian_magang->nama_bagian }}</td>
                      <td>{{ $instansi->tanggal_mulai->diffInDays($instansi->tanggal_selesai) }} Hari</td>
                      <td>{{ $instansi->tanggal_mulai->format('d-m-Y') }}</td>
                      <td>{{ $instansi->tanggal_selesai->format('d-m-Y') }}</td>
                    </tr>  
                <?php endforeach ?> 
                      </tbody>
                </table>
              </div>
              </div>
        </div>
    </div>
  </div>
</div>
@endsection

           