@extends('templates.layout')
@section('webtitle','Home')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header bg-info">
            <span>Temperature</span>
          </div>
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4 m-3">
                <div class="raw">
                  <i class="fas fa-thermometer-three-quarters fa-10x"></i>
                </div>
              </div>
              <div class="col ml-2">
                <div class="raw">
                  <div class="col">
                    <span style="font-size: 50px;">{{number_format($temp,2)}}&deg; C</span>
                  </div>
                  <div class="col">
                    Suhu Tertinggi pada semua perangkat
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="raw">
          <div class="car">
            <div class="card-header bg-info">
              <span>Power IT Equipment</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection