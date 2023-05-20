<?php
 session_start();
require("../admin/php/database.php");
if(isset($_SESSION['signup_gmail']))    
{
   echo "";
}

else
{
  echo '<script>window.location.href = "../pages/login.php";</script>';
   exit("page not fount");
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
 $code = base64_decode(htmlspecialchars($_POST['code']));
 $gmail = base64_decode(htmlspecialchars($_POST['email']));
 
        // Check Exist email
        $code_check = "SELECT verify_code FROM signup_user WHERE email='$gmail' AND verify_code='$code'";
        $result = $db->query($code_check);
        if ($result->num_rows != 0) {
        
            $update_verify = "UPDATE signup_user SET verify_status='Active' WHERE email='$gmail' AND verify_code='$code'";
            if ($db->query($update_verify) === TRUE) {
                unset($_SESSION['signup_gmail']);
                $_SESSION["account_gmail"] = $gmail;

                      //Get User Name
                    $user_name = "SELECT * FROM signup_user WHERE email='$gmail'";
                    $name_response = $db->query($user_name);
                    $name_data = $name_response->fetch_assoc();
                    $first_name = $name_data['first_name'];
                    $last_name = $name_data['last_name'];
                    $_SESSION["account_name"] = $first_name;
                    $_SESSION["last_name"] = $last_name;

               echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }
            
        }

        else{
            echo "Wrong code";
        }
 
    }

    else{
        echo '<script>window.location.href = "../pages/login.php";</script>';
        exit("page not fount");   
    }

 
?>

 