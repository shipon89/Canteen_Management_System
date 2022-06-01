<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br> <br>
<?php
    //1.Get the id of selected admin
    $id=$_GET['id'];
    //2.CREATE SQL QUERY TO GET THE DETAILS
    $sql="SELECT * FROM admin_table" ;
    //Execute the query
    $res=mysqli_query($conn, $sql);
    //check whether the query is executed or not
    if($res==true)
    {
        //check whether the data is availble or not
        $count=mysqli_num_rows($res);
        //check whether we have admin data or not
        if($count==1)
        {
            //get the details
            //echo "Admin available";
            $row=mysqli_fetch_assoc($res);
            $full_name= $row['full_name'];
            $username= $row['username'];
        }
        else {
            //Redirect to
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>
        

        <form action="" mathod="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>UserName:</td>
                        <td>
                           <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" vlue="<?php echo $id ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secendary">
                        </td>
                    </tr>
                </table>
        </form>
    </div>
</div>
<?php 
    //check whether the submit button clicked or not
    if(isset($_POST['submit']))
    {
        //get all the values from form to update
       echo $id=$_POST['id'];
        echo $full_name =$_POST['full_name'];
       echo  $username =$_POST['username'];
       //Create a sql query
       $sql="UPDATE admin_table SET
       full_name='$full_name',
       username='$username'
       WHERE id ='$id'
       ";
       //Execute the query
       $res=mysqli_query($conn, $sql);
       //check
       if($res==true)
       {
           $_SESSION['update']="<div class='SUCCESS'>Admin update successfully. </div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
       }
       else
       {
        $_SESSION['update']="<div class='error'>Faild to delete </div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>
<?php include('partials/footer.php'); ?>