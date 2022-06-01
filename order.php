<?php include('partials-front/manu.php');?>

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
            $price=$row['price'];
            $image_name=$row['image_name'];
        }
        else
        {
            //food not avaailabe
            //Redirect TO Homepage
            header('location:'.SITEURL);
        }

    }
    else
    {
        //Redirect to home page
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
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
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value=<?php echo $title; ?>>
                        <p class="food-price"><?php echo $price; ?>tk</p>
                        <input type="hidden" name="price" value=<?php echo $price; ?>>
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Shipon Ahmed" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 017xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="shipon036@gmail.com" class="input-responsive" required>
                   
                    <div class="order-label">Payment Method:</div>
                        <td>
                            <select name="payment" >
                                <option value="Cash On Delivery">Cash On Delivery</option>
                                <option value="Bkash">Bkash</option>
                            </select>
                        </td>
                      </br>
                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, " class="input-responsive" required></textarea>
                    
                       
                    

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php 
                //Checked whether the 
                if(isset($_POST['submit']))
                {
                    //Get all the value
                    $food=$_POST['food'];
                    $price=$_POST['price'];
                    $qty=$_POST['qty'];
                    $total= $price * $qty;
                    $order_date= date("Y-m-d h:i:sa");
                    $status="Ordered";
                    $payment="Cash On Delivery";
                    $customer_name=$_POST['full-name'];
                    $customer_contact=$_POST['contact'];
                    $customer_email=$_POST['email'];
                    $customer_address=$_POST['address'];
                    

                    //save the order in database
                    //create sql to save the data
                    $sql2="INSERT INTO order_table SET
                    food='$food',
                    price=$price,
                    qty=$qty,
                    total=$total,
                    order_date='$order_date',
                    status='$status',
                    payment='$payment',
                    customer_name='$customer_name',
                    customer_contact='$customer_contact',
                    customer_email='$customer_email',
                    customer_address='$customer_address'
                    ";
                   // echo $sql2; die();

                    //Execute the query
                    $res2=mysqli_query($conn, $sql2);

                    //Check whether the query executed successfully or not
                    if($res2==true)
                    {
                        echo '<script type="text/JavaScript">  
                        alert("Food order successfully");
                        </script>';
                    }
                    else
                    {
                        echo '<script type="text/JavaScript">  
                        alert("  Failed to order food.");
                        </script>';
                    }

                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php');?>

  