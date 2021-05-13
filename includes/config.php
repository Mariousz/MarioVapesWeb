<?php
date_default_timezone_set('Europe/London');
setlocale(LC_ALL, array('en_GB.UTF8','en_GB','english'));

$serverHost = "localhost";
$dBUsername = "root";
$dBPassword = "root";
$dBname = "mariovapes";
$port = 3306;

$conn = mysqli_connect( $serverName, $dBUsername, $dBPassword, $dBname, $port);

if (!$conn) {
  die("connection failed: " .mysqli_connect_error());
  // code...
}
