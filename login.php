<?php include('../config/constants.php');?>


<html>
    <head>
    <title>J.A.M.G Order system</title>
    <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body class="color">
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!--Login form starts here-->
            <form action="" method="POST" class="text-center">
            username: <br>
            <input type="text" name = "username" placeholder="Enter username"><br><br>

            password: <br>
            <input type="password" name ="password" placeholder="Enter password"><br><br>

            <input type="submit" name="submit" value="login" class="btn-primary">
            <br><br>
            </form>
            <!--Login form ends here-->
            <p class="text-center">Developed by: J.A.M.G</p>
        </div>
    </body>
</html>

<?php

//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //process for login
    // 1. get the data from login
    //$username = $_POST['username'];
    //$password = md5($_POST['password']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
    $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn,$raw_password);
    

    //2. check whether sql the user with username and password exist or not!
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3. execute the query 
    $res = mysqli_query($conn, $sql);

    //count the rows to check whether user exist or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        //User available and login success
        $_SESSION['login'] = "<div class='success'>Login Sucessfully</div>";
        $_SESSION['user'] = $username; // to check whether the user is logged in or not and logout will unset it
        //redirect to index.php
        header('location:'.SITEURL.'admin/');

    }
    else
    {
        //user not available
        $_SESSION['login'] = "<div class='error text-center'>Login failed</div>";
        //redirect to index.php
        header('location:'.SITEURL.'admin/login.php');
    }

}


?>