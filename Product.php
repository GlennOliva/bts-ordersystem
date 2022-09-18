<?php include('partials-front/menu.php');?>

    <!-- Product sEARCH Section Starts Here -->
    <section class="Materials-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL?>Item-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Product.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Product sEARCH Section Ends Here -->



     <!-- Product menu Section Starts Here -->
     <section class="item-menu">
        <div class="container">
            <h2 class="text-center">Explore Items</h2>

            <?php
                //Display Product that are Active
                $sql = "SELECT * FROM tbl_product WHERE active='Yes'";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Count rows
                $count = mysqli_num_rows($res);

                //check whether the food are available or not
                if($count>0)
                {
                    //foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="item-menu-box"> 
                                    <div class="item-menu-img1">
                                        <?php
                                            //check whether image available or not
                                            if($image_name=="")
                                            {
                                                //image not available
                                                echo "<div class='error'>Image not available</div>";
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


                                        <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id;?>" class="btn btn-primary">Order now</a>
                                    </div>
                                </div>

                        <?php
                    }
                }
                else
                {
                    //Food not available
                    echo "<div class ='error'>Product not found</div>";
                }
            ?>

            

            

            

            <div class="clearfix"></div>
        </div> 
    </section>
    <!--Product menu end here-->

    <?php include('partials-front/footer.php');?>