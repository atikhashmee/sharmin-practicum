<?php  include('files/header.php'); ?>

<?php
   if(!isset($_SESSION)){
   session_start(); // starting session for checking username
 }
       if(is_null($_SESSION['username']))
 {
   header("location:index.php"); // Redirect to login.php page
 }
 require_once("php/connections.php");
 $db = new Db();
 $obj = $db->getConnection();
?>
<?php  include('files/menu.php'); ?>
<style>
 table tr{
   border: 2px #ccc solid;
 }
</style>

<div class="container">
 <div class="row">
   <div class="col-md-12">
     <div class="well">
       <h4>Update Dealer</h4>


           <?php
         //  $dataid = NULL;
       if(isset($_GET['edit']))
       {


         $id = $_GET['edit'];
       //  $dataid = $_GET['edit'];

         $sql = "SELECT * FROM `dealers` where id = '$id'";
         $query = $obj->prepare($sql);
         $query->execute();

         while($row=$query->fetch(PDO :: FETCH_ASSOC))
         {



           $d_id = $row['dealer_id'];
           $d_name  = $row['name'];
           $pass = $row['pass'];
           $adrs = $row['address'];
           $join =$row['join_date'];
           $account = $row['accounts'];
           ?>
           <form class="form-inline" action="dealer_update.php" method="post">
             <table>
               <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
               <tr>
                 <div class="form-group">



               <td> <label  for="exampleInputEmail3">Dealer ID</label></td>
               <td> <input required type="text" name="du_id" class="form-control"  placeholder="ID" value="<?php echo $d_id ; ?>"></td>
               </div>
             </tr>
             <br>
               <tr>
                 <div class="form-group">



               <td><label for="exampleInputPassword3">dealer  Name</label></td>
               <td><input required type="text"  name="du_name" class="form-control" id="name" placeholder="name" value="<?php echo  $d_name ; ?>"></td>
               <p style="color:red" id="message"></p>
               </div>
             </tr>
             <tr>
                 <div class="form-group">



               <td><label for="exampleInputPassword3">dealer  password</label></td>
               <td><input required type="password"  name="du_pass" class="form-control" placeholder="password" value="<?php echo $pass; ?>"></td>
               </div>
             </tr>
             <tr>
                 <div class="form-group">



               <td><label  for="exampleInputPassword3">Branch </label></td>
               <td>
                 <select name="du_branch"  id="">
                   <option value=""><?php echo $row['address'];?></option>
                   <option value="uttara">uttara</option>
                   <option value="mirpur">Mirpur</option>
                   <option value="Banani">Banani</option>
                   <option value="dhanmondi">Dhanmondi</option>
                   <option value="gulshan">Gulshan</option>
                   <option value="bashunshara">Bashunshara</option>
                 </select>
               </td>
               </div>
             </tr>
             <tr>
                 <div class="form-group">



               <td><label  for="exampleInputPassword3">JOIN Date</label></td>
               <td><input type="date"  name="du_join" class="form-control" placeholder="date" value="<?php echo $join ; ?>" ></td>
               </div>
             </tr>

             </table>



     <button type="submit" name="update_dealer" class="btn btn-warning">Update</button>

   </form>

 <?php
         }



       }


       if(isset($_POST['id']))
       {
       $id = $_POST['id'];


        $dlr_id = $_POST['du_id'];
        $dlr_name = $_POST['du_name'];
        $dlr_pass =$_POST['du_pass'];
        $branch = $_POST['du_branch'];
        $j_date = $_POST['du_join'];



        $updatesql = "UPDATE `dealers` SET `dealer_id`='".$dlr_id."',`name`='".$dlr_name."',`pass`='".$dlr_pass."',`address`='".$branch."',`join_date`='$j_date' WHERE `id` = '$id'";

        $qry = $obj->prepare($updatesql);

        if ($qry->execute()==true ) {

         header("location:dealers.php");
       }else{
         ?><script>alert("problem");</script><?php
       }
       }


        ?>



        <?php



          ?>





     </div>
   </div>
 </div>
</div>






<?php  include('files/footer.php'); ?>
