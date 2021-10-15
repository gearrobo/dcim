@extends('templates.layout')
@section('webtitle','Rack Server Detail')
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
                    <li class="breadcrumb-item active">Rack Server</li>
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
                        <h4 class="text-white"><i class="fas fa-server"></i>&nbsp; Rack Server</strong> </h4>
                    </div><br>
                    <div class="row ml-1 mr-1">
                        @foreach ($racks as $rack)
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><a href="/rackserver/detail/{{ $rack->id }}" class="text-blue">{{ $rack->device->name }}</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/dist/img/rack-icon.png') }}" alt="center" alt="" width="200" height="160">
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