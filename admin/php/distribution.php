					<?php

					require_once("connections.php");
					 $db =  new Db();
					  $obj = $db->getConnection();
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
					if (isset($_POST['save_info']))
					{
						
						
						$pro_id = $_POST['product_id'];
						 $dealer_name = $_POST['dealer_name'];
						  $quantity = $_POST['quantity'];
						  $price = $_POST['price'];		
						  $totallsellingprice = $_POST['totllsellingcost'];
						   $totall =$_POST['totall'];
						 $recive_date = date("Y-m-d");
						 $distributedby = $_SESSION['username'];
						
							
							$sql ="INSERT INTO `p_distribution`(`p_id`, `dealer_id`, `quantity`, `price`, `sellingprice`, `due`, `recive_date`, `distributedby`) VALUES ('$pro_id','$dealer_name','$quantity','$price','$totallsellingprice', '$totall','$recive_date','$distributedby')";


							$qury = $obj->prepare($sql);
								if ($qury->execute())
								{
									$msg['successfull'] = "Data has been submitted try another ";
									header("location:../product_distribution.php");
								}else
								{
									$msg['error'] = "something went wrong with the database";
								}
							
						
						
						
						
					}







					?>