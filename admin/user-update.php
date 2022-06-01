<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br> <br>
<?php
    //1.Get the id of selected admin
    $id=$_GET['id'];
    //2.CREATE SQL QUERY TO GET THE DETAILS
    $sql="SELECT * FROM user WHERE id=$id" ;
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
            $first_name= $row['first_name'];
            $last_name= $row['last_name'];
        }
        else {
            //Redirect to
            header('location:'.SITEURL.'register.php');
        }
    }
?>
        

          <!-- registration area -->
    <section id="register">
        <div class="row m-0">
            <div class="col-lg-4 offset-lg-2">
                <div class="text-center pb-5">
                    <h1 class="login-title text-dark">Register</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
                    <span class="font-ubuntu text-black-50">I already have <a href="login.php">Login</a></span>
                </div>
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <img class="camera-icon" src="./images/camera-solid.svg" alt="camera">
                        </div>
                        <img src="./images/profile/beard.png" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                        <small class="form-text text-black-50">Choose Image</small>
                        <input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName'];  ?>" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col">
                                <input type="text" value="<?php if(isset($_POST['LastName'])) echo $_POST['LastName'];  ?>" name="LastName" id="LastName" class="form-control" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>" required name="email" id="email" class="form-control" placeholder="Email*">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="password" id="password" class="form-control" placeholder="password*">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password*">
                                <small id="confirm_error" class="text-danger"></small>
                            </div>
                        </div>



                        <div class="submit-btn text-center my-5">
                            <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">umdate</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- #registration area -->
    </div>
</div>
<?php 
    //check whether the submit button clicked or not
    if(isset($_POST['submit']))
    {
        //get all the values from form to update
       $id=$_POST['id'];
       $full_name =$_POST['full_name'];
       $username =$_POST['username'];
       //Create a sql query
       $sql2="UPDATE admin_table SET
       full_name='$full_name',
       username='$username'
       WHERE id =$id
       ";
       //Execute the query
       $res2=mysqli_query($conn, $sql2);
       //check
       if($res2==true)
       {
           $_SESSION['update'] = "<div class='SUCCESS'>Admin updated successfully.</div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
       }
       else
       {
        $_SESSION['update']="<div class='error'>Faild to Update</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
        
    }
}
?>

<?php include('partials/footer.php'); ?>