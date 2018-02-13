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
           <form action="p_sell.php" method="post" >
				<table class="table">
					<?php  
                     if (isset($_REQUEST['sell'])) {
                     	require_once("../php/connections.php");

                     	$id = $_REQUEST['sell'];

                     	//borrow from the dealer dashboard 
                     	 $sqll = "SELECT sum(`quantity`) as Totallquantity  From `p_distribution`
                     	  WHERE `p_id` ='$id' AND `dealer_id` = '$user_id'";
						$ddd = $obj->prepare($sqll);
						 $ddd->execute();
						 $quantity = $ddd->fetch(PDO::FETCH_ASSOC);

						 $p_sell_p_quantity =  $obj->prepare("SELECT sum(p_quantity) AS t_count FROM `p_sell`
						  WHERE `p_id`='$id'");
						 $p_sell_p_quantity->execute();
						 $p_s_qun = $p_sell_p_quantity->fetch();
						 $leftover = $quantity['Totallquantity']-$p_s_qun['t_count'];

						 //end of the borrowed code

                     	$sql = "SELECT * FROM `p_distribution` WHERE `id` = '$id ' ORDER BY `id` DESC";
                     	$query = mysql_query($sql) or die (mysql_error());
                     	while($row = mysql_fetch_array($query))
                     	{


                     		$p_id = $row['p_id'];
                     		$p_price = $row['price'];
                     		?>
                     		 <script type="text/javascript"> 
	     function getTotal() {
        var prize = document.getElementsByName('prize')[0].value;
        var quantity = document.getElementsByName('quantity')[0].value;
        var total = (+quantity)* (+prize) ;
        document.getElementsByName('total')[0].value = total;
    }
	   
</script>

					<tr>
						<td>product id</td>
						<td><input type="text" name="product_id" value="<?php echo $p_id; ?>" ></td>
					</tr>
					<tr>
						<td>product Price</td>
						<td><input type="text" name="prize" value="<?php echo $p_price; ?>" ></td>
					</tr>
					<tr>
						<td>product Quantity</td>

						<td><input type="number" name="quantity" onblur="getTotal()" >
							<p><?php echo "Only ".$leftover." are available in the dealer "?></p>
						</td>
					</tr>
					<tr>
						<td>totall prices</td>
						<td><input type="number" name="total"></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="reset" class="btn btn-warning">Reset</button>|<button type="submit" name="con_sell" class="btn btn-success">submit</button></td>
					</tr>
					<?php 
                     	}
                     }
					 ?>
				</table>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

if(isset($_POST['con_sell']))
{
	require_once("../php/connections.php");

	$p_id = $_POST['product_id'];
	$p_price = $_POST['prize'];
	$p_quantity = $_POST['quantity'];
	$total = $_POST['total'];
	$users = $_SESSION['username'];
	$datetime = date('Y-m-d H:i:s');
	$sql1 = "INSERT INTO `p_sell`(`p_id`, `p_prize`, `p_quantity`, `totall_prize`, `users`, `sel_date_time`) VALUES
	 ('$p_id','$p_price','$p_quantity','$total','$users','$datetime')";

	 $query = mysql_query($sql1) or die(mysql_error());

	 if($query == true)
	 {
	 	header("location:confirm_sell.php");
	 }
}



?>


 <?php  include('files/footer.php'); ?>