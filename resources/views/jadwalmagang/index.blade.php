@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include ('_partial.flash_message')
    <div class="panel panel-danger">
      <div class="panel-heading">Jadwal Magang
      </div>
        <div class="panel-body">
          <div class="box-button">
            <div class="row">
              <div class="col-md-2"> 
            @if (Auth::check() && Auth::user()->level == 'admin') 
                  {{ link_to('/jadwalmagang/create', '', ['class' => 'btn btn-success btn-sm glyphicon glyphicon-plus', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'TAMBAH']) }}
              </div>
          {!! Form::open(['url' => '/jadwalmagang/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
                  <div class="col-md-8"> 
                    <div class="input-group">
                      {!! Form::select('id_bagian_magang', $list_bagian, (! empty($id_bagian_magang) ? $id_bagian_magang : null), ['id' => 'id_bagian_magang', 'class' => 'form-control', 'placeholder' => '-Bagian Magang-']) !!}            
                      <span class="input-group-btn">
                        {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
                      </span>
                    </div>
                  </div>
                  <a href="{{URL::to('jadwalmagang')}}" class='btn btn-default'><span class='glyphicon glyphicon-refresh'></span> Bersihkan</a>      
          {!! Form::close() !!}
           @endif
            </div>
          </div>
          <br>
              <div class="col-md-12 table-responsive">
                @if (Auth::check() && Auth::user()->level == 'admin') 
                <table id="example1" class="table table-bordered table-striped">
                @else
                <table id="example3" class="table table-bordered table-striped">
                @endif
                      <thead>
                        <tr>
                          <th>Instansi</th>
                          <th>Nama</th>
                          <th>Bagian Magang</th>
                          <th>Lama Waktu</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
                          
                            @if (Auth::check() && Auth::user()->level == 'admin') 
                              <th>Aksi</th>
                            @endif
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

                    @if (Auth::check() && Auth::user()->level == 'admin') 
                       <td>  
                        <div class="box-button">
                           {{ link_to('jadwalmagang/'. $instansi->id, '', ['class' => 'btn btn-primary btn-sm glyphicon glyphicon-th-list', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'DETAIL']) }}
                           {{ link_to('jadwalmagang/'. $instansi->id . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
                      </td>
                    </tr>
                    @endif    
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

           