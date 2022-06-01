<?php 
include('../config/constant.php');
//echo "delete food";
if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //process to delete
    //1.Get id and image name;
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    //remove the image if available
    if($image_name !="")
    {
        //it has image and need to remove it
        //Get the image path
        $path="../images/food/".$image_name;
        //remove image file
        $remove=unlink($path);

        //Check whether the image remove or not
        if($remove==false)
        {
            //Failed to remove
            $_SESSION['upload']="<div class='error'>Failed to remove image file.</div>";
            //Redirect to  manage food
            header('location:'.SITEURL.'admin/manage-food.php');
            //stop the process
            die();
        }
    }
    //Delete food from database
    $sql= "DELETE FROM food_table WHERE id=$id";
    //Execute the query
    $res=mysqli_query($conn,$sql);
    if($res==true)
    {
        //food delete
        $_SESSION['delete']="<div id='SUCESS'>Food delete successfully.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    else
    {
        //failed to delete food
        $_SESSION['delete']="<div class='error'>Failed to delete food</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    //check whether the query executed successfully or not

    //Redirect to mange food with session message
}
else
{
    //Redrect manage food page
    $_SESSION['unautorize']="<div class='error'>Unauthorized access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>