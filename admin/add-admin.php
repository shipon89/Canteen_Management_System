<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/> 

        <?php 
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <br/> <br/>  <br/> 
        
        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter name:"></td>
            </tr>
            <tr>
                <td>UserName:</td>
                <td><input type="text" name="username" placeholder="Enter username:"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Enter password:"></td>
            </tr>
            <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Admin" class="btn-secendary">
            </td>
        </tr>
        </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php');?>

<?php 

//process the value from form and save it in database
//Check wether the submit button is clicked or not

if(isset($_POST['submit']))
{
    //BUTTON CLICKED
   // echo "BUTTON CLICKED";
   //get the data from form
  $full_name=$_POST['full_name'];
  $username=$_POST['username'];
  $password=md5($_POST['password']);

  //SQL Query to save data into database
  $sql ="INSERT INTO admin_table SET
  full_name='$full_name',
  username='$username',
  password='$password'
  ";
 
  //Executing query and save data in database
  $res= mysqli_query($conn, $sql)or die(mysqli_error());
  //check wether the(query is executed) ata is inserted or not
  if($res==TRUE)
  {
      //echo "data inserted";
      //Create a session variable to display message
      $_SESSION['add']="Admin Added Successfully";
      //Redirect Page to add Admin
      header("location:".SITEURL.'admin/manage-admin.php');
  }
  else
  {
     //echo "data not inserted";
     //Create a session variable to display message
     $_SESSION['add']="Failed to add Admin";
      //Redirect Page to add Admin
      header("location:".SITEURL.'admin/add-admin.php');
  }
}
?>
