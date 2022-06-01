

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="forms.css">
    <style>
        body{
  background-color:grey;
}     
    </style>
</head>
<body>
<div class="sidebar">
  <a href="index.php">Home</a>
  <a href="manage-admin.php" >Admin</a>
  <a href="manage-canteen.php">Canteen</a>
  <a href="manage-food.php">Food</a>
  <a href="inbox.php" class="active">Inbox</a>
  <a href="manage-order.php">Orders</a>
  <a href="logout.php">Log Out</a>
</div>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasebname = "online-food-order";
        $conn = new mysqli($servername,$username,$password,$databasebname);

        $fetc = "SELECT * FROM contact_us";
        $result = $conn->query($fetc);

        if ($result->num_rows > 0) {
            echo "<div class='content'>";
            echo "<table border='1' align='center'>
                <tr>
                <th colspan='8'><h1 align='center'>Contact List</h1></th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Email Id</th>
                    <th>Time</th>
                    </tr>";
            // output data of each row 
            //full_name, mob_no, email_id, age, gender, blood_group, Addres, messages
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td rowspan='2'>" . $row["id"]. "</td>
                    <td>" . $row["your_name"]. "</td>
                    <td>" . $row["your_no"]. "</td>
                    <td>" . $row["email_address"]. "</td>
                    <td>" . $row["msg_time"]. "</td>
                    </tr>
                    <tr>
                    <td colspan='4'> Message: " . $row["msg"]. "</td>
                    </tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        else {
            echo "0 results";
        }


    ?>
     <div class="clearfix"></div>
</body>
</html>

