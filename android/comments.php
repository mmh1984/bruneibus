<?php


switch($_POST["operation"]){

case "save":
echo save_comment();
break;	
	
}



function save_comment() {

	include "../connection.php";
$comment=mysqli_real_escape_string($con,$_POST["comment"]);
$ratings=$_POST["ratings"];
$email=$_POST["email"];
$busno=$_POST["busno"];
$today=date('Y-m-d');


    $query="INSERT INTO tblcomments (busno,email,comments,ratings,commentdate) ";
	$query.="VALUES('$busno','$email','$comment',$ratings,'$today')";
	
	
	if(mysqli_query($con,$query)){
		echo "success";
		
	}
else{
	
	echo mysqli_error($con);
	
	}


mysqli_close($con);
	
}



?>