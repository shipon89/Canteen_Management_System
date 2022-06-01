<?php include('partials/menu.php');?>

<!--main content section starts-->
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Admin</h1>
        <br/> 

        <?php 
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        
        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if(isset($_SESSION['pass-not-match']))
        {
            echo $_SESSION['pass-not-match'];
            unset($_SESSION['pass-not-match']);
        }
        if(isset($_SESSION['change_pass']))
        {
            echo $_SESSION['change_pass'];
            unset($_SESSION['change_pass']);
        }
        
        ?>
        <br/> <br/> <br/>
        <!--button to add admin-->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br/> <br/>
    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <?php 
            //Query to get all Admin
            $sql ="SELECT* FROM admin_table";
            //Execute the query
            $res = mysqli_query($conn,$sql);
            //Check wether the query is Executed or not
            if($res==TRUE)
            {
                //Count rows to check whether we have data in database or not
                $count=mysqli_num_rows($res);
                $sn=1;
                //check the num of rows
                if($count>0)
                {
                    //we have data in database
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //using while loop to get all the data from database
                    //and while loop will run as long as we have data in database

                    //Get individual data
                    $id = $rows['id'];
                    $full_name = $rows['full_name'];
                    $username = $rows['username'];
                    ?>

                        <tr>
                               <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn-secendary">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a> 
                                </td>
                            </tr>
                     <?php
                    }
                }
                else {
                    # code...
                }
            }
        ?>
        
        
    </table>
    <div class="clearfix"></div>
    </div>

</div>
<!--main content section Ends-->

<?php include('partials/footer.php');?>