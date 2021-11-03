@extends('templates.layout')
@section('webtitle','Device')
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
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
                                            <div class="col-lg-8">
                                                <h3>Detail Perangkat Alat</h3>
                                                <table class="table">
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td>{{ $device->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Deskripsi</td>
                                                        <td>:</td>
                                                        <td>{{ $device->description }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Sensor</td>
                                                        <td>:</td>
                                                        <td>{{ $sensors->count() }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8">
                                                <h3>List Sensor</h3> <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal" onclick="addSensor()">Tambah</button>
                                            </div>
                                            <div class="col-12">
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive">
                                                    <thead>
                                                        <tr>
                                                            <td>No</td>
                                                            <td>Nama</td>
                                                            <td>Jenis</td>
                                                            <td>Sensor ID</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($sensors as $sensor)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $sensor->name }}</td>
                                                            <td>{{ $sensor->sensortype->type }}</td>
                                                            <td>{{ $sensor->id }}</td>
                                                            <td align="center">
                                                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit" data-mytype="{{ $sensor->type }}" data-myid="{{ $sensor->id }}" data-myname="{{ $sensor->name }}" data-mydescription="{{ $sensor->description }}" data-myminsensor="{{$sensor->min_sensor}}" data-mymaxsensor="{{$sensor->max_sensor}}" data-mytresholdminsensor="{{$sensor->treshold_min_sensor}}" data-myminhijau="{{$sensor->min_hijau}}" data-mymaxhijau="{{$sensor->max_hijau}}" data-mytresholdmaxsensor="{{$sensor->treshold_max_sensor}}" data-myminmerah="{{$sensor->min_merah}}" data-mymaxmerah="{{$sensor->max_merah}}"><i class="fas fa-edit"></i> Ubah</button>
                                                                <a href="{{ route('setting.page.sensor.destroy',['id'=>$sensor->id]) }}" class="btn btn-danger">Hapus</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
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
        <!--end row-->
    </div>
</section>


<div class="modal" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Sensor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('setting.page.sensor.update') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select name="sensor_type_id" id="sensor_type_id" class="form-control" required>
                            @foreach ($sensortypes as $sensortype)
                            <option value="{{$sensortype->type_id}}">{{$sensortype->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Min Sensor</label>
                        <input type="number" id="min_sensor" name="min_sensor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Max Sensor</label>
                        <input type="number" id="max_sensor" name="max_sensor" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Treshold Min Sensor</label>
                        <input type="number" id="treshold_min_sensor" name="treshold_min_sensor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Min Hijau</label>
                        <input type="number" id="min_hijau" name="min_hijau" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Max Hijau</label>
                        <input type="number" id="max_hijau" name="max_hijau" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Treshold Max Sensor</label>
                        <input type="number" id="treshold_max_sensor" name="treshold_max_sensor" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Min Merah</label>
                        <input type="number" id="min_merah" name="min_merah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Max Merah</label>
                        <input type="number" id="max_merah" name="max_merah" class="form-control">
                    </div>
                    <input id="id" name="id" type="hidden">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Sensor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('setting.page.devices.sensor.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select name="sensor_type_id" id="sensor_type_id" class="form-control">
                            @foreach ($sensortypes as $sensortype)
                            <option value="{{ $sensortype->id }}">{{ $sensortype->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Min Sensor</label>
                        <input type="number" id="min_sensor" name="min_sensor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Max Sensor</label>
                        <input type="number" id="max_sensor" name="max_sensor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Treshold Min Sensor</label>
                        <input type="number" id="treshold_min_sensor" name="treshold_min_sensor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Min Hijau</label>
                        <input type="number" id="min_hijau" name="min_hijau" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Max Hijau</label>
                        <input type="number" id="max_hijau" name="max_hijau" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Treshold Max Sensor</label>
                        <input type="number" id="treshold_max_sensor" name="treshold_max_sensor" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Min Merah</label>
                        <input type="number" id="min_merah" name="min_merah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Max Merah</label>
                        <input type="number" id="max_merah" name="max_merah" class="form-control">
                    </div>
                    <input type="hidden" class="form-control" name="device_name" value="{{ $device->name }}">
                    <input type="hidden" class="form-control" name="device_id" value="{{ $device->id }}">
                    <input type="hidden" class="form-control" name="id" value="{{ $device->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
        var type = button.data('mytype')
        var description = button.data('mydescription')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #type').val(type);
        modal.find('.modal-body #description').val(description);
    })
</script>
@endsection

@section('data')
<script>
    $('#edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('myid')
        var name = button.data('myname')
        var type = button.data('mytype')
        var description = button.data('mydescription')
        var min_sensor = button.data('myminsensor')
        var max_sensor = button.data('mymaxsensor')
        var treshold_min_sensor = button.data('mytresholdminsensor')
        var min_hijau = button.data('myminhijau')
        var max_hijau = button.data('mymaxhijau')
        var treshold_max_sensor = button.data('mytresholdmaxsensor')
        var min_merah = button.data('myminmerah')
        var max_merah = button.data('mymaxmerah')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #type').val(type);
        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #min_sensor').val(min_sensor);
        modal.find('.modal-body #max_sensor').val(max_sensor);
        modal.find('.modal-body #treshold_min_sensor').val(treshold_min_sensor);
        modal.find('.modal-body #min_hijau').val(min_hijau)
        modal.find('.modal-body #max_hijau').val(max_hijau)
        modal.find('.modal-body #treshold_max_sensor').val(treshold_max_sensor);
        modal.find('.modal-body #min_merah').val(min_merah)
        modal.find('.modal-body #max_merah').val(max_merah)
    })
</script>
@endsection