<?php
include '../connection.php';

$id=$_POST['id'];
$name=$_POST['name'];
$pass=$_POST['pass'];
$email=$_POST['email'];

$query=mysqli_query($con,"UPDATE `bruneibus`.`tblusers` SET `password`='$pass', `fullname`='$name', `email`='$email' WHERE (`userid`=$id)");

if($query) {
 echo "success";	
}
else{
 die(mysqli_error($con));	
}

mysqli_close($con);
?>