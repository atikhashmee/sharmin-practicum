			<?php 


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

					if (isset($_GET['productid'])) {
				$sql = "SELECT SUM(`quantity`) AS totalquantity FROM `p_distribution` WHERE `dealer_id`='".$_SESSION['username']."' and `p_id` ='".$_GET['productid']."'";
					};
					$sqll = "SELECT SUM(`quantity`) AS alreadydistributed FROM `p_distribution` WHERE `distributedby`='".$_SESSION['username']."'";

					$qry1 =  $obj->prepare($sqll);
					$qry1->execute();
					$row1 = $qry1->fetch();


					$qry = $obj->prepare($sql);
					$qry->execute();

					$row =  $qry->fetch();
					$amount = $row['totalquantity']-$row1['alreadydistributed'];
					echo $amount;
			?>