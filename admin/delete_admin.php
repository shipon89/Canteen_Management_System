<?php 
//include constanr.php file here
include('../config/constant.php');
//1. get the id of admin to be delete
echo $id=$_GET['id'];
//2.Create sql query to delete admin
$sql="DELETE FROM admin_table WHERE id=$id";

//Execute query
$res =mysqli_query($conn, $sql);
//check whether the query executed successfully or not
if($res==true)
{
    //query executed
    //echo "Admin deleted";
    $_SESSION['delete']="<div class='SUCCESS'>Admin Successfully Delete </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else {
    {
        //echo "Failed to elete admin";
    $_SESSION['delete']="<div class='error'>Admin Successfully Delete </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
    }
}
//3.Redirect to manage admin page with message(success/error)

?>
