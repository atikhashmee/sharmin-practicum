 <?php 


                   require_once("../../php/dboperation.php");
                   require_once("../../php/functions.php");
                    $db = new Db();
                    $qdata =  $db->selectAll("product")->fetchAll();
                    echo json_encode($qdata);

 ?>