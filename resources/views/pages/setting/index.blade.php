@extends('templates.layout')
@section('webtitle','Pengaturan')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pengaturan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=">Home</a></li>
                    <li class="breadcrumb-item active">Pengaturan</li>
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
                        <h4 class="text-white"><i class="fas fa-car-battery"></i>&nbsp; Pengaturan</strong> </h4>
                    </div><br>
                    <div class="row ml-1 mr-1">
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><i class="fas fa-plus"></i>&nbsp;<a href="{{ route('setting.page.devices') }}" class="text-blue"> Devices</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-sm-3">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <span style="font-size:18px;font-weight:400"><i class="fas fa-plus"></i>&nbsp;<a href="{{ route('setting.page.sensor') }}" class="text-blue"> Sensors</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="raw">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white"><i class="fab fa-flipboard"></i>&nbsp; IP Static</strong> </h4>
                        </div><br>
                        <div class="container mb-3">
                            <table class="table table-hover table-bordered" style="width:350px;">
                                @foreach ($ips as $ip)
                                <form action="{{ route('setting.ipupdate',$ip->id) }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td class="col-3">IP Static</td>
                                        <td class="col-3"><input class="form-control" type="text" name="ipv4" value="{{ $ip->ipv4 }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Subnetmask</td>
                                        <td class="col-3"><input class="form-control" type="text" name="netmask" value="{{ $ip->netmask }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Gateway</td>
                                        <td class="col-3"><input class="form-control" type="text" name="gateway" value="{{ $ip->gateway }}"></td>
                                    </tr>
                                    <tr>
                                        <td>DNS Server</td>
                                        <td class="col-3"><input class="form-control" type="text" name="dns" value="{{ $ip->dns }}"></td>
                                    </tr>
                                    @endforeach
                            </table>
                            <button type="submit" class="btn btn-primary">Reboot</button>
                            </form>
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