<?php
define("PAGE","Dashboard");
define("Title","Dashboard");
include_once('includes/header.php');
include_once('includes/function.php');
include_once('conn.php');
$q3="select * from hostel_owners";
$run3=mysqli_query($con,$q3);
$num_rows3=mysqli_num_rows($run3);
$q4="select * from user";
$run4=mysqli_query($con,$q4);
$num_rows4=mysqli_num_rows($run4);
$q2="select * from admin";
$run2=mysqli_query($con,$q2);
$num_rows2=mysqli_num_rows($run2);
?>
<!-- ml-5 col-md-9 col-sm-9 mb-4 start -->
<div class="ml-5 col-md-9 col-sm-9 mb-4">
<div class="row"><!-- row dashboard start -->
<div class="col-md-4 mt-5"><!-- col-md-4 start -->
<div class="ml-2 card bg-danger text-white text-center pb-0" id="cardd"><!-- card start -->
<h6 class="card-header">Admin</h6>
<div class="card-body">
<p style="font-size:25px;"><?php echo$num_rows2;?></p>
<p><a href="#" class="text-white mb-0 pb-0">View</a></p>
</div>
</div><!-- card end -->
</div><!-- col-md-4 end -->
<div class="col-md-4 mt-5"><!-- col-md-4 start -->
<div class="ml-2 card bg-success text-white text-center pb-0" id="cardd"><!-- card start -->
<h6 class="card-header">Hostel Owners</h6>
<div class="card-body">
<p style="font-size:25px;"><?php echo$num_rows3;?></p>
<p><a href="hostel_owner.php" class="text-white mb-0 pb-0">view</a></p>
</div>
</div><!-- card end -->
</div><!-- col-md-4 end -->
<div class="col-md-4 mt-5"><!-- col-md-4 start -->
<div class="ml-2 card bg-info text-white text-center pb-0" id="cardd"><!-- card start -->
<h6 class="card-header">Students/Users</h6>
<div class="card-body">
<p style="font-size:25px;"><?php echo$num_rows4;?></p>
<p><a href="user.php" class="text-white mb-0 pb-0">View</a></p>
</div>
</div><!-- card end -->
</div><!-- col-md-4 end -->
</div><!-- row dashboard end -->
<!-- row Admin list start -->
<div class="row mt-5">
<div class="col-md-12">
<p class="bg-dark text-white p-2 text-center">Admin List</p>
</div>
<div class="col-md-12">
<div class="table-responsive-md">
<table class="table text-center">
<tr><th>Id</th><th>Admin Name</th><th>Admin Email</th><th>Mobile</th><th>City</th><th>Verification</th><th>Action</th></tr>
<tbody id="show_admin_list"></tbody>
</table>
</div>
</div>
</div>
<!-- row admin list end -->
<!-- row add new admin button modal start -->
<div class="row">
<div class="col-sm-12 float-right">
<div class="float-right">
<button class="btn btn-danger" data-toggle="modal" data-target="#add_admin_modal"><i class="fas fa-plus"></i></button>
</div>
</div>
</div>
<!-- row add new admin button modal end -->

<!-- this modal is dynamically called when edit button is clicked start -->
<div id="edit_admin_modal_area">

</div>
<!-- this modal is dynamically called when edit button is clicked start -->

<!-- Modal for adding new admin start -->
<div class="modal" id="add_admin_modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body start -->
      <div class="modal-body">
		<form id="form_add_admin" method="post">
		<input type="hidden" name="form_add_admin_submit" value="adding_new_admin">
		<div class="form-group">
		Name<span id="show_error"></span>
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
		Password: <span class="float-right text-danger" id="wrong_pass"></span>
		<input type="password" class="form-control" placeholder="Enter Password" name="password" required id="password">
		<label for="hide_and_show_pass" style="cursor:pointer"><input type="checkbox" id="hide_and_show_pass"> <small>Show Password</small></label>
		</div>
		<div class="form-group">
		Confirm Password:<span class="float-right text-danger" id="wrong_pass2"></span>
		<input type="password" class="form-control" placeholder="Confirm Your Password" name="con_password" required id="con_password">
		<label for="hide_and_show_con_pass" style="cursor:pointer"><input type="checkbox" id="hide_and_show_con_pass"> <small>Show Confirm Password</small></label> 
		</div>
		<div class="form-group">
		<button type="submit" name="sub8" id="sub8" class="btn btn-danger btn-block">Add New Admin</button>
		<span id="show_submiting_error"></span>
		</div>
		</form>
      </div>
	  <!-- Modal body end -->
    </div>
  </div>
