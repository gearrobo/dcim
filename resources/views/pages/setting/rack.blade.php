@extends('templates.layout')
@section('webtitle','Rack')
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
                    <li class="breadcrumb-item active">Rack</li>
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
                                                            <th>Keterangan</th>
                                                            <th>Sensor ID</th>
                                                            <th>Last Update</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($racks as $rack)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $rack->name }}</td>
                                                            <td>{{ $rack->description }}</td>
                                                            <td>{{$rack->id}}</td>
                                                            <td>{{$rack->updated_at}}</td>
                                                            <td align="center">
                                                                <button class="btn btn-warning" data-toggle="modal" data-target="#edit" data-myid="{{ $rack->id }}" data-myname="{{ $rack->name }}" data-mydescription="{{ $rack->description }}" ><i class="fas fa-edit"></i> Ubah</button>
                                                                <a href="{{ route('setting.page.rack.destroy',['id'=>$rack->id]) }}" class="btn btn-danger">Hapus</a>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data rack</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
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
                <h4 class="modal-title">Input Data Rack</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('setting.page.rack.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="device_id" id="device_id">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
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