<?php
if(session_id()==''){
	session_start();
}
if(isset($_COOKIE['admin_id']) && isset($_COOKIE['admin_name'])){
	echo"<script>location.href='index.php';</script>";
}
include_once("conn.php");
?>
<html>
<head>
<title>Admin Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!-- link bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- link font awesome -->
<link href="css/all.min.css" rel="stylesheet">
<!-- link custom css -->
<link href="css/customcss.css" rel="stylesheet">
</head>
<body>
<div class="container mt-2"> <!-- container start -->
<h1 class="mt-4 text-center">Welcome To Stayiin</h1>
<p class="text-center mt-3" style="font-size:20px"> <i class="fas fa-user-secret  text-danger"></i> Admin Login Area </p>
<div class="row p-3"><!-- row start -->
<div class="col-md-3"></div>
<div class="col-md-6 bg-white shadow p-3 rounded" id="box"><!-- col-md-6 start -->
<h3 class="text-center text-primary">Login to continue</h3>
<form id="form_admin_login" method="post">
<?php //below line will help me to submit data on server.php page ?>
<input type="hidden" name="form_admin_login_submit" value="login">
<div class="form-group">
Email:<span id="show_error"></span>
<input type="email" class="form-control" placeholder="Enter Email" name="email" required> 
</div>
<div class="form-group">
Password:
<input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required> 
<label for="hide_and_show_pass" style="cursor:pointer"><input type="checkbox" id="hide_and_show_pass"> <small>Show Password</small></label> 
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-block" id="sub1" name="sub1"> Log in </button>
</div>
</form>
<span class="float-right">
Create New Account <a href="signup.php"> Click Here</a>
</span>
<div class="row mt-5"><!-- row start -->
<div class="col-12 text-center">
<a href="forgot_pass.php">Forgotten Password?</a>
</div>
</div><!-- row end -->
</div><!-- col-md-6 end -->
<div class="col-md-3"></div>
</div><!-- row end -->
</div><!-- container end -->
<!-- link all script needed-->
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script>
$(document).ready(function(){
//hide and show password
	$("#hide_and_show_pass").click(function(){
		check_status=$("#hide_and_show_pass").is(":checked");
		if(check_status==true){
			//show password
			$("#password").attr("type","text");
		}
		else{
			//hide password
			$("#password").attr("type","password");
		}
	});
	//submiting all data to server
	$("#form_admin_login").submit(function(e){
		e.preventDefault();
		dataa=$("#form_admin_login").serialize();
		$.ajax({
			url:"server.php",
			type:"post",
			data:dataa,
			beforeSend:function(){
			    $("#sub1").html("<i class='fas fa-sync fa-spin'></i>");
			},
			success:function(response1){
			    $("#sub1").html("Log in");
				$("#show_error").html(response1);
			}
		});
	});
});
</script>
</body>
</html>