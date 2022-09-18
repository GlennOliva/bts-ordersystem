
<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--it is important to make an responsive website-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.A.M.G Ordering System</title>
    <link rel="icon"type="image/icon" href="images/logo.png">
    <!--Link our css file-->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!--Navbar section starts here -->
    <section class="navbar"> 
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="JAMG logo" class="img-responsive">
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>Product.php">Product</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>about.php">About us</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">
                
            </div>
        </div> 
    </section>
    <!--Navbar section ends here -->