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
          <div class="card">
            <div class="card-header bg-info">
              <span>Power IT Equipment</span>
            </div>
            <div class="card-body">
              <div id="container" style="width: 740px; height: 150px; margin: 0 auto"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="raw">
          <div class="card">
            <div class="card-body">
              PUE
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="raw">
          <div class="card">
            <div class="card-body">
              Power Capacity
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="raw">
          <div class="card">
            <div class="card-body">
              Rack Capacity
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
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

  $(document).ready(function() {
    var title = {
      text: ''
    };
    var subtitle = {
      text: ''
    };
    var xAxis = {
      categories: [1, 2, 3, 4, 5, 6, 7, 8]
    };
    var yAxis = {
      title: {
        text: ''
      },
      plotLines: [{
        value: 0,
        width: .1,
        color: '#808080'
      }]
    };
    var tooltip = {
      valueSuffix: ' Kw'
    }
    var legend = {
      layout: 'horizontal',
      align: 'right',
      verticalAlign: 'bottom',
      borderWidth: 0
    };
    var series = [{
      name: '',
      data: [10.32, 10.22, 10.43, 10.14, 10.25, 10.46, 10.27, 10.30]
    }]

    var json = {};
    json.title = title;
    json.subtitle = subtitle;
    json.xAxis = xAxis;
    json.yAxis = yAxis;
    json.tooltip = tooltip;
    json.legend = legend;
    json.series = series;

    $('#container').highcharts(json);
  });
</script>
@endsection