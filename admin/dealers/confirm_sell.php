<?php  include('files/header.php'); ?>

<?php
    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
?>

<?php  include('files/menu.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h2>you have successfully sold out the product <a href="">sell another</a></h2>
				<p>your selling invoice </p>
				<?php 
				



				?>
				

			</div>
		</div>
	</div>
</div>

 <?php  include('files/footer.php'); ?>