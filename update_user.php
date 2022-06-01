
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="./css/profile.css">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require ('register-process.php');
        }
    ?>

    <!-- registration area -->
    <section id="register">
        <div class="row m-0">
            <div class="col-lg-4 offset-lg-2">
                <div class="text-center pb-5">
                    <h1 class="login-title text-dark">Update user Registration</h1>
                  
                   
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

                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement" class="form-check-input" required>
                            <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">term, conditions, and policy </a>(*) </label>
                        </div>

                        <div class="submit-btn text-center my-5">
                            <button type="submit" name="submit" class="btn btn-warning rounded-pill text-dark px-5">Update</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- #registration area -->
<?php 
 if(isset($_POST['submit']))
 {
     //get all the values from form to update
    $userID=$_POST['userID'];
    $firstName =$_POST['firstName'];
    $LastName =$_POST['LastName'];
    $email =$_POST['email'];
    $password =$_POST['password'];

    //Create a sql query
    $sql="UPDATE user SET
    firstName='$firstName',
    LastName='$LastName',
    password='$password',
    WHERE userID =$userID
    ";
    //Execute the query
    $res=mysqli_query($conn, $sql);
    //check
    if($res==true)
    {
        $_SESSION['update'] = "<div class='SUCCESS'>User updated successfully.</div>";
        header('location:'.SITEURL.'profile.php');
    }
    else
    {
     $_SESSION['update']="<div class='error'>Faild to Update</div>";
     header('location:'.SITEURL.'profile.php');
     
 }
}

?>

<?php
    // footer.php
    include ('footer.php');
?>