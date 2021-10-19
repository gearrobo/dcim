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
                    <li class="breadcrumb-item">Keamanan</li>
                    <li class="breadcrumb-item active">Buku Tamu</li>
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
                        <h4 class="text-white"><i class="fas fa-address-book"></i>&nbsp; Buku Tamu</strong> </h4>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="raw">
                                <div class="m-2">
                                    <form action="{{ route('security.book.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Nama :</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Alamat :</label>
                                            <textarea class="form-control" rows="3" name="address" id="address"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="video-webcam">Gambar :</label>
                                        </div>
                                        <div class="m-0">
                                            <div id="my_camera"></div>
                                            <br />
                                            <input type="hidden" name="image" class="image-tag">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="raw">
                                <div class="m-2">
                                    <div class="form-group">
                                        <label for="phone">No. Handphone</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="laki">Laki-Laki</option>
                                            <option value="wanita">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="destination">Bertemu :</label>
                                        <input type="text" class="form-control" id="destination" name="destination">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Tanggal :</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Jam :</label>
                                        <input type="time" class="form-control" id="time" name="time">
                                    </div>
                                    <div class="form-group">
                                        <label for="need">Kebutuhan :</label>
                                        <textarea class="form-control" rows="3" id="need" name="need"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()">Tambah</button>
                                </div>
                            </div>
                        </div>
                        </form>
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
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>
@endsection