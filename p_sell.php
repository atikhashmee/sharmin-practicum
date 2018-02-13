
  		<?php 
  			$idholder = array();

  			function valueAdd($ids){
  				$idval = explode(",",$ids);
  				for ($i=0; $i <count($idval); $i++) { 
  					array_push($GLOBALS['idholder'], $idval[$i]);
  				}
  					
  			}
  				function product(){

         $product_id = $GLOBALS['con']->joinQuery("SELECT `p_id` FROM `p_distribution` where dealer_id ='".$_SESSION['u_id']."'")->fetchAll();
       						foreach ($product_id as  $val) {
       						
       							valueAdd($val['p_id']);
       						}
       							$uniq = array();


       							$uniq = array_unique($GLOBALS['idholder']);
       						for ($i=0; $i <count($uniq); $i++) { 
       							?>

									<option value="<?=$uniq[$i]?>"><?=getProductName($uniq[$i])?></option>
								
       							<?php 
       						}

  				}

  		?>
 <style type="text/css">
 	.mylist{
 		height: 76px;
 		padding: 12px 17px;
 	}
 </style>
	<div class="row">
		<div class="col-md-6">
			<div class="well">
           <form action="p_sell.php" method="post" >
				<table class="table">
					
					 	<tr>
						<td>product id</td>
						<td><select class="form-control" id="pid">
							<?=product()?>
						</select></td>
					</tr>
					
					<tr>
						<td></td>
						<td><button type="reset" class="btn btn-warning">Reset</button>|<button type="submit" name="con_sell" class="btn btn-success">Confirm</button></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="well">
          		<ul class="list-group">
				  <li class="list-group-item mylist ">
				  		<div class="col-sm-3"> <img src="admin/img/3.jpg" class="img-thumbnail" alt="" ></div>
				  		<div class="col-sm-3">
				  			<h5>Chair</h5>
				  			<small>$546</small>
				  		</div>
				  		<div class="col-sm-3"> <input type="number" class="form-control"> </div>
				  		<div class="col-sm-3"><input type="number" readonly class="form-control"></div>
				  </li>
				  
				</ul>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		
    function getProduct()
    {
    	var productID = document.getElementById('pid').value;


    }
   
       
       //hhtprequest(9);
var pobj = {};
function handleData(obj){
   return obj;
}
function hhtprequest(id)
{
    var xhr =  new XMLHttpRequest();
    xhr.open("GET","ajax/productinfforsell.php?pid="+id,true);
    xhr.onload = function(){
        if (this.readyState === 4 && this.status === 200) {
            var data = JSON.parse(this.response);
            pobj.image = data.imagefile;
            pobj.name = data.name;
            pobj.price = data.price;     
            handleData(pobj);         
        }
    }
    xhr.send();
}

  console.log(hhtprequest(9));


   

	</script>




