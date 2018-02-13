<?php  require_once("../connections.php");
					$db = new Db();
					$obj = $db->getConnection();
					if (isset($_GET['id'])) {
					$sql = "SELECT `sellingprice` FROM `p_distribution` WHERE `p_id` = '".$_GET['id']."'";
					$qry = $obj->prepare($sql);
					$qry->execute();
					$row = $qry->fetch();
					echo json_encode($row);
					}
 				?>