<?php  include('config/constant.php');?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/contact-form.css">
</head>
<body>

<?php 
    //Check whether the food id is availble or not
    if(isset($_GET['food_id']))
    {
        //get the food id and details of the selected food
        $food_id=$_GET['food_id'];

        //Gets the details of the selected food
        $sql="SELECT * FROM food_table WHERE id=$food_id";

        //Execute the query
        $res=mysqli_query($conn, $sql);

        //count the rows
        $count=mysqli_num_rows($res);
        //check whether the data is available or not
        if($count==1)
        {
            //we have data
            $row=mysqli_fetch_assoc($res);
            $title=$row['title'];
            $image_name=$row['image_name'];
        }
        else
        {
            //food not avaailabe
            //Redirect TO Homepage

                 header('location:'.SITEURL.'/view_review.php');
        }

    }
    else
    {
       
        //Redirect to home page
        header('location:'.SITEURL.'/view_review.php');
    }
?>
<section id="maincon">
        <nav>
          
         
            <ul class="menu">


                <li><a href="index.php">Home</a></li>	
                <li><a href="canteens.php">Canteens</a></li>	
                <li><a href="foods.php">Foods</a></li>	
                <li><a href="view_review.php">View Food Review</a></li>	
                <li><a href="contact.php">Contact</a></li>	
                <li><a href="register.php">Register</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="login.php">Logout</a></li>




            </ul>



            
            </nav>
            </section>

<div class="container">
    <div class="row">
 
<form action="add_rate.php" method="post">
 
    <div>
        <h3>Add Food Review</h3>
    </div>
</br></br>
 
    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php 
                                            if($image_name=="")
                                            {
                                                //display message
                                                echo "<div class='error'>Image not available</div>";
                                            }
                                            else
                                            {
                                                ?>
                                               <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                                <?php
                                            }

                                            ?>


                        
                    </div>
                    </br></br>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        
                        <tr>
                           <td>User Name:</td>
                             <td><input type="text" name="usrn" placeholder="Type food title:"></td>
                      </tr>

                        <tr>
                           <td>Food Title:</td>
                             <td><input type="text" name="titlee" placeholder="Type food title:"></td>
                      </tr>
            
</br>
            <label for="Message" class="fcf-label">Your message</label>
            <div class="fcf-input-group">
                <textarea id="Message" name="name" class="fcf-form-control" rows="6" maxlength="7000" required></textarea>
           
                
         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
 
    <span class='result'>0</span>
    <input type="hidden" name="rating">
 
    </div>
 
    <div><input type="submit" name="add"> </div>
 
</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); 
        });
    });
 
</script>
</body>
 
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $food=$_POST['food'];
    $name = $_POST["name"];
    $usrn = $_POST["usrn"];
    $titlee = $_POST["titlee"];
    $rating = $_POST["rating"];
 
    $sql = "INSERT INTO food_table (mssge,rate,title,usr) VALUES ('$name','$rating','$titlee','$usrn')";
    if (mysqli_query($conn, $sql))
    {
         echo '<script type="text/JavaScript">  
            alert("Food review successful");
                 </script>';
    }
    else
    {
        echo '<script type="text/JavaScript">  
             alert(" Review food Failed.");
                </script>';
    }
    mysqli_close($conn);
}
?>
<?php include('partials-front/footer.php');?>