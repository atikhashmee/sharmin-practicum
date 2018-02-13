<?php  include('files/header.php');
   require_once("../php/connections.php");

       $db =  new Db();
	  $obj = $db->getConnection();


    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
 include('files/menu.php'); 

 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<table class="table table-striped table-condensed table-bordered table-hover">
					<tr>
						<th>SL/NO</th>
						<th>product </th>
					
					
					<th>product Price</th>
					<th>product Quantity</th>

					
					<th>Totall price</th>
					
					</tr>
					<?php 
					
					
					 $user_id = $_SESSION['username'];
					$i = 0;
					$sql = "SELECT DISTINCT `p_id` FROM `p_distribution` where `dealer_id`='$user_id'";

					$query = $obj->prepare($sql);
					$query->execute();
					$q = $query->rowCount();
					 echo "there are " .$q. " products "; 
					while($row=$query->fetch())
					{
						$p_id = $row['p_id'];
						//$sqll = "SELECT quantity FROM `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = '$user_id'";
						$sqll = "SELECT sum(`quantity`) as Totallquantity  From `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = '$user_id'";
						$ddd = $obj->prepare($sqll);
						 $ddd->execute();
						 $quantity = $ddd->fetch(PDO::FETCH_ASSOC);

						 $p_sell_p_quantity =  $obj->prepare("SELECT sum(p_quantity) AS t_count FROM `p_sell`
						  WHERE `p_id`='$p_id'");
						 $p_sell_p_quantity->execute();
						 $p_s_qun = $p_sell_p_quantity->fetch();



						 $sqlll = "SELECT `sellingprice` FROM `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = '$user_id'";
						$dd = $obj->prepare($sqlll);
						 $dd->execute();
						 $price = $dd->fetch(PDO::FETCH_ASSOC);

						 
						  
						  



						$i++;
						/*$id  = $row['id'];

						
						$rcv_date  = $row['recive_date'];
						$due = $row['due'];
						$p_prize = $row['price'];
						$p_quantity =$row['quantity'];*/
?>

<tr>
	
	<td> <?php echo $i;?> </td>
	<td><?php echo $p_id;?></td>
	<td><?php   echo $price['sellingprice'];?></td>
	<td><?php  echo   $quantity['Totallquantity']-$p_s_qun['t_count'];?></td>
	
	
	<td><?php echo  ($price['sellingprice']*  $quantity['Totallquantity']);?></td>
	
</tr>
<?php 
					}

					?>
					
				</table>
			</div>
		</div>
	</div>
</div>





<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h1>Recent product <strong>order </strong> history</h1>
				<table class="table table-striped table-bordered table-hover table-condensed">
					<tr>
						<th>SL/NO</th>
						<th>Product Name</th>
					<th>Price</th>

					<th>Quantity</th>
					<th>Total price</th>
					<th>Payment</th>
					<th>Customer</th>
					 <th>Customer's phone</th>

                   <th>Date and time</th>
					</tr>
					<?php
					$i = 0;
					$sql = "SELECT * FROM `p_sell`";
					$query = $obj->prepare($sql);
					$query->execute();

					$q = $query->rowcount();
					 echo "there are " .$q. " products ";
					while($row=$query->fetch())
					{
						$i++;
						




?>

<tr>

	<td> <?php echo $i;?> </td>
	<td><?php echo $row['p_id'];?></td>
	<td><?php echo $row['p_prize'];?></td>
	<td><?php echo $row['p_quantity'];?></td>
	<td><?php echo $row['totall_prize'];?></td>
	<td><?php if ($row['activation'] == '1') {
		echo "<p style='color:green'>Done</p>";
	} else{
		echo "<p style='color:red'>Pending</p>";
	}
	?></td>
	<td><?php echo $row['users'];?></td>
	<td></td>
	<td><?php echo $row['sel_date_time'];?></td>
		
</tr>
<?php
					}

					?>

				</table>
			</div>
		</div>
	</div>
</div>



 <?php  include('files/footer.php'); ?>