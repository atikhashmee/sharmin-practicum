		<?php  
		   include('files/header.php');
		   include('files/menu.php');
		 
            require_once("php/dboperation.php");
      require_once("php/functions.php");
        $con = new Db();

		 

		 ?>
     <link rel="stylesheet" type="text/css" href="assets/fonts/css/font-awesome.min.css">



           



<div class="container">
       <?php 
          

           if (isset($_GET['route'])) {

               if ($_GET['route']=="shipments") {
                    include 'see_shipments.php';
                 }else if($_GET['route']=="shipment-details"){
                  include 'shipment-details.php';
                 }else if($_GET['route']=="Sell"){
                  include 'p_sell.php';
                 } 
             
           }else {
                include 'home.php';


           }

   

       ?>
 		</div>


		 <?php  include('files/footer.php'); ?>
<script src="js-cookie.js"></script>
   


