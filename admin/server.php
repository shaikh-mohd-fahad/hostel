<?php
include_once("conn.php");
include_once("includes/function.php");
/*******************  login.php page start ****************/
// checking login detail to login.php page start
if(isset($_POST['form_admin_login_submit']) and $_POST['form_admin_login_submit']=='login'){
	$email=verify($_POST['email']);
	$password=verify($_POST['password']);
	//checking email existance
	$q14="select * from admin where email='$email'";
	$run14=mysqli_query($con,$q14);
	if(mysqli_num_rows($run14)==1){
		//checking email is verified or not;
		$q15="select * from admin where email='$email' and verify_status='1'";
		$run15=mysqli_query($con,$q15);
		if($row15=mysqli_num_rows($run15)==1){
			$q16="select * from admin where email='$email' and password='$password'";
			$run16=mysqli_query($con,$q16);
			if($row16=mysqli_num_rows($run16)==1){
				$row16=mysqli_fetch_array($run14);
				setCookie("admin_id",$row16['id'],time()+60*60*24*365);
				setCookie("admin_name",$row16['name'],time()+60*60*24*365);
				echo"<script> location.href='index.php';</script>";
			}else{
				$msg="<span class='text-danger float-right'>**Wrong Email or Password</span>";
				echo$msg;
			}
		}else{
			$msg="<span class='text-danger float-right'>**Your email is registered but not verified. Please Verify Your Email</span>";
			echo$msg;
		}
	}else{
		$msg="<span class='text-danger float-right'>**Email not Exist </span>";
		echo$msg;
	}
}
// login admin end
/*******************  login.php page end ****************/


/*******************  index.php page start ****************/

// adding new admin account from index.php/dashboard page start
if(isset($_POST['form_add_admin_submit']) and $_POST['form_add_admin_submit']=='adding_new_admin'){
	//$q2==q8
	$name=verify($_POST['name']);
	$email=verify($_POST['email']);
	$mobile=verify($_POST['mobile']);
	$city=verify($_POST['city']);
	$password=verify($_POST['password']);
	$q8="select * from admin where email='$email'";
	$run8=mysqli_query($con,$q8);
	if(mysqli_num_rows($run8)==1){
		//checking verification of email
		$q17="select * from admin where email='$email' and verify_status='1'";
		$run17=mysqli_query($con,$q17);
		if(mysqli_num_rows($run17)==1){
			$msg="<span class='alert alert-danger my-3 d-block'>**Email is Already Registered</span>";
			echo$msg;
		}else{
			$msg="<span class='alert alert-danger my-3 d-block'>**Email is Registered but not verified. Please verify your email</span>";
			echo$msg;
		}
	}else{
	    $str="abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $verification_id=substr(str_shuffle($str),0,20);
		$q18="insert into admin(name, email, mobile, city,password) values('$name','$email','$mobile','$city','$password')";
		$run18=mysqli_query($con,$q18);
		if($run18){
			/*$subject="Blogiez Account Verification";
			$message="Please confirm your email registrartion by clicking this button <a href='$url/verify.php?id=$verification_id'><button style='background:#007bff;color:white'>Click Me</button></a>";
            //require 'vendor/autoload.php';
			$mail = new PHPMailer(true);
			$mail->IsSMTP();
			$mail->Host = 'smtp.hostinger.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'blogiez.official@blogiez.com';
			$mail->Password = 'FAlkjkdfls@#4';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->setFrom('blogiez.official@blogiez.com','Blogiez');
			$mail->addAddress($email);
			$mail->IsHTML(true);
			$mail->Charset='UTF-8';
			$mail->Subject = $subject;
			$mail->Body    = $message;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->SMTPOptions=array('ssl'=>array(
				'verify_peer'=>false,
				'verify_peer_name'=>false,
				'allow_self_signed'=>false
			));
			if($mail->send()){
			    $msg="<span class='text-danger float-right'>We have just sent a verification link to <b>$email</b>. Please check your inbox and click on the link to get started.<br>If email is not delivered immediately please wait for 1-2 min.  </span>";
			    echo$msg;
			}else{
			    $msg="<span class='text-danger float-right'>Verification link on email is not sent.</span>";
			    echo$msf;
			}*/
			$msg="added";
			echo$msg;
		}else{
			$msg="<span class='text-danger float-right'>**Registration Failled <br>$q18</span>";
			echo$msg;
		}
	}
}
// adding new account from index.php/dashboard page end


