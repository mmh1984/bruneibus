<?php
include '../connection.php';

$ID=$_POST['ID'];

$query=mysqli_query($con,"SELECT * FROM tblplaces WHERE ID=$ID");
$place=array();
$x=0;

while($row=mysqli_fetch_array($query)){
	$place[$x]["ID"]=$row[0];
	$place[$x]["LANDMARK"]=$row[1];	
	$place[$x]["TYPE"]=$row[2];
	$place[$x]["AREA"]=$row[3];
	$place[$x]["LAT"]=$row[4];
	$place[$x]["LANG"]=$row[5];
}
$jsondata=json_encode($place);
echo $jsondata;

mysqli_close($con);
?>