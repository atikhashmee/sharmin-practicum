			<?php  include('files/header.php'); ?>

			<?php
			    if(!isset($_SESSION)){
					session_start(); // starting session for checking username
				}
			        if(is_null($_SESSION['username']))
				{
					header("location:index.php"); // Redirect to login.php page
				}


				               require_once("../php/connections.php");
								              $db = new Db();
								              $obj = $db->getConnection();
			?>


			




			<?php  include('files/menu.php'); ?>


			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="well">

							<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class="form-inline" >
								<div class="form-group">
								  <label for="start">From :</label>
								  <input type="date" name="startdate" class="form-control">
								</div>
								<div class="form-group">
								  <label for="enddate">To :</label>
								  <input type="date" name="enddate" class="form-control" >
								</div>

								<div class="form-group">
								  
								  <input type="submit" name="report" class="btn btn-success">
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="well">
							<table class="table table-stripped table-bordered">
								<tr>
									<th>SL</th>
									<th>Product title </th>
									<th>Unit Price</th>
									<th>Quantity</th>
									<th>Totall</th>
								</tr>

								<?php
								if(isset($_GET['report']))
								{
									$i=0;
									$total=0;
									$countquantity=0;
									$startdate = $_GET['startdate'];
									$enddate = $_GET['enddate'];
									$sql = "SELECT p_distribution.p_id, p_distribution.sellingprice, p_sell.p_quantity,p_sell.p_id,p_sell.sel_date_time,p_sell.p_prize,p_sell.totall_prize FROM `p_distribution` join p_sell on p_distribution.p_id = p_sell.p_id where dealer_id ='".$_SESSION['username']."' AND (p_sell.sel_date_time >= '$startdate' AND p_sell.sel_date_time <= '$enddate')";
									

									$sth = $obj->prepare($sql);
									$sth->execute();
									while ($row = $sth->fetch()) {$i++; $total += $row['totall_prize'];
													$countquantity += $row['p_quantity']* $row['sellingprice'];
										?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_id']; ?></td>
												<td><?php echo $row['p_prize']; ?></td>
												<td><?php echo $row['p_quantity']; ?></td>
												<td><?php echo $row['totall_prize']; ?></td>
											</tr>

										<?php 
									}
									?>


									<td>
									<tr>
										<td>totall buying cost</td>
										<td><?php echo $countquantity; ?></td>
									</tr>
									<tr>
										<td>totall selling cost</td>
										<td><?php echo $total; ?></td>
									</tr>
									<tr>
										<td>Profit</td>
										<td><?php echo $total-$countquantity; ?></td>
									</tr>

									</td>
								<?php }




								 ?>
								

							</table>
						</div>
					</div>
				</div>


			</div>


				
			


			<?php  include('files/footer.php'); ?>