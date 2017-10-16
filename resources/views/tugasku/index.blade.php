@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include ('_partial.flash_message')
    <div class="panel panel-danger">
      <div class="panel-heading">Tugas Magang</div>
        <div class="panel-body">     
          <div class="col-md-12 table-responsive">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Tugas</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Tugas</th>
                    <th>Satus</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
              <?php foreach ($tugasmagang_list as $tugas): ?>
                 <tr>
                  <td>{{ $tugas->user->name }}</td>
                  <td>{{ $tugas->tugas }}</td>
                  <td>{{ $tugas->deskripsi }}</td>
                  <td>{{ $tugas->tanggal_tugas->format('d-m-Y') }}</td>
                  <td><?php if( $tugas->status =='B')
                    {
                      echo "Mulai";
                    }elseif($tugas->status =='S')
                    {
                      echo "Selesai";
                    }
                    ?>
                    </td>
                  <td>
                     <div class="box-button">
                 {{ link_to('tugasku/'. $tugas->id, '', ['class' => 'btn btn-primary btn-sm glyphicon glyphicon-th-list', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'DETAIL']) }}
                 {{ link_to('tugasku/'. $tugas->id . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
                  </td>
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
