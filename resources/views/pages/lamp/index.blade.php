@extends('templates.layout')
@section('webtitle','Kontrol Lampu')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kontrol Lampu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item active">Kontrol Lampu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white"><i class="fas fa-car-battery"></i>&nbsp; Kontrol Lampu</strong> </h4>
                    </div><br>
                    <div class="row ml-1 mr-1">
                        @foreach ($lamps as $lamp)
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400" class="text-blue">{{ $lamp->name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('lamp.update',$lamp->id) }}" method="POST">
                                    @csrf
                                    @if ($lamp->avg_sensor == 1)
                                    <div class="card-body text-center">
                                        <input type="hidden" name="lamp" id="lamp" value="0">
                                        <button type="submit" style="border: seashell;background-color:transparent"><img src="{{ asset('assets/dist/img/ON.png') }}" alt="" width="80"></button>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endif
                                    @if ($lamp->avg_sensor == 0)
                                    <div class="card-body text-center">
                                        <input type="hidden" name="lamp" id="lamp" value="1">
                                        <button type="submit" style="border: seashell;background-color:transparent"><img src="{{ asset('assets/dist/img/OFF.png') }}" alt="" width="80"></button>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endif
                                </form>
                            </div>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="raw">
                    <div class="card">
                        <div class="card-header bg-danger mb-3">
                            <b class="text-white"><i class="fas fa-wrench"></i> Setting</strong> </b>
                        </div>
                        <div class="card ml-1 mr-1">
                            <p>Kontrol Penuh Lampu dan AC</p>
                            <div class="row">
                                <div class="col-lg-6 ml-auto">
                                    <form action="{{ url('/dashboard') }}/9" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="card">
                                            <button type="submit" name="onall" value="1" class="btn btn-primary ">ON</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{ url('/dashboard') }}/9" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="card">
                                            <button type="submit" name="offall" value="0" class="btn btn-warning ">OFF</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Close Data -->
    </div>
</section>
@endsection

@section('data')
@endsection