@extends('templates.layout')
@section('webtitle','Rack Server')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rack Server Detail</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item">Rack Server</li>
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
                            <h4 class="text-white"><i class="fas fa-server"></i> {{ $rack->name }}</strong> </h4>
                        </div></br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="raw">
                                    <img src="{{ asset('assets/dist/img/rackserver.png') }}" width="650" height="800" alt="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="raw text-right mr-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div><b>Leakage current :</b><span style="color: red;"> {{ $rack->current }} A</span></div>
                                            <div><b>Active Power :</b><span style="color: red;"> {{ $rack->power }} kW</span></div>
                                            <div><b>Voltage :</b><span style="color: red;"> {{ $rack->voltage }} V</span></div>
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
                            <b class="text-white"><i class="fas fa-history"></i> Last Update &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $rack->updated_at }}</strong> </b>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!--  -->
                                <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                    <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                        <div class="row">
                                            <div class="col-12 text-left">
                                                <span style="font-size:15px;font-weight:500">Temperature</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="col-xs-12 m-0">
                                            <span style="font-size:35px;background-color:white">{{ number_format($rack->temp_on,2) }} </span>|
                                            <span style="font-size:35px;background-color:white">{{ number_format($rack->temp_middle,2) }} </span>|
                                            <span style="font-size:35px;background-color:white">{{ number_format($rack->temp_under,2) }}</span>
                                            <span style="font-size:35px">&nbsp; &degC</span>
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
                                                <span style="font-size:15px;font-weight:500">Humidity</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="col-xs-12 m-0">
                                            <span style="font-size:35px;background-color:white">{{ number_format($rack->hum_on,2) }} </span>|
                                            <span style="font-size:35px;background-color:white">{{ number_format($rack->hum_middle,2) }} </span>|
                                            <span style="font-size:35px;background-color:white">{{ number_format($rack->hum_under,2) }}</span>
                                            <span style="font-size:35px">&nbsp; %</span>
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
                                                <span style="font-size:15px;font-weight:500">Dust</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="col-xs-12 text-right">
                                            <div id="Tempvalue" class="huge">
                                                <span style="font-size:55px;font-weight: bold;">{{ $rack->dust }} ug/m</span>
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
    </div>
</section>
@endsection