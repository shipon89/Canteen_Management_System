<?php include('partials-front/manu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

        <?php 
           //get the search keyword
            //$search=$_POST['search'];
            $search=mysqli_real_escape_string($conn, $_POST['search']);
        ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                
                //sql query to get the value from database
                $sql="SELECT * FROM food_table WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
                //Execute the query
                $res=mysqli_query($conn, $sql);
                $count=mysqli_num_rows($res);
                //Check whether the food available or not
                if($count>0)
                {
                    //available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id=$row['id'];
                        $title=$row['title'];
                        $description=$row['description'];
                        $price=$row['price'];
                        $image_name=$row['image_name'];
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
                                                 <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                                <?php
                                            }

                                            ?>
                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price"><?php echo $price;?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                    <a href="<?php echo SITEURL;?>add_rate.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Food Review</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    //not available
                    echo "<div class='error'>Food Not available.</div>";
                }
            
            ?>

            
           
           

           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>