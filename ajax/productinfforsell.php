<?php

                require_once("../php/dboperation.php");
                   require_once("../php/functions.php");
                    $db = new Db();
                    $productinfo = $db->selectAll("product","id='".$_GET['pid']."'")->fetch(PDO::FETCH_ASSOC);
                    print_r(json_encode($productinfo));
?>