<?php 
//include constans file
include('../config/constant.php');

//check whether the id and image_name value  is set or not
if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //Get the value and delete
   // echo "get value and delete";
   $id=$_GET['id'];
   $image_name=$_GET['image_name'];
   //Remove physical image file avalable
   if($image_name!="")
   {
       //remove it
       $path="../images/canteen/".$image_name;

       //remove the image
       $remove=unlink($path);

   //if failed to remove image then add n error message
       if($remove==false)
       {
        //Set the session message
        $_SESSION['remove']="<div class='error'> Failed to remove canteen immage</div>";
        // Redirect to manage category
        header('location:'.SITEURL.'admin/manage-canteen.php');
        //stop the process
        die();
       }
   }
   //Delete data from database
   $sql="DELETE FROM canteen_table WHERE id=$id";

   //Execute the query
   $res=mysqli_query($conn,$sql);

   //Check Whether the data deleted from database or not
   if($res==true)
   {
    $_SESSION['delete']="<div id='SUCCESS'>Canteen Deleted Successfully</div>";
    //Redirect to manage category
    header('location:'.SITEURL.'admin/manage-canteen.php');
   }
   else
   {
    $_SESSION['delete']="<div class='error'>Failed to Deleted Canteen</div>";
    //Redirect to manage category
    header('location:'.SITEURL.'admin/manage-canteen.php');
   }
}
else
{
    //Redirect to manage category page
    header('location:'.SITEURL.'admin/manage-canteen.php');
}
?>