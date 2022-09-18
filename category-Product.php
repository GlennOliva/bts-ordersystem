<?php include('partials-front/menu.php');?>


    <?php
        //check whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //category id is set and get the id 
            $category_id = $_GET['category_id'];
            //get the category title based on category id
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id ";

            //execute the query 
            $res = mysqli_query($conn, $sql);

            //get the value from database 
            $row = mysqli_fetch_assoc($res);
            //get the title 
            $category_title = $row['title'];

        }
        else
        {
            //category not passed
            //redirect to home page
            header('location:'.SITEURL);
        }
    ?>

    <!-- Item sEARCH Section Starts Here -->
    <section class="Materials-search text-center">
        <div class="container">
            
            <h2>Product on <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
    </section>
    <!-- Item sEARCH Section Ends Here -->



     <!-- Product menu Section Starts Here -->
     <section class="item-menu">
        <div class="container">
            <h2 class="text-center">Explore Items</h2>

            <?php
                //create sql query to get product based on selected category
                $sql2 = "SELECT * FROM tbl_product WHERE category_id=$category_id";

                //execute the query 
                $res2 = mysqli_query($conn, $sql2);

                //count the rows 
                $count2 = mysqli_num_rows($res2);

                //check whether product is available or not
                if($count2>0)
                {
                    //food is available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        <div class="item-menu-box"> 
                        <div class="item-menu-img1">
                            <?php
                                if($image_name=="")
                                {
                                    //image not available
                                    "<div class='error'>Image not available</div>";
                                }
                                else
                                {
                                    //image available
                                    ?>
                                     <img src="<?php echo SITEURL;?>images/Product/<?php echo $image_name;?>" alt="bag-brown" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                           
                        </div>

                        <div class="item-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="item-price">₱<?php echo $price;?></p>
                            <p class="item-detail">
                                <?php echo $description;?>
                            </p>
                            <br>
                            <a href="<?php echo SITEURL; ?>images/Product/<?php echo $image_name;?>" class="btn btn-primary">Order now</a>
                        </div>
                    </div>
                        <?php
                    }
                }
                else
                {
                    //food not available
                    echo "<div class='error'>Product not available</div>";
                }
            ?>

            

            

            

            <div class="clearfix"></div>
        </div> 
    </section>
    <!--Product menu end here-->

    <?php include('partials-front/footer.php');?>