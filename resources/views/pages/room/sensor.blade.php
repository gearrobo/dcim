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
                    <li class="breadcrumb-item active">Sensor {{ $title }}</li>
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
                        <h4 class="text-white"><i class="fas fa-signal"></i>&nbsp; Sensor {{$title}} Lingkungan</strong> </h4>
                    </div><br>
                    <div class="row ml-0 mr-0">
                        @foreach ($sensors as $sensor)
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><a href="{{ route('page.room.sensor.detail',['link'=>$title,'id'=>$sensor->id]) }}" class="text-blue">{{ $sensor->name  }}</a></span>
                                        </div>
                                    </div>
                                </div>
                                @if ($title == "Suhu")
                                <div class="text-center">
                                    <canvas id="temp-gauge{{ $sensor->id }}" style="width: 200px;"></canvas>
                                    <div class="clearfix"></div>
                                </div>
                                @elseif ($title == "Kelembaban")
                                <div class="text-center">
                                    <canvas id="hum-gauge{{ $sensor->id }}" style="width: 200px;"></canvas>
                                    <div class="clearfix"></div>
                                </div>
                                @elseif ($title == "Asap")
                                <div class="text-center">
                                    <canvas id="smoke-gauge{{ $sensor->id }}" style="width: 200px;"></canvas>
                                    <div class="clearfix"></div>
                                </div>
                                @elseif ($title == "Debu")
                                <div class="text-center">
                                    <canvas id="dust-gauge{{ $sensor->id }}" style="width: 200px;"></canvas>
                                    <div class="clearfix"></div>
                                </div>
                                @elseif ($title == "Pintu")
                                @if ($sensor->avg_sensor == "1")
                                <div class="text-center mt-1 mb-1">
                                    <img src="{{ asset('assets/dist/img/datarack/fdoor_open.gif') }}" alt="" width="120px" height="150">
                                    <div class="clearfix"></div>
                                </div>
                                @elseif ($sensor->avg_sensor == "0")
                                <div class="text-center mt-1 mb-1">
                                    <img src="{{ asset('assets/dist/img/datarack/fdoor_close.png') }}" alt="" width="120px" height="150">
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                                @endif
                            </div>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- ./Sensor Lingkungan Ruang Server -->
            </div>
        </div>
        <!-- Close Data -->
    </div>
</section>

@endsection

@section('data')
@foreach ($sensors as $sensor)
@if ($title == "Suhu")
<script language="JavaScript">
    var gauge = new RadialGauge({
        "renderTo": 'temp-gauge{{ $sensor->id }}',
        "width": 201,
        "height": 200,
        "minValue": '{{ $sensor->min_sensor }}',
        "maxValue": '{{ $sensor->max_merah }}',
        "value": '{{ $sensor->avg_sensor }}',
        "units": 'Celcius',
        "title": 'Temperature',
        "minorTicks": .5,
        "exactTicks": true,
        "majorTicks": [
            0,
            5,
            10,
            15,
            20,
            25,
            30,
            35
        ],
        "highlights": [{
                "from": '{{ $sensor->min_sensor }}', //min_sensor
                "to": '{{ $sensor->max_sensor }}', //max_sensor
                "color": "#005eff"
            },
            {
                "from": '{{ $sensor->treshold_min_sensor }}', //treshold_min_sensor
                "to": '{{ $sensor->min_hijau }}', //min_hijau
                "color": "#FFF000"
            },
            {
                "from": '{{ $sensor->min_hijau }}', //min_hijau
                "to": '{{ $sensor->max_hijau }}', //max_hijau
                "color": "#00FF00"
            },
            {
                "from": '{{ $sensor->max_hijau }}', //max_hijau
                "to": '{{ $sensor->treshold_max_sensor }}', //treshold_max_sensor
                "color": "#FFF000"
            },
            {
                "from": '{{ $sensor->min_merah }}', //min_merah
                "to": '{{ $sensor->max_merah }}', //max_merah
                "color": "#FF0000"
            }
        ],
    }).draw();
