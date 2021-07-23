<?php
session_start();

if(!isset($_SESSION['username'])){
	echo "<script>alert('You dont have access to this page!')</script>";
	echo "<script>window.location.href='index.php'</script>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRUNEI BUS ROUTE SYSTEM</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/bootstrap/fonts/font-awesome.min.css">
    
    
     
</head>

<body  style='height:100vh;'>
 <div style='background:linear-gradient(#900,#F00);padding:10px;'>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><IMG SRC="assets/img/1200px-Flag_of_Brunei.svg.png" class='img-responsive'></div>
            <div class="collapse navbar-collapse" id="navcol-1">
              <a class="navbar-brand navbar-link" href="#" style='color:#fff;'>&nbsp;BRUNEI BUS ROUTES</a>
               
                <button class="btn btn-default navbar-btn navbar-right" type="button"><strong>LOGOUT</strong></button>
                <button class="btn btn-primary navbar-btn navbar-right" type="button" id='btnback'><strong>BACK TO BUS DETAILS</strong></button>
            </div>
        </div>
    </div>
    <div class='container-fluid'>
    	<div class='row'>
        	<h1></h1>
        </div>
    	<div class='row'>
        	<div class='col-md-4'>
            <h4 class='page-header'>Step 1: Choose a Category</h4>
            <ul style='list-style:none;'>
            <li style='margin:5px;'><img src='assets/img/district.png' id='district' style='cursor:pointer;'/></li>
             <li style='margin:5px;'><img src='assets/img/hotels.png' id='hotels' style='cursor:pointer;'/></li>
              <li style='margin:5px;'><img src='assets/img/shopping.png' id='shopping' style='cursor:pointer;'/></li>
              <li><button class='btn btn-primary' data-toggle='modal' data-target='#modal1'><span class='glyphicon glyphicon-plus' ></span>&nbsp;Add new place</button></li>
            </ul>
            
            </div>
        <div class='col-md-4' >
         <h4 class='page-header'>Step 2: Choose a place to edit</h4>
         <div class='well' id='category' style='overflow-x:auto;height:400px;'>no category selected</div>
        </div>
        <div class='col-md-4'>
         <h4 class='page-header'>Step 3: Edit Details</h4>
        <div class='well' id='step3'>no place selected</div>
        <div class='well' id='editform'>
        <p id='message' class='alert alert-info'></p>
        <table class='table table-condensed'>
        <tr>
        	<th>Name</th>
            <td>
            <input type='hidden' id='placeid'/>
            <input type='text' id='name' class='form-control'/></td>
        </tr>
        
          <tr>
        	<th>Type</th>
            <td><select id='type' class='form-control'>
            	<option value='HOTEL'>HOTEL</option>
                <option value='SHOPPING AREAS AND INTEREST'>SHOPPING AREAS AND INTEREST</option>
                <option value='DISTRICT AND CROSS BORDER TRAVEL'>DISTRICT AND CROSS BORDER TRAVEL</option>
            </select>
            </td>
        </tr>
         <tr>
        	<th>Area</th>
            <td><input type='text' id='area' class='form-control'/></td>
        </tr>
         <tr>
        	<th>Coordinate (LAT)</th>
            <td><input type='text' id='lat' class='form-control'/></td>
        </tr>
        
         <tr>
        	<th>Coordinate (LNG)</th>
            <td><input type='text' id='lng' class='form-control'/></td>
        </tr>
         <tr>
        	<th></th>
            <td><button class='btn btn-primary' id='btnupdate'>UPDATE</button>
            <button class='btn btn-danger' id='btndelete'>DELETE</button></td>
        </tr>
        </table>
        
        </div>
        </div>
        </div>
    
    </div>
    
    <div id="modal1" class="modal fade" role="dialog">
  <div class="modal-dialog lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new place</h4>
      </div>
      <div class="modal-body">
        <p class='alert alert-dismissable' id='warning'></p>
       <table class='table table-condensed'>
        <tr>
        	<th>Name</th>
            <td>
          
            <input type='text' id='name1' class='form-control'/></td>
        </tr>
        
          <tr>
        	<th>Type</th>
            <td><select id='type1' class='form-control'>
            	<option value='HOTEL'>HOTEL</option>
                <option value='SHOPPING AREAS AND INTEREST'>SHOPPING AREAS AND INTEREST</option>
                <option value='DISTRICT AND CROSS BORDER TRAVEL'>DISTRICT AND CROSS BORDER TRAVEL</option>
            </select>
            </td>
        </tr>
         <tr>
        	<th>Area</th>
            <td><input type='text' id='area1' class='form-control'/></td>
        </tr>
         <tr>
        	<th>Coordinate (LAT)</th>
            <td><input type='text' id='lat1' class='form-control'/></td>
        </tr>
        
         <tr>
        	<th>Coordinate (LNG)</th>
            <td><input type='text' id='lng1' class='form-control'/></td>
        </tr>
         <tr>
        	<th></th>
            <td><button class='btn btn-primary' id='btnSave'>Save</button>
            
        </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
  <!--hidden var-->
 
</div>
</body>
</html>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(e) {
	$("#editform").hide();
$("#btnback").click(function(e) {
   window.location.href='bussettings.php' 
});

$("#district").click(function(e) {
    load_category("DISTRICT AND CROSS BORDER TRAVEL");
});

$("#hotels").click(function(e) {
    load_category("HOTEL");
});

$("#shopping").click(function(e) {
    load_category("SHOPPING AREAS AND INTEREST");
});


});

