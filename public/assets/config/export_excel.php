<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	include 'conn.php';
    date_default_timezone_set('Asia/Jakarta');
    $wktu = date('Y-m-d  H:i:s');


	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Sensor ".$wktu.".xls");

	if(isset($_POST['excel'])){
        // var_dump($_POST);
		$no = 0;
		$id = $_POST['id'];
		$name = $_POST['name'];
		$tglawal = $_POST['tglawal'];
		$tglakhir = $_POST['tglakhir'];
		$invol      = mysqli_query($conn, "SELECT * FROM `sensor_logs` WHERE updated_at BETWEEN DATE('".$tglawal."') and DATE('".$tglakhir."') and sensor_id = '".$id."' ");
		
		
	?>

	<center>
		<h1>Export Data Sensor RDAY <br/> www.soendev.com</h1>
	</center>

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Sensor</th>
				<th>Nilai Sensor</th>
				<th>Time</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($p = mysqli_fetch_assoc($invol)) { 
				$no++;
			?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $name; ?></td>
				<td><?= $p['avg_sensor']; ?></td>
				<td><?= $p['updated_at']; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</body>
</html>
<?php } ?>