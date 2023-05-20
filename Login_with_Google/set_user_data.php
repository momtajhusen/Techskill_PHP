<?php 
 require("../admin/php/database.php");
 session_start();

//Include Configuration File
include('config.php');

if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']) && !empty($data['family_name']) && !empty($data['email']) && !empty($data['picture']))
  {
    $user_first_name = $data['given_name'];
    $user_last_name = $data['family_name'];
    $user_email = $data['email'];
    $user_gender = $data['gender'];
    $user_picture = $data['picture'];
    $_SESSION['user_email_address'] = $user_email;


           // Check email for login
           $email_check = "SELECT email FROM signup_user WHERE email='$user_email'";
           $result = $db->query($email_check);
           if ($result->num_rows == 0){
                 $user_password = time();

                // insert new user 
                $signup = "INSERT INTO signup_user (first_name, last_name, email, password, user_pic, verify_status, verify_code)
                VALUES ('$user_first_name', '$user_last_name', '$user_email', '$user_password', '$user_picture', 'Active', '293020')";
                if ($db->query($signup) === TRUE) {
                    $_SESSION['account_gmail'] = $user_email;
                    $_SESSION["account_name"] = $user_first_name;
                    $_SESSION["last_name"] = $user_last_name;
                    echo '<script>window.location.href = "../index.php";</script>';
                } 
                
                else {
                    echo '<script>window.location.href = "../pages/login.php";</script>';
                }

           }

           else{
                $_SESSION['account_gmail'] = $user_email;
                $_SESSION["account_name"] = $user_first_name;
                $_SESSION["last_name"] = $user_last_name;
                echo '<script>window.location.href = "../index.php";</script>';
           }
  }
 
  else{
     echo '<script>window.location.href = "../pages/login.php";</script>';
    exit("page not fount");
  }
 }

}



?>