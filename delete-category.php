<?php
    //include constants file
    include('../config/constants.php');
    
    //echo "Delete page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // get the value and delete
        //echo "Get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file is available
        if($image_name != "")
        {
            //image is available . remove it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to removed image then add an error message and stop the process 
            if($remove==false)
            {
                //set the session message 
                $_SESSION['remove'] = "<div class='error'>Failed to removed image category</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process 
                die();
            }
        }

        //Delete data from database
        //SQL query delete data from database
        $sql = "DELETE FROM tbl_category WHERE id= $id";

        //Execute the query 
        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res==true)
        {
            //set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category deleted sucessfully</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //set fail message 
            $_SESSION['delete'] = "<div class='error'>Failed Category deleted </div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        

    }
    else
    {
        //redirect to manage category page
        header('location'.SITEURL.'admin/manage-category.php');
    }
?>