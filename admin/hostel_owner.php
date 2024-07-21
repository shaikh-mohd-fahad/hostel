<?php
define("PAGE","Hostel Owner");
define("Title","Hostel Owner");
include_once("conn.php");
include_once('includes/header.php');
$q7="select * from hostel_owners";
	$run7=mysqli_query($con,$q7);
?>
<!-- ml-5 col-md-9 col-sm-9 mb-4 end -->
<div class="col-md-9 mt-5 ml-4">
<!-- row hostel owner list start -->
<div class="row">
<div class="col-md-12">
<p class="bg-dark text-white p-2 text-center">List of Hostel Owner</p>
</div>
<div class="col-md-12">
<div class="table-responsive-md">
<table class="table text-center">
<tr><th>ID</th><th>Name</th><th>email</th><th>City</th><th>Mobile</th><th>Verification</th><th>Action</th></tr>
<tbody id="show_hostel_owner_list"></tbody>
</table>
</div>
</div>
</div>
<!-- row hostel owner list end -->

<!-- row add new hostel owner button modal start -->
<div class="row">
<div class="col-sm-12 float-right">
<div class="float-right">
<button class="btn btn-danger" data-toggle="modal" data-target="#add_hostal_owner_modal"><i class="fas fa-plus"></i></button>
</div>
</div>
</div>
<!-- row add new hostel owner button modal end -->


<!-- this modal is dynamically called when edit button is clicked start -->
<div id="edit_hostel_owner_modal_area">
</div>
<!-- this modal is dynamically called when edit button is clicked start -->

<!-- Modal for adding new hostel owner start -->
<div class="modal" id="add_hostal_owner_modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Hostel Owner</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body start -->
      <div class="modal-body">
		<form id="form_add_hostel_owner" method="post">
		<input type="hidden" name="form_add_hostel_owner_submit" value="adding_new_hostel_owner">
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
		Address
		<input type="text" name="address" class="form-control">
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
		<button type="submit" name="sub22" id="sub22" class="btn btn-danger btn-block">Add New Admin</button>
		<span id="show_submiting_error"></span>
		</div>
		</form>
      </div>
	  <!-- Modal body end -->
    </div>
  </div>
</div>
<!-- Modal for adding new hostel owner end -->
</div>
<!-- ml-5 col-md-9 col-sm-9 mb-4 end -->
<?php
include_once('includes/footer.php');
?>
<script>
pass_button="#sub22";
</script>
<script src="js/password.js"></script>
<script>

$(document).ready(function(){
	//alert("docuemnt ready");
	//fetching list of hostel_owners detail start
	function fetch_hostel_owner_detail(){
		//alert("function called");
		$.ajax({
				url:"server.php",
				type:"post",
				data:{"fetch_hostel_owner_detail":"fetch_hostel_owner_detail"},
				success:function(response7){
					//alert(response7);
					$("#show_hostel_owner_list").html(response7);
				}
			});
	};
	//fetching list of hostel_owners detail end
	//calling function to fetch hostel_owners detail start
	fetch_hostel_owner_detail();
	//calling function to fetch hostel_owners detail end
	
	//adding new hostel_owner_id form start
	$("#form_add_hostel_owner").submit(function(e){
		e.preventDefault();
		if(error_count1==0 && error_count2==0 && error_count3==0){
			dataa=$("#form_add_hostel_owner").serialize();
			$.ajax({
				url:"server.php",
				type:"post",
				data:dataa,
				beforeSend:function(){
					$("#sub22").html("<i class='fas fa-sync fa-spin'></i>");
				},
				success:function(response22){
					//alert(response8);
				   $("#sub22").html("Add New Hostel Owner");
					if(response22=="added"){
						response22="<span class='alert mt-3 alert-success d-block'> New Hostel Owner Added</span>";
						
						fetch_hostel_owner_detail();
					}
					$("#show_submiting_error").html(response22);
				}
			});
		}else{
			alert("please fill form properly");
		}
	});
	//adding new hostel_owners form start
	
	//deleting hostel_owner_id account start
	$("#show_hostel_owner_list").on("click",".hostel_owner_del_btn",function(){
		val25=$(this).val();
		$.ajax({
			url:"server.php",
			type:"post",
			data:{"delete_hostel_owner":"delete_hostel_owner","hostel_owner_id":val25},
			success:function(response25){
				if(response25=='row deleted'){
				$(".tr_"+val25).fadeOut(500);
				}
			}
		});
	});
	//deleting hostel_owners account end
	
	//edit hostel_owners detail btn modal start
	$("#show_hostel_owner_list").on("click",".hostel_owner_edit_btn",function(){
		//alert("edit btn clicked");
		val26=$(this).val();
		$.ajax({
			url:"server.php",
			type:"post",
			data:{"edit_hostel_owner":"edit_hostel_owner","hostel_owner_id":val26},
			success:function(response26){
				//alert(response20)
				$("#edit_hostel_owner_modal_area").html(response26);
				$("#edit_hostel_owner_btn_modal").click();
			}
		});
	});
	//edit hostel_owners detail btn modal end
	
	//updating hostel_owner detail start
	$("body").on("submit","#form_edit_hostel_owner",function(e27){
		//alert("update buton clicked");
		e27.preventDefault();
		if(error_count1==0 && error_count2==0 && error_count3==0){
			$.ajax({
				url:"server.php",
				type:"post",
				data:$("#form_edit_hostel_owner").serialize(),
				beforeSend:function(){
					$("#sub27").html("<i class='fas fa-sync fa-spin'></i>");
				},
				success:function(response27){
					//alert(response8);
					//alert(response27);
				   $("#sub27").html("Update Hostel Owner");
					if(response27=="updated"){
						
						response27="<span class='alert mt-3 alert-success d-block'> Hostel Owner Updated</span>";
						fetch_hostel_owner_detail();
					}else{
						response27="<span class='alert mt-3 alert-danger d-block'> Hostel Owner not updated</span>";
						fetch_hostel_owner_detail();
					}
					$("#show_submiting_error27").html(response27);
				}
			});
		}else{
			alert("please fill form properly");
		}
	});
	//updating hostel_owner form start
});
</script>