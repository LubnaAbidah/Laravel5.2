@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-danger">
            <div class="panel-heading">Grafik Magang 
            </div>
                <div class="row">
                <section class="col-md-12">
                  <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                      <li class="active"><a href="#grafikx" data-toggle="tab">Bagian Magang</a></li>
                      <li><a href="#grafik2" data-toggle="tab">Jenis Kelamin</a></li>
                      <li><a href="#grafik3" data-toggle="tab">Jurusan</a></li>
                      <li><a href="#grafik4" data-toggle="tab">Instansi</a></li>
                      <li class="pull-left header"><i class="fa fa-inbox"></i> Grafik Magang</li>
                    </ul>
                    <div class="tab-content">
                      <!-- Morris chart  -->
                      <div class="chart tab-pane active" id="grafikx"style="position: relative; width: 1050px;"></div>
                      <div class="chart tab-pane" id="grafik2"style="position: relative; width: 1050px;"></div>
                      <div class="chart tab-pane" id="grafik3"style="position: relative; width: 1050px;"></div>
                      <div class="chart tab-pane" id="grafik4"style="position: relative; width: 1050px;"></div>
                    </div>
                  </div>
                </section>
                </div> 
        </div>
    </div>
</div>

<script type="text/javascript">
//grafik bagian magang
$(function () {
    $('#grafikx').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Data Jadwal Magang'
        },
        subtitle: {
            text: 'Berdasarkan Bagian Magang'
        },
        xAxis: {
            categories: 
            [
                <?php $users = DB::table('bagian_magang')
                    ->select('bagian_magang.*', 'bagian_magang.nama_bagian')
                    ->groupBy('bagian_magang.id')
                    ->get();
                foreach ($users as $user) 
                    { ?>
                '<?php echo $user->nama_bagian;  ?>',
                 <?php } ?> 
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
        series: [{
            name: 'Jumlah',
            data:   [
                <?php $jum =  DB::table('bagian_magang')
                    ->leftjoin('jadwal_magang', 'bagian_magang.id', '=', 'jadwal_magang.id_bagian_magang')
                    ->select('bagian_magang.id', DB::raw('count(id_bagian_magang) as count'))
                    ->groupBy('bagian_magang.id')
                    ->get();
                    foreach ($jum as $sum)  
                        echo  $sum->count.", "; 
                ?>  
                    ]
             }]
    });
});

//jenis kelamin
$(function () {
    $('#grafik2').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Data Jumlah Profil Magang'
        },
        subtitle: {
            text: 'Berdasarkan Jenis Kelamin'
        },
        xAxis: {
            categories: [
        'Laki-laki',
        'Perempuan',
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
        series: [{
            name: 'Jumlah',
            data: [
                        {{ $profil = DB::table('profil')->where('jenis_kelamin', "=", 'L')->count() }},
                        {{ $profil = DB::table('profil')->where('jenis_kelamin', "=", 'P')->count() }},  
                    ]
                }]
    });
});

//jurusan
$(function () {
    $('#grafik3').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Data Jumlah Profil Magang'
        },
        subtitle: {
            text: 'Berdasarkan Jurusan'
        },
        xAxis: {
            categories: 
            [
                <?php $jurusan = DB::table('jurusan')
                ->select('jurusan.*', 'jurusan.nama_jurusan')
                ->groupBy('jurusan.id')->get();
                foreach ($jurusan as $jur) 
                    { ?>
                   '<?php echo $jur->nama_jurusan;  ?>',
                    <?php } ?> 
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
        series: [{
            name: 'Jumlah',
            data:   [
                        <?php $jurusan1 =  DB::table('jurusan')
                        ->leftjoin('profil', 'jurusan.id', '=', 'profil.id_jurusan')
                        ->select('jurusan.id', 
                        DB::raw('count(id_jurusan) as count'))
                        ->groupBy('jurusan.id')
                        ->get();
                        foreach ($jurusan1 as $sum)  
                           echo  $sum->count.", ";
                     ?>   
                    ]
                }]
    });
});

//perguruan tinggi / instansi
$(function () {
    $('#grafik4').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Data Jumlah Profil Magang'
        },
        subtitle: {
            text: 'Berdasarkan Instansi'
        },
        xAxis: {
            categories: 
            [
                <?php $univs = DB::table('instansi')
                ->select('instansi.*', 'instansi.nama_instansi')
                ->groupBy('instansi.id')->get();
                    foreach ($univs as $univ) 
                        { ?>
                   '<?php echo $univ->nama_instansi;  ?>',
                        <?php } ?> 
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
        series: [{
            name: 'Jumlah',
            data:   [
                         <?php $univs2 =  DB::table('instansi')
                        ->leftjoin('profil', 'instansi.id', '=', 'profil.id_instansi')
                        ->select('instansi.id', 
                        DB::raw('count(id_instansi) as count'))->groupBy('instansi.id')
                        ->get();
                             foreach ($univs2 as $univ2)  
                           echo  $univ2->count.", ";
                         ?>   
                    ]
                }]
    });
});

</script>
@endsection