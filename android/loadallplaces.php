<?php
include '../connection.php';



$query=mysqli_query($con,"SELECT * FROM tblplaces ORDER BY TYPE ASC");

if(mysqli_num_rows($query) > 0) {
$result[]=array();
$x=0;
while($row=mysqli_fetch_array($query)){
	$result[$x]["ID"]=$row[0];	
	$result[$x]["LANDMARK"]=$row[1];	
	$result[$x]["TYPE"]=$row[2];	
	$result[$x]["AREA"]=$row[3];
	$result[$x]["LAT"]=$row[4];	
	$result[$x]["LNG"]=$row[5];	
	$x++;
}	
$data=json_encode($result);
echo $data;
} 
mysqli_close($con);
?>