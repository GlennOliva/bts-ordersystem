<?php include('partials-front/menu.php');?>

<?php

    //check whether product id is set or not
    if(isset($_GET['product_id']))
    {
        //get the product and details of the selected item
        $product_id = $_GET['product_id'];

        //get the details of the selected item
        $sql = "SELECT  * FROM tbl_product WHERE id=$product_id";
        //execute the query
        $res = mysqli_query($conn, $sql);
        //count the rows
        $count = mysqli_num_rows($res);
        //check whether the data is available or not
        if($count==1)
        {
            //we have data
            //get the data from database
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];

        }
        else
        {
            //Item not available
            //redirect to homepage
            header('location:'.SITEURL);
        }

    }
    else
    {
        //redirect to homepage
        header('location'.SITEURL);
    }
?>

    <!-- Product SEARCH Section Starts Here -->
    <section class="item-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method = "POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="product-menu-img">
                        <?php 
                            //check whether the image is available or not
                            if($image_name=="")
                            {
                                //image not available 
                                echo "<div class='error'>Image not available</div>";
                            }
                            else
                            {
                                //image is available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/Product/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                        
                    </div>
    
                    <div class="item-menu-desc">
                        <h3><?php echo $title;?></h3>
                            <input type="hidden" name="product" value="<?php echo $title;?>">

                        <p class="item-price">₱<?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Glenn Oliva" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 0999xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. JAMG@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
                //check whether submit button clicked or not
                if(isset($_POST['submit']))
                {
                    // get all the details from the form
                    $product = $_POST['product'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty; // total = price  x qty

                    $order_date = date("Y-m-d h:i:sa"); //order date

                    $status = "Ordered"; // ordered, on delivery, deliver, cancell

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    //save the order in database
                    //create sql to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                    product = '$product',

                    price = $price,
                    
                    qty = $qty,

                    total = $total,

                    order_date = '$order_date',

                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address' 
                    ";
                    
                    //echo $sql2; die();

                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //check whether executed successfully or not
                    if($res2==true)
                    {
                        //Query executed successfully or not
                        $_SESSION['order'] = "<div class='success text-center'>Product order successfully</div>";
                        header('location: '.SITEURL);
                    }
                    else
                    {
                        //failed to save order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to order product.</div>";
                        header('location: '.SITEURL);
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- Product sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php');?>