<?php include('partials-front/manu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
             $sql="SELECT * FROM food_table WHERE active='Yes' ";
             //Execute the query
             $res=mysqli_query($conn, $sql);
             //count rows to check canteen is available or not
             $count=mysqli_num_rows($res);
             if($count>0)
             {
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the values
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
                                                 <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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
                echo "<div class='error'>Foods not added</div>";
             }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>