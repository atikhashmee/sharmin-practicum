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

					 <style>
					 	body {
    background-color: #eee;
}

			*[role="form"] {
			    max-width: 530px;
			    padding: 15px;
			    margin: 0 auto;
			    background-color: #fff;
			    border-radius: 0.3em;
			}

			*[role="form"] h2 {
			    margin-left: 5em;
			    margin-bottom: 1em;
			}

			#show{
				color: red;
			}


					 </style>
								

								<div class="container">
									<div class="row">
										<div class="col-md-6">
											<div class="well">
							
															<div class="container">
											            <form class="form-horizontal" role="form"  method="POST" action="#">
											                <h2>Supplier Registration Form</h2>

											                <div class="form-group">
											                    <label for="firstName" class="col-sm-3 control-label">Supplier ID</label>
											                    <div class="col-sm-9">
											                        <input type="text"  name="supplier_id"  placeholder="ID" class="form-control" autofocus>
											                        
											                    </div>
											                </div>

											                <div class="form-group">
											                    <label for="firstName" class="col-sm-3 control-label">Full Name</label>
											                    <div class="col-sm-9">
											                        <input type="text" name="supplier_name" placeholder="Full Name" class="form-control" autofocus>
											                        <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span>
											                    </div>
											                </div>
											                
											               
											                <div class="form-group">
											                    <label for="birthDate" class="col-sm-3 control-label">Joining date</label>
											                    <div class="col-sm-9">
											                        <input type="date" name="Joiningdate" id="birthDate" class="form-control">
											                    </div>
											                </div>
											               
											                <div class="form-group">
											                    <label class="control-label col-sm-3">Gender</label>
											                    <div class="col-sm-6">
											                        <div class="row">
											                            <div class="col-sm-4">
											                                <label class="radio-inline">
											                                    <input type="radio" name="gender"  value="Female">Female
											                                </label>
											                            </div>
											                            <div class="col-sm-4">
											                                <label class="radio-inline">
											                                    <input type="radio" name="gender"  value="Male">Male
											                                </label>
											                            </div>
											                            <div class="col-sm-4">
											                                <label class="radio-inline">
											                                    <input type="radio" name="gender"  value="Unknown">Unknown
											                                </label>
											                            </div>
											                        </div>
											                    </div>
											                </div> <!-- /.form-group -->
											                <div class="msg">
											                	<p id="show"></p>
											                </div>
											               
											                <div class="form-group">
											                    <div class="col-sm-9 col-sm-offset-3">
											                        <button type="submit" name="savesupplier" class="btn btn-primary btn-block">Register</button>
											                    </div>
											                </div>
											            </form> <!-- /form -->
											        </div> <!-- ./container -->
											</div>
										</div>
										<div class="col-md-6">
											<div class="well"></div>
										</div>
									</div>
								</div>

								<?php 

										if(isset($_POST['savesupplier']))
										{
											$id = $_POST['supplier_id'];
											$name = $_POST['supplier_name'];
											$join_date = $_POST['Joiningdate'];
											$gender = $_POST['gender'];
											$addedby = $_SESSION['username'];

											if(empty($id) || empty($name))
											{
												?>

												<script>
													document.getElementById('show').innerHTML ="can not miss any required field";
													
													setTimeout(function(){$("#show").fadeOut().empty()},3000);
												</script>
												<?php 

											}else {
												

												$sql = "INSERT INTO `supplier`(`id`, `name`, `date`, `gender`, `addedby`) VALUES ('$id','$name','$join_date','$gender','$addedby')";
												$query  = $obj->prepare($sql);
												if($query->execute())
												{
													?>

												<script>
													document.getElementById('show').innerHTML ="data has been saved";
													setTimeout(function(){$("#show").fadeOut().empty()},3000);
												</script>
												<?php 

												}

											}
										}


								?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h1>Suplier  Lists</h1>
				<table class="table table-striped table-bordered table-hover table-condensed">
					<tr>
						<th>SL/NO</th>
						<th> Name</th>
					<th>Date</th>

					<th>Gender</th>
					
					
							

					<th>Actions</th>
					</tr>
					<?php
					$i = 0;
					$sql = "SELECT * FROM `supplier` where addedby = '".$_SESSION['username']."'";
					$query = $obj->prepare($sql);
					$query->execute();

					$q = $query->rowcount();
					 echo "there are " .$q. " products ";
					while($row=$query->fetch())
					{
						$i++;
						




?>

<tr>

	<td> <?php echo $i;?> </td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['date'];?></td>
	<td><?php echo $row['gender'];?></td>
	
	
	<td>
		<a href="#"><button class="btn btn-warning">Edit</button></a> || <a href="#"><button class="btn btn-warning">Delete</button></a></td>
		
</tr>
<?php
					}

					?>

				</table>
			</div>
		</div>
	</div>
</div>


					  <?php  include('files/footer.php'); ?>