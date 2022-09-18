<?php include('partials-front/menu.php');?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>


            <?php

                //Display all the categories that are active
                //sql query
                $sql = "SELECT * FROM  tbl_category WHERE active='Yes'";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //Count rows
                $count = mysqli_num_rows($res);

                //check whether category available or not
                if($count>0)
                {
                    //Categories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values 
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL;?>category-Product.php?category_id=<?php echo $id;?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //image not available
                                        echo "<div class='error'>Image not found</div>";
                                    }
                                    else
                                    {
                                        //Image Available 
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Bag" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                            
                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                            </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not available
                    echo "<div class='error'>Category not found</div>";
                }
            ?>

            

            
        <div class="clearfix"></div>
    </section>
    <!-- Categories Section Ends Here -->


<?php include('partials-front/footer.php');?>