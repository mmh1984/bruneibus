<?php
include '../connection.php';



$query=mysqli_query($con,"SELECT
tblbus.BusNo,
tblbus.BusColor,
(Select Count(*) FROM tblroutes WHERE BusNo=tblbus.BusNo) as Routes
FROM
tblbus

");
$result=array();
if(mysqli_num_rows($query) > 0) {
	$i=0;
while($row=mysqli_fetch_array($query)){
	$result[$i]["busno"]=$row[0];
	$result[$i]["buscolor"]=$row[1];
	$result[$i]["routes"]=$row[2];
	$i++;
	
}
$data=json_encode($result);

echo $data;

}

mysqli_close($con);
?>