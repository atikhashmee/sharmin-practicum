				<?php 

							session_start();



								if(isset($_POST['total_cart_items']))
								 {
									echo count($_SESSION['item']);
									exit();
								 }

							if (isset($_POST['element'])) {
								$_SESSION['item'][] =  $_POST['element'];
								//$_SESSION['src'][] =  $_POST['imgsrc'];
								$_SESSION['name'][]= $_POST['name'];
								$_SESSION['price'][]=$_POST['price'];
								echo count($_SESSION['item']);
								exit();
								
							}


								//untill the jquery problem does not end this function is deprecared till then 
							if(isset($_POST['showcart']))
								  {
								  	
								    for($i=0;$i<count($_SESSION['item']);$i++)
								    {
								      echo "<div class='cart_items'>";
								      //echo "<img src='".$_SESSION['src'][$i]."'>";
								      echo "<p>".$_SESSION['name'][$i]."</p>";
								      echo "<p>".$_SESSION['price'][$i]."</p>";
								      echo "</div>";
								    }
								    exit();	
								  }



								if(isset($_POST['checkout']))
								{
									unset($_SESSION['item']);
									unset($_SESSION['name']);
									unset($_SESSION['price']);
									

									echo "data has been cleared from session ";

								}

				?>