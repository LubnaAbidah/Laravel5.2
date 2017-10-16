<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MagangApp Neuron</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Ajax -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Ionicons -->
    <link  href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css')}}" rel="stylesheet" >
    <!-- DataTables -->
    <link  href="{{ asset('../bootstrap/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" >
    <link  href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"  rel="stylesheet" >
    
    <!-- Theme style -->
    <link  href="{{ asset('../bootstrap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link  href="{{ asset('../bootstrap/dist/css/AdminLTE.min.css')}}" rel="stylesheet" >
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link  href="{{ asset('../bootstrap/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" >
    <style>
        body 
        {
            font-family: 'Lato';
        }
        .fa-btn 
        {
            margin-right: 6px;
        }
        #footer 
        {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
            font-size: 0.9em;
            height: 50px; /* Tinggi footer */
            text-align: center;
            padding-top: 20px;
        }
    </style>
    <link rel="icon" type="image/png" href="../../bootstrap/img/mne.png">
</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <div class="navbar-header">
                  <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="../../bootstrap/img/logo.png">
                  </a>
                </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
           <!-- Left Side Of Navbar -->
           @if (Auth::user())
            <ul class="nav navbar-nav">

                @if (Auth::user()->level == 'admin')
                    @if (!empty($halaman) && $halaman == 'DataMaster')
                    <li class="dropdown active">
                     @else
                     <li class="dropdown">
                     @endif
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book"></span> Data Master <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('/instansi') }}"><span class="glyphicon glyphicon-asterisk"></span> Instansi</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="{{ url('/jurusan') }}"><span class="glyphicon glyphicon-asterisk"></span> Jurusan</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="{{ url('/bagian') }}"><span class="glyphicon glyphicon-asterisk"></span> Bagian Magang</a></li>
                        </ul>
                    </li>
                @else
                @endif
                @if (!empty($halaman) && $halaman == 'DataMagang')
                    <li class="dropdown active">
                @else
                    <li class="dropdown">
                @endif
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file"></span> Data Magang <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('/profil') }}"><span class="glyphicon glyphicon-asterisk"></span> Profil Magang</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="{{ url('/jadwalmagang') }}"><span class="glyphicon glyphicon-asterisk"></span> Jadwal Magang</a></li>
                          @if (Auth::user()->level == 'admin') 
                          <li role="separator" class="divider"></li>
                          <li><a href="{{ url('/nilai') }}"><span class="glyphicon glyphicon-asterisk"></span> Nilai Magang</a></li>
                          @endif
                        </ul>
                    </li>
                @if (Auth::user()->level == 'admin')
                    @if (!empty($halaman) && $halaman == 'Laporan')
                        <li class="dropdown active">
                    @else
                        <li class="dropdown">
                    @endif
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Laporan <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('/grafik') }}"><span class="glyphicon glyphicon-asterisk"></span> Laporan Grafik</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="{{ url('/laporan') }}"><span class="glyphicon glyphicon-asterisk"></span> Laporan Jadwal Magang</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#"><span class="glyphicon glyphicon-asterisk"></span> Laporan Nilai Magang</a></li>
                        </ul>
                    </li>
                @else
                @endif
                @if (Auth::user()->level == 'admin')
                    @if (!empty($halaman) && $halaman == 'TugasMagang')
                        <li class="active"><a href="{{ url('/tugas') }}"><span class="glyphicon glyphicon-tasks"></span> Tugas</a></li>
                    @else
                        <li><a href="{{ url('/tugas') }}"><span class="glyphicon glyphicon-tasks"></span> Tugas</a></li>
                    @endif
                @else
                    @if (!empty($halaman) && $halaman == 'TugasKu')
                        <li class="active"><a href="{{ url('/tugasku') }}"><span class="glyphicon glyphicon-tasks"></span> Tugasku</a></li>
                    @else
                        <li><a href="{{ url('/tugasku') }}"><span class="glyphicon glyphicon-tasks"></span> Tugasku</a></li>
                    @endif
                @endif
                @if (Auth::user()->level == 'admin')
                    @if (!empty($halaman) && $halaman == 'Pengguna')
                        <li class="active"><a href="{{ url('/pengguna') }}"><span class="glyphicon glyphicon-user"></span> Pengguna</a></li>
                    @else
                        <li><a href="{{ url('/pengguna') }}"><span class="glyphicon glyphicon-user"></span> Pengguna</a></li>
                    @endif
                @else
                    @if (!empty($halaman) && $halaman == 'Akun')
                        <li class="active"><a href="{{ url('/profilku') }}"><span class="glyphicon glyphicon-user"></span> Pengaturan Akun</a></li>
                    @else
                        <li><a href="{{ url('/profilku') }}"><span class="glyphicon glyphicon-user"></span> Pengaturan Akun</a></li>
                    @endif
                @endif
            </ul>
            @else
            <ul class="nav navbar-nav navbar-left">
              <li><a href="{{ url('/tentang') }}">Tentang Aplikasi</a></li>  
            </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                       <li class="dropdown user user-menu active">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">
                                    <span> {{ date('d/m/Y') }}
                                          <span id="jam"></span>:
                                          <span id="menit"></span>:
                                          <span id="detik"></span>
                                    </span>
                                 </span>
                              </a>
                        </li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                     
                    @else
                        <li class="dropdown user user-menu active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <span class="hidden-xs">
                                 <span > {{ date('d/m/Y') }}
                                        <span id="jam"></span>:
                                        <span id="menit"></span>:
                                        <span id="detik"></span>
                                  </span>
                               </span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                 <li><a href="{{ url('/profilku') }}"><i class="fa fa-btn fa-editt"></i>Pengaturan</a></li>
                            </ul>
                        </li>
                    @endif
            </ul>
        </div>
        </div>
    </nav>

    @yield('content')

        <div id="footer">
            <p>&copy; {{ date('Y') }} MagangAppNeuron.dev</p>
        </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ asset('../bootstrap/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('../bootstrap/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('../bootstrap/dist/js/demo.js')}}"></script>
    <script src="{{ asset('../bootstrap/js/high.js')}}"></script>
    <script src="{{ asset('../bootstrap/js/export.js')}}"></script>
    <script src="{{ asset('../bootstrap/js/print.js')}}"></script>
    <script src="{{ asset('../bootstrap/js/laravel.js')}}"></script>
    <script src="{{ asset('../bootstrap/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
    //datatable 
    $(function () 
      {
        $("#example1").DataTable( {
        "pageLength": 5,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
            "language" : {
            "search" : "Kata Kunci",
            "lengthMenu" : "Tampilkan _MENU_ baris",
            "zeroRecords" : "Maaf data tidak ada",
            "info" : "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty" : "Tidak ada data",
            "infoFiltered" : "Pencarian dari _MAX_ data",
        }
        } );
        
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        $("#example3").DataTable({
             "language" : {
            "search" : "Kata Kunci",
            "lengthMenu" : "Tampilkan _MENU_ baris",
            "zeroRecords" : "Maaf data tidak ada",
            "info" : "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty" : "Tidak ada data",
            "infoFiltered" : "Pencarian dari _MAX_ data",
        }
        });
      });
    
   
    //waktu
    window.setTimeout("waktu()",1000); 
    function waktu() 
    { 
            var tanggal = new Date(); 
            setTimeout("waktu()",1000); 
            document.getElementById("jam").innerHTML = tanggal.getHours(); 
            document.getElementById("menit").innerHTML = tanggal.getMinutes();
            document.getElementById("detik").innerHTML = tanggal.getSeconds();
    } 
    //print tanpa POST ke halaman lain
      $(document).ready(function() {
        $(".btnPrint").printPage();
      });
    //The Calender
    $(function () 
      {  
        $("#calendar").datepicker();
      });

    //Chart
    $(function () 
    {

        $('#grafik').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'DATA JUMLAH MAGANG'
            },
            subtitle: {
                text: 'BERDASARKAN KATEGORI'
            },
            xAxis: {
                categories: [
              'Mahasiswa',
              'Siswa',
              'Umum',
                ],
                title: {
                    text: 'Kategori'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' ORANG'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'horizontal',
                align: 'left',
                verticalAlign: 'bottom',
                x: 50,
                y: 10,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: 
            [{
                name: 'Jumlah',
                data: 
                [
                  {{ $profil = DB::table('profil')->where('status', '=', 'M')->count() }},
                  {{ $profil = DB::table('profil')->where('status', '=', 'S')->count() }},
                  {{ $profil = DB::table('profil')->where('status', '=', 'U')->count() }}, 
                ]
            }]
        });
    });
    </script>
</body>
</html>
