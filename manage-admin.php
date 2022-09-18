<?php include('partials/menu.php');?>
        
        <!--Main content section Starts--->
        <div class ="main-content">
        <div class="wrapper">
            <h1>Manage admin</h1>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];  //Displaying the session
                    unset($_SESSION['add']);  // removing the session
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];  //Displaying the session
                    unset($_SESSION['delete']);  // removing the session
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];  //Displaying the session
                    unset($_SESSION['update']);  // removing the session
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];  //Displaying the session
                    unset($_SESSION['user-not-found']);  // removing the session
                }
                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];  //Displaying the session
                    unset($_SESSION['pwd-not-match']);  // removing the session
                }
                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];  //Displaying the session
                    unset($_SESSION['change-pwd']);  // removing the session
                }
            ?>
            <br><br>
            <!--Button to add admin-->
            <a href="add-admin.php" class="btn-primary">Add admin</a>
            <br><br>
            <table class="tbl-full">
                <tr>
                    <th>I.D</th>
                    <th>Full name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                //Query to get all admin
                    $sql = "SELECT * FROM tbl_admin";
                    //Execute the query
                    $res = mysqli_query($conn, $sql);

                    //check whether the query is executed or not
                    if($res==true)
                    {
                        //count rows whether we have data in database or not
                        $count = mysqli_num_rows($res);  //function to get all the rows in database

                        $sn=1;
                        //check the num of rows
                        if($count>0)
                        {
                            //we have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //Using while loop to get all data from database
                                // and execute loop will run as long as we have data in database

                                //get individual data
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];

                                //display the value in our table
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $full_name;?></td>
                                    <td><?php echo $username;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-third">Delete admin</a>
                                    </td>
                                </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //we don't have data in database
                        }
                    }
                ?>
                
            </table>
            </div>
        </div>
        <!--Main content section ends--->
     
<?php include('partials/footer.php');?>