<?php
include '../connection.php';

$type=$_POST['type'];

$query=mysqli_query($con,"SELECT * FROM tblplaces WHERE type='$type'");
echo "<h4><strong>$type</strong></h4>";

if(mysqli_num_rows($query) > 0) {
	
echo "<table class='table table-striped table-responsive'>
		<tr>
		
		<th>Name</th>
		
		<th>Area</th>
		</tr>";
while($row=mysqli_fetch_array($query)){
		echo "<tr>
		
			
			<td><button class='btn btn-primary small' onclick='edit_place(\"$row[0]\")'>".$row[1]."</button></td>
			<td>".$row[3]."</td>
		</tr>";
		

	
}	
echo "</table>";	
}
else{
echo "<p class='alert alert-info'>No Results found</p>";	
	
} 
mysqli_close($con);
?>