<?php
 require("database.php");
 session_start();

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
 
   $email = htmlspecialchars($_POST["email"],ENT_QUOTES);
   $password = htmlspecialchars($_POST["password"],ENT_QUOTES);



          // Check email for login
          $email_check = "SELECT email FROM admin WHERE email='$email'";
          $result = $db->query($email_check);
          if ($result->num_rows != 0){

              // Check password for login
              $password_check = "SELECT password FROM admin WHERE binary password='$password'";
              $result = $db->query($password_check);
              if ($result->num_rows != 0){
                $_SESSION["admin_login"] = $email;
                 

                echo "Login Success"; 
              }

              else{
                echo "Incrroct password";
              }
             
          }

          else{
            echo "Incrroct Email";
          }

 

}

else{
  echo '<script>window.location.href = "../admin.php";</script>';

}

?>