//fetching admin detail on index.php/dashboard page start
if(isset($_POST['fetch_admin_detail']) and $_POST['fetch_admin_detail']=='fetch_admin_detail'){
	$q5="select * from admin";
	$run5=mysqli_query($con,$q5);
	$tbody="";
	while($row5=mysqli_fetch_array($run5)){
	$tbody.="<tr class='tr_{$row5['id']}'>
	<td>{$row5['id']}</td>
	<td>{$row5['name']}</td>
	<td>{$row5['email']}</td>
	<td>{$row5['mobile']}</td>
	<td>{$row5['city']}</td>
	<td>";
	if($row5['verify_status']==1){
		$tbody.="<span class='text-success'>Verified</span>";
	}else{
		$tbody.="<span class='text-danger'>Not Verified</span>";
	}
	$tbody.="</td>
	<td><button class='admin_edit_btn btn btn-success' value='{$row5['id']}'>Edit</button>
	<button class='admin_del_btn btn btn-danger' value='{$row5['id']}'>Delete</button>";
	
	$tbody.="</td></tr>";
	}
	echo$tbody;
}
//fetching admin detail on index.php page end

//deleting admin on dashboard/index.php page start
if(isset($_POST['delete_admin']) and $_POST['delete_admin']=='delete_admin'){
	$admin_id=verify($_POST['admin_id']);
	$q19="delete from admin where id={$admin_id}";
	$run19=mysqli_query($con,$q19);
	if($run19){
	echo"row deleted";
	}
	else{
		echo"failed";
	}
}
//deleting admin on dashboard/index.php page end

//sending modal to edit admin on dashboard/index.php page start
if(isset($_POST['edit_admin']) and $_POST['edit_admin']=='edit_admin'){
	$admin_id=verify($_POST['admin_id']);
	$q20="select * from admin where id={$admin_id}";
	$run20=mysqli_query($con,$q20);
	$row20=mysqli_fetch_array($run20);
	$modal="
<button type='hidden' class='d-none' data-toggle='modal' data-target='#edit_admin_modal' id='edit_admin_btn_modal'></button>
<div class='modal' id='edit_admin_modal'>
  <div class='modal-dialog modal-dialog-centered'>
    <div class='modal-content'>
      <!-- Modal Header -->
      <div class='modal-header'>
        <h4 class='modal-title'>Update Admin Details</h4>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body start -->
      <div class='modal-body'>
		<form id='form_edit_admin'>
		<input type='hidden' name='form_edit_admin_submit' value='{$row20['id']}'>
		<div class='form-group'>
		Name<span id='show_error'></span>
		<input type='text' name='name' class='form-control' value='{$row20['name']}'>
		</div>
		<div class='form-group'>
		Email
		<input type='text' name='email' class='form-control' required value='{$row20['email']}'>
		</div>
		<div class='form-group'>
		Verification
		<select class='form-control' name='verification'>
		<option value='1' ";
		if($row20['verify_status']==1){
			$modal.=" selected ";
		}
		$modal.=">Verified</option>
		<option value='0'";
		if($row20['verify_status']==0){
			$modal.=" selected ";
		}
		$modal.=">Not Verfied</option>
		</select>
		</div>
		<div class='form-group'>
		Mobile
		<input type='text' name='mobile' class='form-control' value='{$row20['mobile']}'>
		</div>
		<div class='form-group'>
		City
		<input type='text' name='city' class='form-control 'value='{$row20['city']}'>
		</div>
		<div class='form-group'>
		<button type='submit' name='sub21' id='sub21' class='btn btn-danger btn-block'>Update Admin</button>
		<span id='show_submiting_error21'></span>
		</div>
		</form>
      </div>
	  <!-- Modal body end -->
    </div>
  </div>
</div>
	";
echo$modal;
}
//sending modal to edit admin on dashboard/index.php page end


