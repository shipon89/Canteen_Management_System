<?php include('partials-front/manu.php');?>

<?php 
    //Check whether id is passed or not
    if(isset($_GET['canteen_id']))
    {
        $canteen_id=$_GET['canteen_id'];
        //Get the canteen title based on title
        $sql="SELECT title FROM canteen_table WHERE id=$canteen_id";
        //Execute the query
        $res=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($res);
        //get the title
        $canteen_title=$row['title'];
    }
    else
    {
        //Canteen not passed
        //Redirect to home page
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $canteen_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">

        <?php 
            //Create sql query to get foods based on selected canteen
            $sql2="SELECT * FROM food_table WHERE canteen_id=$canteen_id";

            //Execute the query
            $res2=mysqli_query($conn, $sql2);

            //count the rows
            $count2=mysqli_num_rows($res2);

            //Check whether food is available or not
            if($count2>0)
            {
                //Available
                while($row2=mysqli_fetch_assoc($res2))
                {

                    $id=$row2['id'];
                    $title=$row2['title'];
                    $price=$row2['price'];
                    $description=$row2['description'];
                    $image_name=$row2['image_name'];
                    ?>
                        <div class="food-menu-box">
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
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                                <?php
                                            }

                                            ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price"><?php echo $price; ?>tk</p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                <a href="<?php echo SITEURL;?>add_rate.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Add Food Review</a>
                            </div>
                        </div>
                    <?php
                }
            }
            else
            {
                //Not available
                echo "<div class='error'>Food Not available.</div>";
            }
        
        ?>

        <div class="container">
            

           

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>