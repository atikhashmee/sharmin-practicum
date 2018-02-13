		<?php
                      require_once("admin/php/connections.php");

                                   $db =  new Db();
                                  $obj = $db->getConnection();

                            $dealerid = null ;
                            if (isset($_POST['dealer'])) {
                              $dealerid = $_POST['dealer'];
                            



 							$i = 0;
 							$sql = "SELECT DISTINCT `p_id`,product.imagefile FROM `p_distribution` INNER JOIN product ON p_distribution.p_id = product.name where `dealer_id`='$dealerid'";

 							$query = $obj->prepare($sql);
 							$query->execute();
 							$q = $query->rowCount();
 							// echo "there are " .$q. " products ";
 							while($row=$query->fetch())
 							{
 								$p_id = $row['p_id'];
 								//$sqll = "SELECT quantity FROM `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = '$user_id'";
 								$sqll = "SELECT sum(`quantity`) as Totallquantity  From `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = '$dealerid'";
 								$ddd = $obj->prepare($sqll);
 								 $ddd->execute();
 								 $quantity = $ddd->fetch(PDO::FETCH_ASSOC);



 								 $sqlll = "SELECT `sellingprice` FROM `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = '$dealerid'";
 								$dd = $obj->prepare($sqlll);
 								 $dd->execute();
 								 $price = $dd->fetch(PDO::FETCH_ASSOC);







 								$i++;
 								
 		?>

    <div class="col-md-2 column productbox">
    <img src="<?php echo "admin/img/products/shirin".$row['imagefile'];?>" class="img-responsive">
    <div class="producttitle"><?php echo $p_id;?></div>
    <div class="productprice">
    <div class="pull-right">
    <a href="p_sell.php?sell=<?php echo $p_id; ?>" class="btn btn-danger btn-sm" role="button">BUY</a></div>
    <div class="pricetext">
    <?php echo $price['sellingprice'];?>
      
    </div>
    </div>
</div>

 		
 		<?php
 							}
                        }

 							?>