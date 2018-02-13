			<?php 
				session_start();
					require_once("connections.php");
								       $db = new Db();
								       
								       	$obj = $db->getConnection();
								       
				if (isset($_POST['userofpayment'])) {
					
					$user =  $_POST['userofpayment'];
					$totall = $_POST['Totall'];
					$payment = $_POST['payment'];
					$due = $_POST['due'];
					$recieveby =  $_SESSION['username'];
					$date =  date("d-m-Y");
					$sql = "INSERT INTO `payments`(`users`, `totall_amount`, `payment`, `due`, `recievedby`, `payment_date`) VALUES ('$user','$totall','$payment','$due','$recieveby','$date')";
					$qry =  $obj->prepare($sql);
					if($qry->execute()==true)
						echo "payment has been done";
					else

							echo "there is a problem with payment";
					

							


				}





			?>