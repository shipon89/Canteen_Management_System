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

    $current_image=$row2['image_name'];
  
}
else
{
    //Redirect to manage food
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Food Review</h1>
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
      <td>Your message:</td>
        <td>
          <textarea id="Message" name="name" class="fcf-form-control" rows="6" maxlength="7000" required></textarea>
    </td>
</tr>

<div class="rateyo" id= "rating"
data-rateyo-rating="4"
data-rateyo-num-stars="5"
data-rateyo-score="3">
</div>

<span class='result'>0</span>
<input type="hidden" name="rating">


    <tr>
        <td>Food Image:</td>
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
        <td>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
            <input type="submit" name="submit" value="Add Food Review" class="btn-secendary">
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
           $name=$_POST['name'];
           $current_image=$_POST['current_image'];
          

 


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
           image_name='$image_name',
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
            header('location:'.SITEURL.'view_review.php');
           }

           //redirect to manage food
        }
        
        ?>
    </div>
</div>
<?php include('partials/footer.php');?>