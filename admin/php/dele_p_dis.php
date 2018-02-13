

<?php
   if(!isset($_SESSION)){
   session_start(); // starting session for checking username
 }
       if(is_null($_SESSION['username']))
 {
   header("location:index.php"); // Redirect to login.php page
 }
 require_once("connections.php");
 $db = new Db();
 $obj = $db->getConnection();
?>




<?php

if (isset($_GET['delete']))
{

            $SetID = $_GET['delete'];
            $sql = "DELETE FROM `p_distribution` WHERE `id` = '$SetID'";

            $query = $obj->prepare($sql);
            $query->execute();

            if ($query==true) {
              echo "Data has been deleted successfully.";
              header("location: ../dealers/distribute.php");
            }


}

?>
