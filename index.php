<?php include('partials-front/manu.php');?>

    <!-- fOOD SEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>location_search.php" method="POST">
                <input type="search" name="search" placeholder="Search Canteen by location or name.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
        <?php 
                if(isset($_SESSION['order']))
                {
                    echo $_SESSION['order'];
                    unset($_SESSION['order']);
                }
        
        ?>

    <!-- CAtegories Section Starts Here -->
    <section class="canteens">
        <div class="container">
            <h2 class="text-center">Select Canteen</h2>

            <?php 
                //create sql query to display categories from database
                $sql="SELECT * FROM canteen_table WHERE active='Yes' AND featured='Yes' LIMIT 6";
                //Execute the query
                $res=mysqli_query($conn, $sql);
                //count rows to check canteen is available or not
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    //category available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id=$row['id'];
                        $title=$row['title'];
                        $loc=$row['location'];
                        $image_name=$row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL;?>canteen-foods.php?canteen_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                if($image_name=="")
                                {
                                    //display message
                                    echo "<div class='error'>Image not available</div>";
                                }
                                else
                                {
                                    //Image available
                                    ?>
                                         <img src="<?php echo SITEURL;?>images/canteen/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                                    <?php
                                }
                                ?>
                               

                                <h3 class="float-text text-white"><?php echo $title;  ?> <br><?php echo  $loc;   ?></h3>
                                
                            </div>
                            </a>
                        <?php

                    }
                }
                else
                {
                    //canteen not available
                    echo "<div class='error'>Canteen not added</div>";
                }
            ?>

        	

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    

    <?php include('partials-front/footer.php');?>