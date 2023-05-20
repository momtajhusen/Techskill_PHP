<?php 
 session_start();

 if(session_destroy() == true){
   echo "session destroy";
   header("location:../pages/login.php");
 }
?>