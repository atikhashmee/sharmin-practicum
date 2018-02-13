
     
            <style>
                table tr {
                    border: 2px #ccc solid;
                }
            </style>

         
                <div class="row">
                    <div class="col-md-6">
                        <div class="well">
                            <h4>Add  product</h4>
                            <form class="form-inline" enctype="multipart/form-data" action="php/product.php" method="post">
                                <table>
                                    <tr>
                                        <div class="form-group">

                                            <td>
                                                <label for="exampleInputEmail3">Product ID</label>
                                            </td>
                                            <td>
                                                <input type="text" name="id" class="form-control" placeholder="ID">
                                            </td>
                                        </div>
                                    </tr>
                                    <br>
                                    <tr>
                                        <div class="form-group">

                                            <td>
                                                <label for="exampleInputPassword3">Product Name</label>
                                            </td>
                                            <td>
                                                <input type="text" name="name" class="form-control" placeholder="name">
                                            </td>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="form-group">

                                            <td>
                                                <label for="exampleInputPassword3">Product Category</label>
                                            </td>
                                            <td>
                                                <select name="category" id="">
                                                    <option value="">Select a category</option>
                                                    <option value="visitor chair">visitor chair</option>
                                                    <option value="classroom chair">classroom chair</option>
                                                    <option value="director table">director table</option>
                                                    <option value="computer table">computer table</option>
                                                    <option value="office almira">office almira</option>
                                                    <option value="showcase">showcase</option>
                                                    <option value="bed">bed</option>
                                                    <option value="dining table">dining table</option>
                                                    <option value="waredrope">waredrope</option>
                                                </select>
                                            </td>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="form-group">

                                            <td>
                                                <label for="exampleInputPassword3">Entry Date</label>
                                            </td>
                                            <td>
                                                <input type="date" name="date" class="form-control" placeholder="Date">
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">

                                            <td>
                                                <label for="exampleInputPassword3">Price</label>
                                            </td>
                                            <td>
                                                <input type="number" name="price" class="form-control" placeholder="price">
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">

                                            <td>
                                                <label for="exampleInputPassword3">Quantity</label>
                                            </td>
                                            <td>
                                                <input type="number" name="quantity" class="form-control" placeholder="quantity">
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td>
                                                <label for="exampleInputPassword3">Product image</label>
                                            </td>
                                            <td>
                                                <input type="file" name="myimage" id="imagefile" class="form-control" placeholder="file">
                                            </td>
                                        </div>
                                    </tr>
                                </table>

                                <button type="submit" name="save" class="btn btn-success">Submit</button>
                                                            <?php
                            if (isset($successfull)) {

                            	echo $successfull;
                            }

                            ?>

                                                                <?php
                            if (isset($error)) {

                            	echo $error;
                            }

                            ?>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="well">
                            <div class="imagebox">
                                <img id="imgid" src="img/3.jpg" height="400px" width="500px" alt="product image">
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="well">

                            <table class="table">
                                <tr>
                                    <th>SL/NO</th>
                                    <th>product ID</th>
                                    <th>product Name</th>
                                    <th>Entry Date</th>
                                    <th>product Price</th>
                                    <th>product Quantity</th>
                                    <th>Actions</th>
                                </tr>
                                <?php
					require_once("php/connections.php");
					$db = new Db();
					$obj = $db->getConnection();
					$i = 0;
					$sql = $obj->prepare("SELECT * FROM `product`");
					$sql->execute();
					//$q = mysql_num_rows($query);
					// echo "there are " .$q. " products ";
					while($row=$sql->fetch())
					{
						$i++;
						$id = $row['id'];
						$p_id = $row['p_idd'];
						$p_name  = $row['name'];
						$p_entry = $row['date'];
						$p_prize = $row['price'];
						$p_quantity =$row['quantity'];
?>

                                    <tr>

                                        <td>
                                            <?php echo $i;?>
                                        </td>
                                        <td>
                                            <?php echo $p_id;?>
                                        </td>
                                        <td>
                                            <?php echo $p_name;?>
                                        </td>
                                        <td>
                                            <?php echo $p_entry;?>
                                        </td>
                                        <td>
                                            <?php echo $p_prize;?>
                                        </td>
                                        <td>
                                            <?php echo $p_quantity;?>
                                        </td>
                                        <td>
                                          <input type="hidden" name="editbutton" value="<?php echo $row['id']; ?>">
                                           <a href="p_update.php?edit=<?php echo  $id;  ?>"> <button   class="btn btn-warning edit">edit</button> </a>  |

                                            <a href="p_delete.php?delete=<?php echo  $id;  ?>">
                                                <button class="btn btn-warning">delete</button>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php
					}

					?>

                            </table>
                        </div>
                    </div>
                </div>
               

            <!-- image preview code for product uploading  -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script>
                $("#imagefile").change(function() {
                    imageupload(this);

                });

                function imageupload(file) {
                    if (file.files && file.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $("#imgid").attr('src', e.target.result);
                        }
                        reader.readAsDataURL(file.files[0]);

                    }
                }


            </script>
            <!-- end of image uploading code -->

            <?php  include('files/footer.php'); ?>
