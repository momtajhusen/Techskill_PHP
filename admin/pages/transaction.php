<?php 
 session_start();
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
   echo '<script>window.location.href = "login.php";</script>';
    exit("page not fount");
 }
 require("../php/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Transaction</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<!--.................................. CDN ..................................-->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- JS, Popper.js, jQuery, Bootstrap.js-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- fa fa-icon Font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Animate.css -->
<link
 rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

<!--  Tailwind CSS CDN-->
<script src="https://cdn.tailwindcss.com"></script>
 
  <!--.................................. CDN ..................................-->
 
<link rel="stylesheet" href="../css/admin.css"> 
<script src="../js/script.js"></script>

<style>
 .like-course:hover {
  color: red;
}

.enroll-course:hover {
  color: #17A2B8;
}
</style>


</head>
<body>
<!--Start Slide Bar-->
    <di class="sidebar">

       <div class="sidebar-menu text-light p-4 d-flex align-items-center align-items-center ">
           <img src="../image/logo.png" alt="logo.png" width="150px;">
           <i class="fa fa-times mx-3 close-btn" style="font-size:25px;" aria-hidden="true"></i> 
        </div>

        <div class="sidebar-menu mt-5">
           <ul class="p-0">

              <a href="../admin.php">
               <li class="d-flex align-items-center" style="color:white;">
                  <i class="fa fa-dashboard mr-2" style="font-size:18px;"></i>  Dashboard 
               </li>
             </a> 

             <a href="../upload_course.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-upload mr-2" style="font-size:18px;"></i>  Upload Course
               </li>
             </a> 

             <a href="../course.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-play-circle mr-2" style="font-size:18px;"></i>  All Course 
               </li>
             </a> 

             <a href="signup_user.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-users mr-2" style="font-size:18px;"></i>  Users 
               </li>
             </a>
             
             <a href="user_message.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-envelope-o mr-2" style="font-size:18px;"></i>  Users Messages
               </li>
             </a>

             <a href="transaction.php">
               <li class=" d-flex align-items-center" style="color:#F7546E;background: #F2F5FC;">
                  <i class="fa fa-money mr-2" style="font-size:18px;"></i> Transaction
               </li>
             </a> 

             <a href="profile.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-user-circle-o mr-2" style="font-size:18px;"></i>  Accounts
               </li>
             </a> 
 

           </ul>
        </div>

    </di>
<!--End Slide Bar-->  



<!--Start Main Container-->
<div class="main-content">
    <header class="mb-4">
        <div class="header-title d-flex align-items-center pl-3">
          <i class="fa fa-bars mx-3 menu-btn" style="font-size:25px;" aria-hidden="true"></i> 
          <span>Transaction</span>   
        </div>

        <div class="admin-pic-box px-3 justify-content-end align-items-center">
        <a href="profile.php"><img src="../image/admin.png"  alt="admin.png" style="height:50px;"></a>
        </div>

    </header>
 
    <table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">SN.</th>
      <th scope="col">User</th>
      <th scope="col">Buying Course</th>
      <th scope="col">Bank_name</th>
      <th scope="col">Pay Amount</th>
      <th scope="col">TXN Status</th>
      <th scope="col">My Course</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

  <?php 
               require("../php/database.php");

               // Course Details Reteive
                $course = "SELECT * FROM user_payment order by order_date DESC"; 
                $get_course_response = $db->query($course);

                $count = 1;
                while($all_course = $get_course_response->fetch_assoc())
                {
                   $user_email = $all_course['user_email'];
                   $course_name = $all_course['course_id'];
                   $pay_amount = $all_course['pay_amount'];
                   $bank = $all_course['bank_name'];
                   $pay_status = $all_course['pay_status'];
                   $buy_date = $all_course['order_date'];

                   $sn_no = $count++;
                   

                   // Check my course in user account
                    $email_check = "SELECT course_id FROM user_enroll WHERE email='$user_email' AND course_id='$course_name'";
                    $result = $db->query($email_check);
                    if ($result->num_rows != 0){
                      $avable = "Avable";
                    }

                    else{
                      $avable = "<span class='text-danger btn'>No Avable</span>";
                    }

                   echo '<tr>
                   <th scope="row">'.$sn_no.'</th>
                   <td>'.$user_email.'</td>
                   <td>'.$course_name.'</td>
                   <td>'.$bank.'</td>
                   <td>₹ : '.$pay_amount.'</td>
                   <td>'.$pay_status.'</td>
                   <td>'.$avable.'</td>
                   <td>'.$buy_date.'</td>
                 </tr>';
                }
 
    
          
          ?>
 
  </tbody>
  
</table>


 
</div>
<!--End Main Container-->
 
</body>
</html>