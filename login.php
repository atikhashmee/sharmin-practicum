

<!DOCTYPE html>
<html lang="en">
 <title>Login :: Dealer Registration system </title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <style type="text/css">
    body {
    padding-top: 90px;
}
.panel-login {
  border-color: #ccc;
  -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
  -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
  box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
  color: #00415d;
  background-color: #fff;
  border-color: #fff;
  text-align:center;
}
.panel-login>.panel-heading a{
  text-decoration: none;
  color: #666;
  font-weight: bold;
  font-size: 15px;
  -webkit-transition: all 0.1s linear;
  -moz-transition: all 0.1s linear;
  transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
  color: #029f5b;
  font-size: 18px;
}
.panel-login>.panel-heading hr{
  margin-top: 10px;
  margin-bottom: 0px;
  clear: both;
  border: 0;
  height: 1px;
  background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
  background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
  background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
  background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
  height: 45px;
  border: 1px solid #ddd;
  font-size: 16px;
  -webkit-transition: all 0.1s linear;
  -moz-transition: all 0.1s linear;
  transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
  outline:none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  border-color: #ccc;
}
.btn-login {
  background-color: #59B2E0;
  outline: none;
  color: #fff;
  font-size: 14px;
  height: auto;
  font-weight: normal;
  padding: 14px 0;
  text-transform: uppercase;
  border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
  color: #fff;
  background-color: #53A3CD;
  border-color: #53A3CD;
}
.forgot-password {
  text-decoration: underline;
  color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
  text-decoration: underline;
  color: #666;
}

.btn-register {
  background-color: #1CB94E;
  outline: none;
  color: #fff;
  font-size: 14px;
  height: auto;
  font-weight: normal;
  padding: 14px 0;
  text-transform: uppercase;
  border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
  color: #fff;
  background-color: #1CA347;
  border-color: #1CA347;
}
  </style>
<body>



<div class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>
              <div class="col-xs-6">
                <a href="#" id="register-form-link">Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <?php 
                  require_once("php/dboperation.php");
                  require_once("php/functions.php");
                    $db = new Db();
                  if (isset($_GET['msg'])) {
                    echo "<h3 style='color:red'>".$_GET['msg']."</h3>";
                  }


                ?>
                <form id="login-form" action="php/login.php" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass" id="pass" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="btn" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="#" tabindex="5"  class="forgot-password">Forgot Password?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" action="#" method="post" role="form" style="display: none;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="Phone" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                    <select name="division" id="division" class="form-control" onchange="ajaxreq(this.value,'d')" >
                            <?php  getDivision(); ?>
                    </select>
                      </div>
                      <div class="col-md-4">
                         <select  id="district" name="district" class="form-control" onchange="ajaxreq(this.value,'t')" >
                      
                    </select>
                      </div>
                      <div class="col-md-4">
                         <select name="thana" id="thana" class="form-control" >
                      
                    </select>
                      </div>
                    </div>
                   
                  </div>
                  <div class="form-group">
                    <textarea tabindex="1" class="form-control" name="adra">Address</textarea> 
                  </div>
                  <div class="form-group">
                    <div class="radio">
                        <label><input type="radio" value="Male" name="gander">Male</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="Female">Female</label>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
                <?php 

                  if (isset($_POST['register-submit'])) {
                    
                    $data = array(
                      'name' =>$_POST['username'], 
                      'email' =>$_POST['email'], 
                      'phone' =>$_POST['phone'], 
                      'pass' =>$_POST['password'], 
                      'division_id' =>$_POST['division'], 
                      'district_id' =>$_POST['district'], 
                      'thana_id' =>$_POST['thana'], 
                      'gander' =>$_POST['gander'], 
                      'address' =>$_POST['adra'], 
                      'join_date' => date("Y-m-d"), 
                      'type' =>"1"
                    );
                    if (!empty($_POST['username']) && $db->insert("dealers",$data)) {
                           echo "saved";
                    }else {
                      echo "problem";
                    }

                   
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <script src="assets/js/atik_jquery.js"></script>
 <script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
 <script type="text/javascript">
   
$(function() {

    $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});

//ajaxreq();
function ajaxreq(id,k) {
      var xhr = new XMLHttpRequest();
   
      xhr.open("GET","ajax/getLocations.php?zone_id="+id+"&key="+k,true);
      xhr.onload = function(){
         if (this.readyState===4) {
           if (k==='d') {
             document.getElementById('district').innerHTML = this.responseText;
           }else if(k==='t')
           {
             document.getElementById('thana').innerHTML = this.responseText;
           }
           
             //console.log(this.responseText);
         }
      }

      xhr.send();
}



 

    



 </script>
</body>
</html>




