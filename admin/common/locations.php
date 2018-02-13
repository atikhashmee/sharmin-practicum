


			<?php 
              if (isset($_POST['divisionbtn'])) {
              	   $data = array(
              	   	'name' => $_POST['division'], 
              	   	'created_at' =>date("Y-m-d") 
              	   );

              	   if (!empty($_POST['division']) && $con->insert("division",$data)) {
                        echo "saved division";
              	   }else {
              	   			echo "Problem";

              	   }
              }

              if (isset($_POST['districtbtn'])) {
              	   $data = array(
              	   	'division_id' => $_POST['division_id'], 
              	   	'district_name' => $_POST['districtname'], 
              	   	'created_at' =>date("Y-m-d") 
              	   );

              if (!empty($_POST['division_id']) && !empty($_POST['districtname']) && $con->insert("district",$data)) {
                           echo "saved district";
              	   }else {
              	   			echo "Problem";

              	   }
              }
              if (isset($_POST['thanabtn'])) {
              	   $data = array(
              	   	'district_id' => $_POST['district_id'], 
              	   	'thana_name' => $_POST['thananame'], 
              	   	'created_at' =>date("Y-m-d") 
              	   );

              if (!empty($_POST['district_id']) && !empty($_POST['thananame']) && $con->insert("thana",$data)) {
                        echo "saved thana";
              	   }else {
              	   			echo "Problem";

              	   }
              }

      


			?>



    <div class="row">
    	<div class="col-md-4">
    		<div class="well">
    			<table class="table">
    					<form action="#" method="POST" class="form-inline">
    				<tr>
    					<td><input type="text" class="form-control" id="division" name="division"></td>
    					<td> <button type="submit" name="divisionbtn" class="btn btn-default">add division</button></td>
    				</tr>
    				</form>
    			</table>
    	

    		</div>
    		<div class="well">
    			<table class="table">
    				
    				<tr>
    					<th>SL</th>
    					<th>Name</th>
    					<th>Actions</th>
    				</tr>

    				<?php 
    				$i=0;
                 $qry  = $con->selectAll("division");
                 while ($row = $qry->fetch()) { $i++; ?>
                 	<tr>
    					<td><?=$i?></td>
    					<td><?=$row['name']?></td>
    					<td>Edit|delete</td>
    				</tr>
               <?php  }


    				?>
    				
    			</table>
    	

    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="well">
    			<table class="table">
    					<form action="#" method="POST" class="form-inline">
    				<tr>
    					
    					<td><select name="division_id" id="division_id" class="form-control">
    						<option>Select a division</option>
    						<?php   getDivision(); ?>
    					</select></td>
    					<td><input type="text" class="form-control" id="districtname" name="districtname"></td>
    					<td> <button type="submit" name="districtbtn" class="btn btn-default">Add district</button></td>
    				</tr>
    				</form>
    			</table>
    		</div>
    		<div class="well">
    			<table class="table">
    				
    				<tr>
    					<th>SL</th>
    					<th>Divisions</th>
    					<th>Districts</th>
    					<th>Actions</th>
    				</tr>

    				<?php 
    				$i=0;
                 $qry  = $con->selectAll("district");
                 while ($row = $qry->fetch()) { $i++; ?>
                 	<tr>
    					<td><?=$i?></td>
    					<td><?=getDivisionName($row['division_id'])?></td>
    					<td><?=$row['district_name']?></td>
    					<td>Edit|delete</td>
    				</tr>
               <?php  }


    				?>
    				
    			</table>
    	

    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="well">
    			<table class="table">
    					<form action="#" method="POST" class="form-inline">
    				<tr>
    					
    					<td><select name="district_id" id="district_id" class="form-control">
    						<option>Select a division</option>
    						<?php   getDistrict(); ?>
    					</select></td>
    					<td><input type="text" class="form-control" id="thananame" name="thananame"></td>
    					<td> <button type="submit" name="thanabtn" class="btn btn-default">Add Thana</button></td>
    				</tr>
    				</form>
    			</table>
    		</div>
    		<div class="well">
    			<table class="table">
    				
    				<tr>
    					<th>SL</th>
    					<th>Divisions</th>
    					<th>Districts</th>
    					<th>Actions</th>
    				</tr>

    				<?php 
    				$i=0;
                 $qry  = $con->selectAll("thana");
                 while ($row = $qry->fetch()) { $i++; ?>
                 	<tr>
    					<td><?=$i?></td>
    					<td><?=getDistrictName($row['district_id'])?></td>
    					<td><?=$row['thana_name']?></td>
    					<td>Edit|delete</td>
    				</tr>
               <?php  }


    				?>
    				
    			</table>
    	

    		</div>
    	</div>
    </div>