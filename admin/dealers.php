		

			<?php
			    if(!isset($_SESSION)){
					session_start(); // starting session for checking username
				}
			        if(is_null($_SESSION['username']))
				{
					header("location:index.php"); // Redirect to login.php page
				}
			?>
			<style>
				table tr{
					border: 2px #ccc solid;
				}
			</style>
		
			<script type="text/javascript">
				$(document).ready(function(){

					$("#name").on("blur",function(){
						var name = $(this).val();
						$.ajax({

							url:"php/usercheckalready.php",
							type:"GET",
							data: {
								name: name},
								success: function(response)
								{
									document.getElementById('message').innerHTML = response;
									console.log(response);
								}



						})

					});
				});



			</script>



<!-- 
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="well">
							Add Dealer
							<form class="form-inline" action="php/dealer_add.php" method="post">
								<table>
									<tr>
										<div class="form-group">



									<td> <label  for="exampleInputEmail3">Dealer ID</label></td>
									<td> <input required type="text" name="id" class="form-control"  placeholder="ID"></td>
									</div>
								</tr>
								<br>
									<tr>
										<div class="form-group">



									<td><label for="exampleInputPassword3">dealer  Name</label></td>
									<td><input required type="text"  name="name" class="form-control" id="name" placeholder="name"></td>
									<p style="color:red" id="message"></p>
									</div>
								</tr>
								<tr>
										<div class="form-group">



									<td><label for="exampleInputPassword3">dealer  password</label></td>
									<td><input required type="password"  name="pass" class="form-control" placeholder="password"></td>
									</div>
								</tr>
								<tr>
										<div class="form-group">



									<td><label  for="exampleInputPassword3">Branch </label></td>
									<td>
										<select name="adrs"  id="">

											<option value="uttara">uttara</option>
											<option value="mirpur">Mirpur</option>
											<option value="Banani">Banani</option>
											<option value="dhanmondi">Dhanmondi</option>
											<option value="gulshan">Gulshan</option>
											<option value="bashunshara">Bashunshara</option>
										</select>
									</td>
									</div>
								</tr>
								<tr>
										<div class="form-group">



									<td><label  for="exampleInputPassword3">JOIN Date</label></td>
									<td><input type="date"  name="date" class="form-control" placeholder="date"></td>
									</div>
								</tr>

								</table>



			  <button type="submit" name="save_dealer" class="btn btn-warning">Submit</button>

			</form>

						</div>
					</div>
				</div>
			</div> -->


			
				<div class="row">
					<div class="col-md-12">
						<div class="well">
							<table class="table table-bordered table-striped table-responsive">
								<tr>
									<th>SL/NO</th>
									
								<th>dealer Name</th>
								
								<th>Address</th>
								

								<th>Actions</th>
								</tr>
								<?php
								
								$i = 0;
								
								$sql1 = "SELECT * FROM `dealers`";
								$query1 = $con->joinQuery($sql1);
								
								$q1 = $query1->rowCount();
								 echo "there are " .$q1. " dealers ";
								while($row=$query1->fetch(PDO::FETCH_ASSOC))
								{
									$i++;?>

			<tr>

				<td> <?php echo $i;?> </td>
				
				<td><?=$row['name']?></td>
				
				<td><?=$row['address']?></td>
				


				<td><a class="btn btn-primary" href="" data-toggle="modal" data-target="#myModal_<?=$row['id']?>">See details</a>|
					<?php 
							if ($row['status']=="0") {?>
								<a href=""><button class="btn btn-warning">Pending</button></a>
							<?php } elseif ($row['status']=="1") {?>
								<a href=""><button class="btn btn-success">Accepted</button></a>
							<?php }elseif($row['status']=="2"){?>

                          <a href=""><button class="btn btn-danger">Rejected</button></a>
							<?php }



					?>
					</td>




			</tr>

								<!-- Modal -->
<div id="myModal_<?=$row['id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dealer Details</h4>
      </div>
      <div class="modal-body">

      	   <div class="row">
      	   	<div class="col-sm-6"><p><b><strong>Name : </strong><?=$row['name']?></b></p>
        		<p><b><strong>Email : </strong><?=$row['email']?></b></p>
        		<p><b><strong>Address : </strong><?=$row['address']?></b></p>
        		<p><b><strong>Password : </strong><?=$row['pass']?></b></p>
        		<p><b><strong>Phone : </strong><?=$row['phone']?></b></p>
        		<p><b><strong>Gander : </strong><?=$row['gander']?></b></p>
        		<p><b><strong>Request sent AT : </strong><?=$row['join_date']?></b></p>
        		<p><strong>Division : </strong><?=getDivisionName($row['division_id'])?> || <strong>District :  </strong><?=getDistrictName($row['district_id'])?> || <strong>Thana :  </strong><?=getThanaName($row['thana_id'])?> </p></div>
      	   	<div class="col-sm-6">
      	   		<h5>see Others are avaiable in this area or not</h5>
      	   		<?php  checkDealerInthelocation($row['division_id'],$row['district_id'],$row['thana_id'],$row['id']); ?>
      	   	</div>

      	   	<div class="col-sm-6"><button class="btn btn-success" onclick="userDeal(this,'a')" data-id="<?=$row['id']?>">Accept</button></div>
      	   	<div class="col-sm-6"><button class="btn btn-danger" onclick="userDeal(this,'r')" data-id="<?=$row['id']?>">Reject</button></div>
      	   </div>



        
        		
        		
        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
			<?php
								}

								?>

							</table>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					
				   function userDeal(ele,key) {
				   	    var id = ele.getAttribute("data-id");
				   	    var xhr =  new XMLHttpRequest();
				   	    xhr.open("GET", "ajax/dealer_req.php?u_id="+id+"&key="+key, true);
				   	    xhr.onload = function() {
				   	        if (this.readyState === 4 ) {
				   	        	var text =  confirm(this.responseText +" \n Do you want to close the window ? ");
				   	        	if (text === true) {
				   	        				setAttribute("data-dismiss", "modal");
				   	        	}else{
				   	        				  //alert("world");
				   	        	}
				   	        	console.log(this.responseText);
				   	        }
				   	    }
				   	    xhr.send();
				   }
				</script>
			






			
