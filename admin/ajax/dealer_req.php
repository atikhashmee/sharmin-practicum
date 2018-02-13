 <?php 


                   require_once("../../php/dboperation.php");
                   require_once("../../php/functions.php");
                    $db = new Db();
                    $statusvalue = ($_GET['key']=="a")?"1":"2";
                    $data = array( 
                    	'status' => $statusvalue
                    	 );
                    $msg = ($_GET['key']=="a")?"User Accepted":"User Rejected";
                   // echo "user id ".$_GET['u_id'];
                    if ($db->update("dealers",$data, "id = '".$_GET['u_id']."'")) {
                    	echo $msg;
                    }else{
                    	echo "nope";
                    }



 ?>