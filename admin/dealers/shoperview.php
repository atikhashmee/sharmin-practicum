	<?php  include('files/header.php');
					   require_once("../php/connections.php");

					       $db =  new Db();
						  $obj = $db->getConnection();


					    if(!isset($_SESSION)){
							session_start(); // starting session for checking username
						}
					        if(is_null($_SESSION['username']))
						{
							header("location:index.php"); // Redirect to login.php page
						}
					 include('files/menu.php'); 

					 ?>

					 <div class="container">
					 	<div class="row">
					 		<div class="col-md-12">
					 			<div class="well">
					 				<table class="table table-stripped table-bordered">
					 					<tr>
					 						<th>Serial no </th>
					 						<th>Name</th>
					 						<th>Action </th>
					 					</tr>
					 					<?php 
					 					$user =$_SESSION['username'];
					 						$sql = "SELECT * FROM `dealers` WHERE `type` ='shoper' and `addedby` ='$user'";
					 						$qry = $obj->prepare($sql);
					 						$i=0;
					 						$qry->execute();
					 						while ($row=$qry->fetch()) {
					 							$i++;
					 							echo "<tr>";
					 							echo "<td>".$i."</td>";
					 							echo "<td>".$row['name']."</td>";
					 							echo "<td> <button> Edit</button>|| <button>Delete</button></td>";
					 						}


					 					?>
					 				</table>
					 			</div>
					 		</div>
					 	</div>
					 </div>

					  <?php  include('files/footer.php'); ?>