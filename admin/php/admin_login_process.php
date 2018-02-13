				<?php 
				require_once("connections.php");
					$db = new Db();
					$obj = $db->getConnection();
					session_start();
				$msg ='';
				if (isset($_POST['a_submit']))
				{
					
					$name = $_POST['a_user_name'];
					$pass = $_POST['a_pass'];
					$sql = "SELECT * FROM `dealers` WHERE `name` ='$name' AND `pass` = '$pass'";
					$query = $obj->prepare($sql);
					$query->execute();
					if($query->rowCount()==0)
					{
						$msg="this user name is not registered ";
						header("location:../index.php");

					}else{
						$row = $query->fetch();
					if($row['type']=="admin"){

						$_SESSION['username'] = $row['name'];

						header("location:../dashboard.php");

					}else if($row['type']=="dealer"){

						$_SESSION['username'] = $row['name'];
						header("location:../dealers/dashboard.php");

					}else if($row['type']=="shoper"){

						$_SESSION['username'] = $row['name'];
						header("location:../shoper/dashboard.php");
					}

					}
					
				}
				 

				?>