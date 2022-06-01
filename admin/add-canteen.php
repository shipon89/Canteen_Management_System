<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Canteen</h1>
        <br> <br>

        <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
        
        ?>
        <br> <br>
        <!--Start Add Canteen-->
        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Canteen title">
                </td>
            </tr>
            <tr>
                <td>Location:</td>
                <td>
                    <input type="text" name="location" placeholder="Canteen location">
                </td>
            </tr>

            <tr>
                <td>Select Image:</td>
                <td>
                    <input type="file" name="image" >
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
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Canteen" class="btn-secendary">
                </td>
            </tr>
        </table>
        </form>

        <!--End Add Canteen-->
        <?php
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                $title=$_POST['title'];
                $location=$_POST['location'];
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

                //check whether the query executed or not and save the value for image acordingly
                    //print_r($_FILES['image']);
                    //die(); //break the code
                    if(isset($_FILES['image']['name']))
                    {
                        $image_name=$_FILES['image']['name'];

                        //upload the image if file is selected
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
                                header('location:'.SITEURL.'admin/add-canteen.php');
                                //Stop process
                                die();
                            }
                      }
                    }
                    else
                    {
                        $image_name="";
                    }

                $sql="INSERT INTO canteen_table SET
                    title='$title',
                    location='$location',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";

                //3.Execute the query and save in database
                $res=mysqli_query($conn, $sql);
                if($res==true)
                {
                        //Query executed and Category Added
                        $_SESSION['add']="<div class'SUCCESS'>Canteen Added Successfully</div>";
                        //Redierct
                        header('location:'.SITEURL.'admin/manage-canteen.php');
                }
                else{
                    //Failed to add category
                    $_SESSION['add']="<div class'error'>Canteen Added Failed</div>";
                    //Redierct
                    header('location:'.SITEURL.'admin/add-canteen.php');

                }
            }
            
        ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>