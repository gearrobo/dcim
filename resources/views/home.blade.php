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
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div>
      <video autoplay="true" id="video-webcam">
        Browsermu tidak mendukung bro, upgrade donk!
      </video>
    </div>

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('data')
<script type="text/javascript">
  // seleksi elemen video
  var video = document.querySelector("#video-webcam");

  // minta izin user
  navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

  // jika user memberikan izin
  if (navigator.getUserMedia) {
    // jalankan fungsi handleVideo, dan videoError jika izin ditolak
    navigator.getUserMedia({
      video: true
    }, handleVideo, videoError);
  }

  // fungsi ini akan dieksekusi jika  izin telah diberikan
  function handleVideo(stream) {
    video.srcObject = stream;
  }

  // fungsi ini akan dieksekusi kalau user menolak izin
  function videoError(e) {
    // do something
    alert("Izinkan menggunakan webcam untuk demo!")
  }
</script>
@endsection