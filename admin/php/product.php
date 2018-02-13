

<?php
    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
?>






<?php
$msg[] = array();
//error_reporting(E_ALL | E_STRICT);

function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

if (isset($_POST['save']))
{

	require_once("connections.php");
	$db =  new Db();
	$obj = $db->getConnection();

	 $pro_id = $_POST['id'];
	 $pro_name = $_POST['name'];
	 $pro_category = $_POST['category'];
	 $entry_date =$_POST['date'];
	 $price = $_POST['price'];
	 $quantity = $_POST['quantity'];
	 $image =  $_FILES['myimage']['name'];
	 $tempfile_name = $_FILES["myimage"]["tmp_name"];
	 $temp_name=$_FILES["myimage"]["tmp_name"];
	 $imgtype=$_FILES["myimage"]["type"];
	 $ext= GetImageExtension($imgtype);
	 $imagename=date("d-m-Y")."-".time().$ext;
	 $target_path = "../img/products/shirin".$imagename;


	if (move_uploaded_file($tempfile_name,$target_path)) {
			$sql = "INSERT INTO `product`(`p_idd`, `name`, `product_category`, `date`, `price`, `quantity`, `imgpath`, `imagefile`) VALUES ('$pro_id','$pro_name','$pro_category','$entry_date','$price','$quantity','$target_path','$imagename')";

	 	$insert =$obj->prepare($sql);


		//$qury = mysql_query ($insert) ;



			if ($insert->execute()==true)
			{
				echo "Product has been added ";


        header('Refresh:3; url=../Product_info.php');
			}else
			{

				$msg['error'] = "something went wrong with the database";
			}



	 }










}







?>
