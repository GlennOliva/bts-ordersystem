<?php   
    include('../config/constants.php');
    // get the ID of admin to be deleted
    echo $id = $_GET['id'];


    //2. Create SQL Query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the query 
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if($res==true)
    {
        //query executed sucess and admin delete
        //echo "Admin deleted";

        // Create session variable to display message 
        $_SESSION['delete'] = "<div class='success'>Admin Deleted  Successfully</div>";
        //redirect to manage admin
        header('location:'.SITEURL.'admin/manage-admin.php');

    }
    else
    {
        //failed to delete admin
        //echo "failed to delete admin";

        $_SESSION['delete'] = "<div class ='error'>Failed to delete admin.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect manage admin page with message (Sucess/error)

?>