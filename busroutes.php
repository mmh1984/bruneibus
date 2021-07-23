

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

<body  style='height:100vh;' >
 <nav class="navbar navbar-default mainnav" >
        <div class="container">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><IMG SRC="assets/img/1200px-Flag_of_Brunei.svg.png" class='img-responsive'></div>
            <div class="collapse navbar-collapse" id="navcol-1">
             <h1 style='color:#fff;'>BRUNEI BUS ROUTES<h1>
               
            </div>
        </div>
    </nav>
    <div class='container'><br />
    <?php
	if(!isset($_GET['busid'])){
	echo "<script> alert('You cannot access this page!')</script>";
		echo "<script> window.location.href='index.php'</script>";
	}
	else{
	$id=$_GET['busid'];
	}
	
	?>
<input type='hidden' id='busid' value='<?php  echo $id; ?>' />
    	<div class='row'>
        	
            <div class='col-md-12'>
            <div class='well page-header' id='busno' >
         
            	<h2><img src='assets/img/busicon.png' width='30px'> Bus no: no selection</h2>
                <button class='btn btn-primary' id='btnadd' onclick="window.location.href='index.php'" >Back</button>
               
            </div>
            <div class='row'>
            <div class='col-md-6' id='busroutes'>
            <div class='jumbotron alert-info'>
            Select bus to load bus routes
            </div>
            </div>
            <div class='col-md-6'>
                <div id='map'></div>
                <hr/>
                  <div id="reviews" class='alert alert-success'></div>
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



</body>
</html>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(e) {
	bus_details($("#busid").val());
show_reviews($("#busid").val());

});

function show_reviews(op) {
		
	   $.ajax({
		url:"functions/load_comments",
		type:"POST",  
		data:{
			op:op
			
		},
		success: function(result){
			//alert(result)
		$("#reviews").html(result);
		   
	    }	
		
	});
	}

  function bus_details(id){
$("#busno h2").html("BUS SELECTED:" + "<span id='busselected'style='color:red;font-weight:bold;'>"+id+"</span>");
$("#btnadd").show();
load_busroutes(id);
}  

function load_busroutes(id){
	$("#busroutes").html("<img src='assets/img/loading.gif' class='center-block' width='50px'>");
	$.ajax({
	type:"POST",
	url:"functions/loadroutes2.php",
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
		initialize(coordinates);
		}
		else{
		initialize();	
			
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

if(selected.length=0){
	alert("No route selected");	
}
else{
	alert(selected.length)
	busno=$("#busselected").html();	
	$.ajax({
	type:"POST",
	url:"functions/deleteroutes.php",
	data:{
		id:selected	
	},
	success: function(result){
		alert(result);
		/*
		if(result=="success"){
			alert("Route(s) deleted");
			load_busroutes(busno)	
		}
		else{
		alert(result);
		}
		*/
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