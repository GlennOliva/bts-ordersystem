<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
    <h1>Manage Product</h1>

    <!--Button to add admin-->
            <br><br>
            <a href="<?php echo SITEURL; ?>admin/add-product.php" class="btn-primary">Add product</a>
            <br><br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                
                
                

            ?>
    <table class="tbl-full">
                <tr>
                    <th>I.D</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    //create a sql query to get all the food
                    $sql = "SELECT * FROM tbl_product";

                    //execute the quert
                    $res = mysqli_query($conn, $sql);

                    //count the rows to know whether we have product or not
                    $count = mysqli_num_rows($res);

                    //create serial number variable
                    $sn=1;

                    if($count>0)
                    {
                        //we have product in our database
                        //get the product from database and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the value from individual columns
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>

                        <tr>
                              <td><?php echo $sn++; ?>. </td>
                              <td><?php echo $title; ?></td>
                              <td>₱<?php echo $price; ?></td>
                              <td>
                                <?php
                                    //check whether we have image or not
                                    if($image_name=="")
                                    {
                                        //we don't have imag, display error message
                                        "echo <div class='error'>Image not added</div>";
                                    }
                                    else
                                    {
                                        //we have image, display image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name;?>" width="150px" >
                                        <?php
                                    }
                                 ?>
                              </td>
                              <td><?php echo $featured; ?></td>
                              <td><?php echo $active; ?></td>
                               <td>
                             <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update product</a>
                              <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third">Delete product</a>
                             </td>
                         </tr>
                            <?php

                        }
                    }
                    else
                    {
                        //prodcut not added in database
                        echo "<tr> <td colspan='7' class='error'>Product not added yet </td> </tr>";
                    }
                ?>
                

                
            </table>
    </div>
    
</div>



<?php include('partials/footer.php');?>