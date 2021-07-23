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
    
    
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg8eYOriC50qwXC8t--P4c2LhX-Ef_CVk"></script>
    <script>
      // In this example, we center the map, and add a marker, using a LatLng object
      // literal instead of a google.maps.LatLng object. LatLng object literals are
      // a convenient way to add a LatLng coordinate and, in most cases, can be used
      // in place of a google.maps.LatLng object.

      var map;
	  var infowindow=[];
	  
      function initialize(coor) {
		  var l1=parseFloat($("#coor1").val());
		  var l2=parseFloat($("#coor2").val());
        var mapOptions = {
          zoom: 11,
          center: {lat:l1 , lng:l2 }
        };
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);



var flightpoints=[];
var names;
		for(x=0;x<coor.length;x++){
			  l1=parseFloat(coor[x].lat);
		  l2=parseFloat(coor[x].lng);
		  names=coor[x].place;
        var marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng(-34.397, 150.644)
		
          position: {lat: l1, lng: l2},
          map: map,
		  icon:"assets/img/stop.png",
		 
        });
		
		flightpoints.push(new google.maps.LatLng(l1,l2));
		
		infowindow=new google.maps.InfoWindow({
          content: "<p style='font-size:.6em;margin:0;padding:0;color:red;font-weight:bold;'>" + names + "</p>"
        });
		 infowindow.open(map, marker);

/*
    google.maps.event.addListener(marker, 'click', function() {
         
       });
	   
	   */
		
		}
		//polyline
		var flightPath = new google.maps.Polyline({
    	path: flightpoints,
    	strokeColor: "#0000FF",
    	strokeOpacity: 0.8,
    	strokeWeight: 2
  		});
  		flightPath.setMap(map);
		
        // You can use a LatLng literal in place of a google.maps.LatLng object when
        // creating the Marker object. Once the Marker object is instantiated, its
        // position will be available as a google.maps.LatLng object. In this case,
        // we retrieve the marker's position using the
        // google.maps.LatLng.getPosition() method.
       
	   
      }
	  
	  //when the user selects
	  function initialize_selected(name) {
		  var l1=parseFloat($("#coor1").val());
		  var l2=parseFloat($("#coor2").val());
        var mapOptions = {
          zoom: 11,
          center: {lat:l1 , lng:l2 }
        };
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);



		
        var marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng(-34.397, 150.644)
		
          position: {lat: l1, lng: l2},
          map: map,
		  icon:"assets/img/stop.png",
		 
        });
		
		
		//polyline
		
		
        // You can use a LatLng literal in place of a google.maps.LatLng object when
        // creating the Marker object. Once the Marker object is instantiated, its
        // position will be available as a google.maps.LatLng object. In this case,
        // we retrieve the marker's position using the
        // google.maps.LatLng.getPosition() method.
        var infowindow = new google.maps.InfoWindow({
          content: "<p style='font-size:.6em;margin:0;padding:0;color:red;font-weight:bold;'>" + name + "</p>"
        });

   
          infowindow.open(map, marker);
       
      }
	  
	  

      //google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body  style='height:100vh;'>
 <div style='background:linear-gradient(#900,#F00);padding:10px;' class='   mainnav'>
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
               
                <button class="btn btn-default navbar-btn navbar-right" type="button" id='btnlogout'><strong>LOGOUT</strong></button>
                <button class="btn btn-primary navbar-btn navbar-right" type="button" id='btnplace'><strong>LANDMARKS AND PLACES</strong></button>
                  <button class="btn btn-primary navbar-btn navbar-right" type="button" data-toggle='modal' data-target='#modal2'><strong>EDIT PROFILE</strong></button>
            </div>
        </div>
    </div>
    <div class='container-fluid'>
    	<div class='row  main'>
        	<div class='col-md-2' style='height:100vh;overflow:auto;'>
            <h4>Select a bus to view details</h4>
            <table class='table table-responsive table-condensed'>
            	
                
                 <?php
				include 'connection.php';
				$query=mysqli_query($con,"SELECT * FROM tblbus ORDER BY BusNo ASC");
				
				while($row=mysqli_fetch_array($query)){
					$src='assets/img/bus/'.$row[0].'.png';
				?>
                    <tr>
                     <td style='text-align:center;'><img  width='80px' onclick='bus_details("<?php echo $row[0];?>")' src='<?php echo $src ?>'/></td>
                       
                        
                    </tr>
                 <?php
				}
				mysqli_close($con);
				 ?>   
            </table>
            </div>
            <div class='col-md-10'>
            <div class='well page-header' id='busno'>
            	<h2>Bus no: no selection</h2>
                <button class='btn btn-primary' id='btnadd' data-target='#modal1' data-toggle='modal' >Add routes</button>
               
            </div>
            <div class='row'>
            <div class='col-md-6' id='busroutes'>
            <div class='jumbotron alert-info'>
            Select bus to load bus routes
            </div>
            </div>
            <div class='col-md-6' id='map'>
          
            </div>
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
        <h4 class="modal-title">Brunei Landmark and Places</h4>
      </div>
      <div class="modal-body">
        
        <input type='text' class='form-control' placeholder="search" id='txtsearch' />
        <p>Select a place to tag</p>
        <div id='ajaxplaces'>
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
  <!--hidden var-->
  <input type='hidden' id='coor1' value='4.885966' /> <input type='hidden' id='coor2' value='114.931658'/>
