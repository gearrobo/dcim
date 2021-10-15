@extends('templates.layout')
@section('webtitle','Generator')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Generator</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item active">Generator</li>
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
                        <h4 class="text-white"><i class="fas fa-bolt"></i>&nbsp; Diesel Generator</strong></h4>
                    </div><br>
                    @foreach ($gensets as $genset)
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="raw">
                                <div class="card">
                                    <div class="card-body">
                                        <div><span>Generator ID : {{ $genset->id }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="raw">
                                <div class="card">
                                    <div class="card-body">
                                        <div><span>Generator Type : {{ $genset->name }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="raw">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        if ($genset->status == 0) {
                                            $status = "Standby OFF";
                                        }
                                        ?>
                                        <div><span>Generator Status :</span><span style="color: red;"> {{ $status }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="raw">
                                <div class="card">
                                    <div class="card-body">
                                        <div><span>Operating Temperature :</span><span style="color: blue;"> 30 &deg;C</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="raw">
                                <div class="card">
                                    <div class="card-body">
                                        <div><span>Capacity Tank :</span><span style="color: red;"> {{ $genset->solar_capacity }} liter </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="raw">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <?php
                                        $capa = $genset->solar_capacity;
                                        $isi = $genset->solar;

                                        $persen = ($isi / $capa) * 100;
                                        ?>
                                        <canvas data-type="linear-gauge" data-title="{{ $isi }} Liter" data-unit="%" data-value="{{ $persen }}" data-width="150" data-height="420"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="raw">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/dist/img/genset.png') }}" alt="center" width="350" height="300">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card text-right m-auto">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i> Ubah</button>&nbsp;&nbsp;
                                        <!-- <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal"><i class="far fa-plus-square"></i> &nbsp;Tambah</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Close Data -->
    </div>
</section>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Tipe Sensor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generator.page.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" required id="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection