@extends('templates.layout')
@section('webtitle','HVAC')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">HVAC</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item">Hvac</li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <!-- Close Data -->
        <div class="row">
            <div class="col-sm-8">
                <div class="raw">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white"><i class="fas fa-snowflake"></i>&nbsp; {{ $sensors->first()->device->name }}</h4>
                        </div></br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="raw">
                                    <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                        <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    <span style="font-size:18px;font-weight:400"><a href="/hvac/detail" class="text-blue">Temperature</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <canvas id="temp-gauge"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="raw">
                                    <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                        <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    <span style="font-size:18px;font-weight:400"><a href="/hvac/detail" class="text-blue">Humidity</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <canvas id="hum-gauge"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="raw">
                    <div class="card card-info">
                        <div class="card-header bg-info mb-3">
                            <b class="text-white"><i class="fas fa-history"></i> Last Update &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $sensors->where('sensor_type_id',1)->first()->updated_at }}</strong> </b>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!--  -->
                                <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                    <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                        <div class="row">
                                            <div class="col-12 text-left">
                                                <span style="font-size:15px;font-weight:500">PAC Status</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-right">
                                        <div class="col-xs-12 m-0">
                                            <span style="font-size:35px;">Normal</span>
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
        <!-- ./end row -->
    </div>
</section>
@endsection
@section('data')
<script>
    var gauge = new RadialGauge({
        "renderTo": 'temp-gauge',
        "width": 201,
        "height": 200,
        "minValue": 0,
        "maxValue": 50,
        "value": '{{ $temp->avg_sensor }}',
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
            35,
            40,
            45,
            50
        ],
        "highlights": [{
                "from": 0,
                "to": 5,
                "color": "#00a2ff"
            },
            {
                "from": 5,
                "to": 10,
                "color": "#005eff"
            },
            {
                "from": 10,
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
    var gauge = new RadialGauge({
        "renderTo": 'hum-gauge',
        "width": 201,
        "height": 200,
        "minValue": 0,
        "maxValue": 100,
        "value": '{{ $hum->avg_sensor }}',
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
                "from": 0,
                "to": 10,
                "color": "#00a2ff"
            },
            {
                "from": 10,
                "to": 20,
                "color": "#005eff"
            },
            {
                "from": 20,
                "to": 40,
                "color": "#FFF000"
            },
            {
                "from": 40,
                "to": 65,
                "color": "#00FF00"
            },
            {
                "from": 65,
                "to": 80,
                "color": "#FFF000"
            },
            {
                "from": 80,
                "to": 100,
                "color": "#FF0000"
            }
        ],
    }).draw();
</script>
@endsection