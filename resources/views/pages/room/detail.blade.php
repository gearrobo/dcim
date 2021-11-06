@extends('templates.layout')
@section('webtitle','Lingkungan Server')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $title }} Lingkungan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item">Room</li>
                    <li class="breadcrumb-item">Sensor {{ $title }}</li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Datables -->
<!--          -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white"><i class="fas fa-atom"></i>&nbsp; Sensor {{ $sensor->name }}</strong> </h4>
                    </div><br>
                    <div class="row ml-0 mr-0">
                        <div class="col-sm-12">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <!-- <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <span style="font-size:18px;font-weight:400"><a href="" class="text-blue">{{ $sensor->name }}</a></span>
                                </div> -->
                                <div class="container mt-2 text-center">
                                    @if ($title == "Suhu")
                                    <canvas data-type="linear-gauge" data-width="1120" data-height="150" data-units="°C" data-value="{{ $sensor->avg_sensor }}" data-title="Temperature" data-min-value="{{ $sensor->min_sensor }}" data-max-value="{{ ($sensor->max_merah)+5 }}" data-major-ticks="&#91;0,10,20,30,{{ ($sensor->max_merah)+5 }}&#93;" data-minor-ticks="5" data-stroke-ticks="true" data-ticks-width="15" data-ticks-width-minor="7.5" data-highlights='&#91; 
                                            {"from": {{ $sensor->min_sensor }}, "to": {{ $sensor->max_sensor }}, "color": "rgba(0, 0, 255, 0.75)"},
                                            {"from": {{ $sensor->treshold_min_sensor }}, "to": {{ $sensor->min_hijau }}, "color": "rgba(255, 247, 80, 1.0)"},
                                            {"from": {{ $sensor->min_hijau }}, "to": {{ $sensor->max_hijau }}, "color": "rgba(127, 255, 0, 1.0)"},
                                            {"from": {{ $sensor->max_hijau }}, "to": {{ $sensor->treshold_max_sensor }}, "color": "rgba(255, 247, 80, 1.0)"},
                                            {"from": {{ $sensor->min_merah }}, "to": {{ ($sensor->max_merah)+5 }}, "color": "rgba(210, 38, 30, 1.0)"} &#93;' data-color-major-ticks="#000000" data-color-minor-ticks="#000000" data-color-title="#000000" data-color-units="#000000" data-color-numbers="#000000" data-color-plate="#fff" data-color-plate-end="#fff" data-border-shadow-width="0" data-borders="false" data-border-radius="10" data-needle-type="arrow" data-needle-width="3" data-animation-duration="1500" data-animation-rule="linear" data-color-needle="#222" data-color-needle-end="" data-color-bar-progress="#327ac0" data-color-bar="#f5f5f5" data-bar-stroke="0" data-bar-width="8" data-bar-begin-circle="false"></canvas>
                                    @elseif ($title == "Kelembaban")
                                    <canvas data-type="linear-gauge" data-width="1120" data-height="150" data-units="%" data-value="{{ $sensor->avg_sensor }}" data-title="{{ $title }}" data-min-value="{{ $sensor->min_sensor }}" data-max-value="{{ $sensor->max_merah }}" data-major-ticks="&#91;0,10,20,30,40,50,60,70,80,90,{{ $sensor->max_merah }}&#93;" data-minor-ticks="5" data-stroke-ticks="true" data-ticks-width="15" data-ticks-width-minor="7.5" data-highlights='&#91; 
                                            {"from": {{ $sensor->min_sensor }}, "to": {{ $sensor->max_sensor }}, "color": "rgba(0, 0, 255, 0.75)"},
                                            {"from": {{ $sensor->treshold_min_sensor }}, "to": {{ $sensor->min_hijau }}, "color": "rgba(255, 247, 80, 1.0)"},
                                            {"from": {{ $sensor->min_hijau }}, "to": {{ $sensor->max_hijau }}, "color": "rgba(127, 255, 0, 1.0)"},
                                            {"from": {{ $sensor->max_hijau }}, "to": {{ $sensor->treshold_max_sensor }}, "color": "rgba(255, 247, 80, 1.0)"},
                                            {"from": {{ $sensor->min_merah }}, "to": {{ $sensor->max_merah }}, "color": "rgba(210, 38, 30, 1.0)"} &#93;' data-color-major-ticks="#000000" data-color-minor-ticks="#000000" data-color-title="#000000" data-color-units="#000000" data-color-numbers="#000000" data-color-plate="#fff" data-color-plate-end="#fff" data-border-shadow-width="0" data-borders="false" data-border-radius="10" data-needle-type="arrow" data-needle-width="3" data-animation-duration="1500" data-animation-rule="linear" data-color-needle="#222" data-color-needle-end="" data-color-bar-progress="#327ac0" data-color-bar="#f5f5f5" data-bar-stroke="0" data-bar-width="8" data-bar-begin-circle="false"></canvas>
                                    @elseif ($title == "Asap")
                                    <canvas data-type="linear-gauge" data-width="1120" data-height="150" data-units="ppm" data-value="{{ $sensor->avg_sensor }}" data-title="{{ $title }}" data-min-value="{{ $sensor->min_sensor }}" data-max-value="{{ $sensor->max_merah }}" data-major-ticks="&#91;0,100,200,300,400,500,600,700,800,900,1000,1100,{{ $sensor->max_merah }}&#93;" data-minor-ticks="10" data-stroke-ticks="true" data-ticks-width="15" data-ticks-width-minor="7.5" data-highlights='&#91; 
                                            {"from": {{ $sensor->min_sensor }}, "to": {{ $sensor->max_sensor }}, "color": "rgba(0, 0, 255, 0.75)"},
                                            {"from": {{ $sensor->treshold_min_sensor }}, "to": {{ $sensor->min_hijau }}, "color": "rgba(255, 247, 80, 1.0)"},
                                            {"from": {{ $sensor->min_hijau }}, "to": {{ $sensor->max_hijau }}, "color": "rgba(127, 255, 0, 1.0)"},
                                            {"from": {{ $sensor->max_hijau }}, "to": {{ $sensor->treshold_max_sensor }}, "color": "rgba(255, 247, 80, 1.0)"},
                                            {"from": {{ $sensor->min_merah }}, "to": {{ $sensor->max_merah }}, "color": "rgba(210, 38, 30, 1.0)"} &#93;' data-color-major-ticks="#000000" data-color-minor-ticks="#000000" data-color-title="#000000" data-color-units="#000000" data-color-numbers="#000000" data-color-plate="#fff" data-color-plate-end="#fff" data-border-shadow-width="0" data-borders="false" data-border-radius="10" data-needle-type="arrow" data-needle-width="3" data-animation-duration="1500" data-animation-rule="linear" data-color-needle="#222" data-color-needle-end="" data-color-bar-progress="#327ac0" data-color-bar="#f5f5f5" data-bar-stroke="0" data-bar-width="8" data-bar-begin-circle="false"></canvas>
                                    @elseif ($title == "Debu")
                                    <canvas data-type="linear-gauge" data-width="1120" data-height="150" data-units="ug/m" data-value="{{ $sensor->avg_sensor }}" data-title="{{ $title }}" data-min-value="{{ $sensor->min_sensor }}" data-max-value="{{ $sensor->max_merah }}" data-major-ticks="&#91;0,50,100,150,200,250,300,350,400,450,{{ $sensor->max_merah }}&#93;" data-minor-ticks="10" data-stroke-ticks="true" data-ticks-width="15" data-ticks-width-minor="7.5" data-highlights='&#91; 
                                            {"from": {{ $sensor->min_sensor }}, "to": {{ $sensor->max_sensor }}, "color": "rgba(0, 0, 255, 0.75)"},
                                            {"from": {{ $sensor->treshold_min_sensor }}, "to": {{ $sensor->min_hijau }}, "color": "rgba(255, 247, 80, 1.0)"},
                                            {"from": {{ $sensor->min_hijau }}, "to": {{ $sensor->max_hijau }}, "color": "rgba(127, 255, 0, 1.0)"},
                                            {"from": {{ $sensor->max_hijau }}, "to": {{ $sensor->treshold_max_sensor }}, "color": "rgba(255, 247, 80, 1.0)"},
                                            {"from": {{ $sensor->min_merah }}, "to": {{ $sensor->max_merah }}, "color": "rgba(210, 38, 30, 1.0)"} &#93;' data-color-major-ticks="#000000" data-color-minor-ticks="#000000" data-color-title="#000000" data-color-units="#000000" data-color-numbers="#000000" data-color-plate="#fff" data-color-plate-end="#fff" data-border-shadow-width="0" data-borders="false" data-border-radius="10" data-needle-type="arrow" data-needle-width="3" data-animation-duration="1500" data-animation-rule="linear" data-color-needle="#222" data-color-needle-end="" data-color-bar-progress="#327ac0" data-color-bar="#f5f5f5" data-bar-stroke="0" data-bar-width="8" data-bar-begin-circle="false"></canvas>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- ./Sensor Lingkungan Ruang Server -->
            </div>
        </div>
        <!-- Close Data -->
        <div class="row">
            <div class="col-sm-8">
                <div class="raw">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white"><i class="fas fa-signal"></i> {{ $title }}</strong> </h4>
                        </div></br>
                        <div id="container" style="width: 740px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="raw">
                    <div class="card card-info">
                        <div class="card-header bg-info mb-3">
                            <b class="text-white"><i class="fas fa-history"></i> Last Update &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $sensor->updated_at }}</strong> </b>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!--  -->
                                <!-- <div class="col-sm-6"> -->
                                <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                    <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                        <div class="row">
                                            <div class="col-12 text-left">
                                                <span style="font-size:15px;font-weight:500">{{ $sensor->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="col-xs-12 text-right">
                                            <div id="Tempvalue" class="huge">
                                                @if ($title == 'Suhu')
                                                <span style="font-size:55px;font-weight: bold;">{{ $sensor->avg_sensor }} &degC</span>
                                                @elseif ($title == 'Kelembaban')
                                                <span style="font-size:55px;font-weight: bold;">{{ $sensor->avg_sensor }} %</span>
                                                @elseif ($title == 'Asap')
                                                <span style="font-size:55px;font-weight: bold;">{{ $sensor->avg_sensor }} ppm</span>
                                                @elseif ($title == 'Debu')
                                                <span style="font-size:55px;font-weight: bold;">{{ $sensor->avg_sensor }} ug/m</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!-- </div> -->
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="raw">
                    <div class="card">
                        <div class="card-header bg-danger mb-3">
                            <b class="text-white"><i class="fas fa-wrench"></i> Setting</strong> </b>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="/export" method="post" target="_blank">
                                    <div class="form-group">
                                        <input type="date" id="tglawal" name="tglawal">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="date" id="tglakhir" name="tglakhir">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="" name="name">
                                <button name="excel" type="submit" class="btn btn-sm btn-warning"><span class="fas fa-save"></span>Export to EXCEL</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Datables -->
        <!--          -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Tabel Card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Logs Temperature</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sensor</th>
                                            <th>Nilai Sensor</th>
                                            <th>Update Terakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sensor_logs as $sensor_log)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sensor_log->sensor->name }}</td>
                                            <td>{{ $sensor_log->avg_sensor }}</td>
                                            <td>{{ $sensor_log->updated_at }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Close Data -->
    </div>
</section>
@endsection

@section('data')
<script language="JavaScript">
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
    var logtime = <?php echo $logs; ?>
    // console.log(logtime)
    $(document).ready(function() {
        var title = {
            text: '{{ $sensor->name }}'
        };
        var subtitle = {
            text: ''
        };
        var xAxis = {
            categories: <?php echo $logs; ?>
        };
        var yAxis = {
            title: {
                text: '{{ $title }}'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        };
        var tooltip = {
            valueSuffix: '\xB0C'
        }
        var legend = {
            layout: 'horizontal',
            align: 'right',
            verticalAlign: 'bottom',
            borderWidth: 0
        };
        var series = [{
            name: '{{ $title }}',
            data: [<?php foreach ($avg_sensor as $j) {
                echo $j.',';
            } ?>]
        }]

        var json = {};
        json.title = title;
        json.subtitle = subtitle;
        json.xAxis = xAxis;
        json.yAxis = yAxis;
        json.tooltip = tooltip;
        json.legend = legend;
        json.series = series;

        $('#container').highcharts(json);
    });
</script>
@endsection