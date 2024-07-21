<?php
if(session_id()==''){
	session_start();
}
if(isset($_COOKIE['admin_id']) && isset($_COOKIE['admin_name'])){
	$_SESSION['admin_id']=$_COOKIE['admin_id'];
	$_SESSION['admin_name']=$_COOKIE['admin_name'];
}else{
	echo"<script>location.href='login.php';</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
<title><?php echo Title;?></title>
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
<nav class="navbar navbar-fixed navbar-expand-md navbar-dark bg-primary py-0 d-print-none">
<div class="container" style="position:relative"><a href="#" class="navbar-brand my-0"><strong><i>Stayiin</i></strong> <strong  style="position:absolute;right: 2%;">Welcome <?php echo$_SESSION['admin_name'];?></strong></div></a>
</nav>
<div class="container-fluid">
<div class="row"><!-- row started -->
<div class="col-md-2 bg-light p-3 d-print-none"><!-- col-md-2 started -->
<ul class="nav nav-pills flex-column mt-4">

<li class="nav-item "> <a href="index.php" class="nav-link <?php if(PAGE=='Dashboard'){echo'active';} ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>

<li class="nav-item"> <a href="hostel_owner.php" class="nav-link <?php if(PAGE=='Hostel Owner'){echo'active';} ?>"><i class="fab fa-accessible-icon"></i> Hostel Owner</a></li>
<li class="nav-item"> <a href="user.php" class="nav-link <?php if(PAGE=='Student/User'){echo'active';} ?>"><i class="fa fa-user"></i> User</a></li>

<li class="nav-item"> <a href="hostel_list.php" class="nav-link <?php if(PAGE=='Hostel List'){echo'active';} ?>"><i class="fa fa-user"></i> Hostel</a></li>

<li class="nav-item"> <a href="changepassword.php" class="nav-link <?php if(PAGE=='Change Password'){echo'active';} ?>"><i class="fas fa-key"></i> Change Password </a></li>

<li class="nav-item"> <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

</ul>
</div><!-- col-md-2 ended -->