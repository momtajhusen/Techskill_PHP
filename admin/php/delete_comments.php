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
 
   $comment_id = mysqli_real_escape_string($db,$_POST["comment_id"]);
 
   // Delete course
   $delete_course = "DELETE FROM user_query WHERE id='$comment_id'";
    if ($db->query($delete_course) === TRUE) {

        echo "Success Course Delete";
    }


}

else{
    echo '<script>window.location.href = "../pages/login.php";</script>';

 }


?>
