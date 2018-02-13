

				
			

			<?php  



					

					function pAWC($price,$profit){

						return number_format((($profit/100)*$price)+$price,2,",",".");
					}
					function totalPrice($qntity,$singleprices)
					{

							return number_format((floatval($qntity)*floatval($singleprices)),2,",",".");
					}


			?>



				<div class="row">
					<div class="col-md-12">
						<div class="well">
							
								<table class="table table-bordered table-striped">
									<tr>
										<th>SL</th>
										<th>Product name</th>
										<th>Quantity</th>
										<th>Price</th>
										<th>Total</th>
									</tr>

									<?php 


		$shipmentdetails = $con->selectAll("p_distribution","id= '".$_GET['s_id']."'")->fetch(PDO::FETCH_ASSOC);

						         $product_list = explode(",", $shipmentdetails['p_id']);
						         $product_quantity = explode(",", $shipmentdetails['quantity']);
						         $product_prices = explode(",", $shipmentdetails['price']);
						         $product_profit = explode(",", $shipmentdetails['profitepercen']);

						         for ($i=0,$j=1; $i <count($product_list); $i++,$j++) {  ?>
						         	    <tr>
						         	    	<td><?=$j?></td>
						         	    	<td><?=getProductName($product_list[$i])?></td>
						         	    	<td><?=$product_quantity[$i]?></td>
						         	    	<td><?=pAWC($product_prices[$i],$product_profit[$i])?></td>
						         	    	<td><?=totalPrice($product_quantity[$i],pAWC($product_prices[$i],$product_profit[$i]))?></td>
						         	    </tr>
						        <?php  }






									?>
								</table>


						</div>
					</div>
				</div>