<?php 
include('config/constant.php');
//echo "delete food";
if(isset($_GET['id']))
{
    //Get the order details
    $id=$_GET['id'];
    

    //Delete food from database
    $sql= "DELETE FROM order_table WHERE id=$id";
    //Execute the query
    $res=mysqli_query($conn,$sql);
    if($res==true)
    {
        //food delete
        $_SESSION['delete']="<div id='SUCESS'>Order delete successfully.</div>";
        header('location:'.SITEURL.'/view_order.php');
    }
    else
    {
        //failed to delete food
        $_SESSION['delete']="<div class='error'>Failed to delete Order</div>";
        header('location:'.SITEURL.'/view_order.php');
    }
    //check whether the query executed successfully or not

    //Redirect to mange food with session message
}
else
{
    //Redrect manage food page
    $_SESSION['unautorize']="<div class='error'>Unauthorized access.</div>";
    header('location:'.SITEURL.'/view_order.php');
}
?>