<?php
$server="localhost";
$user="root";
$pass="";
$database="bruneibus";

$con=mysqli_connect($server,$user,$pass,$database);

if(!$con) {
echo "Error"; //die(mysqli_error($con));	
}



?>