</div>
<!-- Modal for adding new admin end -->
</div>
<!-- ml-5 col-md-9 col-sm-9 mb-4 end -->
<?php
include_once('includes/footer.php');
?>
<script>
pass_button="#sub8";
</script>
<script src="js/password.js"></script>
<script>

$(document).ready(function(){
	//alert("docuemnt ready");
	//fetching list of admin detail start
	function fetch_admin_detail(){
		$.ajax({
				url:"server.php",
				type:"post",
				data:{"fetch_admin_detail":"fetch_admin_detail"},
				success:function(response5){
					$("#show_admin_list").html(response5);
				}
			});
	};
	//fetching list of admin detail end
	//calling function to fetch admin detail start
	fetch_admin_detail();
	//calling function to fetch admin detail end
	
	//deleting admin account start
	$("#show_admin_list").on("click",".admin_del_btn",function(){
		val=$(this).val();
		$.ajax({
			url:"server.php",
			type:"post",
			data:{"delete_admin":"delete_admin","admin_id":val},
			success:function(response19){
				if(response19=='row deleted'){
				$(".tr_"+val).fadeOut(500);
				}
			}
		});
	});
	//deleting admin account end
	
	//edit admin detail btn modal start
	//$(".admin_edit_btn").click(function(){
	$("#show_admin_list").on("click",".admin_edit_btn",function(){
		//alert("edit btn clicked");
		val2=$(this).val();
		$.ajax({
			url:"server.php",
			type:"post",
			data:{"edit_admin":"edit_admin","admin_id":val2},
			success:function(response20){
				//alert(response20)
				$("#edit_admin_modal_area").html(response20);
				$("#edit_admin_btn_modal").click();
			}
		});
	});
	//edit admin detail btn modal end
	
	//adding new admin form start
	$("#form_add_admin").submit(function(e){
		e.preventDefault();
		if(error_count1==0 && error_count2==0 && error_count3==0){
			dataa=$("#form_add_admin").serialize();
			$.ajax({
				url:"server.php",
				type:"post",
				data:dataa,
				beforeSend:function(){
					$("#sub8").html("<i class='fas fa-sync fa-spin'></i>");
				},
				success:function(response8){
					//alert(response8);
				   $("#sub8").html("Add New Admin");
					if(response8=="added"){
						response8="<span class='alert mt-3 alert-success d-block'> New Admin Added</span>";
						
						fetch_admin_detail();
					}
					$("#show_submiting_error").html(response8);
				}
			});
		}else{
			alert("please fill form properly");
		}
	});
	//adding new admin form end
	
	//updating admin detail start
	$("body").on("submit","#form_edit_admin",function(e21){
		//alert("update buton clicked");
		e21.preventDefault();
		if(error_count1==0 && error_count2==0 && error_count3==0){
			
			$.ajax({
				url:"server.php",
				type:"post",
				data:$("#form_edit_admin").serialize(),
				beforeSend:function(){
					$("#sub21").html("<i class='fas fa-sync fa-spin'></i>");
				},
				success:function(response21){
					//alert(response8);
					//alert(response21);
				   $("#sub21").html("Update Admin");
					if(response21=="updated"){
						
						response21="<span class='alert mt-3 alert-success d-block'> Admin Updated</span>";
						fetch_admin_detail();
					}
					else{
						response27="<span class='alert mt-3 alert-danger d-block'> Admin not updated</span>";
						fetch_hostel_owner_detail();
					}
					$("#show_submiting_error21").html(response21);
				}
			});
		}else{
			alert("please fill form properly");
		}
	});
	//updating admin form start
});

</script>