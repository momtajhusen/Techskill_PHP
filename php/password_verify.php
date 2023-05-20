<?php
 session_start();
 require("../admin/php/database.php");
 if(isset($_SESSION['password_verify']))    
 {
    $email = $_SESSION["password_verify"];
 }
 
 else
 {
   echo '<script>window.location.href = "../index.php";</script>';
    exit("page not fount");
 }


 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
 $code = base64_decode($_POST['code']);
 $gmail = base64_decode($_POST['email']);
 
        // Check Exist email
        $code_check = "SELECT forget_code FROM signup_user WHERE email='$gmail' AND forget_code='$code'";
        $result = $db->query($code_check);
        if ($result->num_rows != 0) {
            $_SESSION["password_verify"] = $email;
            echo "Verify success";
        }

        else{
            echo "Wrong code";
        }
    }

else{
    echo '<script>window.location.href = "../index.php";</script>';   
}
 


 
?>

 