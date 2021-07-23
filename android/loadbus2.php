<?php
include '../connection.php';

$ID=$_GET['placeid'];

$query=mysqli_query($con,"SELECT DISTINCT
tblroutes.busno
FROM
tblroutes,tblbus
WHERE tblroutes.placeid=$ID

");
$result=array();
if(mysqli_num_rows($query) > 0) {
	$i=0;
while($row=mysqli_fetch_array($query)){
	$result[$i]["busno"]=$row[0];
	$i++;
	
}
$data=json_encode($result);

echo $data;

}

mysqli_close($con);
?>