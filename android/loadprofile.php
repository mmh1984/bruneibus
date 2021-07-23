<?php
include '../connection.php';


$email=$_GET['email'];
$query=mysqli_query($con,"SELECT * FROM tblusers WHERE email='$email'");

if(mysqli_num_rows($query) > 0) {
$result[]=array();
$x=0;
while($row=mysqli_fetch_array($query)){
	$result[$x]["id"]=$row[0];
	$result[$x]["fullname"]=$row[2];	
	$result[$x]["email"]=$row[3];	
	$result[$x]["datejoined"]=$row[5];	
		
	$x++;
}	
$data=json_encode($result);
echo $data;
} 
mysqli_close($con);
?>