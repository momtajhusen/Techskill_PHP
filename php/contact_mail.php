<?php 
 require("../admin/php/database.php");
 session_start();

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   $name = htmlspecialchars($_POST["name"],ENT_QUOTES);
   $from = htmlspecialchars($_POST["email"],ENT_QUOTES);
   $number = htmlspecialchars($_POST["number"],ENT_QUOTES);
   $message = htmlspecialchars($_POST["message"],ENT_QUOTES);
 
   $subject = 'TechSkill User';
   $to = 'mumtaz666raza@gmail.com';
    

    // insert new user 
    $insert_date = "INSERT INTO user_message (user, name, number, message)
    VALUES ('$from', '$name', '$number', '$message')";
    if ($db->query($insert_date) === TRUE) {

              // Sending email
            if(mail($to, $subject, $message)){
                echo 'Your mail has been sent successfully.'; 
            } 
            
            else{
                echo 'Unable to send email. Please try again.';
            }
    } 

    else{
        echo "unsuccess";
    }
 
 
 }

 else{
    echo '<script>window.location.href = "../index.php";</script>';
    exit("page not fount");
 }


 ?>