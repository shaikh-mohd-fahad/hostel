<?php
define("PAGE","Change Password");
define("Title","Change Password");
include_once("conn.php");
include_once('includes/header.php');
if(isset($_COOKIE['admin_id']) && isset($_COOKIE['admin_name'])){
	$_SESSION['admin_id']=$_COOKIE['admin_id'];
	$_SESSION['admin_name']=$_COOKIE['admin_name'];
}else{
	echo"<script>location.href='login.php';</script>";
}
$admin_id=$_SESSION['admin_id'];
$q9="select * from admin where id='$admin_id'";
$run9=mysqli_query($con,$q9);
$row9=mysqli_fetch_array($run9);
?>
<div class="col-md-9 mt-5 ml-3">
<form method="post" id="form_change_password" class="mb-4">
<div class="form-group">
<label>Email</label>
<input type="email" value="<?php echo$row9['email'];?>" disabled class="form-control">
<input type="hidden" name="change_pass_id" value="<?php echo$row9['id'];?>">
</div>
<div class="form-group">
	<label>Old Password</label>
	<input type="password" required placeholder="Enter Old Password" class="form-control" name="old_pass" id="old_pass">
	<label for="hide_and_show_old_pass" style="cursor:pointer"><input type="checkbox" id="hide_and_show_old_pass"> <small>Show Password</small></label>
</div>
<div class="form-group">
	<label>New Password</label><span id="wrong_pass" class="text-danger float-right"></span>
	<input type="password" required placeholder="Enter New Password" class="form-control" name="new_pass" id="password">
	<label for="hide_and_show_pass" style="cursor:pointer"><input type="checkbox" id="hide_and_show_pass"> <small>Show Password</small></label>
</div>
<div class="form-group">
	Confirm New Password:<span class="float-right text-danger" id="wrong_pass2"></span>
	<input type="password" class="form-control" placeholder="Confirm Your Password" name="con_password" required id="con_password">
	<label for="hide_and_show_con_pass" style="cursor:pointer"><input type="checkbox" id="hide_and_show_con_pass"> <small>Show Confirm Password</small></label> 
</div>
<div  class="form-group">
<button type="submit" class="btn btn-danger" name="sub10" id="sub10">Update Password</button>
<input type="reset" value="Reset" class="ml-2 btn btn-secondary">  
</div>

</form>
<span id="show_submiting_error10" class='mt-4'></span>
</div>
<?php
include_once('includes/footer.php');
?>
<script>pass_button="#sub10";</script>
<script src="js/password.js"></script>
<script>
$(document).ready(function(){
	//changing password start
	$("#form_change_password").submit(function(e){
		e.preventDefault();
		if(error_count1==0 && error_count2==0 && error_count3==0){
			dataa10=$("#form_change_password").serialize();
			$.ajax({
				url:"server.php",
				type:"post",
				data:dataa10,
				beforeSend:function(){
					$("#sub10").html("<i class='fas fa-sync fa-spin'></i>");
				},
				success:function(response10){
					//alert(response8);
				   $("#sub10").html("Update Password");
					$("#show_submiting_error10").html(response10);
				}
			});
		}else{
			alert("please fill form properly");
		}
	});
	//changing password
	
	//hide and  show old password start
	$("#hide_and_show_old_pass").click(function(){
	check_status=$("#hide_and_show_old_pass").is(":checked");
	if(check_status==true){
		//show password
		$("#old_pass").attr("type","text");
	}
	else{
		//hide password
		$("#old_pass").attr("type","password");
	}
	//hide and  show old password end
});
});
</script>