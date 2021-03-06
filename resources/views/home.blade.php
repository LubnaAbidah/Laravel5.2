@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include ('_partial.flash_message')
    <div class="panel panel-danger">
      <div class="panel-heading">Pengguna</div>
        <div class="panel-body">
          {{ link_to('/pengguna/create', '', ['class' => 'btn btn-success btn-sm glyphicon glyphicon-plus', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'TAMBAH']) }}
          <div class="col-md-12 table-responsive">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Hak Akses</th>
                    <th>Tanggal Dibuat</th>
                    <th>Terakhir Diedit</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
              
              <?php foreach ($list_pengguna as $pengguna): ?>
                 <tr>
                  <td>{{ $pengguna->name }}</td>
                  <td>{{ $pengguna->email }}</td>
                  <td>{{ $pengguna->level }}</td>
                  <td>{{ $pengguna->created_at }}</td>
                  <td>{{ $pengguna->updated_at }}</td>
                  <td>
                     <div class="box-button">
                 {{ link_to('pengguna/'. $pengguna->id . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit','data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
                 {{ link_to('pengguna/'. $pengguna->id . '/delete', '', ['class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash','data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'HAPUS']) }}
                  </td>
                    </div>
                </tr>
              <?php endforeach ?>

                </tbody>
              </table>

          </div>
        </div>
      
    </div>
  </div>
</div>
@endsection
