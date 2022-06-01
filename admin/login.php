<?php  include('../config/constant.php');?>
<html>
    <head>
        <title>Login - Canteen Management System</title>
        
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div id="login">
            <h1 class ="text-center">Login</h1>
            <br> <br>

            <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?>
            <br>
            <!-- login form start-->
            <form action="" method="POST" class="text-center">
                Username:<br>
                <input type="text" name ="username" placeholder="Enter Username"><br> <br>
                Password:<br>
                <input type="password" name="password" placeholder="Enter Password"><br> <br>
                <input type="submit" name="submit" value="Login" class="btn-primary">
			
                <br> <br>
            </form>
            <p class="text-center">Created by- Shipon & Marju</p>
        </div>
    </body>
</html>
<?php 
// checked 
if(isset($_POST['submit']))
{
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $row_password=md5($_POST['password']);
    $password=mysqli_real_escape_string($conn, $row_password);


    $sql="SELECT * FROM admin_table WHERE username='$username' AND password='$password'";
    $res=mysqli_query($conn,$sql);
    $count =mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['login']="<div class='SUCCESS'>Login Successful.</div>";
        $_SESSION['user']=$username;
        header('location:'.SITEURL.'/admin');

    }
    else
    {
        $_SESSION['login']="<div class='error text-center'>Username or password incorrect.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
}
?>