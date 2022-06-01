<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br> <br>

        <?php 
        //check whether id set or not
        if(isset($_GET['id']))
        {
            //Get the order details
            $id=$_GET['id'];

            //Get all the details based on this id
            //sql query to get the order details
            $sql="SELECT * FROM order_table WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                //Details available
                $row=mysqli_fetch_assoc($res);
                //Get all the details
                $food=$row['food'];
                $price=$row['price'];
                $qty=$row['qty'];
                $status=$row['status'];
                $customer_name=$row['customer_name'];
                $customer_contact=$row['customer_contact'];
                $customer_email=$row['customer_email'];
                $customer_address=$row['customer_address'];
                

            }
                
            else
            {
                //Details not available
                //Redirect to manage order
                header('location:'.SITEURL.'admin/manage-order.php');
            }
            

        }
        else
        {
            //Redirect to mange order page
            header('location:'.SITEURL.'admin/manage-order.php');
        }
        ?>
        <form action="" method="POST">

    <table class="tbl-30">
        <tr>
            <td>Food Name:</td>
            <td><b><?php echo $food; ?></b></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><b><?php echo $price; ?>tk</b></td>
        </tr>
        <tr>
            <td>Qty</td>
            <td>
                <input type="number" name="qty" value="<?php echo $qty; ?>">
            </td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select name="status" >
                    <option <?php if($status=="Ordered"){echo "selected";}?>value="Ordered">Ordered</option>
                    <option <?php if($status=="On Delivery"){echo "selected";}?>value="On Delivery">On Delivery</option>
                    <option <?php if($status=="Delivered"){echo "selected";}?> value="Delivered">Delivered</option>
                    <option <?php if($status=="Cancelled"){echo "selected";}?>value="Cancelled">Cancelled</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Customer Name:</td>
            <td>
                <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
            </td>
        </tr>
        
        <tr>
           <td>Customer Contact:</td>
            <td>
                <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
            </td>
        </tr>
        <tr>
           <td>Customer Email:</td>
            <td>
                <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
            </td>
        </tr>
        <tr>
           <td>Customer Address:</td>
            <td>
                <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
            </td>
        </tr>
        <tr>
            <td clospan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <input type="submit" name="submit" value="Update Order" class="btn-secendary">
            </td>
        </tr>
        


    </table>

        </form>

        <?php 
           // Checked whether button is clicked or not
           if(isset($_POST['submit']))
           {
              // echo "Clicked";
              //Get all the values from form
              $id=$_POST['id'];
              $price=$_POST['price'];
              $qty=$_POST['qty'];
              $total=$price * $qty;
              $status=$_POST['status'];
              $customer_name=$_POST['customer_name'];
              $customer_contact=$_POST['customer_contact'];
              $customer_address=$_POST['customer_address'];

              //Update the value
              $sql2="UPDATE order_table SET
              qty=$qty,
              total=$total,
              status='$status',
              customer_name='$customer_name',
              customer_contact='$customer_contact',
              customer_email='$customer_email',
              customer_address='$customer_address'
              WHERE id=$id
              ";
          //Execute the query
          $res2=mysqli_query($conn, $sql2);
          if($res2==true)
          {
              //Update
              $_SESSION['update']="<div class='success'>Successfully Updated Order.</div>";
              header('location:'.SITEURL.'admin/manage-order.php');
          }
          else
          {
              //Failed to update
              $_SESSION['update']="<div class='error'>Failed to Order update.</div>";
              header('location:'.SITEURL.'admin/manage-order.php');
          }



           }
        ?>

    </div>
</div>

<?php include('partials/footer.php');?>