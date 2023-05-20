<?php
 require("../admin/php/database.php");
 session_start();
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   $user_email =  htmlspecialchars($_POST['user_email'],ENT_QUOTES);
   $course_id =  htmlspecialchars($_POST['course_id'],ENT_QUOTES);
   


$course = "SELECT course_id FROM user_whistles WHERE user_email='$user_email' AND course_id='$course_id'"; 
$get_course_response = $db->query($course);
while($all_course = $get_course_response->fetch_assoc())
{

   $course_name = $all_course['course_id'];
   echo "#".$course_name.' ';
}

 }

 else{
   echo '<script>window.location.href = "../index.php";</script>';
   exit("page not fount");
 }

?>