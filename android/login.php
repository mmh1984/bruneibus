<?php
include '../connection.php';
	$email=$_GET['email'];
	$pass=$_GET['password'];
	$query=mysqli_query($con,"SELECT * FROM tblusers WHERE email='$email' AND password='$pass'");
	$count=mysqli_num_rows($query);
	
	if($count > 0) {
		
	echo "success";	
	}
	else{
	echo "failed";	
	}
	mysqli_close($con);
?>