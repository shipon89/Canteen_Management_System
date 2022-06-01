<?php include('partials/menu.php');?>

<div class="main-content">
<div class="wrapper">
<h1> View Review</h1>
<br/> <br/> </br>

           
        
               
    <table class="tbl-full center">
        <tr>
            <th>S.N.</th>
            <th>User Name</th>
            <th>Image</th>
            <th>Food Title</th>
            <th>Rating</th>
            <th>mssge</th>
            
        </tr>

        <?php  
            //get all the details from database
            $sql="SELECT * FROM food_table ORDER BY id DESC";
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
                    $usr=$row['usr'];
                    $image_name=$row['image_name'];
                    $title=$row['title'];
                    
                    $rate=$row['rate'];

                    $mssge=$row['mssge'];

                   

                   

                    ?>
                    
                     <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $usr;?></td>
                            <td>
                             <?php 
                             if($image_name=="")
                             {
                                echo "<div class='error'>Image Not Added</div>"; 
                             }
                             else
                             {
                                 ?>
                                 <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px" >
                                 <?php
                             }
                             
                             ?>
                            </td>
                            <td><?php echo $title; ?>.</td>
                            <td><?php echo $rate; ?></td>
                            <td><?php echo $mssge;?></td>
                            
                            
                            
                        </tr>

                    <?php

                }
            }
            else
            {
                //Not available
                echo "<tr> <td colspan='12' class='error'> Review Not available</td></tr>";
            }
        ?>
       
        
    </table>
</div>
</div>

<?php include('partials/footer.php'); ?>