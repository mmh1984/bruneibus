<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRUNEI BUS ROUTE SYSTEM</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/bootstrap/fonts/font-awesome.min.css">
</head>

<body >
    <div class="container-fluid mainnav">
       <div class='row' style='background:linear-gradient(#900,#F00);'>
      
       <div class='col-md-2'>
     
       <IMG style='padding:10px;' SRC="assets/img/1200px-Flag_of_Brunei.svg.png" class='img img-responsive center-block'>
       </div>
       <div class='col-md-6'>
      <h1>BRUNEI <small style='color:#FC0;'>Bus Routes</small></h1>
       </div>
       <div class='col-md-3'>
       <br/>
       <button class="btn btn-primary navbar-btn navbar-right" type="button" data-target='#modal1' data-toggle='modal'><strong><span class='glyphicon glyphicon-user'></span> ADMIN LOGIN</strong></button>
       </div>
       
       </div>
    </div>
  
    <div class="container main">
       <div class='row' style='height:10px;'></div>
        <div class="row product" >
            <div class="col-md-5 col-md-offset-0"><img class="img-responsive" src="assets/img/069-tourism-bus-free-vector.png">
              <p class='alert alert-link'> Download the brunei bus route map <a href="assets/files/New Bus Route.pdf" download='Brunei-Muara Bus Routes'>here</a></p>
            </div>
            <div class="col-md-7">
                
              <div class='panel panel-primary'>
                <div class='panel-heading' ><span class='glyphicon glyphicon-bookmark'>&nbsp;</span>YOUR VIEWS AND SUGGESTIONS ARE IMPORTANT TO US</div>
                <div class='panel-body'>IN OUR CONTINUOUS EFFORT TO IMPROVE THE BUS SERVICES, YOU ARE CORDIALLY INVITED TO POST YOUR VIEWS AND SUGGESTION TO US AT:
                <BR/><BR/>
                <span class='glyphicon glyphicon-link'></span>
                <span class='btn btn-link'><a href="mailto:info.minicom@minicom.gov.bn">info.minicom@minicom.gov.bn</a></span>
                <BR/>
                <br/>
                THANK YOU FOR YOUR COOPERATION AND FULL SUPPORT
              <br/>
             
                
               
                <img src='assets/img/ministry.PNG' class='img img-responsive img-thumbnail center-block'>
                <br/>
                </div> 
                </div>
                </div>
        </div>
        <!--bus details-->
        <div class='panel panel-primary'>    
        <div class='panel-heading'>BUS DETAILS</div>
          
        <div class='panel-body'>
         <div class='alert alert-info'>
        <h4>BUS OPERATION IS FROM 6AM TO 8PM DAILY</h4>
        <P>Fare: $1 (Adults) $.50 (Senior Citizen and Children)</P>
        </div> 
        <table class="table table-bordered table-condensed text-center" width="80%" style='margin:auto;'>
                <thead>
                    <tr>
                     
                        <th>Bus Number</th>
                         <th>Routes</th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php
				include 'connection.php';
				$query=mysqli_query($con,"SELECT * FROM tblbus ORDER BY BusNo ASC");
				
				while($row=mysqli_fetch_array($query)){
					$src='assets/img/bus/'.$row[0].'.png';
				?>
                    <tr>
                     
                        <td><img src='<?php echo $src;?>' class='imgbus'/></td>
                       <td><button class='btn btn-primary' onClick="view_routes('<?php echo $row[0];?>')">View</button></td>
                        
                    </tr>
                 <?php
				}
				mysqli_close($con);
				 ?>   
                 </tbody>
            </table>
        
        </div>
      <!--panel body-->
       </div>
         <!--end of bus details -->              
        
        <div class="page-header">
            <h3>Reviews</div>
        <div id='reviews'></div>
        
    </div>
    <footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>&copy; Brunei Bus Route 2018</h5></div>
                <div class="col-sm-6 social-icons"><a href="#"><span class="fa fa-facebook"></span></a><a href="#"><span class="fa fa-twitter"></span></a><a href="#"><span class="fa fa-instagram"></span></a></div>
            </div>
        </div>
        <div></div>
    </footer>
   
       <div id="modal1" class="modal fade" role="dialog">
  <div class="modal-dialog  rounded">
    <div class="modal-content">
      
      <div class="modal-body" style='text-align:center;'>
         <h3><span class='glyphicon glyphicon-user'></span>&nbsp;Administrator Login</h3>
       <div class='row'>
       <div class='col-md-2'></div>
       <div class='col-md-8'>
       <p id='error' class='aler alert-danger'></p>
       		<table class='table table-condensed'>
            <tr>
            <td>
            <input type='email' class='form-control small' placeholder="email" id='email'></td>
            </tr>
            <tr>
            <td><input type='password' class='form-control' placeholder="password" id='pass'></td>
            </tr>
            
             <tr>
            <td><button class='btn btn-primary' onClick="login_user()">Login</button>
            <button class='btn btn-default' data-dismiss="modal">Cancel</button>
            </td>
            </tr>
            </table>
            </div>
            <div class='col-md-2'></div>
       </div>
      </div>
     
    
    </div>
    </div>
</body>

</html>
 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
	
	$(document).ready(function(e) {
        show_reviews("all");
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
	function login_user(){
	var email=$("#email").val();
	var pass=$("#pass").val();
	
	if(email.length==0){
		$("#error").html("Please enter your email");
	}
	else if(pass.length==0){
		$("#error").html("Please enter your password");
	}
	else {
		$("#error").html("");
		
		$.ajax({
		type:"POST",
		cache:false,
		url:"functions/adminlogin.php",
		data:{
			email:email,
			password:pass
		},
		success: function(result){
		if(result=='success'){
		alert("Login successful");
		window.location.href='bussettings.php';	
		}	
		else{
		$("#error").html("Invalid username or password");	
		}
			
		}	
			
		});
	}
	
	}
	
	function view_routes(id){
	
	window.location.href='busroutes.php?busid='+id	
	}
	</script>