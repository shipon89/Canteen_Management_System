<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
    <h1>Add Food</h1>

    <br> <br>
<?php
             if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
?>
    <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" placeholder="Title of the food:"></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea name="description"  cols="30" rows="5" placeholder="Description of the food:" ></textarea></td>
            </tr>

            <tr>
                <td>Price:</td>
                <td><input type="number" name="price" ></td>
            </tr>

            <tr>
                <td>Image:</td>
                <td><input type="file" name="image" ></td>
            </tr>
            <tr>

            <tr>
                <td>Canteen:</td>
                <td>
                <select name="canteen" >

                <?php 
                //Create php code to display categories from database
                //1.Create sql to get all active categories from database
                $sql="SELECT * FROM canteen_table WHERE active='Yes'";
                //Execute the query
                $res=mysqli_query($conn, $sql);
                //count rows to chek whether we have category or not
                $count=mysqli_num_rows($res);
                //if count is grater than 0 we have categories else we do not have categories
                if($count>0)
                {
                    //we have categories
                    while($row=mysqli_fetch_assoc($res))
                    {
                        // get the details of canteen
                        $id=$row['id'];
                        $title=$row['title'];
                        ?>
                            <option value="1"><?php echo $title; ?></option>
                        <?php
                    }
                }
                else
                {
                    //we do not have canteen
                    ?>

                    <option value="<?php echo $id; ?>">No canteen found</option>
                   
                    <?php
                }

                //2.Display on dropdown


                ?>

                
                </select>
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                </td>
            </tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Food" class="btn-secendary">
            </td>
        </tr>
        </table>
        </form>

        <?php 
        
        //Check whether the button is clicked or not
        if(isset($_POST['submit']))
        {
            //add the food in database
          //  echo "clicked";
          //1. Get the data from form
          $title=$_POST['title'];
          $description=$_POST['description'];
          $price=$_POST['price'];
          $category=$_POST['canteen'];

          //check whether the radio button for featured and active checked or not
          if(isset($_POST['featured']))
          {
            $featured=$_POST['featured'];
          }
          else
          {
              $featured="No";
          }

          if(isset($_POST['active']))
          {
            $active=$_POST['active'];
          }
          else
          {
              $active="No";
          }

          //2. update the image if selected
          if(isset($_FILES['image']['name']))
          {
              //Get the details of seleced imange
              $image_name=$_FILES['image']['name'];
              if($image_name!="")
              {
                  //image is selected
                  //Rename the image
                  //get the extension of image which is selected
                  $ext=end(explode('.',$image_name));

                  //create new image name
                  $image_name="Food-Name-".rand(0000,9999).".".$ext;
                  //upload the image
                  //Get the src path and destination path

                  //source path is the current location of the image
                  $src=$_FILES['image']['tmp_name'];
                  //Destination path for the image to be uploaded
                  $dst="../images/food/".$image_name;
                  $upload=move_uploaded_file($src, $dst);
                  //Check uploaded or not
                  if($upload==false)
                            {
                                $_SESSION['upload']="<div class='error'>Failed to upload image. </div>";
                                header('location:'.SITEURL.'admin/add-food.php');
                                //Stop process
                                die();
                            }
              }
          }
          else
          {
              $image_name=""; //setting default value blank
          }
          //3. insert into database
          //create sql QUERY
          $sql2="INSERT INTO food_table SET
          title='$title',
          description='$description',
          price=$price,
          image_name='$image_name',
          canteen_id='$canteen',
          featured='$featured',
          active='$active'
          ";
          //execute the query
          $res2=mysqli_query($conn, $sql2);
          if($res2==true)
                {
                        //Query executed and Category Added
                        $_SESSION['add']="<div class'SUCCESS'>Food Added Successfully</div>";
                        //Redierct
                        header('location:'.SITEURL.'admin/manage-food.php');
                }
                else{
                    //Failed to add category
                    $_SESSION['add']="<div class'error'>Food Added Failed</div>";
                    //Redierct
                    header('location:'.SITEURL.'admin/add-food.php');

                }
          //4. Redirect with message
        }
        ?>
</div>
</div>


<?php include('partials/footer.php');?>