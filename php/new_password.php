<?php 
 session_start();
 if(isset($_SESSION['password_verify']))    
 {
    echo "";
 }
 
 else
 {
   echo '<script>window.location.href = "../index.php";</script>';
    exit("page not fount");
 }
  
 $email = $_SESSION["password_verify"];

 require("../admin/php/database.php");


 if($_SERVER['REQUEST_METHOD'] == "POST")
 {

      $password = htmlspecialchars($_POST["password"],ENT_QUOTES);
 
      $update_verify = "UPDATE signup_user SET password='$password' WHERE email='$email'";
      if ($db->query($update_verify) === TRUE) {
          unset($_SESSION['password_verify']);
          $_SESSION["account_gmail"] = $email;

                //Get User Name
              $user_name = "SELECT * FROM signup_user WHERE email='$email'";
              $name_response = $db->query($user_name);
              $name_data = $name_response->fetch_assoc();
              $first_name = $name_data['first_name'];
              $last_name = $name_data['last_name'];
              $_SESSION["account_name"] = $first_name;
              $_SESSION["last_name"] = $last_name;

         echo "change success";
      } else {
          echo "Retry";
      }
 
 }

 else{
   echo '<script>window.location.href = "../index.php";</script>';
 }

 ?>