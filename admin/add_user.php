<?php
define("PAGE","Student/User");
define("Title","Add User");
include_once("conn.php");
include_once('includes/header.php');
if(isset($_POST['sub6'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$city=$_POST['city'];
	$password=$_POST['password'];
	$q6="insert into user(name, email, mobile, city,password) values('$name','$email','$mobile','$city','$password')";
	$run6=mysqli_query($con,$q6);
	if($run6){
		$msg="<div class='alert alert-success mt-4 p-2'>Submitted Successfully</div>";
	}
	else{
		$msg="<div class='alert alert-danger mt-4 p-2'>Submit fail</div>";
	}
}
?>
<div class="col-md-6 col-sm-8">
<div class="jumbotron">
<h3 class="text-center">Add New Student/User</h3>
<form action="" method="post">
<div class="form-group">
Name
<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
Email
<input type="text" name="email" class="form-control" required>
</div>
<div class="form-group">
Mobile
<input type="text" name="mobile" class="form-control">
</div>
<div class="form-group">
City
<input type="text" name="city" class="form-control">
</div>
<div class="form-group">
Password
<input type="text" name="password" class="form-control">
</div>
<div class="form-group">
<input type="submit" name="sub6" class="btn btn-danger" value="Submit">
<a href="user.php" class="btn btn-secondary ml-2">Close</a>
</div>
</form>
<?php
if(isset($msg)){
	echo$msg;
}
?>
</div>
</div>

</div><!-- row ended -->
</div>
<!-- link all script needed-->
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>