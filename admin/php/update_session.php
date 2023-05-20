<?php 
 session_start();
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
    echo '<script>window.location.href = "../admin.php";</script>';
    exit("page not fount");
 }
 
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
      $course_id =  $_POST['course_id'];
      $_SESSION["course_id"] =  $course_id;
      echo $course_id;
 }

 else{
   echo '<script>window.location.href = "../admin.php";</script>';

 }

?>