<?php
 require("../admin/php/database.php");
 session_start();

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
 
   $email = htmlspecialchars($_POST["email"],ENT_QUOTES);
   $password = htmlspecialchars($_POST["password"],ENT_QUOTES);



          // Check email for login
          $email_check = "SELECT email FROM signup_user WHERE email='$email'";
          $result = $db->query($email_check);
          if ($result->num_rows != 0){

              // Check password for login
              $password_check = "SELECT password FROM signup_user WHERE email='$email' AND binary password='$password'";
              $result = $db->query($password_check);
              if ($result->num_rows != 0){

                // Check user verify
                $code_check = "SELECT verify_status FROM signup_user WHERE email='$email' AND verify_status='Active'";
                $result = $db->query($code_check);
                if ($result->num_rows != 0) {
                  $_SESSION["account_gmail"] = $email;
                
                    //Get User Name
                    $user_name = "SELECT * FROM signup_user WHERE email='$email'";
                    $name_response = $db->query($user_name);
                    $name_data = $name_response->fetch_assoc();
                    $first_name = $name_data['first_name'];
                    $last_name = $name_data['last_name'];
                    $_SESSION["account_name"] = $first_name;
                    $_SESSION["last_name"] = $last_name;
                    
                    echo "Login Success"; 

                }

                else{
                    // Active Code
                    $active_code = "SELECT * FROM signup_user WHERE email='$email'";
                    $code_response = $db->query($active_code);
                    $code_data = $code_response->fetch_assoc();
                    $code = $code_data['verify_code'];

                    // Active code send on email after not match email on database
                    $header_information = "From:mumtaz666raza@gmail.com \r\nMIME-Version:1.0 \r\nContent-Type:text/html;charset=ISO-8859-1 \r\n";
                    $message = '<html>
                    <body>
                    <div style="width: 100%; height:auto; padding:20px; background: #200122;  /* fallback for old browsers */
                    background: -webkit-linear-gradient(to right, #6f0000, #200122);  /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to right, #6f0000, #200122); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      box-shadow:0px 0px 10px 0px black;">
                          <center><h1 style="color: white;">Tech Skill</h1></center>
                          <p style="margin-bottom:2px;color:white; text-align: center;">Thanks for create your account on Tech Skill</p>
                          <h3 style="margin-bottom: 4px;color:white;text-align: center;">Account Verification Code</h3>
                          <h3 style="margin-top: 4px;color:white;text-align: center;">'.$code.'</h3>
                          <hr>
                    </div>
                    </body>
                    </html>';

                          $check_mail = mail($email,"Tech Skill Active Code",$message,$header_information);

                    if($check_mail == true)
                    {
                      // insert new user
                      $_SESSION["signup_gmail"] = $email;
                      echo "user not verify";
                    }
        
                    else{
                        echo "Retry OTP Email Not Send";
                    }

                }

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
  echo '<script>window.location.href = "../index.php";</script>';
  exit("page not fount");
}

?>


