<?php
include '../connection.php';

$place=$_POST['place'];

$query=mysqli_query($con,"SELECT * FROM tblplaces WHERE LANDMARK LIKE '%$place%' OR AREA LIKE'%$place%' ORDER BY LANDMARK ASC");

if(mysqli_num_rows($query) > 0) {
echo "<table class='table table-striped table-responsive'>
		<tr>
		
		<th>Name</th>
		<th>Type</th>
		<th>Area</th>
		</tr>";
while($row=mysqli_fetch_array($query)){
		echo "<tr>
			<td><button class='btn btn-primary' onclick='tag_location(\"$row[0]\")'>".$row[1]."</button></td>
			<td>".$row[2]."</td>
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