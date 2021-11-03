@extends('templates.layout')
@section('webtitle','Home')
<style type="text/css">
  .coba {
    width: 100%;
    margin: 5px auto;
  }
</style>
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
              <div class="coba">
                <canvas id="linechart" width="100" height="20"></canvas>
              </div>
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
</script>
<script type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Laptop",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "#29B0D0",
      borderColor: "#29B0D0",
      pointHoverBackgroundColor: "#29B0D0",
      pointHoverBorderColor: "#29B0D0",
      data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 9, 8]
    }]
  };

  var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
      legend: {
        display: false
      },
      barValueSpacing: 2,
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
          }
        }],
        xAxes: [{
          gridLines: {
            color: "rgba(0, 0, 0, 0)",
          }
        }]
      }
    }
  });
</script>
@endsection