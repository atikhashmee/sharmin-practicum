 <?php  include('files/header.php'); ?>

<?php
    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}

	                     require_once("php/connections.php");
								$db = new Db();
								$obj = $db->getConnection();
?>


<?php  include('files/menu.php'); ?>

<style type="text/css">
			
			.table-fixed thead {
  width: 97%;
}
.table-fixed tbody {
  height: 230px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
}
		</style>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="well">
				<center><form action="#" method="GET">
					

					<input type="search" name="name" placeholder="search by dealer's name">
					<button type="submit" name="btn_name" class="btn btn-success">Apply</button>
					
				</form>
				</center>
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
			<div class="well">

					<h4>Only dealers history is shown here </h4>
				
				<table class="table table-striped table-bordered table-condensed table-hover">
					<tr>
						<th>SL/No</th>
						<th>Product</th>
						<th>Prices</th>
						<th>selling cost</th>
						<th>Quantity</th>
						<th>totall</th>
						<th>Sold to  </th>
						<th>Date & Time</th>
					</tr>
					<?php 
					

						if (isset($_GET['date'])) { // date search 
							$sell_info = "SELECT * FROM `p_distribution` WHERE `recive_date` BETWEEN '".$_GET['startdate']."' and '".$_GET['enddate']."' and `distributedby` ='".$_SESSION['username']."'";
						}else if(isset($_GET['btn_name'])) // search by dealer name
						{
							$sell_info = "SELECT * FROM `p_distribution` WHERE `dealer_id` LIKE '%".$_GET['name']."%' AND `distributedby` ='".$_SESSION['username']."'  ORDER BY `dealer_id`";
						}
						else{  // if there is no condition 
							$sell_info = "SELECT * FROM `p_distribution` WHERE `distributedby`='".$_SESSION['username']."' ORDER BY `recive_date` ASC";
						}
	             
					$i=0;
					$totlasellingcost =0;
					$totlabuyingcost = 0;
					$profit =0;

					$qry = $obj->prepare($sell_info);
					$qry->execute();
					$q = $qry->rowCount();
					if ($q!=0) {
						echo"<p style='color:green'> ".$q." items found</p>";
					}else{
						echo"<p style='color:red'> ".$q." items found</p>";
					}
					
					while($row=$qry->fetch(PDO::FETCH_ASSOC))
					{
						$totlasellingcost += $row['sellingprice']*$row['quantity'];
						$totlabuyingcost += $row['price']*$row['quantity'];
						$profit += ($row['sellingprice']-$row['price'])*$row['quantity'];
						$i++;
						$Product = $row['p_id'];
						$p_prize = $row['price'];
						$p_quantity = $row['quantity'];
						
						$users = $row['dealer_id'];
						$sellingdateandtime = $row['recive_date'];
						?>

						<tr>
							<td><?php  echo $i;?></td>
							<td><?php  echo $Product;?></td>
							<td><?php  echo $p_prize;?></td>
							<td><?php  echo $row['sellingprice'];?></td>
							<td><?php  echo $p_quantity;?></td>
							<td><?php  echo $p_prize*$p_quantity;?></td>
							<td><?php  echo $users;?></td>
							<td><?php  echo $sellingdateandtime;?></td>
						</tr>
						<?php 

					}




						
					 ?>




					 	        <td>
									<tr>
										<td>totall manufacturing  cost</td>
										<td><?php echo $totlabuyingcost; ?></td>
									</tr>
									<tr>
										<td>totall selling cost</td>
										<td><?php echo $totlasellingcost; ?></td>
									</tr>
									<tr>
										<td>Profit</td>
										<td><?php echo $profit; ?></td>
									</tr>

									</td>
						
				</table>
			</div>
		</div>
	</div>
</div>








 <?php  include('files/footer.php'); ?>