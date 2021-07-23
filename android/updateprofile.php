<?php



if(update_user()=="ok"){
update_comments();	
}
else{
echo "error";	
}

echo update_user();


function update_user(){
	include '../connection.php';
$fname=$_POST['fullname'];
$email=$_POST['email'];
$password=$_POST["password"];
$id=$_POST["id"];

$query="UPDATE tblusers SET fullname='$fname', email='$email',password='$password'";
$query .=" WHERE userid=$id";

if(mysqli_query($con,$query)){

return "ok";

}
else{
echo mysqli_error($con);	
}
	mysqli_close($con);
}



function update_comments(){
	include '../connection.php';
$e=$_POST['email'];
$old=$_POST['old'];
$query2="UPDATE tblcomments SET email='$e' WHERE email='$old'";
if(mysqli_query($con,$query2)){
echo "success";	
	
}
else{
echo mysqli_error($con);	
}
  	
	
	mysqli_close($con);
}


?>