// updating admin account from index.php/dashboard page start
if(isset($_POST['form_edit_admin_submit'])){
	//$q2==q8
	$admin_edit_id=verify($_POST['form_edit_admin_submit']);
	$name=verify($_POST['name']);
	$email=verify($_POST['email']);
	$mobile=verify($_POST['mobile']);
	$verify_status=verify($_POST['verification']);
	$city=verify($_POST['city']);
	$q21="update admin set name='$name', email='$email', mobile='$mobile', city='$city', verify_status='$verify_status' where id='$admin_edit_id'";
	$run21=mysqli_query($con,$q21);
	if($run21){
		/*$subject="Blogiez Account Verification";
		$message="Please confirm your email registrartion by clicking this button <a href='$url/verify.php?id=$verification_id'><button style='background:#007bff;color:white'>Click Me</button></a>";
		//require 'vendor/autoload.php';
		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		$mail->Host = 'smtp.hostinger.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'blogiez.official@blogiez.com';
		$mail->Password = 'FAlkjkdfls@#4';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('blogiez.official@blogiez.com','Blogiez');
		$mail->addAddress($email);
		$mail->IsHTML(true);
		$mail->Charset='UTF-8';
		$mail->Subject = $subject;
		$mail->Body    = $message;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
		if($mail->send()){
			$msg="<span class='text-danger float-right'>We have just sent a verification link to <b>$email</b>. Please check your inbox and click on the link to get started.<br>If email is not delivered immediately please wait for 1-2 min.  </span>";
			echo$msg;
		}else{
			$msg="<span class='text-danger float-right'>Verification link on email is not sent.</span>";
			echo$msf;
		}*/
		$msg="updated";
		echo$msg;
	}
	else{
		$msg="not updated";
		echo$msg;
	}
}
// updating admin account from index.php/dashboard page end

/*******************  index.php page end ****************/

/*******************  hostel_owner.php page start ****************/

//fetching hostel owner detail on hostel-owner.php page start
if(isset($_POST['fetch_hostel_owner_detail']) and $_POST['fetch_hostel_owner_detail']=='fetch_hostel_owner_detail'){
	$q7="select * from hostel_owners";
	$run7=mysqli_query($con,$q7);
	$tbody="";
	while($row7=mysqli_fetch_array($run7)){
	$tbody.="<tr class='tr_{$row7['id']}'>
	<td>{$row7['id']}</td>
	<td>{$row7['name']}</td>
	<td>{$row7['email']}</td>
	<td>{$row7['mobile']}</td>
	<td>{$row7['address']}</td>
	<td>";
	if($row7['verify_status']==1){
		$tbody.="<span class='text-success'>Verified</span>";
	}else{
		$tbody.="<span class='text-danger'>Not Verified</span>";
	}
	$tbody.="</td>
	<td><button class='hostel_owner_edit_btn btn btn-success' value='{$row7['id']}'>Edit</button>
	<button class='hostel_owner_del_btn btn btn-danger' value='{$row7['id']}'>Delete</button>";
	
	$tbody.="</td></tr>";
	}
	echo$tbody;
}
//fetching hostel owner detail on hostel-owner.php page end


