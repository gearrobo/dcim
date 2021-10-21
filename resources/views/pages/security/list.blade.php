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
        <!-- @if ($message = Session::get('success'))
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
        @endif -->
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
                                                <a href="{{ route('security.book') }}" class="btn btn-primary mb-4">Tambah</a>
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>No. Handphone</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Bertemu :</th>
                                                            <th>Waktu :</th>
                                                            <th>Kebutuhan :</th>
                                                            <th>Gambar</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($guests as $guest)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $guest->name }}</td>
                                                            <td>{{ $guest->address }}</td>
                                                            <td>{{ $guest->handphone }}</td>
                                                            <td>{{ $guest->gender }}</td>
                                                            <td>{{ $guest->destination }}</td>
                                                            <td>{{ $guest->created_at }}</td>
                                                            <td>{{ $guest->reason }}</td>
                                                            <?php $image = $guest->name.''.$guest->time.'.png'; ?>
                                                            <td><img src="{{ url('storage/'.$image ) }}" alt="" width="180" height="140"></td>
                                                            <td align="center" class="m-auto">
                                                                <button class="btn btn-warning" data-toggle="modal" data-target="#edit" 
                                                                data-myname="{{$guest->name}}" data-myphone="{{$guest->hanphone}}"
                                                                data-mygender="{{$guest->gender}}" data-mydestination="{{$guest->destination"
                                                                
                                                                data-myaddress="{{$guest->address"><i class="fas fa-edit"></i> Ubah</button>
                                                                <a href="" class="btn btn-danger">Hapus</a>
                                                                <a href="" class="btn btn-success">Detail</a>
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

<!-- Modal Edit -->
<div id="edit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Sensor Type</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" role="form">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" required id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Tipe</label>
                        <select id="type_id" name="type_id" class="form-control" id="type_id">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                    </div>
                    <input id="id" name="id" type="hidden">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit -->
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