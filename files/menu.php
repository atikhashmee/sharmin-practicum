    
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="well">
    				<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">HATIL</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost/dealer/index.php">HOME<span class="sr-only">(current)</span></a></li>
              <?php  if (!empty($_SESSION['username'])) {?>
                <li><a href="?route=shipments">Shiptment</a></li>
                <li><a href="?route=Sell">Sell</a></li>
                <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
              <?php }else{
                ?>
                <!-- <li><a href="shoper.php">Registration</a></li> -->
                <li><a href="login.php">Login/Registration</a></li>
               <?php  } ?>
            


          </ul>

         

          
      

          
          <ul class="nav navbar-nav navbar-right">

          <?php  if (!empty($_SESSION['username'])) {?>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php  
              
              if (empty($_SESSION['username'])) {
                   echo " ";
                         
                 } else{

                  echo $_SESSION['username'];
                 }
                  
                 
                 
                 		 	
    					?><span class="caret"></span></a>
              <ul class="dropdown-menu">

                <li role="separator" class="divider"></li>
                <li><a href="logout.php">Sign Out</a></li>
              </ul>
            </li>
              <?php } else ?>
              
          </ul>
        

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    			</div>
    		</div>
    	</div>
    </div>