</div>

<div id="modal2" class="modal fade" role="dialog">
  <div class="modal-dialog lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Administrator Profile</h4>
      </div>
      <div class="modal-body">
      <?php
	  $useremail=$_SESSION["username"];
	  include 'connection.php';
	  
	  $query=mysqli_query($con,"SELECT * FROM tblusers WHERE email='$useremail'");
	  while($row=mysqli_fetch_array($query)){
	  ?>
      <p class='alert alert-info' id='message'></p>
        <table class='table table-responsive'>
        <tr>
        <th>Full name:</th><td><input type='text' id='fname' class='form-control' value='<?php  echo $row[2];?>'/>
        </tr>
        
          <tr>
        <th>Password:</th><td><input type='password' id='password' class='form-control' value='<?php  echo $row[1];?>' />
        </tr>
        
          <tr>
        <th>Email (username):</th><td><input type='email' id='email' class='form-control' value='<?php  echo $row[3];?>' />
        </tr>
        
          <tr>
        <th><input type='hidden' id='userid' value='<?php  echo $row[0];?>' /></th><td><button class='btn btn-primary' id='btnUpdateProfile'>Update</button>
        </tr>
        </table>
        <?php
	  }
		?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
  <!--hidden var-->
  <input type='hidden' id='coor1' value='4.885966' /> <input type='hidden' id='coor2' value='114.931658'/>
</div>

</body>
</html>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(e) {
	$("#btnadd").hide();
   load_places(" ");
   $('#txtsearch').keypress(function(e) {
    load_places($(this).val());
});
$("#btnplace").click(function(e) {
    window.location.href='landmarks.php';
});

});

  function bus_details(id){
$("#busno h2").html("BUS SELECTED:" + "<span id='busselected'style='color:red;font-weight:bold;'>"+id+"</span>");
$("#btnadd").show();
load_busroutes(id);
}  

function load_busroutes(id){
	$("#busroutes").html("<img src='assets/img/loading.gif' class='center-block' width='50px'>");
	$.ajax({
	type:"POST",
	url:"functions/loadroutes.php",
	cache:false,
	data:{
	  busno:id	
	},
	
	success:function(result){
		$("#busroutes").html(result);
		load_coordinates(id);
	}
	
	});
	
}
function load_coordinates(id){
	
	$.ajax({
	type:"POST",
	url:"functions/getcoordinates.php",
	cache:false,
	data:{
	  busno:id	
	},
	
	success:function(result){
		
		if((result.length)>0){
			var coordinates=JSON.parse(result);
			if(result!=null){
		initialize(coordinates);
			}
		}
		
		
		
	}
	
	});
	
}

function load_places(place){
	
	$("#ajaxplaces").html("<img src='assets/img/loading.gif' class='center-block' width='50px'>");
	$.ajax({
	type:"POST",
	url:"functions/loadplaces.php",
	cache:false,
	data:{
	  place:place	
	},
	
	success:function(result){
		$("#ajaxplaces").html(result);
		
	}
	
	});
	
}
function view_location(lat,lang,name){
$("#coor1").val(lat);
$("#coor2").val(lang);
initialize_selected(name);	
	
}
function tag_location(place){
busno=$("#busselected").html();	

$.ajax({
		
	type:"POST",
	url:"functions/tagplaces.php",
	cache:false,
	data:{
	  busno:busno,
	  place:place	
	},
	
	success:function(result){
		alert(result);
		load_busroutes(busno);
		
	}
});

 
}
function delete_route(){
	var selected=[];
$("input[name='select[]']:checked").each(function(index, element) {
	selected.push($(this).val());
    
});

if(selected.length==0){
	alert("No route selected");	
}
else{
	busno=$("#busselected").html();	
	
	$.ajax({
	type:"POST",
	cache:false,
	url:"functions/deleteroutes.php",
	data:{
		routeid:selected
	},
	success: function(result){
		
		if(result=="success"){
			alert("Route(s) deleted");
			load_busroutes(busno)	
			initialize("");
		}
	}
		
	});
}

}

$("#btnUpdateProfile").click(function(e) {
	$("#message").html("<img src='assets/img/loading.gif' class='center-block' width='50px'>");
    name=$("#fname").val();
	pass=$("#password").val();
	email=$("#email").val();
	id=$("#userid").val();
	
	if(name==''){
		$("#message").html("Please enter your name");
	}
	else if(pass==''){
		$("#message").html("Please enter your password");
	}
	else if(email==''){
		$("#message").html("Please enter your email");
	
	}
	else{
		$.ajax({
		type:"POST",
		url:"functions/updateprofile.php",
		cache:false,
		data:{
			id:id,
			name:name,
			pass:pass,
			email:email,	
		},
		success: function(result){
			if(result=="success"){
				alert("Your profile is updated! You need to login to continue");
				window.location.href='logout.php';
			}
			else{
				$("#message").html(result);	
			}	
		}
			
		});
		
	}
	
});

$("#btnlogout").click(function(e) {
    var con=confirm("Confirm logout? \n (Yes/Cancel)");
	
	if(con==true){
	 window.location.href='logout.php';	
	}
});
</script>	