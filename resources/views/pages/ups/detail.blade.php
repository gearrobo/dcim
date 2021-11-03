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
                <li class="breadcrumb-item"><a href="{{ route('ups.page') }}">UPS</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <!-- Close Data -->
        <div class="row">
            <div class="col-sm-8">
                <div class="raw">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white"><i class="fas fa-car-battery"></i>&nbsp; {{ $ups->device->name }}</h4>
                        </div></br>
                        <div class="text-center">
                            <?php
                            if ($ups->status == 0) {
                                $status = "off";
                            } elseif ($ups->status == 1) {
                                $status = "normal";
                            } elseif ($ups->status == 2) {
                                $status = "bypass";
                            } elseif ($ups->status == 3) {
                                $status = "battery";
                            }
                            ?>
                            <img src="{{ asset('assets/dist/img/datarack/ups_'.$status.'.gif') }}" width="400" height="240">
                        </div>
                    </div>
                </div>
                <div class="raw">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="raw">
                                    <div class="card">
                                        <div class="card-body">
                                            L1 &nbsp;= {{ $ups->input_volt_l1 }} V &nbsp;&nbsp;&nbsp; {{ $ups->input_frequency }} Hz<br><br>
                                            L3 = {{ $ups->input_volt_l2 }} V &nbsp;&nbsp;&nbsp; {{ $ups->input_frequency }} Hz<br><br>
                                            L2 = {{ $ups->input_volt_l3 }} V &nbsp;&nbsp;&nbsp; {{ $ups->input_frequency }} Hz
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="raw">
                                    <div class="card">
                                        <div class="card-body">
                                            Ubatt &nbsp;= {{ $ups->battery_voltage }} V <br><br>
                                            Capbatt = {{ $ups->battery_capacity }} %; <br><br>
                                            Time = {{ $ups->backup_time }} Min
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="raw">
                                    <div class="card">
                                        <div class="card-body">
                                            L1 &nbsp;= {{ $ups->output_volt_l1 }} V &nbsp;&nbsp;&nbsp; {{ $ups->l1 }} %<br><br>
                                            L3 = {{ $ups->output_volt_l2 }} V &nbsp;&nbsp;&nbsp; {{ $ups->l2 }} %<br><br>
                                            L2 = {{ $ups->output_volt_l3 }} V &nbsp;&nbsp;&nbsp; {{ $ups->l3 }} %
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="raw">
                    <div class="card card-info">
                        <div class="card-header bg-info mb-3">
                            <b class="text-white"><i class="fas fa-history"></i> Last Update &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $ups->updated_at }}</strong> </b>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!--  -->
                                <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                    <div class="card-header" style="background-color:#d9edf7;color:#31708f; border:-1px!important; ">
                                        <div class="row">
                                            <div class="col-12 text-left">
                                                <span style="font-size:15px;font-weight:500">UPS Status</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-right">
                                        <div class="col-xs-12 m-0">
                                            <span style="font-size:35px;">{{ ucfirst(strtolower($status)) }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="raw">
                    <div class="card">
                        <div class="card-header bg-danger mb-3">
                            <b class="text-white"><i class="fas fa-wrench"></i> Setting</strong> </b>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="../../../assets/config/export_excel.php" method="post" target="_blank">
                                    <div class="form-group">
                                        <input type="date" id="tglawal" name="tglawal">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="date" id="tglakhir" name="tglakhir">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="" name="name">
                                <button name="excel" type="submit" class="btn btn-sm btn-warning"><span class="fas fa-save"></span>Export to EXCEL</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection