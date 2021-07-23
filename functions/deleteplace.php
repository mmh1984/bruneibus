<?php


include '../connection.php';

$ID=$_POST['ID'];


$query=mysqli_query($con,"DELETE FROM tblplaces WHERE ID=$ID");

if($query){
 echo "success";
}
else{
  die(mysqli_error($con));	
}

mysqli_close($con);

?>