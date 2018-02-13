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
		<div class="col-md-4">
			<div class="well">
				<center><form action="searchby_users.php" method="GET">
					

					<input type="search" name="name" placeholder="search by dealer's name">
					<button type="submit" name="name" class="btn btn-success">Apply</button>
					
				</form>
				</center>
			</div>
		</div>
		<div class="col-md-8">
			<div class="well">
				<form action="dateby_report.php" method="GET">
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
			<div class="well">
				<table class="table">
					<tr>
						<th>SL/No</th>
						<th>Product</th>
						<th>Prices</th>
						<th>Quantity</th>
						<th>totall</th>
						<th>Sell by </th>
						<th>Date & Time</th>
					</tr>
					<?php 
					if (isset($_GET['date'])) {

						$startdate = $_GET['startdate'];
						$enddate = $_GET['enddate'];
							require_once("php/connections.php");
					$sell_info = "SELECT * FROM `p_sell` WHERE `sel_date_time` BETWEEN '$startdate' AND '$enddate' ORDER BY `sel_date_time` ASC ";
					//SELECT * FROM `products` WHERE `date` Between  '$startdate'  AND  '$enddate' ORDER BY `date` ASC"
					$i=0;

					$qry = mysql_query($sell_info) or die (mysql_error());
					while($row=mysql_fetch_array($qry))
					{
						$i++;
						$Product = $row['p_id'];
						$p_prize = $row['p_prize'];
						$p_quantity = $row['p_quantity'];
						$p_total = $row['totall_prize'];
						$users = $row['users'];
						$sellingdateandtime = $row['sel_date_time'];
						?>

						<tr>
							<td><?php  echo $i;?></td>
							<td><?php  echo $Product;?></td>
							<td><?php  echo $p_prize;?></td>
							<td><?php  echo $p_quantity;?></td>
							<td><?php  echo $p_total;?></td>
							<td><?php  echo $users;?></td>
							<td><?php  echo $sellingdateandtime;?></td>
						</tr>
						<?php 


					}
						
					}
					

					 ?>
				</table>
			</div>
		</div>
	</div>
</div>




 <?php  include('files/footer.php'); ?>