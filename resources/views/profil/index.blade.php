@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @include ('_partial.flash_message')
    <div class="panel panel-danger">
    <div class="panel-heading">Profil</div>
      <div class="panel-body">
          @if (Auth::check() && Auth::user()->level == 'admin') 
            <div class="box-button">
              <div class="row">
                <div class="col-md-2"> 
                    {{ link_to('profil/create', '', ['class' => 'btn btn-success btn-sm glyphicon glyphicon-plus', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'TAMBAH']) }}
                </div>
          {!! Form::open(['url' => '/profil/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
                  <div class="col-md-8"> 
                    <div class="input-group">
                        {!! Form::select('status', ['U' => 'Umum', 'M' => 'Mahasiswa', 'S' => 'Siswa'], (! empty($status) ? $status : null), ['id' => 'status', 'class' => 'form-control', 'placeholder' => '-Status-']) !!}
                      <span class="input-group-btn">
                        {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
                      </span>
                    </div>
                  </div>
                  <a href="{{URL::to('profil')}}" class='btn btn-default'><span class='glyphicon glyphicon-refresh'></span> Bersihkan</a>
                </div>
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
                    <th>Jurusan</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    @if (Auth::check() && Auth::user()->level == 'admin') 
                      <th>Aksi</th>
                    @endif
                  </tr>
                </thead>

                <tbody id ="profil_list">
                <?php foreach ($profil_list as $profil): ?>
                  <tr>
                    <td>{{ $profil->instansi->nama_instansi }}</td>
                    <td>{{ $profil->nama }}</td>
                    <td>{{ $profil->jurusan->nama_jurusan }}</td>
                    <td>{{ $profil->tanggal_lahir->format('d-m-Y') }}</td>
                    <td>
                    <?php if($profil->jenis_kelamin =='L')
                    {
                      echo "Laki-Laki";
                    }elseif($profil->jenis_kelamin =='P')
                    {
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
                   @if (Auth::check() && Auth::user()->level == 'admin') 
                    <td>
                     <div class="box-button">
                      {{ link_to('profil/'. $profil->id, '', ['class' => 'btn btn-primary btn-sm glyphicon glyphicon-th-list', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'DETAIL']) }}
                      {{ link_to('profil/'. $profil->id . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
                      {{ link_to('profil/'. $profil->id . '/delete', '', ['class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'HAPUS']) }}
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
