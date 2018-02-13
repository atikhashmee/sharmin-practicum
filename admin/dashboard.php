
    <style type="text/css">
      
      .table-fixed thead {
  width: 97%;
}
.table-fixed tbody {
  height: 230px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
}
    </style>



        <div class="row">
          <div class="col-md-8">
            <div class="well">
              <marquee behavior="" direction="left">DMS-Dealership management system</marquee>
            </div>
          </div>
          <div class="col-md-4">
            <div class="well">
              

              
            </div>
          </div>
          
        </div>
   






  <div class="row">
    <div class="col-md-12">
      <div class="well">
        <h1>Product Sell update reports for last 10 days</h1>
        <table class="table table-striped table-bordered table-hover table-condensed">
          <tr>
            <th>SL/NO</th>
            <th>Product Name</th>
          <th>Price</th>

          <th>Quantity</th>
          <th>Total price</th>
          <th>Customer</th>
          <th>Customer's phone</th>
          <th>Date and time</th>

          
          </tr>
          <?php

           
          $i = 0;
          $sql = "SELECT * FROM `p_sell` limit 0,10";
          $query = $con->joinQuery($sql);
          

          $q = $query->rowcount();
           echo "there are " .$q. " products ";
          while($row=$query->fetch())
          {
            $i++;
            




?>

<tr>

  <td> <?php echo $i;?> </td>
  <td><?php echo $row['p_id'];?></td>
  <td><?php echo $row['p_prize'];?></td>
  <td><?php echo $row['p_quantity'];?></td>
  <td><?php echo $row['totall_prize'];?></td>
  <td><?php echo $row['users'];?></td>
  
  
  
    
</tr>
<?php
          }

          ?>

        </table>
      </div>
    </div>
  </div>

