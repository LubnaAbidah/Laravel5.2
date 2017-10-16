@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include ('_partial.flash_message')
    <div class="panel panel-danger">
    <div class="panel-heading">Nilai</div>
      <div class="panel-body">
          @if (Auth::check() && Auth::user()->level == 'admin') 
            <div class="box-button">
              <div class="row">
                <div class="col-md-2"> 
                    {{ link_to('nilai/create', '', ['class' => 'btn btn-success btn-sm glyphicon glyphicon-plus', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'TAMBAH']) }}
                </div>
          {!! Form::open(['url' => '/nilai/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
                  <div class="col-md-8"> 
                    <div class="input-group">
                      {!! Form::select('id', $list_instansi, (! empty($id_instansi) ? $id_instansi : null), ['id' => 'id_instansi', 'class' => 'form-control', 'placeholder' => '-Instansi-']) !!}            
                      <span class="input-group-btn">
                        {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
                      </span>
                    </div>
                  </div>
                  <a href="{{URL::to('nilai')}}" class='btn btn-default'><span class='glyphicon glyphicon-refresh'></span> Bersihkan</a>      
          {!! Form::close() !!}
              </div>
          @endif
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
                    <th>Nilai Absen</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai Tanggungjawab</th>
                    <th>Nilai Akhir</th>
                    <th>Rekomendasi</th>
                    @if (Auth::check() && Auth::user()->level == 'admin') 
                      <th>Aksi</th>
                    @endif
                  </tr>
                </thead>

                <tbody id ="nilai_list">
                <?php foreach ($nilai_list as $row): ?>
                  <tr>
                    <td>{{ $row->jadwalmagang->profil->instansi->nama_instansi }}</td>
                    <td><a href="{{ url('nilai/'. $row->id_nilai) }}">{{ $row->jadwalmagang->profil->nama }}</a></td>
                    <td>{{ $row->jadwalmagang->nilai->nilai_absen }}</td>
                    <td>{{ $row->jadwalmagang->nilai->nilai_tugas }}</td>
                    <td>{{ $row->jadwalmagang->nilai->nilai_kejujuran }}</td>
                    <td>{{ ($row->jadwalmagang->nilai->nilai_absen+$row->jadwalmagang->nilai->nilai_tugas+$row->jadwalmagang->nilai->nilai_kejujuran)/3 }}</td>
                    <td> @if (($row->jadwalmagang->nilai->nilai_absen+$row->jadwalmagang->nilai->nilai_tugas+$row->jadwalmagang->nilai->nilai_kejujuran)/3 >= 90)
                    Terekomendasi
                    @else
                     Tidak Terekomendasi
                     @endif</td>
                   @if (Auth::check() && Auth::user()->level == 'admin') 
                    <td>
                     <div class="box-button">
                      {{ link_to('nilai/'. $row->id_nilai, '', ['class' => 'btn btn-primary btn-sm glyphicon glyphicon-th-list', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'DETAIL']) }}
                      {{ link_to('nilai/'. $row->id_nilai . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
                      {{ link_to('nilai/'. $row->id_nilai . '/delete', '', ['class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'HAPUS']) }}
                     </div>
                    </td>
                    @endif
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
