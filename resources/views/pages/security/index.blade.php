@extends('templates.layout')
@section('webtitle','Keamanan')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Keamanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item active">Keamanan</li>
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
                        <h4 class="text-white"><i class="fas fa-car-battery"></i>&nbsp; Keamanan</strong> </h4>
                    </div><br>
                    <div class="row ml-1 mr-1">
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><a href="/security/book" class="text-blue">Buku Tamu</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-address-book fa-10x"></i>
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
                                            <span style="font-size:18px;font-weight:400"><a href="/hvac/detail" class="text-blue">CCTV</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/dist/img/cctv.png') }}" alt="center" width="160" height="160">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <br>
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