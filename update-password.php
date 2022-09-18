<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br><br>


        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        
        ?>
        <form action="" method="POST">

            <table class="tbl-30">
            <tr>
                <td>Current Password: </td>
                <td>
                    <input type="password" name="current_password" placeholder="Current password">
                </td>
            </tr>

            <tr>
                <td>new password</td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password">
                </td>
            </tr>

            <tr>
                <td>Confirm password</td>
                <td>
                    <input type="password" name="confirm_password" placeholder="confirm Password">
                </td>
            </tr>

            <tr>
                <td colspan ="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Change Password" class ="btn-secondary">
                </td>
            </tr>
            </table>
        </form>
    </div>
</div>


<?php 
    // whether the submit button is clicked on not
    if(isset($_POST['submit']))
    {
        // get from the data to form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //2. Check whether the user with curent ID and Current password exist or not 
        $sql = "SELECT * FROM tbl_admin WHERE id =$id AND password='$current_password'";

        //execute the query
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //check whether data is available or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //User Exist and password can be changed
                //echo "user found";

                //check whether the new password and confirm match or not
                if($new_password==$confirm_password)
                {
                    //update the password
                    $sql2 =  "UPDATE tbl_admin SET
                        password = '$new_password'
                        WHERE id=$id                 
                    ";

                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //check whether the query executed or not
                    if($res2==true)
                    {
                        //Display success
                        //redirect to manage admin with success message
                        $_SESSION['change-pwd'] = "<div class='success'>password change successfully</div>";
                        //redirect the user
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        //Display error message
                        //redirect to manage admin with error message
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to change password</div>";
                        //redirect the user
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //redirect to manage admin with error message
                    $_SESSION['pwd-not-match'] = "<div class='error'>password did not match</div>";
                     //redirect the user
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //User Does not exist set message and redirect
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                //redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        //3. check whether the new passworkd and confirm password match or not

        //4. Change password if all above is true
    }
?>





<?php include('partials/footer.php');?>