// adding new hostel owner account on hostel_owner.php page start
if(isset($_POST['form_add_hostel_owner_submit']) and $_POST['form_add_hostel_owner_submit']=='adding_new_hostel_owner'){
	//$q2==q8
	$name=verify($_POST['name']);
	$email=verify($_POST['email']);
	$mobile=verify($_POST['mobile']);
	$address=verify($_POST['address']);
	$password=verify($_POST['password']);
	$q22="select * from hostel_owners where email='$email'";
	$run22=mysqli_query($con,$q22);
	if(mysqli_num_rows($run22)==1){
		//checking verification of email
		$q23="select * from hostel_owners where email='$email' and verify_status='1'";
		$run23=mysqli_query($con,$q23);
		if(mysqli_num_rows($run23)==1){
			$msg="<span class='alert alert-danger my-3 d-block'>**Email is Already Registered</span>";
			echo$msg;
		}else{
			$msg="<span class='alert alert-danger my-3 d-block'>**Email is Registered but not verified. Please verify your email</span>";
			echo$msg;
		}
	}else{
	    $str="abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $verification_id=substr(str_shuffle($str),0,20);
		$q24="insert into hostel_owners(name, email, mobile, address,password) values('$name','$email','$mobile','$address','$password')";
		$run24=mysqli_query($con,$q24);
		if($run24){
			/*$subject="Blogiez Account Verification";
			$message="Please confirm your email registrartion by clicking this button <a href='$url/verify.php?id=$verification_id'><button style='background:#007bff;color:white'>Click Me</button></a>";
            //require 'vendor/autoload.php';
			$mail = new PHPMailer(true);
			$mail->IsSMTP();
			$mail->Host = 'smtp.hostinger.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'blogiez.official@blogiez.com';
			$mail->Password = 'FAlkjkdfls@#4';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->setFrom('blogiez.official@blogiez.com','Blogiez');
			$mail->addAddress($email);
			$mail->IsHTML(true);
			$mail->Charset='UTF-8';
			$mail->Subject = $subject;
			$mail->Body    = $message;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->SMTPOptions=array('ssl'=>array(
				'verify_peer'=>false,
				'verify_peer_name'=>false,
				'allow_self_signed'=>false
			));
			if($mail->send()){
			    $msg="<span class='text-danger float-right'>We have just sent a verification link to <b>$email</b>. Please check your inbox and click on the link to get started.<br>If email is not delivered immediately please wait for 1-2 min.  </span>";
			    echo$msg;
			}else{
			    $msg="<span class='text-danger float-right'>Verification link on email is not sent.</span>";
			    echo$msf;
			}*/
			$msg="added";
			echo$msg;
		}else{
			$msg="<span class='text-danger float-right'>**Registration Failled <br>$q24</span>";
			echo$msg;
		}
	}
}
// adding new hostel owner account on hostel_owner.php page end

//deleting hostel owner on hostel_owner.php page start
if(isset($_POST['delete_hostel_owner']) and $_POST['delete_hostel_owner']=='delete_hostel_owner'){
	$hostel_owner_id=verify($_POST['hostel_owner_id']);
	$q25="delete from hostel_owners where id={$hostel_owner_id}";
	$run25=mysqli_query($con,$q25);
	if($run25){
	echo"row deleted";
	}
	else{
		echo"failed";
	}
}
//deleting hostel owner on hostel_owner.php page start


//sending modal to edit hostel_owner on hostel_owner.php page start
if(isset($_POST['edit_hostel_owner']) and $_POST['edit_hostel_owner']=='edit_hostel_owner'){
	$hostel_owner_id=verify($_POST['hostel_owner_id']);
	$q26="select * from hostel_owners where id={$hostel_owner_id}";
	$run26=mysqli_query($con,$q26);
	$row26=mysqli_fetch_array($run26);
	$modal="
<button type='hidden' class='d-none' data-toggle='modal' data-target='#edit_hostel_owner_modal' id='edit_hostel_owner_btn_modal'></button>
<div class='modal' id='edit_hostel_owner_modal'>
  <div class='modal-dialog modal-dialog-centered'>
    <div class='modal-content'>
      <!-- Modal Header -->
      <div class='modal-header'>
        <h4 class='modal-title'>Update Hostel Owner Details</h4>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <!-- Modal body start -->
      <div class='modal-body'>
		<form id='form_edit_hostel_owner'>
		<input type='hidden' name='form_edit_hostel_owner_submit' value='{$row26['id']}'>
		<div class='form-group'>
		Name<span id='show_error'></span>
		<input type='text' name='name' class='form-control' value='{$row26['name']}'>
		</div>
		<div class='form-group'>
		Email
		<input type='text' name='email' class='form-control' required value='{$row26['email']}'>
		</div>
		<div class='form-group'>
		Verification
		<select class='form-control' name='verification'>
		<option value='1' ";
		if($row26['verify_status']==1){
			$modal.=" selected ";
		}
		$modal.=">Verified</option>
		<option value='0'";
		if($row26['verify_status']==0){
			$modal.=" selected ";
		}
		$modal.=">Not Verfied</option>
		</select>
		</div>
		<div class='form-group'>
		Mobile
		<input type='text' name='mobile' class='form-control' value='{$row26['mobile']}'>
		</div>
		<div class='form-group'>
		Address
		<input type='text' name='address' class='form-control 'value='{$row26['address']}'>
		</div>
		<div class='form-group'>
		<button type='submit' name='sub27' id='sub27' class='btn btn-danger btn-block'>Update Hostel Owner</button>
		<span id='show_submiting_error27'></span>
		</div>
		</form>
      </div>
	  <!-- Modal body end -->
    </div>
  </div>
</div>
	";
echo$modal;
}
//sending modal to edit hostel_owner on hostel_owner.php page start


