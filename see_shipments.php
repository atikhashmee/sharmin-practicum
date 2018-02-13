  					


  
			

			<?php 

					function nOfProduct($val)
					{
						return count(explode(",", $val));
					}

					function commison($com){

						return ($com != 0)?"Yes":"No";
					}


			?>




  					<div class="row">
  						<div class="col-md-12">
  							<div class="well">
  								<table class="table table-bordered table-striped">
  									<tr>
  									
  										<th>Shipment name</th>
  										<th>Number of product</th>
  										<th>Commision avaiable</th>
  										<th>Actions</th>
  									</tr>

  									<?php 

  					$shipment = $con->selectAll("p_distribution","dealer_id ='".$_SESSION['u_id']."'")->fetchAll();
  													$i=0;

  											foreach ($shipment as $val) {
  											$i++;  ?>
  												<tr>
  													
  													<td><?php echo "shipment-".$i; ?></td>
  													<td><?=nOfProduct($val['p_id'])?></td>
  													<td><?=commison($val['comission'])?></td>
  													<td><a href="?route=shipment-details&s_id=<?=$val['id']?>" class="btn btn-success">Details</a></td>
  												</tr>
  											<?php }




  									?>



  								</table>
  							</div>
  						</div>
  					</div>