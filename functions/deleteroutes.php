<?php


include '../connection.php';
$id=$_POST["routeid"];
$count=count($id);


$error=0;
for($x=0;$x<$count;$x++){

$query=mysqli_query($con,"DELETE FROM tblroutes WHERE id=$id[$x]");


if(!$query){
$error++;

}
}

	
	
	if($error==0){
		echo "success";	
	}
	else{
		echo mysqli_error($con);		
	}
	mysqli_close($con);
	



?>