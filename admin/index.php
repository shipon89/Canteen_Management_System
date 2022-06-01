<?php include('partials/menu.php');?>

<!--main content section starts-->
<div class="main-content">
    <div class="wrapper">
    <h1>DASHBOARD</h1>
<br> <br>
    <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
<br> <br>
    <div class="col-4 text-center">
        <?php 
        $sql="SELECT * FROM canteen_table";
        //Execute query
        $res=mysqli_query($conn,$sql);
        //count rowa
        $count=mysqli_num_rows($res);

        ?>
        <h1><?php echo$count; ?></h1>
        <br/>
        Canteens
    </div>
    <div class="col-4 text-center">
    <?php 
        $sql2="SELECT * FROM food_table";
        //Execute query
        $res2=mysqli_query($conn,$sql2);
        //count rowa
        $count2=mysqli_num_rows($res2);

        ?>
        <h1><?php echo $count2; ?></h1>
        <br/>
       Foods
    </div>
    <div class="col-4 text-center">
    <?php 
        $sql3="SELECT * FROM order_table";
        //Execute query
        $res3=mysqli_query($conn,$sql3);
        //count rowa
        $count3=mysqli_num_rows($res3);

        ?>
        <h1><?php echo $count3; ?></h1>
        <br/>
        Total Order
    </div>
    <div class="col-4 text-center">
    <?php 
        $sql4="SELECT SUM(total) AS Total FROM order_table WHERE status='Delivered'";
        //Execute query
        $res4=mysqli_query($conn,$sql4);
        //get the values
        $row4=mysqli_fetch_assoc($res4);
        $total_revenue=$row4['Total'];
       

        ?>
        <h1><?php echo $total_revenue; ?>tk</h1>
        <br/>
        Revenue Generated
    </div>

    <div class="clearfix"></div>
    </div>

</div>
<!--main content section Ends-->

<?php include('partials/footer.php');?>