</script>
@elseif ($title == "Kelembaban")
<script language="JavaScript">
    var gauge = new RadialGauge({
        "renderTo": 'hum-gauge{{ $sensor->id }}',
        "width": 201,
        "height": 200,
        "minValue": '{{ $sensor->min_sensor }}',
        "maxValue": '{{ $sensor->max_merah }}',
        "value": '{{ $sensor->avg_sensor }}',
        "units": '%',
        "title": 'Humidity',
        "minorTicks": 1,
        "exactTicks": true,
        "majorTicks": [
            0,
            10,
            20,
            30,
            40,
            50,
            60,
            70,
            80,
            90,
            100
        ],
        "highlights": [{
                "from": 0, //min_sensor
                "to": 40, //max_sensor
                "color": "#FF0000"
            },
            {
                "from": 40, //treshold_min_sensor
                "to": 45, //min_hijau
                "color": "#FFF000"
            },
            {
                "from": 45, //min_hijau
                "to": 60, //max_hijau
                "color": "#00FF00"
            },
            {
                "from": 60, //max_hijau
                "to": 65, //treshold_max_sensor
                "color": "#FFF000"
            },
            {
                "from": 65, //min_merah
                "to": 100, //max_merah
                "color": "#005eff"
            }
        ],
    }).draw();
</script>
@elseif ($title == "Asap")
<script language="JavaScript">
    var gauge = new RadialGauge({
        "renderTo": 'smoke-gauge{{ $sensor->id }}',
        "width": 201,
        "height": 200,
        "minValue": '{{ $sensor->min_sensor }}',
        "maxValue": '{{ $sensor->max_merah }}',
        "value": '{{ $sensor->avg_sensor }}',
        "units": 'ppm',
        "title": 'Gas Smoke',
        "minorTicks": 10,
        "exactTicks": true,
        "majorTicks": [
            0,
            100,
            200,
            300,
            400,
            500,
            600,
            700,
            800,
            900,
            1000,
            1100,
            1200
        ],
        "highlights": [{
                "from": '{{ $sensor->min_sensor }}', //min_sensor
                "to": '{{ $sensor->max_sensor }}', //max_sensor
                "color": "#005eff"
            },
            {
                "from": '{{ $sensor->treshold_min_sensor }}', //treshold_min_sensor
                "to": '{{ $sensor->min_hijau }}', //min_hijau
                "color": "#FFF000"
            },
            {
                "from": '{{ $sensor->min_hijau }}', //min_hijau
                "to": '{{ $sensor->max_hijau }}', //max_hijau
                "color": "#00FF00"
            },
            {
                "from": '{{ $sensor->max_hijau }}', //max_hijau
                "to": '{{ $sensor->treshold_max_sensor }}', //treshold_max_sensor
                "color": "#FFF000"
            },
            {
                "from": '{{ $sensor->min_merah }}', //min_merah
                "to": '{{ $sensor->max_merah }}', //max_merah
                "color": "#FF0000"
            }
        ],
    }).draw();
</script>
@elseif ($title == "Debu")
<script language="JavaScript">
    var gauge = new RadialGauge({
        "renderTo": 'dust-gauge{{ $sensor->id }}',
        "width": 201,
        "height": 200,
        "minValue": '{{ $sensor->min_sensor }}',
        "maxValue": '{{ $sensor->max_merah }}',
        "value": '{{ $sensor->avg_sensor }}',
        "units": 'ug/m',
        "title": 'Debu',
        "minorTicks": 5,
        "exactTicks": true,
        "majorTicks": [
            0,
            50,
            100,
            150,
            200,
            250,
            300,
            350,
            400,
            450,
            500
        ],
        "highlights": [{
                "from": '{{ $sensor->min_sensor }}', //min_sensor
                "to": '{{ $sensor->max_sensor }}', //max_sensor
                "color": "#005eff"
            },
            {
                "from": '{{ $sensor->treshold_min_sensor }}', //treshold_min_sensor
                "to": '{{ $sensor->min_hijau }}', //min_hijau
                "color": "#FFF000"
            },
            {
                "from": '{{ $sensor->min_hijau }}', //min_hijau
                "to": '{{ $sensor->max_hijau }}', //max_hijau
                "color": "#00FF00"
            },
            {
                "from": '{{ $sensor->max_hijau }}', //max_hijau
                "to": '{{ $sensor->treshold_max_sensor }}', //treshold_max_sensor
                "color": "#FFF000"
            },
            {
                "from": '{{ $sensor->min_merah }}', //min_merah
                "to": '{{ $sensor->max_merah }}', //max_merah
                "color": "#FF0000"
            }
        ],
    }).draw();
</script>
@endif
@endforeach
@endsection