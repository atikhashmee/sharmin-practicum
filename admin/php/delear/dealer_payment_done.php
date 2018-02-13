			<?php 
				session_start();
					require_once("../connections.php");
								       $db = new Db();
								       
								       	$obj = $db->getConnection();
								       
				if (isset($_POST['userofpayment'])) {

					
					$user =  trim($_POST['userofpayment']);
					$totall = $_POST['dataresult'];
					$payment = $_POST['payment'];
					$due = $_POST['due'];
					$recieveby =  $_SESSION['username'];
					$date =  date("Y-m-d");
					$sql = "INSERT INTO `payments`(`users`, `totall_amount`, `payment`, `due`, `recievedby`, `payment_date`) VALUES ('$user','$totall','$payment','$due','$recieveby','$date')";
					$qry =  $obj->prepare($sql);

					$qry2 = $obj->prepare("UPDATE `p_sell` SET `activation`='1' WHERE `users` ='$user'");
					$qry2->execute();
					if($qry->execute()==true)
						echo "payment has been done";
					else
						echo "there is a problem with payment";
				}

			?>