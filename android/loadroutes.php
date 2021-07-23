<?php
include '../connection.php';

$busno=$_GET['busno'];

$query=mysqli_query($con,"SELECT
tblroutes.ID,
tblplaces.LANDMARK,
tblplaces.TYPE,
tblplaces.AREA,
tblplaces.LAT,
tblplaces.LANG
FROM
tblroutes ,
tblplaces ,
tblbus
WHERE
tblroutes.busno = tblbus.BusNo AND
tblroutes.placeid = tblplaces.ID AND
tblroutes.busno = '$busno'");
if(mysqli_num_rows($query) > 0) {
$data=array();	
$i=0;
while($row=mysqli_fetch_array($query)){
$data[$i]["id"]=$row[0];
$data[$i]["name"]=$row[1];
$data[$i]["type"]=$row[2];
$data[$i]["area"]=$row[3];
$data[$i]["lat"]=$row[4];
$data[$i]["lng"]=$row[5];
$i++;			
}

$jsondata=json_encode($data);

echo $jsondata;
}

else{
echo "<p class='alert alert-info'>No Results found</p>";	
	
} 
mysqli_close($con);
?>