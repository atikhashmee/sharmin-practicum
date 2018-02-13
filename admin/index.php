       <?php  include('files/header.php'); ?>
         
      <?php


          if(!isset($_SESSION)){
          session_start(); // starting session for checking username
        }
              if(is_null($_SESSION['username']))
        {
          header("location:index.php"); // Redirect to login.php page
        }


      

      require_once("../php/dboperation.php");
      require_once("../php/functions.php");
        $con = new Db();
      ?>

      

      <?php  include('files/menu.php'); ?>


      <!-- route starts here -->

      <div id="page-wrapper">
        
        <div class="container">
                

                 <div id="content-loader">
                   <?php 

                      if (isset($_GET['path'])) {
                        if ($_GET['path']=="locations") {
                        include 'common/locations.php';
                      }else if ($_GET['path'] == "Dealer") {
                        include 'dealers.php';
                        
                      }else if ($_GET['path'] == "Product_split") {
                        include 'product_distribution.php';
                        
                      }else if ($_GET['path'] == "Product_info") {
                        include 'Product_info.php';
                        
                      }
                      } else{

                        include 'dashboard.php';
                      }


                   ?>
                 </div>


        </div>

      </div>


      










      

            
          
                
                  
            
       <?php  include('files/footer.php'); ?>