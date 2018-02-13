

		<?php 

				require_once 'dboperation.php';
				require_once 'functions.php';
               $db = new Db();
				if (isset($_POST['btn'])) {

					$name = $_POST['name'];
					$pass = $_POST['pass'];
					$qry = $db->selectAll("dealers","name= '$name' AND pass = '$pass'");
					$data = $qry->fetch(PDO::FETCH_ASSOC);
					if (!empty($name) && !empty($pass)) {
						
							if ($name == $data['name'] && $pass == $data['pass']) {



								session_start();
								$_SESSION['username'] = $name;
								$_SESSION['role']     =  $data['type'];
								$_SESSION['u_id']      = $data['id'];

								if ($data['type']=="0") {
									header("location:../admin/index.php");
								}else {
									if ($data['status'] !=1 ) {
										header("location:../login.php?msg= You are not activated");
								
									}else{

										header("location:../index.php");
									}
									
								}
							
							}else{
								header("location:../login.php?msg=username and password don't match");

								//echo " <a href='../index.php'>Go back</a>";
							}
					}else {
						header("location:../index.php?msg=fields are empty , fill them first ..... ");
						
					}


				}	


		?>