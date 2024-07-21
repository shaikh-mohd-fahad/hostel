<?php
include_once("conn.php");
//$con=mysqli_connect("localhost","root","","hostel");
function verify($value){
	global $con;
	$value=htmlentities($value);
	$value=mysqli_real_escape_string($con,$value);
	return $value;
}