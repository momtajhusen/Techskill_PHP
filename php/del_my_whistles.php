<?php 
 require("../admin/php/database.php");
 session_start();
 if($_SERVER['REQUEST_METHOD'] == "POST")
 { 
$user_email =  htmlspecialchars($_POST['user_email'],ENT_QUOTES);
$course_id =  htmlspecialchars($_POST['course_id'],ENT_QUOTES);


// sql to delete a record
$data_dele = "DELETE FROM user_whistles WHERE user_email='$user_email' AND course_id='$course_id'";

if ($db->query($data_dele) === TRUE) {

      // Total Enroll User
      $total_lecture= "SELECT COUNT(course_name) AS course_no FROM user_whistles WHERE user_email='$user_email'";
      $lecture_data = $db->query($total_lecture);
      $details_lecture = $lecture_data->fetch_assoc();
      $course_lecture = $details_lecture['course_no'];

  echo $course_lecture;
} 

else {
  echo "Please Try";
}

 }

 else{
  echo '<script>window.location.href = "../index.php";</script>';
  exit("page not fount");
}

 
 

 

 ?>