// updating hostel_owner account on hostel_owner.php page start
if(isset($_POST['form_edit_hostel_owner_submit'])){
	//$q2==q8
	$hostel_owner_edit_id=verify($_POST['form_edit_hostel_owner_submit']);
	$name=verify($_POST['name']);
	$email=verify($_POST['email']);
	$mobile=verify($_POST['mobile']);
	$verify_status=verify($_POST['verification']);
	$address=verify($_POST['address']);
	$q27="update hostel_owners set name='$name', email='$email', mobile='$mobile', address='$address', verify_status='$verify_status' where id='$hostel_owner_edit_id'";
	$run27=mysqli_query($con,$q27);
	if($run27){
		/*$subject="Blogiez Account Verification";
		$message="Please confirm your email registrartion by clicking this button <a href='$url/verify.php?id=$verification_id'><button style='background:#007bff;color:white'>Click Me</button></a>";
		//require 'vendor/autoload.php';
		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		$mail->Host = 'smtp.hostinger.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'blogiez.official@blogiez.com';
		$mail->Password = 'FAlkjkdfls@#4';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('blogiez.official@blogiez.com','Blogiez');
		$mail->addAddress($email);
		$mail->IsHTML(true);
		$mail->Charset='UTF-8';
		$mail->Subject = $subject;
		$mail->Body    = $message;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
		if($mail->send()){
			$msg="<span class='text-danger float-right'>We have just sent a verification link to <b>$email</b>. Please check your inbox and click on the link to get started.<br>If email is not delivered immediately please wait for 1-2 min.  </span>";
			echo$msg;
		}else{
			$msg="<span class='text-danger float-right'>Verification link on email is not sent.</span>";
			echo$msf;
		}*/
		$msg="updated";
		echo$msg;
	}else{
		$msg="not updated";
		echo$msg;
	}
}
// updating hostel_owner account on hostel_owner.php page end


/*******************  hostel_owner.php page end ****************/


/*******************  changepassword.php page start ****************/

if(isset($_POST['change_pass_id'])){
	$change_pass_id=verify($_POST['change_pass_id']);
	$old_pass=verify($_POST['old_pass']);
	$new_pass=verify($_POST['new_pass']);
	$q28="select * from admin where password='{$old_pass}' and id=$change_pass_id";
	$run28=mysqli_query($con,$q28);
	//echo$q28;
	//exit();
	$num_row28=mysqli_num_rows($run28);
	if($num_row28==1){
		$q10="update admin set password='$new_pass' where id='$change_pass_id'";
		$run10=mysqli_query($con,$q10);
		if($run10){
			$msg10="<span class='alert alert-success d-block'>Password Updated Successfully</span>";
		}else{
			$msg10="<span class='alert alert-danger d-block'>Password not Updated</span>";
		}
	}else{
		$msg10="<span class='alert alert-danger d-block'>Old Password is Wrong</span>";
	}
	echo$msg10;
}
/*******************  changepassword.php page end ****************/
?>