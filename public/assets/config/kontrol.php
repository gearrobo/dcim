<?php
include 'conn.php';
date_default_timezone_set('Asia/Jakarta');
$wktu = date('Y-m-d  H:i:s');

$device_id = $_GET['device_id'];

  //var_dump($_GET);

$relays = query(" SELECT * FROM tb_lamp WHERE device_id = '".$device_id."' ");
foreach($relays as $relay):
    if( $relay['lamp'] == "1" ){
      echo "on";
    }else{
      echo "off";
    }
endforeach;

$conn -> close();