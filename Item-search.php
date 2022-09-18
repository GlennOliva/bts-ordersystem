<?php include('partials-front/menu.php');?>

    <!-- Item sEARCH Section Starts Here -->
    <section class="Materials-search text-center">
        <div class="container">

            <?php 
                //Get the Search keyword
                //$search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);

            ?>
            
            <h2>Products on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!--Item search ends here-->

    <!-- Product menu Section Starts Here -->
    <section class="item-menu">
        <div class="container">
            <h2 class="text-center">Explore Items</h2>

            <?php
                
                //sql query to get product based on search
                //$search = bag '; DROP database name;
                //"SELECT * FROM tbl_product WHERE title LIKE '%bag'%' OR description LIKE '%bag'%'";
                $sql = "SELECT * FROM tbl_product WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //Count rows
                $count = mysqli_num_rows($res);

                //check whether product available or not
                if($count>0)
                {
                    //Product available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the datails
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>
                            <div class="item-menu-box"> 
                                <div class="item-menu-img1">
                                    <?php
                                        //check whether image name is available or not 
                                        if($image_name=="")
                                        {
                                            //image not available
                                            echo "<div class='error'>Image not available</div>";

                                        }
                                        else
                                        {
                                            //image available
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/Product/<?php echo $image_name;?>" alt="bag-brown" class="img-responsive img-curve">
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
                                <a href="#" class="btn btn-primary">Order now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                {
                    //product not available
                    echo "<div class ='error'>Product not found</div>";
                }

            ?>

            

            

            <div class="clearfix"></div>
        </div> 
    </section>
    <!--Product menu end here-->

    <?php include('partials-front/footer.php');?>