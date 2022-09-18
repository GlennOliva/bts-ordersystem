<?php  include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>

        <br><br>
        <?php
            if(isset($_SESSION['add'])) //checking the whether session is set or not
            {
                echo $_SESSION['add'];  // display session message if set
                unset($_SESSION['add']);    // remove session message
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                       <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>












<?php  include('partials/footer.php');?>

<?php
    //process the value from form and save it in database
    // check whether the button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
        //echo "clicked";

        //get the data from form
        $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']);    // md5 password encryption 
        $password = mysqli_real_escape_string($conn,$raw_password);

        //2. SQL Query to set the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

    
        //3. Executing query and saving data to database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. check whether the data is inserted or not and display appropriate message
        if($res==true)
        { 
            //data insert
            //echo "data inserted";
            //create the session variable display message
            $_SESSION['add'] = "Admin added sucessfully";
            //redirec page manage-admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to insert data
            //echo"failed to imsert data";
            //create the session variable display message
            $_SESSION['add'] = "Failed to add admin";
            //redirect to add admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>