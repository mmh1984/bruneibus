<?php

include '../connection.php';
$busno=$_GET['busno'];

$query=mysqli_query($con,"SELECT * FROM tblcomments WHERE busno='$busno' ORDER BY commentdate DESC");

if(mysqli_num_rows($query)>0){
	$result=array();
	$i=0;
while($x=mysqli_fetch_array($query)){
    $result[$i]["id"]=$x[0];
	$result[$i]["email"]=$x[2];
	$result[$i]["comments"]=$x[3];
    $result[$i]["ratings"]=$x[4];
	$result[$i]["date"]=$x[5];	
	$i++;	
}

$data=json_encode($result);
echo $data;
}



mysqli_close($con);


?>