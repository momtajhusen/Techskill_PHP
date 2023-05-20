<?php
 session_start();
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
    echo '<script>window.location.href = "../pages/login.php";</script>';
    exit("page not fount");
 }
 
 require("database.php");
 
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
  $user_email =  $_POST['user_email'];

  $course = "SELECT * FROM user_enroll WHERE email='$user_email'"; 
  $get_course_response = $db->query($course);
while($all_course = $get_course_response->fetch_assoc())
{

   $course_name = $all_course['course_name'];
   $time = $all_course['time'];
   $poster = $all_course['poster'];
   $pay_prize = $all_course['pay_rize'];

   $date = date_create($time);
   $buy_time = date_format($date, 'M-d-Y h:i:s');

   echo  '
   <div class="p-2 lg:w-1/2 md:w-1/2 w-full">
   <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;overflow:hidden">
      <img alt="team" class="w-20 h-20 bg-gray-100 object-cover object-center flex-shrink-0 mr-4" src="../../'.$poster.'">
                                                                                            
     <div class="flex-grow">
       <div style="height:45px;overflow:hidden;">
         <h5 class="text-gray-900 title-font font-medium">'.$course_name.'</h5>
       </div>
       <p class="text-gray-500">'.$buy_time.'</p>
       <div class="d-flex align-items-center justify-content-start">
       <p class="text-gray-500">
         Pay Rs : '.$pay_prize.'  
       </p>
      </div>
     </div>
   </div>
 </div>
   ';
}
 }

 else{
  echo '<script>window.location.href = "../pages/login.php";</script>';
 }


?>