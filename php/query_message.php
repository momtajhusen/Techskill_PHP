<?php 
 require("../admin/php/database.php");
 session_start();


 

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {


    $user_name = $_SESSION['account_name'];
    $full_name = $_SESSION['account_name'].' '.$_SESSION['last_name'];
    $user_email = $_SESSION['account_gmail'];
    $course_id = $_SESSION['course_click'];


   $message = htmlspecialchars($_POST["message"],ENT_QUOTES);
 

    // insert new user 
    $signup = "INSERT INTO user_query (user, name, query_message, course_id)
    VALUES ('$user_email', '$full_name', '$message', '$course_id')";
    if ($db->query($signup) === TRUE) {
        echo "Send success";
    }

    else{
        echo "Send fails"; 
    }
 


 }

 else{
    echo '<script>window.location.href = "../index.php";</script>';

 }

 ?>