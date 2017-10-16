@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include ('_partial.flash_message')
    <div class="panel panel-danger">
      <div class="panel-heading">Jurusan</div>
      <div class="panel-body">
        <div class="box-button">
            {{ link_to('/jurusan/create', '', ['class' => 'btn btn-success btn-sm glyphicon glyphicon-plus','data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'TAMBAH']) }}
        </div>         
        <br>
          <div class="col-md-12 table-responsive">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($list_jurusan as $jurusan): ?>
                <tr>
                  <td>{{ $jurusan->nama_jurusan }}</td>
                  <td>
                      <div class="box-button">
                         {{ link_to('jurusan/'. $jurusan->id . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit','data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
                         {{ link_to('jurusan/'. $jurusan->id . '/delete', '', ['class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash','data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'HAPUS']) }}
                      </div>
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
@endsection
