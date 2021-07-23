<?php

include '../connection.php';

$id=$_POST['id'];

$query=mysqli_query($con,"DELETE FROM tblcomments WHERE id=$id");

if($query){
   echo "success";
}


mysqli_close($con);

?>