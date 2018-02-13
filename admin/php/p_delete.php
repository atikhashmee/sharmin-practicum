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



<?php
if (isset($_GET['delete']))
{
	require_once("connections.php");
	$id = $_GET['delete'];
	$result = "DELETE FROM `product` WHERE `id`= '$id'";
	$query = mysql_query($result) or die (mysql_error());
	header("location:../Product_info.php");

}

?>
