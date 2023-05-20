<?php 
 session_start();
 require("php/database.php");
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
   echo '<script>window.location.href = "pages/login.php";</script>';
    exit("page not fount");
 }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    
      <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">



  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Animate.css -->
<link
 rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>

<!-- pia chart cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
 
  <!--.................................. CDN ..................................-->
 
<!-- JS, Popper.js, jQuery, Bootstrap.js-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/admin.css"> 
<script src="js/script.js"></script>


</head>
<body>
<!--Start Slide Bar-->
    <di class="sidebar">

       <div class="sidebar-menu text-light p-4 d-flex align-items-center align-items-center ">
           <img src="image/logo.png" alt="logo.png" width="150px;">
           <i class="fa fa-times mx-3 close-btn" style="font-size:25px;" aria-hidden="true"></i> 
        </div>

        <div class="sidebar-menu mt-5">
           <ul class="p-0">

              <a href="admin.php">
               <li class=" d-flex align-items-center" style="color:#F7546E;background: #F2F5FC;">
                  <i class="fa fa-dashboard mr-2" style="font-size:18px;"></i>  Dashboard 
               </li>
             </a> 

             <a href="upload_course.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-upload mr-2" style="font-size:18px;"></i>  Upload Course
               </li>
             </a> 

             <a href="course.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-play-circle mr-2" style="font-size:18px;"></i>  All Course 
               </li>
             </a> 

             <a href="pages/signup_user.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-users mr-2" style="font-size:18px;"></i>  Users 
               </li>
             </a> 

             <a href="pages/user_message.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-envelope-o mr-2" style="font-size:18px;"></i>  Users Messages
               </li>
             </a> 

             <a href="pages/transaction.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-money mr-2" style="font-size:18px;"></i> Transaction
               </li>
             </a> 

             <a href="pages/profile.php">
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
          <span>Dashboard</span>   
        </div>

        <div class="admin-pic-box px-3 justify-content-end align-items-center">
        <a href="pages/profile.php"><img src="image/admin.png" height="50px" alt=""></a>
        </div>

    </header>
    <?php
    
      // Total Course
      $total_course= "SELECT COUNT(course_id) AS course_no FROM course";
      $total_course_data = $db->query($total_course);
      $no_course = $total_course_data->fetch_assoc();

      // Total payment
      $total_enroll_user= "SELECT COUNT(id) AS payment FROM user_payment";
      $enroll_user_data = $db->query($total_enroll_user);
      $enroll_user = $enroll_user_data->fetch_assoc();

      // Total Signup User
      $total_signup_user= "SELECT COUNT(email) AS signup_no FROM signup_user";
      $signup_user_data = $db->query($total_signup_user);
      $signup_user = $signup_user_data->fetch_assoc();

      // Total user message
      $total_user_message = "SELECT COUNT(id) AS message_no FROM user_message";
      $user_message_data = $db->query($total_user_message);
      $user_message = $user_message_data->fetch_assoc();

      // Total user comments
      $total_user_comment = "SELECT COUNT(id) AS comment_no FROM user_query";
      $user_comment_data = $db->query($total_user_comment);
      $user_comment = $user_comment_data->fetch_assoc();


      // Total Transaction Money
      $result = mysqli_query($db, 'SELECT SUM(pay_amount) AS value_sum FROM user_payment'); 
      $row = mysqli_fetch_assoc($result); 
      $total_money = $row['value_sum'];

            
    
    ?>
 
        <div class="row m-0 px-4 d-flex justify-content-around align-items-center content-box">

        <a href="course.php" class="col-12 content-menu animate__animated animate__zoomIn m-3 col-md-3 d-flex align-items-center justify-content-center ">
                 <div class="d-flex w-50 align-items-center justify-content-center flex-column">
                    <h3><?php echo $no_course['course_no'];?></h3>
                    <p>Total Course</p>
                 </div>
                <div class="d-flex w-50 align-items-center justify-content-center">
                    <i class="fa fa-book mr-2" style="font-size:30px;color:#F7546E;"></i>
                </div>
            </a>

            <a href="pages/transaction.php" class="col-12 content-menu animate__animated animate__zoomIn m-3 col-md-3 d-flex align-items-center justify-content-center">
                 <div class="d-flex w-50 align-items-center justify-content-center flex-column">
                    <h3><?php echo $enroll_user['payment'];?></h3>
                    <p>Transaction</p>
                 </div>
                <div class="d-flex flex-column w-50 align-items-center justify-content-center">
                    <i class="fa fa-money mr-2" style="font-size:30px;color:#F7546E;"></i>
                    <span><?php echo $total_money; ?></sapn>
                </div>
            </a>

            <a href="pages/signup_user.php" class="col-12 animate__animated animate__zoomIn content-menu m-3 col-md-3 d-flex align-items-center justify-content-center">
                 <div class="d-flex w-50 align-items-center justify-content-center flex-column">
                    <h3><?php echo $signup_user['signup_no']; ?></h3>
                    <p>Signup User</p>
                 </div>
                <div class="d-flex w-50 align-items-center justify-content-center">
                   <i class="fa fa-users mr-2" style="font-size:30px;color:#F7546E;"></i>
                </div>
            </a>

            <a href="pages/user_message.php" class="col-12 content-menu animate__animated animate__zoomIn m-3 col-md-3 d-flex align-items-center justify-content-center">
                 <div class="d-flex w-50 align-items-center justify-content-center flex-column">
                    <h3><?php echo $user_message['message_no'];?></h3>
                    <p>User Message</p>
                 </div>
                <div class="d-flex w-50 align-items-center justify-content-center">
                    <i class="fa fa-envelope-o mr-2" style="font-size:30px;color:#F7546E;"></i>
                </div>
            </a>

            <a href="pages/user_comment.php" class="col-12 animate__animated animate__zoomIn content-menu m-3 col-md-3 d-flex align-items-center justify-content-center">
                 <div class="d-flex w-50 align-items-center justify-content-center flex-column">
                    <h3><?php echo $user_comment['comment_no']; ?></h3>
                    <p>Comment</p>
                 </div>
                <div class="d-flex w-50 align-items-center justify-content-center">
                   <i class="fa fa-comments mr-2" style="font-size:30px;color:#F7546E;"></i>
                </div>
            </a>

            <a href="#" class="col-12 animate__animated animate__zoomIn content-menu m-3 col-md-3 d-flex align-items-center justify-content-center">
                 <div class="d-flex w-50 align-items-center justify-content-center flex-column">
                    <h3><?php echo $signup_user['signup_no']; ?></h3>
                    <p>Test Upload</p>
                 </div>
                <div class="d-flex w-50 align-items-center justify-content-center">
                   <i class="fa fa-file-text mr-2" style="font-size:30px;color:#F7546E;"></i>
                </div>
            </a>


 
        </div>

<!--Start Chart container  -->
<div class="w-100">
   <div class="row">
      <div class="col-6">
          <!--Start Pia Chart  -->
            <canvas id="myChart"  style="width:100%;max-width:600px"></canvas>

            <script>
            var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
            var yValues = [55, 49, 44, 24, 15];
            var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
            ];

            new Chart("myChart", {
            type: "doughnut",
            data: {
               labels: xValues,
               datasets: [{
                  backgroundColor: barColors,
                  data: yValues
               }]
            },
            options: {
               title: {
                  display: true,
                  text: "World Wide Wine Production 2018"
               }
            }
            });
            </script>
            <!--End pia chart  -->
      </div>

      <div class="col-6">sddsf</div>
   </div>
</div>
<!--End Chart container  -->

 



</div>
<!--End Main Container-->

</body>
</html>