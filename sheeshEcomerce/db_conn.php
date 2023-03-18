<?php 
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'sheesh-lingan';
$port = 8889;

$conn = mysqli_connect($host, $user, $password, $db, $port);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}