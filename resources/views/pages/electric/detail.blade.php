@extends('templates.layout')
@section('webtitle','Kelistrikan')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelistrikan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/electric">Kelistrikan</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <!-- Detail Data -->
        <div class="row">
            <div class="col-sm-8">
                <div class="raw">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white"><i class="fas fa-industry"></i>&nbsp; {{ $device->name }}</strong> </h4>
                        </div></br>
                        <table border="1" width="760">
                            @foreach ($sensors as $sensor)
                            <tr style="text-align:center">
                                @if ($sensor->sensor_type_id == 6)
                                <th colspan="3">{{ $sensor->name }} (Volt)</th>
                                @elseif ($sensor->sensor_type_id == 7)
                                <th colspan="3">{{ $sensor->name }} (A)</th>
                                @elseif ($sensor->sensor_type_id == 8)
                                <th colspan="3">{{ $sensor->name }} (Kw)</th>
                                @endif
                            </tr>
                            <tr style="text-align: center;">
                                <th>R</th>
                                <th>S</th>
                                <th>T</th>
                            </tr>
                            <tr style="text-align: center;">
                                @if ($sensor->sensor_type_id == 6 )
                                <td style="text-align: center;"><canvas id="volt-gauge1"></canvas></td>
                                <td style="text-align: center;"><canvas id="volt-gauge2"></canvas></td>
                                <td style="text-align: center;"><canvas id="volt-gauge3"></canvas></td>
                                @elseif ($sensor->sensor_type_id == 7 )
                                <td style="text-align: center;"><canvas id="current-gauge1"></canvas></td>
                                <td style="text-align: center;"><canvas id="current-gauge2"></canvas></td>
                                <td style="text-align: center;"><canvas id="current-gauge3"></canvas></td>
                                @elseif ($sensor->sensor_type_id == 8 )
                                <td style="text-align: center;"><canvas id="power-gauge1"></canvas></td>
                                <td style="text-align: center;"><canvas id="power-gauge2"></canvas></td>
                                <td style="text-align: center;"><canvas id="power-gauge3"></canvas></td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="raw">
                    <div class="card card-info">
                        <div class="card-header bg-info mb-3">
                            <b class="text-white"><i class="fas fa-history"></i> Last Update &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $volt->updated_at ?? '-' }}</strong> </b>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!--  -->
                                <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                    <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                        <div class="row">
                                            <div class="col-12 text-left">
                                                <span style="font-size:15px;font-weight:500">Voltage Average</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="col-xs-12 text-right">
                                            <div id="Tempvalue" class="huge">
                                                <span style="font-size:35px;font-weight: bold;">{{ $sensors->where('sensor_type_id',6)->first()->avg_sensor ?? '-' }} Volt</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!--  -->
                                <br>
                                <!--  -->
                                <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                    <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                        <div class="row">
                                            <div class="col-12 text-left">
                                                <span style="font-size:15px;font-weight:500">Total Current</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="col-xs-12 text-right">
                                            <div id="Tempvalue" class="huge">
                                                <span style="font-size:35px;font-weight: bold;">{{ $sensors->where('sensor_type_id',7)->first()->avg_sensor ?? '-' }} A</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!--  -->
                                <br>
                                <!--  -->
                                <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                    <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                        <div class="row">
                                            <div class="col-12 text-left">
                                                <span style="font-size:15px;font-weight:500">Power Average</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="col-xs-12 text-right">
                                            <div id="Tempvalue" class="huge">
                                                <span style="font-size:35px;font-weight: bold;">{{ $sensors->where('sensor_type_id',8)->first()->avg_sensor ?? '-' }} Kw</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
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
                                <form action="../../../assets/config/export_excel.php" method="post" target="_blank">
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
        <!-- /.detail data -->
    </div>
</section>
@endsection

@section('data')
<script>
    <?php
    for ($i = 1; $i < 4; $i++) {
        $a = 'L' . $i;
    ?>
        var gauge = new RadialGauge({
            "renderTo": 'volt-gauge{{ $i }}',
            "width": 201,
            "height": 200,
            "minValue": 0,
            "maxValue": 600,
            "value": '{{ $volt->$a ?? '-' }}',
            "units": 'Volt',
            "title": 'Tegangan',
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
                500,
                550,
                600
            ],
            "highlights": [{
                    "from": 0,
                    "to": 200,
                    "color": "#FFF000"
                },
                {
                    "from": 200,
                    "to": 450,
                    "color": "#00FF00"
                },
                {
                    "from": 450,
                    "to": 500,
                    "color": "#FFF000"
                },
                {
                    "from": 500,
                    "to": 600,
                    "color": "#FF0000"
                }
            ],
        }).draw();
    <?php
    }
    ?>

    <?php
    for ($i = 1; $i < 4; $i++) {
        $a = 'L' . $i;
    ?>
        var gauge = new RadialGauge({
            "renderTo": 'current-gauge{{ $i }}',
            "width": 201,
            "height": 200,
            "minValue": 0,
            "maxValue": 50,
            "value": '{{ $current->$a ?? '-' }}',
            "units": 'Ampere',
            "title": 'Arus',
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
                35,
                40,
                45,
                50
            ],
            "highlights": [{
                    "from": 0,
                    "to": 15,
                    "color": "#FFF000"
                },
                {
                    "from": 15,
                    "to": 25,
                    "color": "#00FF00"
                },
                {
                    "from": 25,
                    "to": 28,
                    "color": "#FFF000"
                },
                {
                    "from": 28,
                    "to": 50,
                    "color": "#FF0000"
                }
            ],
        }).draw();
    <?php } ?>

    <?php
    for ($i = 1; $i < 4; $i++) {
        $a = 'L' . $i;
    ?>
        var gauge = new RadialGauge({
            "renderTo": 'power-gauge{{ $i }}',
            "width": 201,
            "height": 200,
            "minValue": 0,
            "maxValue": 50,
            "value": '{{ $power->$a ?? '-' }}',
            "units": 'kW',
            "title": 'Daya',
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
                35,
                40,
                45,
                50
            ],
            "highlights": [{
                    "from": 0,
                    "to": 15,
                    "color": "#FFF000"
                },
                {
                    "from": 15,
                    "to": 25,
                    "color": "#00FF00"
                },
                {
                    "from": 25,
                    "to": 28,
                    "color": "#FFF000"
                },
                {
                    "from": 28,
                    "to": 50,
                    "color": "#FF0000"
                }
            ],
        }).draw();
    <?php } ?>
</script>
@endsection