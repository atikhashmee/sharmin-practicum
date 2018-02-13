<?php  include('files/header.php'); ?>

<?php
    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['customername']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
?>

<?php  include('files/menu.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h2>you have successfully order a product <a href="index.php"></a></h2>
				<p>thank you</p>
				<?php 
				



				?>
				

			</div>
		</div>
	</div>
</div>

 <?php  include('files/footer.php'); ?>