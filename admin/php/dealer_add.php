

<?php
    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
?>






<?php 
$msg[] = array();
if (isset($_POST['save_dealer']))
{
	require_once("connections.php");

	$db =  new Db();
	$obj = $db->getConnection();
	
	$dealer_id = $_POST['id'];
	 $dealer_name = $_POST['name'];
	 $pass  = $_POST['pass'];
	 $adrs =$_POST['adrs'];
	 $join_date = $_POST['date'];
	 $addedby = $_SESSION['username'];

	 
	 
	
		
		$sql ="INSERT INTO `dealers`( `dealer_id`, `name`, `pass`, `address`, `join_date`, `type`, `addedby`) VALUES
		 ('$dealer_id', '$dealer_name', '$pass', '$adrs', '$join_date', 'dealer','$addedby')";

		$qury= $obj->prepare($sql);

			if ($qury->execute())
			{
				$msg['successfull'] = "Data has been submitted try another ";
				header("location:../dealers.php");
			}else
			{
				$msg['error'] = "something went wrong with the database";
			}
		
	
	
	
	
}







?>