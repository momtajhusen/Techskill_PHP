<?php 
 require("../admin/php/database.php");
 session_start();

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   $first_name = htmlspecialchars($_POST["first_name"],ENT_QUOTES);
   $last_name = htmlspecialchars($_POST["last_name"],ENT_QUOTES);
   $email = htmlspecialchars($_POST["email"],ENT_QUOTES);
   $password = htmlspecialchars($_POST["password"],ENT_QUOTES);

   $pattern = "0123456789";

   $length = strlen($pattern)-1;
   $i;
   $code = [];
   
   for($i=0;$i<6;$i++)
   {
     $indexing_number = rand(0,$length);
     $code[] = $pattern[$indexing_number];
   }
   $activation_code = implode($code);

   
 
      // Check Exist email
      $email_check = "SELECT email FROM signup_user WHERE email='$email'";
      $result = $db->query($email_check);
      if ($result->num_rows == 0) {

            // Active code send on email after not match email on database
    $header_information = "From:mumtaz666raza@gmail.com \r\nMIME-Version:1.0 \r\nContent-Type:text/html;charset=ISO-8859-1 \r\n";
    $message = '<html>
    <body>
    <div style="width: 100%; height:200px; padding:20px; background: #200122;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #6f0000, #200122);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #6f0000, #200122); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
     box-shadow:0px 0px 10px 0px black;">
         <center><h1 style="color: white;">Tech Skill</h1></center>
         <p style="margin-bottom:2px;color:white; text-align: center;">Thanks for create your account on Tech Skill</p>
         <h3 style="margin-bottom: 4px;color:white;text-align: center;">Account Verification Code</h3>
         <h3 style="margin-top: 4px;color:white;text-align: center;">'.$activation_code.'</h3>
         <hr>
    </div>
    </body>
    </html>';

         $check_mail = mail($email,"Tech Skill Active Code",$message,$header_information);
        if($check_mail == true)
         {

          // insert new user 
          $signup = "INSERT INTO signup_user (first_name, last_name, email, password, verify_code)
          VALUES ('$first_name', '$last_name', '$email', '$password', '$activation_code')";
          if ($db->query($signup) === TRUE) {
              echo "SuccessFull Account Create";
              $_SESSION["signup_gmail"] = $email;
          } 
          
          else {
              echo  'Account not create cheack your form';
          }
        
      
        
         }
        
          else{
           echo "email not sent";
         }


      }

      else{
        
        echo "Already Create Account For this Email";
      }

 
 }

 else{
  echo '<script>window.location.href = "../index.php";</script>';
 }

 ?>