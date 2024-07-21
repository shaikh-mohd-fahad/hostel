<?php
define("PAGE","Hostel List");
define("Title","Hostel List");
include_once("conn.php");
include_once('includes/header.php');
?>
<div class="col-md-9 ml-4 mt-4 mb-11">
<p class="bg-dark text-white p-2 text-center">List of Hostel</p>
<div class="table-responsive-md text-center">
<table class="table">
<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Date of Joining</th>
<th>Price</th>
<th>Room mates</th>
<th>AC</th>
<th>Wifi</th>
<th>Near College</th>
<th>Public or Private</th>
<th>Image 1</th>
<th>Image 2</th>
<th>Image 3</th>
<th>Action</th>
</tr>
<?php
$q11="select * from hostel_detail";
$run11=mysqli_query($con,$q11);
while($row11=mysqli_fetch_array($run11)){
?>
<tr>
<td><?php echo$row11['id'];?></td>
<td><?php echo$row11['name'];?></td>
<td><?php echo$row11['full_address'];?></td>
<td><?php echo$row11['date_of_joining'];?></td>
<td><?php echo$row11['Price'];?></td>
<td><?php echo$row11['Room_mates'];?></td>
<td><?php echo$row11['AC'];?></td>
<td><?php echo$row11['wifi'];?></td>
<td><?php echo$row11['near_college'];?></td>
<td><?php echo$row11['private_or_public'];?></td>
<td><?php echo$row11['image_1'];?></td>
<td><?php echo$row11['image_2'];?></td>
<td><?php echo$row11['image_3'];?></td>
<td>
edti, delete
</td>
</tr>
<?php
}
?>
</table>
</div>
</div>

</div><!-- row ended -->
<div class="row">
<div class="col-sm-12 float-right">
<div class="float-right">
<a href="add_hostel.php" class="btn btn-danger"><i class="fas fa-plus"></i></a>
</div>
</div>
</div>
</div>
<!-- link all script needed-->
<script src="js/jquery.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>