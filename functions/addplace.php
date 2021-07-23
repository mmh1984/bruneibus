<?php
include '../connection.php';


$name=$_POST['name'];
$type=$_POST['type'];
$area=$_POST['area'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];

$query=mysqli_query($con,"INSERT INTO `bruneibus`.`tblplaces` (`LANDMARK`, `TYPE`, `AREA`, `LAT`, `LANG`) VALUES ('$name', '$type', '$area', $lat, $lng);

");

if($query){
echo "success";	
}
else{
echo die(mysqli_error($con));	
}

mysqli_close($con);
?>