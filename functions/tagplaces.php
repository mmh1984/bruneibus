<?php
include '../connection.php';

$place=$_POST['place'];
$busno=$_POST['busno'];

if(check_tag($busno,$place)){
	$query=mysqli_query($con,"INSERT INTO `tblroutes` (busno,placeid) VALUES ('$busno',$place)");
	
	if($query){
	echo "Successfully tagged this place";	
	}
	else{
	die(mysqli_error($con));	
	}
	
}
else{
  echo "This place is already tagged";	
}



function check_tag($b,$p){
include '../connection.php';
$query=mysqli_query($con,"SELECT * FROM tblroutes WHERE busno='$b' AND placeid='$p'");
if(mysqli_num_rows($query)>0){
return false;	
}
else{
return true;	
}
	
}
?>

