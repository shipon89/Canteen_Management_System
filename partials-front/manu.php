<?php  
  include('config/constant.php');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen Management System</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo6.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL;?>">Home</a>
                    </li>
					 
                    <li>
                        <a href="<?php echo SITEURL;?>canteens.php">Canteens</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>view_order.php">View Order</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>view_review.php">View review</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>register.php">Register</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
					<li>
                        <a href="<?php echo SITEURL; ?>profile.php">Profile</a>
                    </li>
					<li>
                        <a href="<?php echo SITEURL; ?>login.php">Logout</a>
                    </li>
					
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->