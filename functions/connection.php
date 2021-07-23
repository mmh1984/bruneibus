<?php
$server="103.8.25.62";
$user="bruneibu_edwin";
$pass="Amber2018";
$database="bruneibu_bruneibus";

$con=mysqli_connect($server,$user,$pass,$database);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



?>