<?php
include '../connection.php';

$busno=$_POST['busno'];

$query=mysqli_query($con,"SELECT
tblplaces.LANDMARK,
tblplaces.TYPE,
tblplaces.AREA,
tblplaces.LAT,
tblplaces.LANG,
tblroutes.ID
FROM
tblroutes ,
tblplaces ,
tblbus
WHERE
tblroutes.busno = tblbus.BusNo AND
tblroutes.placeid = tblplaces.ID AND
tblroutes.busno = '$busno'");
echo "<h3>Bus Routes</h3>";

if(mysqli_num_rows($query) > 0) {
	echo "<button class='btn btn-danger btn-sm pull-right' onclick='delete_route()' id='btndelete'>Delete Selected</button>";
echo "<table class='table table-striped table-responsive'>
		<tr>
		<th>Option</th>
		<th>Name</th>
		<th>Type</th>
		<th>Area</th>
		</tr>";
while($row=mysqli_fetch_array($query)){
		echo "<tr>
		<td><input type='checkbox' name='select[]' value='$row[5]'></td>
			<td><button class='btn btn-primary' onclick='view_location(\"$row[3]\",\"$row[4]\",\"$row[0]\")'>".$row[0]."</button></td>
			<td>".$row[1]."</td>
			<td>".$row[2]."</td>
		</tr>";
		

	
}	
echo "</table>";	
}
else{
echo "<p class='alert alert-info'>No Results found</p>";	
	
} 
mysqli_close($con);
?>