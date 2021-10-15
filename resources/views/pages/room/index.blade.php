@extends('templates.layout')
@section('webtitle','Lingkungan Server')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lingkungan Ruang Server</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item active">Room</li>
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
                        <h4 class="text-white"><i class="fas fa-box"></i>&nbsp; Sensor Lingkungan Ruang Server</strong> </h4>
                    </div><br>
                    <div class="row ml-1 mr-1">
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><a href="{{ route('page.room.sensor','Temperature') }}" class="text-blue">Suhu</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="col-xs-12 text-right">
                                        <span style="font-size:55px;font-weight: bold;">{{ number_format($temp,2) }} &degC</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><a href="{{ route('page.room.sensor','Humidity') }}" class="text-blue">Kelembaban</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="col-xs-12 text-right">
                                        <span style="font-size:55px;font-weight: bold;">{{ number_format($hum,2) }} %</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><a href="{{ route('page.room.sensor','Smoke') }}" class="text-blue">Gas Asap</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="col-xs-12 text-right">
                                        <span style="font-size:55px;font-weight: bold;">{{ ceil($smoke) }} ppm</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><a href="{{ route('page.room.sensor','Dust') }}" class="text-blue">Debu</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="col-xs-12 text-right">
                                        <span style="font-size:55px;font-weight: bold;">{{ $dust }} ug/m</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- ./Sensor Lingkungan Ruang Server -->
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white"><i class="fas fa-door-closed"></i>&nbsp; Sensor Akses Pintu</strong> </h4>
                    </div><br>
                    <div class="row ml-1 mr-1">
                        @foreach ($doors as $door )
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400">{{ $door->name }}</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($door->avg_sensor == 1)
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/dist/img/datarack/fdoor_open.gif') }}" alt="center" alt="" width="80" height="120">
                                    <div class="clearfix"></div>
                                </div>
                                @elseif ($door->avg_sensor == 0)
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/dist/img/datarack/fdoor_close.png') }}" alt="center" alt="" width="80" height="120">
                                    <div class="clearfix"></div>
                                </div>
                                @endif
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
</script>
@endsection