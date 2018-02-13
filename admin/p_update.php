 <?php  include('files/header.php'); ?>

<?php
    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
  require_once("php/connections.php");
  $db = new Db();
  $obj = $db->getConnection();
?>
<?php  include('files/menu.php'); ?>
<style>
	table tr{
		border: 2px #ccc solid;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h4>update product</h4>


						<?php
          //  $dataid = NULL;
				if(isset($_GET['edit']))
				{


					$id = $_GET['edit'];
        //  $dataid = $_GET['edit'];

					$sql = "SELECT * FROM `product` where id = '$id'";
					$query = $obj->prepare($sql);
          $query->execute();

					while($row=$query->fetch(PDO :: FETCH_ASSOC))
					{

						//$id = $row['id'];
						$p_id = $row['p_idd'];
						$p_name  = $row['name'];
						$p_entry = $row['date'];
						$p_prize = $row['price'];
						$p_quantity =$row['quantity'];
						?>
						<form class="form-inline" action="p_update.php" method="POST">
					<table>
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<tr>
							<div class="form-group">



						<td> <label  for="exampleInputEmail3">Product ID</label></td>
						<td> <input type="text" name="u_id" class="form-control" value="<?php echo $p_id ; ?>"></td>
						</div>
					</tr>
					<br>
						<tr>
							<div class="form-group">



						<td><label for="exampleInputPassword3">Product Name</label></td>
						<td><input type="text"  name="u_name" class="form-control" value="<?php echo $p_name ; ?>"></td>
						</div>
					</tr>
          <tr>
              <div class="form-group">

                  <td>
                      <label for="exampleInputPassword3">Product Category</label>
                  </td>
                  <td>
                      <select name="category" id="">
                          <option value=""><?php echo $row['product_category'];?></option>
                          <option value="visitor chair">visitor chair</option>
                          <option value="classroom chair">classroom chair</option>
                          <option value="director table">director table</option>
                          <option value="computer table">computer table</option>
                          <option value="office almira">office almira</option>
                      </select>
                  </td>
              </div>
          </tr>
					<tr>
							<div class="form-group">
						<td><label  for="exampleInputPassword3">Entry Date</label></td>
						<td><input type="date"  name="u_date" class="form-control" value="<?php echo $p_entry ; ?>"></td>
						</div>
					</tr>
					<tr>
							<div class="form-group">



						<td><label  for="exampleInputPassword3">Price</label></td>
						<td><input type="number"  name="u_price" class="form-control" value="<?php echo $p_prize ; ?>"></td>
						</div>
					</tr>
					<tr>
							<div class="form-group">



						<td><label  for="exampleInputPassword3">Quantity</label></td>
						<td><input type="number"  name="u_quantity" class="form-control" value="<?php echo $p_quantity ; ?>"></td>
						</div>
					</tr>


					</table>



  <button type="submit" name="update" class="btn btn-success">Submit</button>

</form>

	<?php
					}



				}


        if(isset($_POST['id']))
        {
        $id = $_POST['id'];


        	$pro_id = $_POST['u_id'];
       	 $pro_name = $_POST['u_name'];
       	 $entry_date =$_POST['u_date'];
       	 $price = $_POST['u_price'];
         $cate = $_POST['category'];
       	 $quantity = $_POST['u_quantity'];


       	 $updatesql = "UPDATE `product` SET `p_idd`='".$pro_id."',`name`='".$pro_name."',`product_category`='".$cate."',`date`='".$entry_date."',`price`='$price',`quantity`='$quantity' WHERE `id` = '$id'";

       	 $qry = $obj->prepare($updatesql);

       	 if ($qry->execute()==true ) {

       	 	header("location:Product_info.php");
        }else{
          ?><script>alert("problem");</script><?php
        }
        }


				 ?>



         <?php



           ?>





			</div>
		</div>
	</div>
</div>






 <?php  include('files/footer.php'); ?>
