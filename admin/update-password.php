<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
<h1>Change Password</h1>
<br> <br>
<?php
 if(isset($_GET['id']))
 {
     $id = $_GET['id'];
 }
?>

<form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current password">
                    </td>
                </tr>
                <tr>
                    <td>New password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-primary">
                    </td>
                </tr>
            </table>
</form>
</div>
</div>
<?php 
// checked whether the submit button is clicked
if(isset($_POST['submit']))
{
    //echo "Clicked";
    //Get all the data from form
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);
  // Check whether the user with current password exists or not
  $sql="SELECT * FROM admin_table WHERE id=$id AND password='$current_password'";
  //execute the query
  $res =mysqli_query($conn,$sql);
  if($res==true)
  {
      $count=mysqli_num_rows($res);
      if($count==1)
      {
          //user exist
          //echo "User found";
          if($new_password==$confirm_password)
          {
            //update pass
            $sql2="UPDATE admin_table SET
            password='$new_password'
            WHERE id=$id
            ";
            $res2=mysqli_query($conn, $sql2);
            // Check Whether the query executed or not
            if($res2==true)
            {
                //display success message
                $_SESSION['change_pass']="<div class='SUCCESS'>Password Change successfully</div>";
          
                //Redirect
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else
            {
                //Error message
                $_SESSION['change_pass']="<div class='error'>Failed to Password Change</div>";
          
                //Redirect
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
          }
          else
          {
            $_SESSION['pass-not-match']="<div class='error'>Password Not Match</div>";
          
            //Redirect
            header('location:'.SITEURL.'admin/manage-admin.php');
          }
      }
      else
      {
          $_SESSION['user-not-found']="<div class='error'>User Not Found</div>";
          
          //Redirect
          header('location:'.SITEURL.'admin/manage-admin.php');
      }

  }

}
?>
<?php include('partials/footer.php');?>