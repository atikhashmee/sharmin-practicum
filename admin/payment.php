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
									   	require_once("php/connections.php");
								       $db = new Db();
											 $obj = $db->getConnection();
								       $i=0;

								       $username = $_SESSION['username'];
								      $sql = "SELECT `id`, `dealer_id`, `name` FROM `dealers` WHERE `type` ='dealer' AND `addedby`='$username'";
								      $qury = $obj->prepare($sql);
								      $qury->execute();
								      while ($row=$qury->fetch(PDO::FETCH_ASSOC)) {$i++;?>
								      			<tr> <td><?php echo $i;?></td>
								      				<td><a class="scroll" href="#" ><?php echo $row['name'];?>


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
										<div class="form-group">



						<td> <label  for="exampleInputEmail3">Totall Due</label></td>
						<td>
						    <div id="mydata"></div>

					<!-- 	<input type="text" name="Totall" id="dataresult"  readonly="true" class="form-control" value="0" >
					<input type="text" readonly="true"  name="users" id="users" value=""> -->
						</td>
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
				<!-- start the table data  -->
				 <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well">

                            <table class="table">
                                <tr>
                                    <th>SL/NO</th>
                                    <th>Dealer name</th>
                                    <th>Total amount</th>
                                    <th>payment </th>
                                    <th>due</th>
                                    <th>date</th>
                                    
                                </tr>
                                <?php
					require_once("php/connections.php");
					$db = new Db();
					$obj = $db->getConnection();
					$i = 0;
					$sql = $obj->prepare("SELECT * FROM `payments` WHERE `recievedby`='".$_SESSION['username']."'");
					$sql->execute();
					//$q = mysql_num_rows($query);
					// echo "there are " .$q. " products ";
					while($row=$sql->fetch())
					{
						$i++;
						
?>

                                    <tr>

                                        <td>
                                            <?php echo $i;?>
                                        </td>
                                        
                                        <td>
                                            <?php echo $row['users'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['totall_amount'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['payment'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['due'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['payment_date'];?>
                                        </td>
                                       

                                    </tr>
                                    <?php
					}

					?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
				<!-- end of table data -->
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
								showall(id);

							});

								function showall(id)
								{
									$.ajax({
										url:"php/paymentshow.php",
										data: "id="+id,
										type:"GET",
										success : function(response)
										{

													//document.getElementById('dataresult').html = response;

													$("#mydata").html(response);

										}

									});
								}

								$("#pay").click(function(e){
									e.preventDefault();

									var data = $("#payment_form").serialize();

									$.ajax({
										url:"php/paymentsdone.php",
										type:"POST",
										data : data,
										success : function(data_response)
										{
											alert(data_response);
											console.log(data_response);
										}
									})


								});



					});
				</script>

			 <?php  include('files/footer.php'); ?>
