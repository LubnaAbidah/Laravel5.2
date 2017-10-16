@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (Auth::check())
            <div class="panel panel-danger">
                <div class="panel-heading">Selamat datang {{ Auth::user()->name }} </div>
                <div class="panel-body">
                    Selamat datang di Aplikasi Pendataan Magang PT Neuronworks Indonesia<br>
                    Anda login sebagai <b> {{ Auth::user()->level }} </b>.
                    @if (Auth::user()->level == 'admin')
                        Anda dapat mengelola seluruh pendataan magang.<hr>
                    @else
                        Anda dapat melihat data magang, mengelola tugas magang Anda dan pengaturan akun Anda.<hr>
                    @endif
                <div class="row">
                <section class="col-md-12">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-left">
                      <li class="pull-left header active"><i class="fa fa-inbox"></i> Grafik Magang</li>
                    </ul>
                  </div>
                </section> 
                </div> 
                <div class="col-md-8">
                        <div id="grafik"style="position: relative; height: 300px;"></div>
                </div>
                    <div class="col-md-4">
                        <div class="box-body no-padding">
                            <div class="box box-solid bg-blue-gradient">
                                <div class="box-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="box-title"><i class="fa fa-calendar"></i> Calendar</h3>
                                    <div class="pull-right box-tools">
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                    <div id="calendar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
           @endif

             @if (Auth::guest())
            <div class="panel panel-danger">
                <div class="panel-heading">Selamat datang</div>

                <div class="panel-body">
                   Selamat datang di Aplikasi Pendataan Magang PT Neuronworks Indonesia<br>
                   Anda sebagai <b>Tamu</b>. Silahkan melakukan pendaftaran. Untuk melakukan pendaftaran klik menu Register.<br>
                   Jika Anda sudah memiliki akun, silahkan melakukan login gunakan menu Login.<hr>
                <div class="row">
                <section class="col-md-12">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-left">
                      <li class="pull-left header active"><i class="fa fa-inbox"></i> Grafik Magang</li>
                    </ul>
                  </div>
                </section> 
                </div> 
                <div class="col-md-8">
                        <div id="grafik"style="position: relative; height: 300px;"></div>
                </div>
                    <div class="col-md-4">
                        <div class="box-body no-padding">
                            <div class="box box-solid bg-blue-gradient">
                                <div class="box-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="box-title"><i class="fa fa-calendar"></i> Calendar</h3>
                                    <div class="pull-right box-tools">
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                    <div id="calendar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
