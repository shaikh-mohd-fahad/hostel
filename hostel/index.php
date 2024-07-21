<?php
include_once("include/conn.php");
include_once("include/header.php");
?>
<!-- main container start -->
<div class="container-fluid p-0">
    <!-- top header section start -->
    <section id="top_header">
    <?php 
    include_once("include/navbar.php");
    ?>
    <div class="w-100 text-center" id="header_form_div">
    <h1 class="text-center text-white">Search any <strong>Hostels</strong><br>From <strong>Anywhere</strong></h1>
    <form id="search_id" class="shadow-lg">
        <input type="text" id="header_form_input" class="" placeholder="Search by Location or College Name">
        <input type="button" value="Search" class="btn btn-light py-2">
    </form>
	<p class="text-center text-white mt-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, pariatur?</p>
	<a href="#" class="btn btn-danger shadow-lg">Login/Signup</a>
    <a href="#" class="btn btn-danger shadow-lg">Register Your Hostel</a>
    </div>
    </section>
<!-- top header section end -->



<!-- ********** hostel section start ***********-->
<section class="hostel" id="hostelid">
	<div class="container text-center">
		<h1 class="font-weight-bold text-white">OUR BEST HOSTELS</h1>
	</div>
	<div class="container mt-5 text-center">
	<div class="row">
		<div class="col-lg-4 col-12">
		<div class="card">
			<div class="card-header">Name of hostel</div>
			<div class="card-body">
				<img src="image/a.jpg" class="img-fluid">
			</div>
			<div class="card-footer"><a href="">Book Now</a></div>
		</div>
		</div>
		<div class="col-lg-4 col-12">
		<div class="card">
			<div class="card-header">Name of hostel</div>
			<div class="card-body">
				<img src="image/a.jpg" class="img-fluid">
			</div>
			<div class="card-footer"><a href="">Book Now</a></div>
		</div>
		</div>
		<div class="col-lg-4 col-12">
		<div class="card">
			<div class="card-header">Name of hostel</div>
			<div class="card-body">
				<img src="image/a.jpg" class="img-fluid">
			</div>
			<div class="card-footer"><a href="">Book Now</a></div>
		</div>
		</div>
	</div>
	</div>
</section>
<!-- ********** hostel section end ***********-->



<!-- ********** Customers feedback section start ***********-->
<section class="happyclients">
	<div class="container  text-center">
		<h1 class="font-weight-bold">OUR HAPPY CLIENTS</h1>
		<p class="pt-1"> our satisfied Customer Says</p>
	</div>
	<div id="demo" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ul class="carousel-indicators mt-5">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	  </ul>

	  <!-- The slideshow -->
	  <div class="carousel-inner container">
		<div class="carousel-item active">
			<div class="row">
			<div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
			</div>
		</div>
		<div class="carousel-item">
		  <div class="row">
		  <div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
		</div>
		</div>
		<div class="carousel-item">
		  <div class="row">
		  <div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
			<div class="box">
				<a href="#"><img src="image/1.jpg" class="img-fluid img-thumbnail"></a>
				<p class="m-4"> This is description. This is description. This is description. This is description. This is description. This is description. </p>
				<h1>ABC XYZ </h1>
				<h2> Web Developer</h2>
			</div>
			</div>
			</div>
		</div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>
	</div>
</section>
<!-- ********** Customers feedback section end ***********-->


<!-- ********** contact us section start ***********-->
<section class="contactus" id="contactid">
	<div class="headings text-center">
		<h1 class="font-weight-bold">CONTACT US</h1>
		<p class=""> just normal description. just normal description. just normal description. </p>
	</div>
	<div class="container">
	<div class="row">
	<div class="col-md-8 col-10 offset-md-2 offset-1">
		<form action="#">
		  <div class="form-group">
			<label class="sr-only" for="name">Name</label>
			<input type="text" class="form-control" id="name" required autocomplete="off" placeholder="Enter your Name">
		  </div>
		  <div class="form-group">
			<label class="sr-only" for="email">Email</label>
			<input type="email" class="form-control" id="email" required autocomplete="off" placeholder="Enter your Email">
		  </div>
		  <div class="form-group">
			<label class="sr-only" for="number">Mobile Number</label>
			<input type="number" placeholder="Enter Your Mobile Number" class="form-control" id="mobilenum" required autocomplete="off">
		  </div>
		  <div class="form-group">
		    <label class="sr-only" for="number">Mobile Number</label>
			<textarea class="form-control" rows="4" placeholder="Enter Your Message"></textarea>
		  </div>
		  <div class="text-center form-button">
		  <button type="submit" class="btn btn-default">Submit</button>
		  </div>
		</form>
	</div>
	</div>
	</div>
</section>
<!-- ********** contact us section start ***********-->

	
<!--footer section start -->
<footer>
<div class="container">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<ul class="social">
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			<li><a href="#"><i class="fa fa-rss"></i></a></li>
			<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<p class="copyright">Copyright &copy; All reserved to hostel</p>
	</div>
</div>
</div>
</footer>
<!--footer section end -->
	
</div>
<!-- main container end -->
<?php 
include_once("include/footer.php");
?>
<script>
$(document).ready(function(){
	$("#header_form_input").focus(function(){
	//$("#top_header").css({'filter':'blur(3px)'});
	});
});
</script>