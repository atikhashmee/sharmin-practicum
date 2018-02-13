			 <?php  include('files/header.php'); ?>

			<?php
			    if(!isset($_SESSION)){
					session_start(); // starting session for checking username
				}
			        if(is_null($_SESSION['username']))
				{
					header("location:index.php"); // Redirect to login.php page
				}
			?>
			<?php  include('files/menu.php'); ?>

			<style type="text/css">
				a.active
					 {
					 background:#e9d319;
					 color: #000;
					 }
			</style>

			<script type="text/javascript">
				$(function(){

			        $("a[href='#intro']").addClass("active");

			    $("a.scroll ").click(function() {
			        $("a.scroll").removeClass("active");
			        $(this).addClass("active");
			    });
			});
			</script>

				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="well">
								<p>select an users to see their totall due</p>
								<table class="table table-stripped table-bordered">

									   <?php  
									   	require_once("../php/connections.php");
								       $db = new Db();
								       $i=0;
								       	$obj = $db->getConnection();
								       $username = $_SESSION['username'];
								      $sql = "SELECT `id`, `users` FROM `p_sell` WHERE `activation` = '0' GROUP by `users`";
								      $qury = $obj->prepare($sql);
								      $qury->execute();
								      while ($row=$qury->fetch(PDO::FETCH_ASSOC)) {$i++;?>
								      			<tr> <td><?php echo $i;?></td>
								      				<td><a class="scroll" href="#" ><?php echo $row['users'];?>
								      					

								      				</a>


								      				</td>
								      				</tr>
								   <?php    }

									    ?>
								  
										</table>
								
							</div>
						</div>
						<div class="col-md-8">
							<div class="well">
								
								<div id="datashow">

									<form action=""  id="payment_form">
									<input type="hidden" name="userofpayment" id="userofpayment" value="">
										<div class="form-group">
   
   							
  
						<td> <label  for="exampleInputEmail3">Totall Due</label></td>
						<td> 
						<table class="table" id="mytable">
						<tbody>
							<tr>
								<td id="name"></td>
								<td id="quantity"></td>
								<td id="total_price"></td>
							</tr>
							</tbody>
						</table>
						    <tr>
						    	

						</td>
						</div>
						<div class="form-group">
   
   
  
						<td> <label  for="exampleInputEmail3">Total</label></td>
						<td> <input type="text" name="dataresult" id="dataresult" class="form-control"  ></td>
						</div>

						<div class="form-group">
   
   
  
						<td> <label  for="exampleInputEmail3">Now payment</label></td>
						<td> <input type="text" name="payment" id="now_payment" class="form-control"  ></td>
						</div>

						<div class="form-group">
   
   
  
						<td> <label  for="exampleInputEmail3">Due</label></td>
						<td> <input type="text" name="due" id="due" class="form-control"  readonly="true" ></td>
						</div>

						<button class="btn btn-success" type="button" name="payment-btn" id="pay">Submit</button>
									</form>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){

							//payment calculation 
							$("#now_payment").on("blur",function(){
								var totalldue = $("#dataresult").val();
								var now_payment = $("#now_payment").val();
								document.getElementById('due').value = totalldue - now_payment;

							})



							$(".scroll").on("click",function()
							{
								var id =  $(this).text();
								$("#userofpayment").val(id);
								showall(id);

							});

								function showall(id)
								{
									$.ajax({
										url:"../php/delear/dealer_payment_show.php",
										data: "id="+id,
										type:"GET",
										dataType:"JSON",
										success : function(response)
										{
											var total=0;
											//console.log(response);
											$.each(response,function(index){
												//console.log(response[index].product_name);
												$("#mytable tbody").append("<tr><td>"+response[index].product_name+"</td><td>"+response[index].product_quantity+"</td><td>"+response[index].totalbalance+"</td></tr>");
												var temp = response[index].totalbalance;
												total = total+parseInt(temp);
												/*$("#name").append(response[index].product_name+" ");
												$("#quantity").append(response[index].product_quantity+" ");
												$("#total_price").append(response[index].totalbalance+" ");*/
											});
											$("#dataresult").val(total);
											console.log(total);
											
													//document.getElementById('dataresult').html = response;

													//$("#mydata").html(response);
												
										}

									});
								}

								$("#pay").click(function(e){
									e.preventDefault();

									var data = $("#payment_form").serialize();

									$.ajax({
										url:"../php/delear/dealer_payment_done.php",
										type:"POST",
										data : data,
										success : function(data_response)
										{
											location.reload();
											alert(data_response);
											console.log(data_response);
										}
									})


								});


							
					});
				</script>

			 <?php  include('files/footer.php'); ?>