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
                    <li class="breadcrumb-item active">Hvac</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white"><i class="fas fa-snowflake"></i>&nbsp; AirSys</strong> </h4>
                    </div><br>
                    <div class="row ml-1 mr-1">
                        @foreach ($devices as $device)
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><a href="/hvac/detail/{{ $device->id }}" class="text-blue">{{ $device->name }}</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    @if (count($device->sensor))
                                    <span style="font-size:50px;font-weight: bold;">{{ number_format($device->sensor->where('sensor_type_id',1)->first()->avg_sensor,2) }} &deg; C</span>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Close Data -->
    </div>
</section>
@endsection