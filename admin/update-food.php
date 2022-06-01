<?php include('partials/menu.php');?>

<?php 
//check whether id is selected or not
if(isset($_GET['id']))
{
    //get all the details
    $id=$_GET['id'];
    //sql query to get the seleted food
    $sql2="SELECT * FROM food_table WHERE $id=id";
    //execute query
    $res2=mysqli_query($conn,$sql2);

    //get the value based onquery executed
    $row2=mysqli_fetch_assoc($res2);
    //get the individual values of selected food
    $title=$row2['title'];
    $description=$row2['description'];
    $price=$row2['price'];
    $current_image=$row2['image_name'];
    $current_canteen=$row2['canteen_id'];
    $featured=$row2['featured'];
    $active=$row2['active'];
}
else
{
    //Redirect to manage food
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br> <br>
        <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
    <tr>
        <td>Title:</td>
        <td>
            <input type="text" name="title" value ="<?php echo $title; ?>">
        </td>
    </tr>

    <tr>
        <td>Description:</td>
        <td>
            <textarea name="description"  cols="20" rows="5"><?php echo $description;?></textarea>
        </td>
    </tr>
    <tr>
        <td>Price:</td>
        <td>
            <input type="number" name="price" value="<?php echo $price;?>">
        </td>
    </tr>
    <tr>
        <td>Current Image:</td>
        <td>
            <?php 
            if($current_image =="")
            {
                echo "<div class='error'> Image not available</div>";
            }
            else
            {
                //Image available
                ?>
                <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image; ?>" width="150px" >
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Select Image:</td>
        <td>
            <input type="file" name="image">
        </td>
    </tr>

    <tr>
        <td>Canteen:</td>
        <td>
            <select name="canteen">
                    <?php 
                            //Query to get active category
                            $sql="SELECT * FROM canteen_table WHERE active='Yes'";
                            //Execute The Query
                            $res=mysqli_query($conn, $sql);
                            //count rows
                            $count=mysqli_num_rows($res);
                            //Check category available or not
                            if($count>0)
                            {
                                //category availble
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $canteen_title=$row['title'];
                                    $canteen_id=$row['id'];
                                   // echo "<option value='$canteen_id'>$canteen_title</option>";
                                   ?>
                                   <option <?php if($current_canteen == $canteen_id) {echo "selected";}?> value="<?php echo $canteen_id;?>"><?php echo $canteen_title; ?></option>
                                   <?php
                                }
                            }
                            else
                            {
                                //category not available
                                echo "<option value='0'>Canteen not available</option>";
                            }
                        
                        ?>

            </select>
        </td>
    </tr>
    <tr>
        <td>Featured:</td>
        <td>
            <input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes">Yes
            <input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No">No
        </td>
    </tr>
    <tr>
        <td>Active:</td>
        <td>
            <input  <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes">Yes
            <input  <?php if($active=="No") {echo "checked";}?> type="radio" name="active" value="No">No
        </td>
    </tr>
    <tr>
        <td>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
            <input type="submit" name="submit" value="Update Food" class="btn-secendary">
        </td>
    </tr>
    </table>

        </form>
        <?php 
        
        if(isset($_POST['submit']))
        {
           // echo "button clicked";
           //Get all the details from form
           $id=$_POST['id'];
           $title=$_POST['title'];
           $description=$_POST['description'];
           $price=$_POST['price'];
           $current_image=$_POST['current_image'];
           $canteen=$_POST['canteen'];

           $featured=$_POST['featured'];
           $active=$_POST['active'];


           //Upload the image if selected
           //Check whether upload button is  clicked or not
           if(isset($_FILES['image']['name']))
           {
                //upload button clicked
            $image_name=$_FILES['image']['name'];
            if($image_name!="")
            {
                //image is available 
                //rename the image
                $ext=end(explode('.',$image_name));
                $image_name="Food-Name-".rand(0000,9999).'.'.$ext;
                //Get source path and destination path
                $src_path=$_FILES['image']['tmp_name'];
                $dest_path="../images/food/".$image_name;
                //Upload the image
                $upload=move_uploaded_file($src_path,$dest_path);
                //check whether the image uploaded or not
                if($upload==false)
                {
                    //Failed to upload
                    $_SESSION['upload']="<div class='error'>Failed to upload new image.</div>";
                    //Redirect to mange food
                    header('location:'.SITEURL.'admin/manage-food.php');
                    //stop the process
                    die();
                }
                //remove the image if new image uploaded and current image exixst
                // Remove current image if available
                if($current_image!="")
                {
                    //image is available
                    $remove_path="../images/food/".$current_image;
                    $remove=unlink($remove_path);
                    //checked whether the image is remove or not
                    if($remove==false)
                    {
                        //failed to remove current image
                        $_SESSION['remove-failed']="<div class='error'>Failed to remove image</div>";
                        //Redirect to manage food
                        header('location:'.SITEURL.'admin/manage-food.php');
                        //stop the process
                        die();
                    }
                }
            }
            else
            {
                $image_name=$current_image;
            }
           }
           else
           {
               $image_name=$current_image;
           }
          
          
           
           
           
           //updatd the food in database
           $sql3="UPDATE food_table SET
           title='$title',
           description='$description',
           price='$price',
           image_name='$image_name',
           canteen_id='$canteen',
           featured='$featured',
           active='$active'
            WHERE id=$id
           ";
           //Execute the sql query
           $res3=mysqli_query($conn,$sql3);
           //checked whether the query executed or not
           if($res3==true)
           {
               //query executed and upate food
               $_SESSION['update']="<div id=SUCCESS'>Successfully updated</div>";
               header('location:'.SITEURL.'admin/manage-food.php');
           }
           else
           {
            $_SESSION['update']="<div class=error'>Failed to update</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
           }

           //redirect to manage food
        }
        
        ?>
    </div>
</div>
<?php include('partials/footer.php');?>