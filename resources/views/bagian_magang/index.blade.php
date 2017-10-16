@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include ('_partial.flash_message')
    <div class="panel panel-danger">
      <div class="panel-heading">Bagian Magang
      </div>
        <div class="panel-body">
          <div class="box-button">
            {{ link_to('/bagian/create', '', ['class' => 'btn btn-success btn-sm glyphicon glyphicon-plus' , 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'TAMBAH']) }}
          </div>   
            <br>
                <div class="col-md-12 table-responsive">
                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bagian Magang</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($list_bagian as $bagian): ?>
                        <tr>
                          <td>{{ $bagian->nama_bagian }}</td>
                          <td>
                              <div class="box-button">
                                {{ link_to('bagian/'. $bagian->id . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit' ,'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
                                {{ link_to('bagian/'. $bagian->id . '/delete', '', ['class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash' ,'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'HAPUS']) }}
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
