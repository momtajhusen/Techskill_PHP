<?php
 require("../admin/php/database.php");
 session_start();
 if(isset($_SESSION['account_gmail']))    
{
  $user_email = $_SESSION['account_gmail'];
  $on_page = $_SESSION['on_page'];
}

else
{
  echo '<script>window.location.href = "../index.php";</script>';
   exit("page not fount");
}

 $time = time()+5;

 // (A) CHECK IF "MOBILE" EXISTS IN USER AGENT
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
$device = $isMob ? "fa-mobile-phone" : "fa-desktop" ;
$status = "UPDATE signup_user SET last_login='$time', on_page='$on_page', user_device='$device'  WHERE email='$user_email'";
 if ($db->query($status) === TRUE) {
   echo "";
 }
?>