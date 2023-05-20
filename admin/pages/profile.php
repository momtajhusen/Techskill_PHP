 <?php 
 session_start();
 require("../php/database.php");
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
   echo '<script>window.location.href = "login.php";</script>';
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
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
 
  <!--.................................. CDN ..................................-->
 
<!-- JS, Popper.js, jQuery, Bootstrap.js-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../css/admin.css"> 
<script src="../js/script.js"></script>


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
               <li class=" d-flex align-items-center" style="color:white;">
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
                  <i class="fa fa-play-circle  mr-2" style="font-size:18px;"></i>  All Course 
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
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-money mr-2" style="font-size:18px;"></i> Transaction
               </li>
             </a> 

             <a href="profile.php">
               <li class=" d-flex align-items-center" style="color:#F7546E;background: #F2F5FC;">
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
          <span>Admin Profile</span>   
        </div>

        <div class="admin-pic-box px-3 justify-content-end align-items-center">
           <img src="image/admin.png" height="50px" alt="">
        </div>

    </header>
 
 
        <div class="row m-0 px-4 d-flex justify-content-around align-items-center content-box">
        <div class="mb-5 p-3 w-75 d-flex flex-column" style="height:500px; border-top: 4px solid black;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

<div class="row  h-100">
   

     <div class="col-3 h-100 menu-btn-box d-flex  align-items-center flex-column" style="border-right: 5px solid white;color:#7F7F7F;">
         <div class="mb-3 details d-flex justify-content-center align-items-center border border-3 rounded font-weight-bold" style="height:50px; width:170px;cursor:pointer;background:#006CA8;color:white;">MY DETAILS</div>
         <a href="my_course_pc.php"><div class="mb-3 d-flex justify-content-center align-items-center border border-3 rounded font-weight-bold" style="height:50px; width:170px;cursor:pointer;">MY COURSE</div></a> 
         <a href="../php/logout.php"><div class="mb-3 d-flex justify-content-center align-items-center border border-3 rounded font-weight-bold" style="height:50px; width:170px;cursor:pointer;">LOGOUT</div></a>
     </div>

     <div class="col-9 h-100 flex-column">

     <?php 
         $user_name = "SELECT * FROM admin";
         $name_response = $db->query($user_name);
         $name_data = $name_response->fetch_assoc();

         $gmail = $name_data['email'];
         $password = $name_data['password'];
         $first_name = $name_data['first_name'];
         $last_name = $name_data['last_name'];
       ?>

       <p class="mb-1" style="font-size:20px;">Name : <?php echo $first_name.' '.$last_name; ?></p>
       <p class="mb-1" style="font-size:20px;">Email : <?php echo $gmail; ?></p>
       <div>
         <p class="mb-1" style="font-size:20px;float:left;">Password : </p>
         <p class="password-text ml-2 mt-1" psd="<?php echo $password; ?>" style="float:left;">●●●●●●●●●</p>
         <i class="fa fa-eye ml-4 mt-2 open-eye" style="float:left;cursor:pointer;" aria-hidden="true"></i>
         <i class="fa fa-eye-slash d-none ml-4 mt-2 close-eye" style="float:left;cursor:pointer;" aria-hidden="true"></i>
       </div>
        <br>
       <a href="#"><div class="p-2 mt-2 border" style="width:150px;cursor:pointer">
          Change Password  
       </div></a>

     </div>
</div>

</div>

 
        </div>
 
</div>
<!--End Main Container-->

<script>
  // Password set
  $(document).ready(function(){
    $(".open-eye").click(function(){
      $(this).addClass("d-none");
      var password =  $(".password-text").attr("psd");
      $(".close-eye").removeClass("d-none");
      $(".password-text").html(password);
    });

    $(".close-eye").click(function(){
      $(this).addClass("d-none");
      $(".open-eye").removeClass("d-none");
      $(".password-text").html("●●●●●●●●●");
    });


  });
 
</script>

</body>
</html>