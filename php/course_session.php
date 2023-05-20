<?php 
 session_start();
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   $session =  htmlspecialchars($_POST['session_name'],ENT_QUOTES);
   $_SESSION["course_click"] =  $session;
 }

 else{
    echo '<script>window.location.href = "../index.php";</script>';
    exit("page not fount");
 }
?>