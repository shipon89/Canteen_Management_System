<?php include('partials-front/manu.php');?>

<div class="main-content">
<div class="wrapper">
<h1> View Order History</h1>
<br/> <br/> </br>

            <?php  
                
                if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
             ?>
             
        
               
    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Food</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Order Date</th>
            <th>Status</th>
          
            <th>Customer Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>

        <?php  
            //get all the details from database
            $sql="SELECT * FROM order_table ORDER BY id DESC";
            //Execute the query
            $res=mysqli_query($conn, $sql);
            //count rows
            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0)
            {

                //Order available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get all the details
                    $id=$row['id'];
                    
                    $food=$row['food'];

                    $price=$row['price'];

                    $qty=$row['qty'];


                    $order_date=$row['order_date'];

                    $status=$row['status'];
                   
                    $customer_name=$row['customer_name'];
                    $customer_contact=$row['customer_contact'];
                    $customer_email=$row['customer_email'];
                    $customer_address=$row['customer_address'];

                    ?>
                     <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $food; ?></td>
                            <td><?php echo $price;?></td>
                            <td><?php echo $qty;?></td>
                            
                            <td><?php echo $order_date;?></td>
                            <td>
                                <?php 
                                    if($status=="Ordered")
                                    {

                                        echo "<label  style='color:blue;' >$status</label>";
                                    }
                                  
                                    elseif($status=="Cancelled")
                                    {
                                        echo "<label style='color:red;'>$status</label>";
                                    }
                                ?>
                            </td>
                            
                            <td><?php echo $customer_name;?></td>
                            <td><?php echo $customer_contact;?></td>
                            <td><?php echo $customer_email;?></td>
                            <td><?php echo $customer_address;?></td>
                            
                            <td>
                               
                               <a href="<?php echo SITEURL; ?>/delete_order.php?id=<?php echo $id; ?>" class="btn-danger">Cancel Order</a> 
                            
                            </td>
                        </tr>

                    <?php

                }
            }
            else
            {
                //Not available
                echo "<tr> <td colspan='12' class='error'> Orders Not available</td></tr>";
            }
        ?>
       
        
    </table>
</div>
</div>

<?php include('partials-front/footer.php');?>