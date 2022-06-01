<?php
   
   $conn = new mysqli($servername,$username,$password,$dbname);
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select user_nam from acces_data where user_nam = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_nam'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>

