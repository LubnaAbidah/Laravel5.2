@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include ('_partial.flash_message')
    <div class="panel panel-danger">
      <div class="panel-heading">Tugas Magang</div>
        <div class="panel-body">     
            <div class="box-button">
              <div class="row">
                <div class="col-md-2"> 
              @if (Auth::check() && Auth::user()->level == 'admin') 
              <br>
                    {{ link_to('/tugas/create', '', ['class' => 'btn btn-success btn-sm glyphicon glyphicon-plus', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'TAMBAH']) }}
              @endif
                  </div>
            {!! Form::open(['url' => '/tugas/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
                    <div class="col-md-4"> 
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
                    <div class="col-md-4">   
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
                    <a href="{{URL::to('tugas')}}" class='btn btn-default'><span class='glyphicon glyphicon-refresh'></span> Bersihkan</a>
                  </div>
            {!! Form::close() !!}
          </div>
            </div>
          <div class="col-md-12 table-responsive">
              <table id="example1" class="table table-bordered table-striped">
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
                 {{ link_to('tugas/'. $tugas->id, '', ['class' => 'btn btn-primary btn-sm glyphicon glyphicon-th-list', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'DETAIL']) }}
                 {{ link_to('tugas/'. $tugas->id . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
                  @if (Auth::check() && Auth::user()->level == 'admin') 
                    {{ link_to('tugas/'. $tugas->id . '/delete', '', ['class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'HAPUS']) }}
                  @endif
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
