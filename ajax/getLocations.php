<?php

                require_once("../php/dboperation.php");
                   require_once("../php/functions.php");
                    $db = new Db();

                    if ($_GET['key']=="d") {
                    	getDistrict($_GET['zone_id']);
                    }else if($_GET['key']=="t"){

                    	getThanas($_GET['zone_id']);
                    }

                    


                    

?>