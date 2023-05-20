<?php 
 session_start();
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
    echo '<script>window.location.href = "../pages/login.php";</script>';
    exit("page not fount");
 }
 
 require("database.php");

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
 
   $message_id = mysqli_real_escape_string($db,$_POST["message_id"]);
 
   // Delete course
   $delete_message = "DELETE FROM user_message WHERE id='$message_id'";
    if ($db->query($delete_message) === TRUE) {

        echo "Success Course Delete";
    }


}

else{
    echo '<script>window.location.href = "../pages/login.php";</script>';

 }


?>
