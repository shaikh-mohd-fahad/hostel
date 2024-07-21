<?php
define("PAGE","Student/User");
define("Title","Student/User");
include_once("conn.php");
include_once('includes/header.php');
?>
<div class="col-md-9 ml-4 mt-4 mb-5">
<p class="bg-dark text-white p-2 text-center">List of Student/Users</p>
<div class="table-responsive-md text-center">
<table class="table">
<tr>
<th>User ID</th>
<th>Name</th>
<th>Mobile</th>
<th>Email</th>
<th>City</th>
<th>Action</th>
</tr>
<?php
$q5="select * from user";
$run5=mysqli_query($con,$q5);
while($row5=mysqli_fetch_array($run5)){
?>
<tr>
<td><?php echo$row5['id'];?></td>
<td><?php echo$row5['name'];?></td>
<td><?php echo$row5['mobile'];?></td>
<td><?php echo$row5['email'];?></td>
<td><?php echo$row5['city'];?></td>
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
<a href="add_user.php" class="btn btn-danger"><i class="fas fa-plus"></i></a>
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