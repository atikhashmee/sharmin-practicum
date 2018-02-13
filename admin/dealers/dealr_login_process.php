<?php 

$msg ='';
if (isset($_POST['login']))
{
	require_once("../php/connections.php");
	$name = mysql_real_escape_string($_POST['name']);
	$pass = mysql_real_escape_string($_POST['pass']);
	$getdata = "SELECT * FROM `dealers` WHERE `name`='$name' AND `pass`= '$pass'";
	$query = mysql_query($getdata) or die (mysql_error());
	$q = mysql_num_rows($query);
	if ( $q != 0 )
	         {
		         while ($row = mysql_fetch_array($query))
				 {
					 $db_email = $row['name'];
					 
					 $db_pass = $row['pass'];
					 if ($name == $db_email  && $pass == $db_pass )
					 {
						 header("location:dashboard.php");
						 session_start();
						 
						 
						 
						$_SESSION['username']= $name;
						 exit;
					 }
				 }
	         }else {
						$msg = "<font color='red'>Wrong Email or Password. Please retry</font>"; 
						 header("location:../index.php");
						 
						 exit;
						 
					 }
	
	
}
 

?>