<?php


//save_user();

if(check_email()>0){
echo "emailexists";	
}
else{
save_user();	
}

function check_email(){
	include '../connection.php';
	$email=$_POST['email'];
	
	$query=mysqli_query($con,"SELECT * FROM tblusers WHERE email='$email'");
	$count=mysqli_num_rows($query);
	
	return $count;
	mysqli_close($con);
	
	
}

function save_user(){
	include '../connection.php';


$userpass=$_POST['userpass'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];

$type='guest';	
$date=date('y') ."-". date('m')."-".date('d');

echo $date;
$query="INSERT INTO tblusers (password,fullname,email,usertype,dateregistered) 
VALUES ('$userpass','$fullname','$email','$type','$date')";

if(mysqli_query($con,$query)){
	
	echo "success";
}
else{
	echo die(mysqli_error($con));
	
}

mysqli_close($con);
	
}

?>