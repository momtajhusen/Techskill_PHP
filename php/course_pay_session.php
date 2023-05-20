<?php 
  session_start();
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
  $course_id =  htmlspecialchars($_POST['course_id'],ENT_QUOTES);

  $sesion_set = $_SESSION['course_buy'] = $course_id; 

 if (isset($sesion_set)) {
    echo "session set";
  }

 else{
    echo "session not set";
 }
}

else{
   echo '<script>window.location.href = "../index.php";</script>';
   exit("page not fount");
}

//   header("location:../index.php");
//    echo $course_id;

?>