function load_category(type){
	$("#category").html("<img src='assets/img/loading.gif' class='center-block' width='50px'>");
	
	$.ajax({
	type:"POST",
	url:"functions/loadcategory.php",
	cache:false,
	data:{
		type:type
	},
	success: function(result){
		$("#category").html(result);
	}
		
	});
}
function edit_place(id){
	
$("#step3").hide();
$("#editform").show();

$.ajax({
	type:"POST",
	url:"functions/loadselectedplace.php",
	cache:false,
	data:{
		ID:id	
	},
	success: function(result){
		
	var data=JSON.parse(result);
	$("#placeid").val(data[0].ID)
	$("#name").val(data[0].LANDMARK);	
	$("#type").val(data[0].TYPE);	
	$("#area").val(data[0].AREA);
	$("#lat").val(data[0].LAT);	
	$("#lng").val(data[0].LANG);
	}	
	
});


}

$("#btnupdate").click(function(e) {
    var id=$("#placeid").val();
	
	if($("#name").val()==""){
		$("#message").html("Enter place name");
	}
	
	else if($("#area").val()==""){
		$("#message").html("Enter area");
	}
	
	else if(isNaN(parseFloat($("#lat").val()))){
	$("#message").html("Invalid LAT value");
		
	}
	else if(isNaN(parseFloat($("#lng").val()))){
	$("#message").html("Invalid LNG value");
		
	}
	else{
	$.ajax({
	type:"POST",
	url:"functions/updateplace.php",
	cache:false,
	data:{
		ID:id,
		name:$("#name").val(),
		type:$("#type").val(),
		area:$("#area").val(),
		lat:$("#lat").val(),
		lng:$("#lng").val(),
	},
	success: function(result){
		if(result=="success"){
			alert("Successfully updated this place");
			window.location.href='landmarks.php';	
		}
		else {
			alert(result);	
		}
	}	
		
	});
	}
});

$("#btnSave").click(function(e) {
    
	name=$("#name1").val();
	type=$("#type1").val();
	area=$("#area1").val();
	lat=$("#lat1").val();
	lng=$("#lng1").val();
	
	if(name=="") {
	$("#warning").html("Enter the name of the place");	
	}
	else if(area=="") {
	$("#warning").html("Enter the area");	
	}
	
	else if(isNaN(parseFloat(lat))) {
	$("#warning").html("Enter a valid latitude");	
	}
	
	else if(isNaN(parseFloat(lng))) {
	$("#warning").html("Enter a valid longitude");	
	}
	
	else{
		$("#warning").html("<img src='assets/img/loading.gif' class='center-block' width='50px'>");	
	$.ajax({
	type:"POST",
	url:"functions/addplace.php",
	cache:false,
	data:{
	
		name:$("#name1").val(),
		type:$("#type1").val(),
		area:$("#area1").val(),
		lat:$("#lat1").val(),
		lng:$("#lng1").val(),
	},
	success: function(result){
		if(result=="success"){
			$("#warning").html("Successfully added a new place")
			
		}
		else {
			$("#warning").html(result)
		}
	}	
		
	});
	}
});
$("#btndelete").click(function(e) {
    var con=confirm("Deleting this place will remove it from the routes and comments.\n (Yes->Continue||Cancel->Abort)");
	
	if(con==true){
	$.ajax({
		type:"POST",
		url:"functions/deleteplace.php",
		cache:false,
		data:{
			ID:$("#placeid").val()
		},
		success: function(result){
			if(result=="success"){
			alert("Successfully deleted this place");
			window.location.href='landmarks.php';	
		}
		else {
			alert(result);	
		}
		}
		
	});	
	}
	
});
</script>	