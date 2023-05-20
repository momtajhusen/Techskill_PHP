<?php 
 session_start();
 require("../admin/php/database.php");

 if(isset($_SESSION['account_gmail']))    
{
  $user_email = $_SESSION['account_gmail'];
}

else
{
  echo '<script>window.location.href = "../index.php";</script>';
   exit("page not fount");
}

 $status = "UPDATE signup_user SET on_page='Logout' WHERE email='$user_email'";
 if ($db->query( $status) === TRUE) {
    if(session_destroy() == true){
      echo "session destroy";
      header("location:../index.php");
    }
 }
 
?>