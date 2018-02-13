


<?php

    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}


	include('files/header.php');

  require_once("../php/connections.php");
  include('files/menu.php'); 

       $db =  new Db();
	  $obj = $db->getConnection();

?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h1>Customer Lists</h1>
				<table class="table table-striped table-bordered table-hover table-condensed">
					<tr>
						<th>SL/NO</th>
						<th> Name</th>
					<th>Password</th>
						<th>Join date </th>
					<th>Gender</th>
					
					
							

					<th>Actions</th>
					</tr>
					<?php
					$i = 0;
					$sql = "SELECT * FROM `customer`";
					$query = $obj->prepare($sql);
					$query->execute();

					$q = $query->rowcount();
					 echo "there are " .$q. " products ";
					while($row=$query->fetch())
					{
						$i++;
						




?>

<tr>

	<td> <?php echo $i;?> </td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['pass'];?></td>
	<td><?php echo $row['date'];?></td>
	<td><?php echo $row['gender'];?></td>
	
	<td>
		<a href="#"><button class="btn btn-warning">Delete</button></a></td>

</tr>
<?php
					}

					?>

				</table>
			</div>
		</div>
	</div>
</div>
