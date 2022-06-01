<?php include('partials/menu.php');?>

<div class="main-content">
<div class="wrapper">
<h1> Manage Canteen </h1>

<br/> <br/>

       <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['no-canteen-found']))
                {
                    echo $_SESSION['no-canteen-found'];
                    unset($_SESSION['no-canteen-found']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                
                if(isset($_SESSION['remove_failed']))
                {
                    echo $_SESSION['remove_failed'];
                    unset($_SESSION['remove_failed']);
                }
        
        ?>
        <br> <br>
        <!--button to add admin-->
        <a href="<?php echo SITEURL;?>admin/add-canteen.php" class="btn-primary">Add Canteen</a>
        <br/> <br/>
    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Title</th>
            <th>Location</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>

        <?php 
            //Query to get all category
            $sql ="SELECT* FROM canteen_table";
            //Execute the query
            $res = mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $location=$row['location'];
                    $image_name=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                    ?>

                        <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $location; ?></td>

                                <td>

                                <?php 
                             if($image_name=="")
                             {
                                echo "<div class='error'>Image Not Added</div>"; 
                             }
                             else
                             {
                                 ?>
                                 <img src="<?php echo SITEURL; ?>images/canteen/<?php echo $image_name; ?>" width="100px" >
                                 <?php
                             }
                             
                             ?>

                                </td>

                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-canteen.php?id=<?php echo $id; ?>" class="btn-secendary">Update Canteen</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-canteen.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Canteen</a> 
                                </td>
                            </tr>
                    <?php

                }
            }
            else
            {
                ?>
                <tr>
                    <td colspan="6"><div class="error">No Canteen Added</div></td>
                </tr>
                <?php

            }
        
        ?>
    </table>
</div>
</div>

<?php include('partials/footer.php');?>