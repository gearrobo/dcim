@extends('templates.layout')
@section('webtitle','Sensor')
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
                    <li class="breadcrumb-item">Pengaturan</li>
                    <li class="breadcrumb-item active">Sensor</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal">Tambah</button>
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Device</th>
                                                            <th>Protocol</th>
                                                            <th>Min | Max Sensor</th>
                                                            <th>Min Treshold | Min Hijau</th>
                                                            <th>Max Hijau | Max Treshold</th>
                                                            <th>Min Merah | Max Merah</th>
                                                            <th>Status</th>
                                                            <th>Last Update</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($sensors as $sensor)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $sensor->name }}</td>
                                                            <td>{{ $sensor->device ? $sensor->device->name : '-' }}</td>
                                                            <td>
                                                                @if($sensor->protocol_type)
                                                                    <span class="badge badge-info">{{ strtoupper($sensor->protocol_type) }}</span>
                                                                @else
                                                                    <span class="badge badge-secondary">-</span>
                                                                @endif
                                                            </td>
                                                            <td align="center">{{$sensor->min_sensor}} | {{$sensor->max_sensor}}</td>
                                                            <td align="center">{{$sensor->treshold_min_sensor}} | {{$sensor->min_hijau}}</td>
                                                            <td align="center">{{$sensor->max_hijau}} | {{$sensor->treshold_max_sensor}}</td>
                                                            <td align="center">{{$sensor->min_merah}} | {{$sensor->max_merah}}</td>
                                                            <td>
                                                                @if($sensor->status_sensor == 'online')
                                                                    <span class="badge badge-success">Online</span>
                                                                @elseif($sensor->status_sensor == 'offline')
                                                                    <span class="badge badge-danger">Offline</span>
                                                                @else
                                                                    <span class="badge badge-secondary">{{ $sensor->status_sensor ?? 'Inactive' }}</span>
                                                                @endif
                                                            </td>
                                                            <td>{{$sensor->updated_at}}</td>
                                                            <td align="center">
                                                                <button class="btn btn-warning" data-toggle="modal" data-target="#edit" 
                                                                    data-myid="{{ $sensor->id }}" 
                                                                    data-myname="{{ $sensor->name }}" 
                                                                    data-mydeviceid="{{ $sensor->device_id }}" 
                                                                    data-mysensortypeid="{{ $sensor->sensor_type_id }}"
                                                                    data-mydescription="{{ $sensor->description }}" 
                                                                    data-myprotocoltype="{{ $sensor->protocol_type }}"
                                                                    data-myipaddress="{{ $sensor->ip_address }}"
                                                                    data-myport="{{ $sensor->port }}"
                                                                    data-myslaveid="{{ $sensor->slave_id }}"
                                                                    data-myaddress="{{ $sensor->address }}"
                                                                    data-myquantity="{{ $sensor->quantity }}"
                                                                    data-mydatatype="{{ $sensor->data_type }}"
                                                                    data-myversisnmp="{{ $sensor->versi_snmp }}"
                                                                    data-mycommunity="{{ $sensor->community }}"
                                                                    data-mysnmpipaddress="{{ $sensor->snmp_ip_address }}"
                                                                    data-myoidname="{{ $sensor->oid_name }}"
                                                                    data-myminsensor="{{$sensor->min_sensor}}" 
                                                                    data-mymaxsensor="{{$sensor->max_sensor}}" 
                                                                    data-mytresholdminsensor="{{$sensor->treshold_min_sensor}}" 
                                                                    data-myminhijau="{{$sensor->min_hijau}}" 
                                                                    data-mymaxhijau="{{$sensor->max_hijau}}" 
                                                                    data-mytresholdmaxsensor="{{$sensor->treshold_max_sensor}}" 
                                                                    data-myminmerah="{{$sensor->min_merah}}" 
                                                                    data-mymaxmerah="{{$sensor->max_merah}}" 
                                                                    data-myavgsensor="{{$sensor->avg_sensor}}"
                                                                    data-myisactive="{{$sensor->is_active}}">
                                                                    <i class="fas fa-edit"></i> Ubah
                                                                </button>
                                                                <a href="{{ route('setting.page.sensor.destroy',['id'=>$sensor->id]) }}" class="btn btn-danger">Hapus</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</section>

