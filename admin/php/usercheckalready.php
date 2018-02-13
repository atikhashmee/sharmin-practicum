<?php 
	

	if (isset($_GET['name'])) {
			 require_once("connections.php");
	         $db =  new Db();
	         $obj = $db->getConnection();

	         $sql = "SELECT `name` FROM `dealers` ";
	         $qry =  $obj->prepare($sql);
	         $qry->execute();
	         while ($row = $qry->fetch()) {
	         	if($row['name']==$_GET['name'])
	         	{
	         		echo "this name is already exists";
	         	}
	         }
		
	}
    




?>