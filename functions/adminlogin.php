<?php
include '../connection.php';

$username=mysqli_real_escape_string($con,$_POST['email']);
$password=$_POST['password'];

$query=mysqli_query($con,"SELECT * FROM tblusers WHERE email='$username' AND password='$password' AND usertype='admin'");

if(mysqli_num_rows($query)>0){

session_start();
$_SESSION['username']=$username;
echo "success";	
}
else{
echo die(mysqli_error($con));	
}

mysqli_close($con);
?>