<?php 
$con=mysqli_connect("localhost","u919859405_hostel","FAlkjkdfls@#4","u919859405_hostel");
if(isset($_POST['compare']) and $_POST['compare']=="compare"){
	$hostel1=$_POST['hostel1'];
	$hostel2=$_POST['hostel2'];
	$q2="select * from hostel_name where id={$hostel1}";
	$q3="select * from hostel_name where id={$hostel2}";
	$run2=mysqli_query($con,$q2);
	$run3=mysqli_query($con,$q3);
	$row2=mysqli_fetch_array($run2);
	$row3=mysqli_fetch_array($run3);
	$table="
	<table class='table table-bordered'>
	<thead>
	<tr class='h5'>
	<td>Description</td>
	<td>{$row2['name']}</td>
	<td>{$row3['name']}</td>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td>image</td>
	<td>
	<img src='image/{$row2['image_1']}' class='img-fluid' style='height:100px;width:150px'>
	</td>
	<td>
	<img src='image/{$row3['image_1']}' class='img-fluid' style='height:100px;width:150px'>
	</td>
	</tr>
	<tr>
	<td>wifi</td>
	<td>{$row2['wifi']}</td>
	<td>{$row3['wifi']}</td>
	</tr>
	<tr>
	<td>price</td>
	<td>{$row2['Price']}</td>
	<td>{$row3['Price']}</td>
	</tr>
	<tr>
	<td>Room Mates</td>
	<td>{$row2['Room_mates']}</td>
	<td>{$row3['Room_mates']}</td>
	</tr>
	<tr>
	<td>Room Mates</td>
	<td>{$row2['near_college']}</td>
	<td>{$row3['near_college']}</td>
	</tr>
	<tr>
	<td>Owned By</td>
	<td>{$row2['private_or_public']}</td>
	<td>{$row3['private_or_public']}</td>
	</tr>
	</tbody>
	</table>
	";
	echo$table;
	exit();
}
?>
<html>
<head>
<title>Comparing 2 hostels automatically</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
</head>
<body>
<section>
<div class="container">
<h1 class="text-center">Compare any two hostels</h1>
<form action="" method="post" id="com_hostel_form">
<div class="row">
	<div class="col-md-6 form-group ">
	<select class="form-control" id="hostel1">
	<?php 
	$q1="select * from hostel_name order by id";
	$run1=mysqli_query($con,$q1);
	while($row1=mysqli_fetch_array($run1)){
		?>
		<option value="<?php echo$row1['id']; ?>">
		<?php echo$row1['name'];?></option>
	<?php
	}
	?>
	</select>
	</div>
	<div class="col-md-6 form-group ">
	<select class="form-control" id="hostel2">
	<?php 
	$q1="select * from hostel_name order by id desc";
	$run1=mysqli_query($con,$q1);
	while($row1=mysqli_fetch_array($run1)){
		?>
		<option value="<?php echo$row1['id']; ?>">
		<?php echo$row1['name'];?></option>
	<?php
	}
	?>
	</select>
	</div>
	<div class="col-md-12 form-group text-center">
	<input type="submit" class=" w-50 btn btn-outline-primary" id="com_hostel_sub_btn" value="Compare"> 
	</div>
</div>
</form>
<!-- ********* showing comparison table start ******* -->
<div id="show_table">

</div>
<!-- ********* showing comparison table end ******* -->
</div>
</section>
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$("#com_hostel_form").submit(function(e){
		hostel1=$("#hostel1").val();
		hostel2=$("#hostel2").val();
		//alert("hostel 1= "+hostel1);
		//alert("hostel 2= "+hostel2);
		e.preventDefault();
		$.ajax({
			url:"index.php",
			type:"post",
			data:{"compare":"compare","hostel1":hostel1,"hostel2":hostel2},
			success: function(response1){
				//alert(response1);
				$("#show_table").html(response1);
			}
		});
	});
});
</script>
</body>
</html>
