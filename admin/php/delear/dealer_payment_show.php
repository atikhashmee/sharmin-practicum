			<?php 

				require_once("../connections.php");
				include("product_object.php");

					$db = new Db();
				   $obj = $db->getConnection();
				if (isset($_GET['id'])) {
					$id  = $_GET['id'];
					$data = array();



					$sql = "SELECT `id`, `p_id`,`p_quantity`, SUM(`totall_prize`) as total FROM `p_sell` WHERE `users`='$id' GROUP BY `p_id`"; //fatching all the data from p_distribution table as sum of all 
					$qry =  $obj->prepare($sql);
					$qry->execute();
					while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
						$product = new  Product_Store($row['p_id'],$row['p_quantity'],$row['total']);
						array_push($data,$product);
					}
					echo json_encode($data);
					

					/*now fatching data from payment table to check how much he paid */
/*
					$sqll = "SELECT SUM(`payment`) as paymentdone FROM `payments` WHERE `users` ='$id'";
					$qry1 = $obj->prepare($sqll);
					$qry1->execute();
					$row1 = $qry1->fetch(PDO::FETCH_ASSOC);


					$leftover = $row['tottall']-$row1['paymentdone'];

					echo "<input type='text' name='Totall' class='form-control' readonly='readonly' id='dataresult'  value='".$leftover."'>"; 
					echo "<input type='hidden' name='userofpayment' readonly='readonly' value='".$id."'>"; */
					
					

				}
			?>