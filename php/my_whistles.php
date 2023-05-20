<?php 
 require("../admin/php/database.php");
 session_start();

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
 
$user_email =  htmlspecialchars($_POST['user_email']);
$course_id =  htmlspecialchars($_POST['course_id']);
$course_name =  htmlspecialchars($_POST['course_name']);
$course_about = htmlspecialchars($_POST['course_about']);
$poster =  htmlspecialchars($_POST['poster']);
$prize =  htmlspecialchars($_POST['prize']);


// insert new user 
$insert_date = "INSERT INTO user_whistles (user_email, course_id, course_name, course_about, course_poster, course_prize)
VALUES ('$user_email', '$course_id', '$course_name', '$course_about', '$poster', '$prize')";
if ($db->query($insert_date) === TRUE) {

    echo "success";
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