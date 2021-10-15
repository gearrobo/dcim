@extends('templates.layout')
@section('webtitle','UPS')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">UPS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item active">UPS</li>
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
                        <h4 class="text-white"><i class="fas fa-car-battery"></i>&nbsp; UPS</h4>
                    </div><br>
                    <div class="row ml-1 mr-1">
                        @foreach ($upses as $ups)
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <?php
                                            if ($ups->status == 0) {
                                                $status = "off";
                                            } elseif ($ups->status == 1) {
                                                $status = "normal";
                                            } elseif ($ups->status == 2) {
                                                $status = "bypass";
                                            } elseif ($ups->status == 2) {
                                                $status = "battery";
                                            }
                                            ?>
                                            <span style="font-size:18px;font-weight:400"><a href="{{ route('ups.page.detail', ['id' => $ups->id]) }}" class="text-blue">{{ $ups->device->name }}&nbsp;({{ $status }})</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <span style="font-size:50px;font-weight: bold;">{{ number_format($ups->backup_time,2) }} Min</span>
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