<div class="modal" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Sensor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('setting.page.sensor.update') }}" method="post" id="editSensorForm">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="edit_name">Nama *</label>
                        <input type="text" id="edit_name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_device_id">Device</label>
                        <select name="device_id" id="edit_device_id" class="form-control">
                            <option value="">-- Pilih Device --</option>
                            @foreach ($devices as $dev)
                            <option value="{{$dev->id}}">{{$dev->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_sensor_type_id">Type *</label>
                        <select name="sensor_type_id" id="edit_sensor_type_id" class="form-control" required>
                            @foreach ($sensortypes as $sensortype)
                            <option value="{{$sensortype->type_id}}">{{$sensortype->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Deskripsi</label>
                        <textarea class="form-control" id="edit_description" rows="3" name="description"></textarea>
                    </div>

                    <hr>
                    <h5>Protocol Configuration</h5>
                    
                    <div class="form-group">
                        <label for="edit_protocol_type">Protocol Type</label>
                        <select id="edit_protocol_type" name="protocol_type" class="form-control">
                            <option value="tcp">Modbus TCP</option>
                            <option value="rtu">Modbus RTU</option>
                            <option value="snmp">SNMP</option>
                            <option value="http">HTTP</option>
                            <option value="enc">MODBUS RTU over TCP</option>
                        </select>
                    </div>

                    <!-- Modbus Fields -->
                    <div id="edit_modbus_fields">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_ip_address">IP Address *</label>
                                    <input type="text" id="edit_ip_address" name="ip_address" class="form-control" placeholder="192.168.0.7">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_port">Port *</label>
                                    <input type="number" id="edit_port" name="port" class="form-control" value="502">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_slave_id">Slave ID *</label>
                                    <input type="number" id="edit_slave_id" name="slave_id" class="form-control" value="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_data_type">Data Type</label>
                                    <select id="edit_data_type" name="data_type" class="form-control">
                                        <option value="3">Input Register (3)</option>
                                        <option value="4">Holding Register (4)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_address">Address (Register) *</label>
                                    <input type="number" id="edit_address" name="address" class="form-control" value="0" min="0" max="65535">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_quantity">Quantity (Registers) *</label>
                                    <input type="number" id="edit_quantity" name="quantity" class="form-control" value="2" min="1" max="125">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SNMP Fields -->
                    <div id="edit_snmp_fields" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_versi_snmp">SNMP Version *</label>
                                    <select id="edit_versi_snmp" name="versi_snmp" class="form-control">
                                        <option value="v1">v1</option>
                                        <option value="v2c">v2c</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_community">Community *</label>
                                    <input type="text" id="edit_community" name="community" class="form-control" placeholder="public">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_snmp_ip_address">SNMP IP Address *</label>
                                    <input type="text" id="edit_snmp_ip_address" name="snmp_ip_address" class="form-control" placeholder="192.168.0.7">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_oid_name">OID Name *</label>
                                    <input type="text" id="edit_oid_name" name="oid_name" class="form-control" placeholder="1.3.6.1.2.1.1.1.0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Threshold Configuration</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_min_sensor">Min Sensor</label>
                                <input type="number" id="edit_min_sensor" name="min_sensor" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_max_sensor">Max Sensor</label>
                                <input type="number" id="edit_max_sensor" name="max_sensor" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_treshold_min_sensor">Treshold Min Sensor</label>
                                <input type="number" id="edit_treshold_min_sensor" name="treshold_min_sensor" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_min_hijau">Min Hijau</label>
                                <input type="number" id="edit_min_hijau" name="min_hijau" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_max_hijau">Max Hijau</label>
                                <input type="number" id="edit_max_hijau" name="max_hijau" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_treshold_max_sensor">Treshold Max Sensor</label>
                                <input type="number" id="edit_treshold_max_sensor" name="treshold_max_sensor" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_min_merah">Min Merah</label>
                                <input type="number" id="edit_min_merah" name="min_merah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_max_merah">Max Merah</label>
                                <input type="number" id="edit_max_merah" name="max_merah" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_avg_sensor">Avg Sensor</label>
                        <input type="number" id="edit_avg_sensor" name="avg_sensor" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="edit_is_active" name="is_active" value="1">
                            <label class="custom-control-label" for="edit_is_active">Active</label>
                        </div>
                    </div>

                    <input id="edit_id" name="id" type="hidden">
                    <button type="submit" class="btn btn-primary">💾 Update Sensor</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Sensor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('setting.page.sensor.store') }}" method="post" id="addSensorForm">
                    @csrf
                    <div class="form-group">
                        <label for="add_name">Nama *</label>
                        <input type="text" id="add_name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="add_device_id">Device</label>
                        <select name="device_id" id="add_device_id" class="form-control">
                            <option value="">-- Pilih Device --</option>
                            @foreach ($devices as $dev)
                            <option value="{{$dev->id}}">{{$dev->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_sensor_type_id">Type *</label>
                        <select name="sensor_type_id" id="add_sensor_type_id" class="form-control" required>
                            @foreach ($sensortypes as $sensortype)
                            <option value="{{$sensortype->type_id}}">{{$sensortype->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add_description">Deskripsi</label>
                        <textarea class="form-control" id="add_description" rows="3" name="description"></textarea>
                    </div>

                    <hr>
                    <h5>Protocol Configuration</h5>
                    
                    <div class="form-group">
                        <label for="add_protocol_type">Protocol Type</label>
                        <select id="add_protocol_type" name="protocol_type" class="form-control">
                            <option value="tcp">Modbus TCP</option>
                            <option value="rtu">Modbus RTU</option>
                            <option value="snmp">SNMP</option>
                            <option value="http">HTTP</option>
                            <option value="enc">MODBUS RTU over TCP</option>
                        </select>
                    </div>

                    <!-- Modbus Fields -->
                    <div id="add_modbus_fields">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_ip_address">IP Address *</label>
                                    <input type="text" id="add_ip_address" name="ip_address" class="form-control" placeholder="192.168.0.7">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_port">Port *</label>
                                    <input type="number" id="add_port" name="port" class="form-control" value="502">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_slave_id">Slave ID *</label>
                                    <input type="number" id="add_slave_id" name="slave_id" class="form-control" value="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_data_type">Data Type</label>
                                    <select id="add_data_type" name="data_type" class="form-control">
                                        <option value="3">Input Register (3)</option>
                                        <option value="4">Holding Register (4)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_address">Address (Register) *</label>
                                    <input type="number" id="add_address" name="address" class="form-control" value="0" min="0" max="65535">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_quantity">Quantity (Registers) *</label>
                                    <input type="number" id="add_quantity" name="quantity" class="form-control" value="2" min="1" max="125">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SNMP Fields -->
                    <div id="add_snmp_fields" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_versi_snmp">SNMP Version *</label>
                                    <select id="add_versi_snmp" name="versi_snmp" class="form-control">
                                        <option value="v1">v1</option>
                                        <option value="v2c">v2c</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_community">Community *</label>
                                    <input type="text" id="add_community" name="community" class="form-control" placeholder="public">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_snmp_ip_address">SNMP IP Address *</label>
                                    <input type="text" id="add_snmp_ip_address" name="snmp_ip_address" class="form-control" placeholder="192.168.0.7">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_oid_name">OID Name *</label>
                                    <input type="text" id="add_oid_name" name="oid_name" class="form-control" placeholder="1.3.6.1.2.1.1.1.0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Threshold Configuration</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add_min_sensor">Min Sensor</label>
                                <input type="number" id="add_min_sensor" name="min_sensor" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add_max_sensor">Max Sensor</label>
                                <input type="number" id="add_max_sensor" name="max_sensor" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add_treshold_min_sensor">Treshold Min Sensor</label>
                                <input type="number" id="add_treshold_min_sensor" name="treshold_min_sensor" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add_min_hijau">Min Hijau</label>
                                <input type="number" id="add_min_hijau" name="min_hijau" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add_max_hijau">Max Hijau</label>
                                <input type="number" id="add_max_hijau" name="max_hijau" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add_treshold_max_sensor">Treshold Max Sensor</label>
                                <input type="number" id="add_treshold_max_sensor" name="treshold_max_sensor" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add_min_merah">Min Merah</label>
                                <input type="number" id="add_min_merah" name="min_merah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add_max_merah">Max Merah</label>
                                <input type="number" id="add_max_merah" name="max_merah" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add_avg_sensor">Avg Sensor</label>
                        <input type="number" id="add_avg_sensor" name="avg_sensor" class="form-control" value="20">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="add_is_active" name="is_active" value="1" checked>
                            <label class="custom-control-label" for="add_is_active">Active</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">💾 Tambah Sensor</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('data')
<script language="JavaScript">
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>
<script>
    $('#edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('myid')
        var name = button.data('myname')
        var device_id = button.data('mydeviceid')
        var sensor_type_id = button.data('mysensortypeid')
        var description = button.data('mydescription')
        var protocol_type = button.data('myprotocoltype') || 'tcp'
        var ip_address = button.data('myipaddress')
        var port = button.data('myport')
        var slave_id = button.data('myslaveid')
        var address = button.data('myaddress')
        var quantity = button.data('myquantity')
        var data_type = button.data('mydatatype')
        var versi_snmp = button.data('myversisnmp')
        var community = button.data('mycommunity')
        var snmp_ip_address = button.data('mysnmpipaddress')
        var oid_name = button.data('myoidname')
        var min_sensor = button.data('myminsensor')
        var max_sensor = button.data('mymaxsensor')
        var treshold_min_sensor = button.data('mytresholdminsensor')
        var min_hijau = button.data('myminhijau')
        var max_hijau = button.data('mymaxhijau')
        var treshold_max_sensor = button.data('mytresholdmaxsensor')
        var min_merah = button.data('myminmerah')
        var max_merah = button.data('mymaxmerah')
        var avg_sensor = button.data('myavgsensor')
        var is_active = button.data('myisactive')

        var modal = $(this)
        modal.find('.modal-body #edit_id').val(id);
        modal.find('.modal-body #edit_name').val(name);
        modal.find('.modal-body #edit_device_id').val(device_id);
        modal.find('.modal-body #edit_sensor_type_id').val(sensor_type_id);
        modal.find('.modal-body #edit_description').val(description);
        modal.find('.modal-body #edit_protocol_type').val(protocol_type);
        modal.find('.modal-body #edit_ip_address').val(ip_address);
        modal.find('.modal-body #edit_port').val(port);
        modal.find('.modal-body #edit_slave_id').val(slave_id);
        modal.find('.modal-body #edit_address').val(address);
        modal.find('.modal-body #edit_quantity').val(quantity);
        modal.find('.modal-body #edit_data_type').val(data_type);
        modal.find('.modal-body #edit_versi_snmp').val(versi_snmp);
        modal.find('.modal-body #edit_community').val(community);
        modal.find('.modal-body #edit_snmp_ip_address').val(snmp_ip_address);
        modal.find('.modal-body #edit_oid_name').val(oid_name);
        modal.find('.modal-body #edit_min_sensor').val(min_sensor);
        modal.find('.modal-body #edit_max_sensor').val(max_sensor);
        modal.find('.modal-body #edit_treshold_min_sensor').val(treshold_min_sensor);
        modal.find('.modal-body #edit_min_hijau').val(min_hijau)
        modal.find('.modal-body #edit_max_hijau').val(max_hijau)
        modal.find('.modal-body #edit_treshold_max_sensor').val(treshold_max_sensor);
        modal.find('.modal-body #edit_min_merah').val(min_merah)
        modal.find('.modal-body #edit_max_merah').val(max_merah)
        modal.find('.modal-body #edit_avg_sensor').val(avg_sensor)
        
        // Set checkbox
        if (is_active == 1) {
            modal.find('.modal-body #edit_is_active').prop('checked', true);
        } else {
            modal.find('.modal-body #edit_is_active').prop('checked', false);
        }

        // Show/hide fields based on protocol type
        if (protocol_type === 'snmp') {
            $('#edit_modbus_fields').hide();
            $('#edit_snmp_fields').show();
        } else {
            $('#edit_modbus_fields').show();
            $('#edit_snmp_fields').hide();
        }
    })

    // Handle protocol type change for Edit Sensor form
    $('#edit_protocol_type').on('change', function() {
        var protocol = $(this).val();
        var modbusFields = $('#edit_modbus_fields');
        var snmpFields = $('#edit_snmp_fields');
        
        // Get all field elements
        var ipAddress = $('#edit_ip_address');
        var port = $('#edit_port');
        var slaveId = $('#edit_slave_id');
        var address = $('#edit_address');
        var quantity = $('#edit_quantity');
        var versiSnmp = $('#edit_versi_snmp');
        var community = $('#edit_community');
        var snmpIpAddress = $('#edit_snmp_ip_address');
        var oidName = $('#edit_oid_name');

        if (protocol === 'snmp') {
            // Show SNMP fields, hide Modbus fields
            modbusFields.hide();
            snmpFields.show();
            
            // Remove required from Modbus fields
            ipAddress.removeAttr('required');
            port.removeAttr('required');
            slaveId.removeAttr('required');
            address.removeAttr('required');
            quantity.removeAttr('required');
            
            // Add required to SNMP fields
            versiSnmp.attr('required', 'required');
            community.attr('required', 'required');
            snmpIpAddress.attr('required', 'required');
            oidName.attr('required', 'required');
        } else {
            // Show Modbus fields, hide SNMP fields
            modbusFields.show();
            snmpFields.hide();
            
            // Add required to Modbus fields
            ipAddress.attr('required', 'required');
            port.attr('required', 'required');
            slaveId.attr('required', 'required');
            address.attr('required', 'required');
            quantity.attr('required', 'required');
            
            // Remove required from SNMP fields
            versiSnmp.removeAttr('required');
            community.removeAttr('required');
            snmpIpAddress.removeAttr('required');
            oidName.removeAttr('required');
        }
    });

    // Handle protocol type change for Add Sensor form
    $('#add_protocol_type').on('change', function() {
        var protocol = $(this).val();
        var modbusFields = $('#add_modbus_fields');
        var snmpFields = $('#add_snmp_fields');
        
        // Get all field elements
        var ipAddress = $('#add_ip_address');
        var port = $('#add_port');
        var slaveId = $('#add_slave_id');
        var address = $('#add_address');
        var quantity = $('#add_quantity');
        var versiSnmp = $('#add_versi_snmp');
        var community = $('#add_community');
        var snmpIpAddress = $('#add_snmp_ip_address');
        var oidName = $('#add_oid_name');

        if (protocol === 'snmp') {
            // Show SNMP fields, hide Modbus fields
            modbusFields.hide();
            snmpFields.show();
            
            // Remove required from Modbus fields
            ipAddress.removeAttr('required');
            port.removeAttr('required');
            slaveId.removeAttr('required');
            address.removeAttr('required');
            quantity.removeAttr('required');
            
            // Add required to SNMP fields
            versiSnmp.attr('required', 'required');
            community.attr('required', 'required');
            snmpIpAddress.attr('required', 'required');
            oidName.attr('required', 'required');
        } else {
            // Show Modbus fields, hide SNMP fields
            modbusFields.show();
            snmpFields.hide();
            
            // Add required to Modbus fields
            ipAddress.attr('required', 'required');
            port.attr('required', 'required');
            slaveId.attr('required', 'required');
            address.attr('required', 'required');
            quantity.attr('required', 'required');
            
            // Remove required from SNMP fields
            versiSnmp.removeAttr('required');
            community.removeAttr('required');
            snmpIpAddress.removeAttr('required');
            oidName.removeAttr('required');
        }
    });
</script>
@endsection