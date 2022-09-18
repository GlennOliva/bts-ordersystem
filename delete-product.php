<?php
    // include the constants
    include('../config/constants.php');

    //echo "delele page";

    if(isset($_GET['id']) AND isset($_GET['image_name']))   //Either use && or AND
    {
        //process to delete
        //echo"Process to delete";

        //1. get the ID and image
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2.remove the image if available
        //check whether the image is available or not and delete only if available
        if($image_name !="")
        {
            //it has image and need to remove from folder
            //get the image path

            $path ="../images/product/".$image_name;

            //remove image file from folder
            $remove = unlink($path);

            //check whether the image is remove or not
            if($remove==false)
            {
                //failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove message</div>";
                //redirect to manage product
                header('location:'.SITEURL.'admin/manage-product.php');
                //stop the process of deleting product
                die();
            }
        }
        //3.Delete product from database
        $sql = "DELETE FROM tbl_product WHERE id=$id";
        //execute the query
        $res = mysqli_query($conn, $sql);

        //4. Redirect to manage product with session message
        //check whether the query executed or not and set the session message respectivey
        if($res==true)
        {
            //product deleted
            $_SESSION['delete'] = "<div class='success'>product deleted successfully</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }
        else
        {
            //failed to delete
            $_SESSION['delete'] = "<div class='error'>failed to delete food</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }
    }
    else
    {
        //redirect to manage product
        //echo "Redirect to manage";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorize access.</div>";
        header('location:'.SITEURL.'admin/manage-product.php');
    }

?>