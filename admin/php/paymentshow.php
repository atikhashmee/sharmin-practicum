			<?php 

				require_once("connections.php");
					$db = new Db();
				   $obj = $db->getConnection();
				if (isset($_GET['id'])) {
					$id  = $_GET['id'];



					$sql = "SELECT sum(`due`) as tottall FROM `p_distribution` WHERE `dealer_id` = '$id'"; //fatching all the data from p_distribution table as sum of all 
					$qry =  $obj->prepare($sql);
					$qry->execute();
					$row = $qry->fetch(PDO::FETCH_ASSOC);

					/*now fatching data from payment table to check how much he paid */

					$sqll = "SELECT SUM(`payment`) as paymentdone FROM `payments` WHERE `users` ='$id'";
					$qry1 = $obj->prepare($sqll);
					$qry1->execute();
					$row1 = $qry1->fetch(PDO::FETCH_ASSOC);


					$leftover = $row['tottall']-$row1['paymentdone'];

					echo "<input type='text' name='Totall' class='form-control' readonly='readonly' id='dataresult'  value='".$leftover."'>"; 
					echo "<input type='hidden' name='userofpayment' readonly='readonly' value='".$id."'>"; 
					
					

				}
			?>