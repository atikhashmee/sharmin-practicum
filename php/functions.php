		<?php 


				 
				require_once("dboperation.php");
				$con = new Db();
				// get the division
				 function getDivision()
				 {
				 	$division = $GLOBALS['con']->selectAll("division");
				 	while ($row = $division->fetch(PDO::FETCH_ASSOC)) {
				 		echo "<option value='".$row['d_id']."'>".$row['name']."</option>";
				 	}
				 } 
				 function getDistrict($d_id = "")
				 {
				 
        		 	$district = (!empty($d_id))?$GLOBALS['con']->selectAll("district","division_id = '".$d_id."'"):$GLOBALS['con']->selectAll("district");
        		 	if ($district->rowCount() != 0) {
        		 		while ($row = $district->fetch(PDO::FETCH_ASSOC)) {
				 		echo "<option value='".$row['district_id']."'>".$row['district_name']."</option>";
				 	}
        		 	}else{
        		 		echo "<option  style='color:red' value=''>No directory found</option>";
        		 	}
				 	
				 }
				 function getThanas($d_id = "")
				 {
				 
        		 	$district = (!empty($d_id))?$GLOBALS['con']->selectAll("thana","district_id = '".$d_id."'"):$GLOBALS['con']->selectAll("thana");
        		 	if ($district->rowCount() != 0) {
        		 		while ($row = $district->fetch(PDO::FETCH_ASSOC)) {
				 		echo "<option value='".$row['thana_id']."'>".$row['thana_name']."</option>";
				 	}
        		 	}else{
        		 		echo "<option style='color:red' value='' >No directory found</option>";
        		 	}
				 	
				 }

				 function getDivisionName($id)
				 {
				     $division = $GLOBALS['con']->selectAll("division" ,"d_id='".$id."'")->fetch(PDO::FETCH_ASSOC);
				 	echo $division['name'];
				 } 
				 function getDistrictName($id)
				 {
				     $district = $GLOBALS['con']->selectAll("district" ,"district_id='".$id."'")->fetch(PDO::FETCH_ASSOC);
				 	echo $district['district_name'];
				 }
				 function getThanaName($id)
				 {
				     $district = $GLOBALS['con']->selectAll("thana" ,"thana_id='".$id."'")->fetch(PDO::FETCH_ASSOC);
				 	echo $district['thana_name'];
				 }

				 function checkDealerInthelocation($d,$d2,$t,$id){

				 	$sql  = "SELECT * FROM `dealers` WHERE `division_id`='{$d}' AND `district_id`='{$d2}' AND `thana_id`='{$t}' AND id !='{$id}'";
				 	$check = $GLOBALS['con']->joinQuery($sql);
				 	if ($check->rowCount()>0) {
				 	   echo $check->rowCount()." found in this location";
				 	   while ($rr = $check->fetch(PDO::FETCH_ASSOC)) {?>
				 	  
						<div class="panel-group" id="accordion">
				  <div class="panel panel-primary">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$rr['id']?>">
				        <?=$rr['name']?></a>
				      </h4>
				    </div>
				    <div id="collapse<?=$rr['id']?>" class="panel-collapse collapse in">
				      <div class="panel-body"><p><strong>Division : </strong><?=getDivisionName($rr['division_id'])?> || <strong>District :  </strong><?=getDistrictName($rr['district_id'])?> || <strong>Thana :  </strong><?=getThanaName($rr['thana_id'])?> </p></div>
				    </div>
				  </div>
 
                     </div>

				 	   <?php
				 	   	 //  echo "<a href=''>".$rr['name']."</a></br>";
				 	   }
				 	}else{

				 		echo "No one found in this location";
				 	}
				 }


				 function getProductName($id)
					{
						  $product =  $GLOBALS['con']->selectAll("product","id = '".$id."'")->fetch(PDO::FETCH_ASSOC);
						  return $product['name'];
					}


		?>