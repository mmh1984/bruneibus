<?php


$op=$_POST['op'];

switch($op){
	
  case "all";
  load_all_reviews();
  break;
  
  default:
  load_filtered($op);
  break;	
	
}
function load_all_reviews(){
	include '../connection.php';
	$query=mysqli_query($con,"SELECT * FROM tblcomments ORDER BY commentdate DESC");
	
	if((mysqli_num_rows($query))>0) {
		
		while ($row=mysqli_fetch_array($query)){
			echo "<div class=\"media\">
            <div class=\"media-body\">
                <h4 class=\"media-heading\">$row[1]</h4>
                <div>";
				for($x=0;$x<$row[4];$x++){
				echo "<span class=\"fa fa-star\">";
				}
				echo "</div>
                <p>$row[3]</p>
                <p><span class=\"reviewer-name\"><strong>$row[2]</strong></span> on <span class=\"review-date\">$row[5]</span></p>
            </div>
        </div>";
			
			
		}
	} 
	else {
	echo "<div class='well'>No reviews</div>";	
		
	}
	
	
	
	
}


function load_filtered($op){
	include '../connection.php';
	$query=mysqli_query($con,"SELECT * FROM tblcomments  WHERE busno='$op' ORDER BY commentdate DESC ");
	
	if((mysqli_num_rows($query))>0) {
		echo "<h3 class='panel-heading'>User Reviews</h3>";
		while ($row=mysqli_fetch_array($query)){
			echo "<div class=\"media well\">
            <div class=\"media-body\">
                <h4 class=\"media-heading\">$row[1]</h4>
                <div>";
				for($x=0;$x<$row[4];$x++){
				echo "<span class=\"fa fa-star\">";
				}
				echo "</div>
                <p>$row[3]</p>
                <p><span class=\"reviewer-name\"><strong>$row[2]</strong></span> on <span class=\"review-date\">$row[5]</span></p>
            </div>
        </div>";
			
			
		}
	} 
	else {
	echo "<div class='well'>No reviews</div>";	
		
	}
	
	
	
	
}
?>