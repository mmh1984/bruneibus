<?php
include '../connection.php';

$ID=$_POST['ID'];
$name=$_POST['name'];
$type=$_POST['type'];
$area=$_POST['area'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];

$query=mysqli_query($con,"
UPDATE `bruneibus`.`tblplaces` SET `LANDMARK`='$name', `TYPE`='$type', `AREA`='$area', `LAT`=$lat, `LANG`=$lng WHERE (`ID`=$ID) 

");

if($query){
echo "success";	
}
else{
echo die(mysqli_error($con));	
}

mysqli_close($con);
?>