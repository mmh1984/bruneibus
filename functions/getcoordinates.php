<?php
include '../connection.php';

$busno=$_POST['busno'];

$query=mysqli_query($con,"SELECT
tblplaces.LAT,
tblplaces.LANG,
tblplaces.LANDMARK
FROM
tblroutes ,
tblplaces ,
tblbus
WHERE
tblroutes.busno = tblbus.BusNo AND
tblroutes.placeid = tblplaces.ID AND
tblroutes.busno = '$busno'");

if(mysqli_num_rows($query)>0){
	$coor=array();
	$x=0;
	
while($row=mysqli_fetch_array($query)){
	$coor[$x]["lat"]=$row[0];
	$coor[$x]["lng"]=$row[1];
	$coor[$x]["place"]=$row[2];
	$x++;
}	

$jsonarray=json_encode($coor);

echo $jsonarray;
	
}

?>