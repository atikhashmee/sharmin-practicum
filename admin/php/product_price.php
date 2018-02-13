<?php  require_once("connections.php");
					$db = new Db();
					$obj = $db->getConnection();
					if (isset($_GET['id'])) {
					$sql = "SELECT `price`FROM `product` WHERE `id` ='".$_GET['id']."'";
					$qry = $obj->prepare($sql);
					$qry->execute();
					$row = $qry->fetch();
					//echo $row['price'];
					echo json_encode($row);
					}
 				?>