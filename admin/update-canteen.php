<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Canteen</h1>
        <br> <br>

        <?php 
            //Check Whether the id is set or not
            if(isset($_GET['id']))
            {
                //get the id and all other details
               
                $id=$_GET['id'];
                //Create sql Query to get all the details
                $sql="SELECT * FROM canteen_table WHERE id=$id";
                //Execute the query
                $res=mysqli_query($conn, $sql);

                //count the rows and check the id valid or not
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $title=$row['title'];
                    $location=$row['location'];
                    $current_image=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                }
                else
                {
                    $_SESSION['no-canteen-found']="<div class='error'>Canteen not found</div>";
                    header('location:'.SITEURL.'admin/manage-canteen.php');
                }
            }
            else
            {
                //redirect to manage canteen
                header('location:'.SITEURL.'admin/manage-canteen.php');
            }
        ?>
<form action="" method="POST" enctype="maltipart/form data">

    <table class="tbl-30">

        <tr>
        <td>Title:</td>
        <td>
            <input type="text" name="title" value="<?php echo $title;?>">
        </td>
        </tr>
        <tr>
        <tr>
        <td>Location:</td>
        <td>
            <input type="text" name="location" value="<?php echo $location;?>">
        </td>
        </tr>
        <tr>
        <td>Current Image:</td>
        <td>
            <?php 
            if($current_image !="")
            {
               //display image
               ?>
               <img src="<?php echo SITEURL;?>images/canteen/<?php echo $current_image; ?>" width="150px" >
               <?php  
              
                
                
            }
            else
            {
                //Image not available
                echo "<div class='error'> Image not available</div>";
            }
            ?>
        </td>
      </tr>
    
            <tr>
                <td>New Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
        </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No">No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No">No
                </td>
            </tr>
            <tr>
        <td>
            
            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="submit" value="Update Canteen" class="btn-secendary">
        </td>
    </tr>
            </table>
        </form>

        <?php 

            if(isset($_POST['submit']))
            {
                
                //Get all the value ffrom form
                $id=$_POST['id'];
                $title=$_POST['title'];
                $location=$_POST['location'];
                $current_image=$_POST['current_image'];
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
                //auto rename photo name
                $ext=end(explode('.',$image_name));
                //rename image
                $image_name="Food_Canteen_".rand(000,999).'.'.$ext;
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/canteen/". $image_name;
                //uploaded the image
                $upload=move_uploaded_file($source_path, $destination_path);

                if($upload==false)
                {
                    $_SESSION['upload']="<div class='error'>Failed to upload image. </div>";
                    header('location:'.SITEURL.'admin/manage-canteen.php');
                    //Stop process
                    die();
                }
                //remove the image if new image uploaded and current image exixst
                // Remove current image if available
                if($current_image!="")
                {
                    //image is available
                    $remove_path="../images/canteen/".$current_image;
                    $remove=unlink($remove_path);
                    //checked whether the image is remove or not
                    if($remove==false)
                    {
                        //failed to remove current image
                        $_SESSION['remove_failed']="<div class='error'>Failed to remove image</div>";
                        //Redirect to manage food
                        header('location:'.SITEURL.'admin/manage-canteen.php');
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
          
                  

                //update the database
                $sql2="UPDATE canteen_table SET
                title='$title',
                location='$location',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                WHERE id=$id
                ";
                //Execute the query
                $res2=mysqli_query($conn, $sql2);
                //Redirect to manage canteen

                //Check whether executed or not
                if($res2==true)
                {
                    //Canteen updated
                    $_SESSION['update']="<div class='SUCCESS'>Canteen Updated Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-canteen.php');
                }
                else
                {
                    //failed to updated
                    $_SESSION['update']="<div class='error'>Failed to Canteen Updated.</div>";
                    header('location:'.SITEURL.'admin/manage-canteen.php');
                }



            }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>