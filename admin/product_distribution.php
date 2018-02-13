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
<?php 
   if (isset($_POST['save_info'])) {
   	  
   	
   		$data = array(
   			'dealer_id' =>$_POST['dealer_name'],
   			'p_id' => implode(",", $_POST['productname']),
   			'price' => implode(",", $_POST['productprice']),
   			'profitepercen' => implode(",", $_POST['Pamount']),
   			'quantity' => implode(",", $_POST['quantity']),
   			'distributedate' =>date("Y-m-d"),
   			'distributedby' => "tota",
   			'comission' => $_POST['comission'],
   			'start_date' => $_POST['startdate'],
   			'end_date' => $_POST['enddate']
   			 );
   
   			if ($con->insert("p_distribution",$data)) {
   					echo "saved";
   			}else {
   
   					echo "problem";
   			}
   }
   
   ?>
<div class="row">
   <div class="col-md-12">
      <div class="well">
         <form class="" action="#" method="post">
            <div class="form-group">
               <label for="exampleInputPassword3">Dealer Name</label>
               <select class="form-control" name="dealer_name" id="">
                  <option value="">select an option</option>
                  <?php
                     $query1 = $con->joinQuery("SELECT * FROM `dealers`");
                     while($row=$query1->fetch())
                     { ?>
                  <option value="<?=$row['id']?>"><?=$row['name']?></option>
                  <?php  } ?>
               </select>
            </div>
            <button type="button" class="btn btn-primary" onclick="addnew()">addnew</button>
            <div id="holder">
               <div class="row" id="rowholder">
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputEmail3">Product </label>
                        <select class="form-control" name="productname[]" id="productid">
                           <option value="">Select an Option</option>
                           <?php
                              $query = $con->joinQuery("SELECT * FROM `product`");
                              while($row=$query->fetch())
                              { ?>
                           <option value="<?=$row['id']?>"> <?=$row['name']?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3">Price</label>
                        <input type="number" name="productprice[]" id="price" value="0" readonly="true" class="form-control" placeholder="price each">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3">Add profit(in %)</label>
                        <input type="number" name="Pamount[]" id="profitvalue" value="0" onblur="profitcal()" class="form-control" >
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3"> Totall selling cost</label>
                        <input type="number" name="sprice[]" id="totllsellingcost" value="0" readonly="true" class="form-control">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3">Quantity</label>
                        <input type="number"  name="quantity[]" id="qntity" onblur="cal()" class="form-control" placeholder="quantity">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3">Totall amount</label>
                        <input type="number"  name="total[]" id="totall" value="0" readonly="true"  class="form-control"  placeholder="totall ">
                     </div>
                  </div>
               </div>
            </div>
            <legend>Commission</legend>
            <div class="form-group">
               <label  for="exampleInputPassword3">Commison in % </label>
               <input type="number" class="form-control" name="comission"  placeholder="Commision amount ">
            </div>
            <div class="form-group">
               <label  for="exampleInputPassword3">Start date </label>
               <input type="date" class="form-control" name="startdate" >
            </div>
            <div class="form-group">
               <label  for="exampleInputPassword3">End date </label>
               <input type="date" class="form-control" name="enddate" >
            </div>
            <button type="submit" name="save_info" class="btn btn-success">Submit</button>
         </form>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="well">
         <h1>product distribution view</h1>
         <table class="table">
            <tr>
               <th>SL/NO</th>
               <th>product Name</th>
               <th>dealer Name</th>
               <th>product Quantity</th>
               <th>product Price</th>
               <th>Totall price</th>
               <th>Actions</th>
            </tr>
            <?php
               $i = 0;
               $sql = "SELECT * FROM `p_distribution` where distributedby='".$_SESSION['username']."'";
               $query = $con->joinQuery($sql);
               
               
               $q = $query->rowCount();
                echo "there are " .$q. " products ";
               while($row=$query->fetch())
               {
               	$i++;
               	$id = $row['id'];
               	$p_id = $row['p_id'];
               	$d_name  = $row['dealer_id'];
               	$p_quantity =$row['quantity'];
               	$p_prize = $row['price'];
               	$due  = $row['due'];
               
               
               
               
               ?>
            <tr>
               <td> <?php echo $i;?> </td>
               <td><?php echo $p_id;?></td>
               <td><?php echo $d_name;?></td>
               <td><?php echo $p_quantity;?></td>
               <td><?php echo $p_prize;?></td>
               <td><?php echo $due;?></td>
               <td>
                  <a href="dele_p_dis.php?delete=<?php echo $id; ?>"><button class="btn btn-warning">Delete</button></a>
               </td>
            </tr>
            <?php
               }
               
               ?>
         </table>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
   	$("#productid").on("change",function(){
   			var id = $(this).val();
   			$.ajax({
   				url:"php/product_price.php",
   				type: "GET",
   				data:{
   					id: id
   				     },
   				     dataType:"json",
   				success: function(data)
   				{
   
   					document.getElementById('price').value = data.price;
   					console.log(data);
   				}
   			});
   
   	});
   });
   
   
   
   <?php 
      $pricesdata =  $con->joinQuery("SELECT `id`, `price` FROM `product`");
       $hold =  [];
       while ($val = $pricesdata->fetch(PDO::FETCH_ASSOC)) {
       	$hold[ intval($val['id'])] = intval($val['price']);
       }
      ?>
   var prices = <?=json_encode($hold)?>;
   console.log(prices);
   // var testprices=[];
   //    console.log("ff "+testprices);
   
   var cnt = 0;
   function addnew(){  //very important function .. should not be wiped out 
       cnt++;
   	console.log("making sure function is working .... "+cnt);
      
      for (var i = 1; i <=6; i++) {
      	  fields(i);
      	  }
      	 
      	 // optiondata();
   }
   
    function priceupdate() {
    	var did = document.getElementById("productname"+cnt).value;
       document.getElementById("productprice"+cnt).value = prices[did];
    	//alert("prices update function "+id+" "+did);
    }
    function profitAdd()
    {
    	var profitamount = document.getElementById('Pamount'+cnt).value;
    	var pprice =  document.getElementById("productprice"+cnt).value;
    	var per = (profitamount/100)*pprice;
    	document.getElementById('sprice'+cnt).value = pprice+per;
    }
   
    function quantityupdate()
    {
    	var sprice = document.getElementById('sprice'+cnt).value;
    	var qamount  = document.getElementById('quantity'+cnt).value;
    	document.getElementById('total'+cnt).value = sprice*qamount;
   
    }
   function  fields(i) {
   
   	var roholder =  document.getElementById("holder");
       var divid =  document.getElementById('rowholder');
      var col = document.createElement("DIV");
      col.setAttribute("class","col-sm-2");
        if (i===1) {
        	  var divholer =  document.createElement("DIV");
        divholer.setAttribute("class", "form-group");
        var label1 =  document.createElement("LABEL");
       var tabletext =  document.createTextNode(labelname(i));
       label1.appendChild(tabletext);
        	
        	var sb  = document.createElement("SELECT");
        	sb.setAttribute("name",attrname(i));
        	sb.setAttribute("id",attrid(i,cnt));
        	//sb.setAttribute("data-id",cnt);
        	sb.onchange = priceupdate;
        	sb.setAttribute("class","form-control opdata");
        	var option  = document.createElement("OPTION");
        	option.setAttribute("value","");
        	var optiontxt  =  document.createTextNode("Select an option");
        	option.appendChild(optiontxt);
   
        	sb.appendChild(option);
   
        		  var xhr = new XMLHttpRequest();
        xhr.open("GET", "ajax/getproductval.php", true);
         xhr.onload = function(){
         	if (this.readyState === 4 ) {
         		var data = JSON.parse(this.response);
         	   //console.log(data);
         		for (var i = 0; i < data.length; i++) {
         			var option = document.createElement("OPTION");
         			option.value = data[i].id;
         			option.text = data[i].name;
         			//testprices[parseInt(data[i].id)] = parseInt(data[i].price);
         			//console.log(data[i].price);
         			sb.appendChild(option);
         			//return option;
         			
         		}
         		
         		
         	}
         }
         xhr.send();
   
        	//sb.appendChild(optiondata);
        	divholer.appendChild(sb);
        	col.appendChild(divholer);
    divid.appendChild(col);
        }else {
        	var divholer =  document.createElement("DIV");
           divholer.setAttribute("class", "form-group");
           var label1 =  document.createElement("LABEL");
         var tabletext =  document.createTextNode(labelname(i));
          label1.appendChild(tabletext);
             var input1 = document.createElement("INPUT");
          input1.setAttribute("class","form-control");
          input1.setAttribute("name",attrname(i));
          input1.setAttribute("id",attrid(i,cnt));
          input1.setAttribute("type","number");
          //input1.onblur = profitAdd;
   
          		if (i===2 || i===4 || i==6) {
          			 input1.setAttribute("readonly","false");
          		}
   
          		if (i===3) {
          			input1.onblur = profitAdd;
          		}
   
          		if (i===5) {
          			input1.onblur = quantityupdate;
          		}
   
   
          divholer.appendChild(label1);
          divholer.appendChild(input1);
          col.appendChild(divholer);
          divid.appendChild(col);
        }
       roholder.appendChild(divid);
   }
   
    function labelname(i) {
   	    switch(i){
   	    	case 1: return "Product Name..";
   	    	break;
   	    	case 2: return "Product Price..";
   	    	break;
   	    	case 3: return "Profit Amount";
   	    	break;
   	    	case 4: return "Selling Price";
   	    	break;
   	    	case 5: return "Quantity";
   	    	break;
   	    	case 6: return "Total cost";
   	    	break;
   	    	default :return "Nothing happened";
   	    	break;
   
   	    }
   }
   function attrid(i,count) {
   	    switch(i){
   	    	case 1: return "productname"+count;
   	    	break;
   	    	case 2: return "productprice"+count;
   	    	break;
   	    	case 3: return "Pamount"+count;
   	    	break;
   	    	case 4: return "sprice"+count;
   	    	break;
   	    	case 5: return "quantity"+count;
   	    	break;
   	    	case 6: return "total"+count;
   	    	break;
   	    	default :return "Nothing happened";
   	    	break;
   
   	    }
   }  
   
   function attrname(i) {
   	    switch(i){
   	    	case 1: return "productname[]";
   	    	break;
   	    	case 2: return "productprice[]";
   	    	break;
   	    	case 3: return "Pamount[]";
   	    	break;
   	    	case 4: return "sprice[]";
   	    	break;
   	    	case 5: return "quantity[]";
   	    	break;
   	    	case 6: return "total[]";
   	    	break;
   	    	default :return "Nothing happened";
   	    	break;
   
   	    }
   }
   
   
   
   /*   function  optiondata() {  this should be checked later why this is not working the way i wanted
   
   var s = document.getElementsByClassName("opdata");
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "ajax/getproductval.php", true);
         xhr.onload = function(){
         	if (this.readyState === 4 ) {
         		var data   =    JSON.parse(this.response);
         	console.log(data);
         		for (var i = 0; i < data.length; i++) {
         			var option = document.createElement("OPTION");
         			option.value = data[i].id;
         			option.text = data[i].name;
         			console.log(option);
         			//s.appendChild(option);
         			return option;
         			
         		}
         		
         		
         	}
         }
   
         xhr.send();
   
   }*/
   
   
   
   
      function cal()
         {
         	var quantity  =  document.getElementById('qntity').value;
         	var price = document.getElementById('price').value;
         	document.getElementById('totall').value = quantity*price;
         }
         
         function profitcal()
         {
         
         	var price = parseInt(document.getElementById('price').value);
         	var profit = parseInt(document.getElementById('profitvalue').value);
         	var percent = (profit/100)*price;
         	var total  = percent+price;
         	document.getElementById('totllsellingcost').value = total;
         }
   
</script>