 <?php  include('files/header.php'); ?>

<?php
    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
	 require_once("../php/connections.php");

       $db =  new Db();
	  $obj = $db->getConnection();
?>


<?php  include('files/menu.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="well">
				<p>search by date</p>
			</div>
		</div>
		<div class="col-md-8">
			<div class="well">
				<form action="#" method="GET">
					from<input type="date" name="startdate">
					to <input type="date" name="enddate">
					<button type="submit" name="date" class="btn btn-success">Apply</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="">
				
				<table class="table  table-striped table-bordered table-condensed table-hover">
					<tr>
						<th>SL/No</th>
						<th>Customer</th>
						<th>Total prices</th>
						<th>payment</th>
						<th>Due</th>
						
						
						<th>Date & Time</th>
					</tr>
					<?php 
					$productquantity =0;
					$sellingcost =0;
						$id = $_SESSION['username'];
					if (isset($_GET['date'])) {
						$startdate = $_GET['startdate'];
						$enddate = $_GET['enddate'];
						
					

					$sell_info = "SELECT * FROM `payments` WHERE `payment_date` BETWEEN '$startdate' AND '$enddate' AND `recievedby`= '$id'";
				}else{
					$sell_info = "SELECT * FROM `payments` WHERE  `recievedby`= '$id'";
				}
					$i=0;

					$qry = $obj->prepare($sell_info);
					$qry->execute();
					while($row=$qry->fetch(PDO::FETCH_ASSOC))
					{

						
						$i++;
						
						
						
						?>

						<tr>
							<td><?php  echo $i;?></td>
							<td><?php  echo $row['users'];?></td>
							<td><?php  echo $row['totall_amount'];?></td>
							<td><?php  echo $row['payment'];?></td>
							<td><?php  echo $row['due'];?></td>
							
							<td><?php  echo $row['payment_date'];?></td>
						</tr>
						<?php 


					}?>

				
						
					




					
				</table>
			</div>
		</div>
	</div>
</div>







 <?php  include('files/footer.php'); ?>