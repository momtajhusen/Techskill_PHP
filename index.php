<?php 
 session_start();
 $_SESSION["on_page"] = "index.php";
 unset($_SESSION['course_click']);
 require("admin/php/database.php");
 if(isset($_SESSION['account_gmail']))    
{  
    $user_email = $_SESSION['account_gmail'];
}

else
{
  $user_email  = "User not login";
}


if(isset($_SESSION['account_name']))    
{  
    $user_name = $_SESSION['account_name'];
    $user_name = "Sorry ".$user_name." !";

    $full_name = $_SESSION['account_name'].' '.$_SESSION['last_name'];

}

else
{
  $user_name = "";
}
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Skill</title>

    <!-- title icon -->
    <link rel = "icon" href ="image/title.jpg" type = "image/x-icon">
          
    

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

  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>

 <!-- aos animition -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 
 
<link rel="stylesheet" href="css/mediaquery.css"> 
<style>
    /* width */
::-webkit-scrollbar {
  width: 0px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #03386F;
  padding-right:10px;
  border-radius:10px; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

header{
      width:100%;
      position:fixed;
      z-index: 10;
      box-shadow: 0 8px 6px -6px black;
      transform: 0.3;

  }
 
.content{
      width:100%;
      background:red;
      float: left;
  }

  .profile{
      height:300px;
  }

  .course-box{
      border-radius:10px;
      float:left;
      margin:10px;
      box-shadow: 2px 2px 10px 1px rgba(0, 0, 0, 0.2);
      background: #0F2027;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  }

  .category-btn{
      height:60px;
      width:100%;
      background:white;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
      background:white;
      font-weight:bold;
      font-family:sans-serif;
  }

  .img-container{
      position: relative;
  }

  .paid-img{
      width:45px;
      position: absolute;
      right:-7.5px;
  }

  .search-input{
    outline:none;
    border:none;
  }

  .search-icon{
    background:#03386F;
    border-radius:5px;
  }

  .login-btn,.profile-btn{
     border:1px solid white;
     border-radius:10px;
     font-weight:bold;
     font-family:sans-serif;
   
  }

  a{
  text-decoration: none;
  color:black;
}

a:hover { 
   text-decoration: none; 
   color:black;
}

.container-video{
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.menu-btn{
  border-radius:10px;
}

.ratings i {
    color: #827A78;
    font-size: 10px
}

.rating-color {
    color: #fbc634 !important
}

.runing{
  position:absolute;
  bottom:0px;
  right:-10%;
  animation-name: example;
  animation-duration: 30s;
}

@keyframes example {
    from {
        right:-110%;
    }

    to {
      right:115%;
     }
}

/* #preloader{
  background: black url("image/preloader.gif") no-repeat center;
  background-size: 10%;
  opacity: 0.8;
  width:100%;
  height:100vh;
  z-index: 200;
  position:fixed;
  top:0px;
  left:0px; 
} */

  

</style>
 
</head>
<body oncontextmenu="return false" style="background:#ECF6FD;">

<!-- PreLoader -->
<!-- <div id="preloader"></div> -->

<!-- Header Contener-->
<header class="d-flex px-3 justify-content-between align-items-center"style="z-inddex:100;">

<a href="index.php"><img class="logo-img-pc" src="image/logo.png"></a>

   <div class="input-group d-flex justify-content-around align-items-center flex-column" style="width:400px;">
      <a href="index.php"><img class="logo-img-mobile mb-4 mt-1" src="image/logo.png" style="width:150px"></a>
      <div class="d-flex bg-light flex-column" style="overflow:hidden; border-radius: 8px;">
          <div class="d-flex justify-content-between align-items-center">
             <input placeholder="Search Course" class="search-input p-2 bg-light" type="text"><i class="fa fa-times search-cancle d-none search-icon p-2 m-2 text-light" aria-hidden="true"></i><i class="fa fa-search search-icon p-2 m-2 text-light" aria-hidden="true"></i>
          </div>
      </div>

      <!-- Search box Result-->
      <div class="search-result-box d-none py-3 bg-light justify-content-start align-items-center flex-column" style="height:auto; position:absolute; top:106%; width:95%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

      </div>
   </div>

   <div class="login_profile_box d-none d-md-block">
    <div class="">
      <a href="pages/login.php" class="login-btn p-2 px-3 bg-light " style="cursor:pointer;">Login</a> 
      <div class="profile-btn px-1 bg-light d-flex justify-content-around align-items-center" style="height:40px;cursor:pointer;"> <i class="fa fa-user mx-2" aria-hidden="true"></i> <span class="profile_span">Profile</span> <i class="fa fa-caret-down mx-2" aria-hidden="true"></i></div> 
    </div>
</div>

<div class="d-md-none"></div>

<div class="profile-btn-box d-none" style="width:175px; position:absolute;top:85px;right:15px;z-index:100;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
  <div class="bg-light w-100 d-flex justify-content-center align-items-center flex-column">
     <a href="index.php" class="p-1 w-100 profile_menu pl-2" style="background:black;color:white;">Home</a>
     <a href="pages/pc/profile.php" class="p-1 w-100 profile_menu pl-2">Profile</a>
     <a href="pages/pc/my_course_pc.php" class="p-1 w-100 profile_menu pl-2">My Course</a>
     <a href="pages/pc/my_whistles.php" class="p-1 w-100 profile_menu pl-2">My Wishlish</a>
     <a href="pages/pc/all_course.php" class="p-1 w-100 profile_menu pl-2">All Course</a>
     <a href="php/logout.php" class="p-1 w-100 profile_menu pl-2">Logout</a>
  </div>
</div>

</header>



<!-- Empety Header-->
<div class="empty-header d-md-none"></div>
 
<span id="user_span" user="<?php echo $user_email; ?>" user_name="<?php echo $user_name; ?>" full_name="<?php echo $full_name; ?>"></span>

<div class="d-none d-md-block" style="position:relative;">
   <img class="img-fluid" src="image/header.jpg" alt="">
   <div class="h-100 w-100 header-transparant" style="position:absolute;top:0px;left:0px;overflow:hidden;">
     <!-- <img class="img-fluid mb-3 runing" src="image/running.gif"> -->
  </div>
</div>
 

 
<!-- Start Carousel -->
<div class="w-100 mt-md-0 mt-3 d-flex justify-content-center align-items-center">
      <div id="carouselExampleIndicators" class="carousel carousel-box  slide bg-dark mb-3" data-ride="carousel" style="height:150px; width:350px; border-radius:10px;overflow:hidden;">
      <ol class="carousel-indicators" style="z-index:1">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="overflow:hidden;">
         <div class="carousel-item active h-100">
           <center> <img class="d-block" src="image/one.jpg" alt="First slide"> </center>
         </div>
         <div class="carousel-item">
         <center> <img class="d-block" src="image/one.jpg" alt="Second slide"> </center>
         </div>
         <div class="carousel-item">
         <center> <img class="d-block" src="image/one.jpg" alt="Third slide"> </center>
         </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <i class="fa fa-angle-left" aria-hidden="true"></i>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <i class="fa fa-angle-right" aria-hidden="true"></i>
         <span class="sr-only">Next</span>
      </a>
      </div>
</div>

<!-- End Carousel-->
   
<!-- Main Container -->
<div class="content">

    <div class="row pl-2 m-0 video-box" style="background:#ECF6FD;height:auto" >
 
        <!-- Content Container Recomented for you -->
        <div class="container-col shadow-none col-12 d-flex flex-wrap justify-content-center align-items-center" style="height:auto;position:relative;">
<!-- Start Get User Address  -->
<?php 
if(isset($_POST['lat'], $_POST['lng'])) {
  $lat = $_POST['lat'];
  $lng = $_POST['lng'];

  $url = sprintf("https://maps.googleapis.com/maps/api/geocode/json?latlng=%s,%s", $lat, $lng);

  $content = file_get_contents($url); // get json content

  $metadata = json_decode($content, true); //json decoder

  if(count($metadata['results']) > 0) {
      // for format example look at url
      // https://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452
      $result = $metadata['results'][0];

      // save it in db for further use
      echo $result['formatted_address'];

  }
  else {
      // no results returned
  }

  echo "hi".$result['formatted_address'];

}



?>

<!-- End Get User Address  -->

          <div class="recoment mb-2 d-md-none text-light position-sticky" style="top:0px;left:0px; width:100%; background:#03386F; z-index:1;"><b><i>Recommended Course For You</i></b></div>

          <div class="w-100 my-4 d-none d-md-block  d-md-flex justify-content-center align-items-center flex-column">
            <h3>Trending Technology Course on Our Sites.</h3> 
            <p>Choose a single language or technology and get job ready cetifications</p>
          </div>



            <?php 
               require("admin/php/database.php");

               // Course Details Reteive
                $course = "SELECT * FROM course LIMIT 8"; 
                $get_course_response = $db->query($course);


                while($all_course = $get_course_response->fetch_assoc())
                {
               
                   $course_name = $all_course['course_name'];
                   $course_about = $all_course['course_about'];
                   $course_id = $all_course['course_id'];
                   $course_poster = $all_course['course_poster'];
                   $course_prize = $all_course['course_prize'];

                       // Total Enroll User
                        $total_lecture= "SELECT COUNT(lecture_title) AS lecture_no FROM lecture WHERE course_id='$course_id'";
                        $lecture_data = $db->query($total_lecture);
                        $details_lecture = $lecture_data->fetch_assoc();
                        $course_lecture = $details_lecture['lecture_no'];

                       
                        if($user_email != "User not login")
                        {
                            // Check email for login
                            $check_buy = "SELECT course_id FROM user_enroll WHERE email='$user_email' AND course_id='$course_id'";
                            $result = $db->query($check_buy);
                            if ($result->num_rows != 0){
                               $url = "pages/inroll.php";
                               $btn_class = "";
                               $btn_text = "LEARN";
                               $btn_color = "bg-success";
                               
                            }

                            else{
                              $url = "#";
                              $btn_class = "buy-btn";
                              $btn_text = "ENROLL";
                              $btn_color = "bg-info";
                            }

                        }

                        else{
                          $url = "#";
                          $btn_class = "buy-btn";
                          $btn_text = "ENROLL";
                          $btn_color = "bg-info";
                        }


                        

                   echo '<div class="card container-video animate__animated m-2" course_id="'.$course_id.'" style="position:relative;">

                   <a href="pages/inroll.php">
                   <img class="paid-img" src="image/paid.png">
                   <img class="card-img-top" src="'.$course_poster.'" alt="Card image cap">

                   <div class="card-body py-2 px-2 d-flex justify-content-between align-items-center" style="height:30px;">
                   <div class="ratings"> <i class="fa fa-star rating-color">
                     </i> <i class="fa fa-star rating-color">
                     </i> <i class="fa fa-star rating-color">
                     </i> <i class="fa fa-star rating-color">
                     </i> <i class="fa fa-star"></i>
                   </div></a>
                   <i class="fa fa-heart d-none whistles-icon p-2 mt-3 " id="'.$course_id.'" course_name="'.$course_name.'" course_about="'.$course_about.'" course_poster="'.$course_poster.'" prize="'.$course_prize.'" aria-hidden="true" style="cursor:pointer;border-radius:100%;"></i>
               </div>
              
               <a href="pages/inroll.php">
               <div class="card-body py-1 px-2 d-flex  flex-column" style="height:30px;overflow:hidden;">
                <span class="card-text"><b class="course-name" style="line-height:1px;font-family:sans-serif;">'.$course_name.'</b></span>
              </div>
                 

                  
                   <div class="card-body d-none d-md-block py-1 px-2 d-md-flex  flex-column" style="height:50px;overflow:hidden;">
                     <span class="card-text" style="font-family:sans-serif;">'.$course_about.'</span>
                   </div> 

                 <div class="card-body py-1 px-2 d-none d-md-block d-md-flex justify-content-around align-items-center" style="height:50px;overflow:hidden;">
                   <span><i class="fa fa-play-circle" aria-hidden="true"></i> Videos : '.$course_lecture.'</span>
                </div>  </a>

                <div class="card-body mb-1 mb-md-3 pl-2 pl-md-3 py-3 py-md-2 prize-box d-flex justify-content-between align-items-center" style="overflow:hidden;">
                <a href="pages/inroll.php"> <b class="py-md-2">₹ '.$course_prize.'</b></a>
                <a href="'.$url.'" class="'.$btn_class.'" course_id="'.$course_id.'"> <button class="btn d-none d-md-block text-light '.$btn_color.'">'.$btn_text.'</button> </a>
                <a href="pages/inroll.php" class="d-none d-md-none"> <button class="btn-xm  btn-info">ENROLL</button> </a>
               </div>

                   </div>';
                }
 
    
          ?>

           
        </div>

        <div class="w-100 d-flex justify-content-center align-items-center">
           <a href="pages/all_course.php" class="mt-4 rounded d-md-none text-light p-2 px-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;cursor:pointer;background:#F44336;font-family:sans-serif;">
            <i class="fa fa-share" aria-hidden="true"></i> View All Courses
          </a>

          <a href="pages/pc/all_course.php" class="my-4 d-none d-md-block rounded text-light p-2 px-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;cursor:pointer;background:#F44336;font-family:sans-serif;">
            <i class="fa fa-share" aria-hidden="true"></i> View All Courses
          </a>

      </div>
        
        </div>


 
    </div>

    

</div>



<!-- App Bootom Menu -->
<div class="buttom-menu position-fixed  justify-content-center align-items-center" style="height:80px; width:100%; z-index:100; position: absolute;bottom:0px;">
<div class="d-flex px-2 text-light justify-content-around align-items-center" style="width:90%;height:70%;border-radius:20px;background:#03386F;box-shadow:0px 0px 5px 2px black;">
    <a class="menu-btn p-2 px-3 bg-light" icon="home" href="index.php" style="text-decoration: none;color:#03386F;border-radius:10px;"><i class="fa fa-home home-icon" aria-hidden="true" style="font-size:17px;"></i> Home</a>
    <a class="menu-btn play-icon-a" icon="play" href="pages/my_course.php" style="text-decoration: none;color:white;border-radius:10px;"><i class="fa fa-play-circle play-icon text-light" aria-hidden="true" style="font-size:17px;"></i></i></a>
    <a class="menu-btn" icon="share" href="pages/share.php" style="text-decoration: none;color:white;border-radius:10px;"><i class="fa fa-share-alt share-icon text-light" aria-hidden="true" style="font-size:17px;"></i></a>
    <a class="menu-btn" icon="user" id="profile" href="#" style="text-decoration: none;color:white;border-radius:10px;"><i class="fa fa-user user-icon text-light" aria-hidden="true" style="font-size:17px;"></i></a>
</div>
</div>




<!-- Footer -->
<footer class="page-footer font-small unique-color-dark" style="background-color:#1C2331;">

  <div style="background-color:#006CA8;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center" style="background-color:#006CA8;">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0 text-light">Get connected with us on social networks!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic text-light">
            <!-- <i class="fab fa-facebook-f white-text mr-4"> </i> -->
          </a>
          <!-- Twitter -->
          <a class="tw-ic text-light">
            <!-- <i class="fab fa-twitter white-text mr-4"> </i> -->
          </a>
          <!-- Google +-->
          <a class="gplus-ic text-light">
            <!-- <i class="fab fa-google-plus-g white-text mr-4"> </i> -->
          </a>
          <!--Linkedin -->
          <a class="li-ic text-light">
            <!-- <i class="fab fa-linkedin-in white-text mr-4"> </i> -->
          </a>
          <!--Instagram-->
          <a class="ins-ic text-light">
            <!-- <i class="fab fa-instagram white-text"> </i> -->
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5 ">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold text-light">TECH SKILL</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p class="text-light">Learn technical skill with techskill.</p>

      </div>
      <!-- Grid column -->

 

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold text-light">links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="index.php" class="text-light">Home</a>
        </p>
        <p>
          <a href="pages/pc/profile.php" id="profile" class="text-light">Profile</a>
        </p>
        <p>
          <a href="pages/pc/my_course_pc.php"  class="text-light">My Course</a>
        </p>
        <p>
          <a href="pages/pc/all_course.php" class="text-light">All Course</a>
        </p>

      </div>
      <!-- Grid column -->

           <!-- Grid column -->
           <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-light">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold text-light">Youtube Playlist</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!" class="text-light">Arduino Tutorial For Beginners</a>
          </p>
          <p>
            <a href="#!" class="text-light">NodeMcu Tutorial For Beginners</a>
          </p>
          <p>
            <a href="#!" class="text-light">Web Desigining Tutorial For Beginners</a>
          </p>
          <p>
            <a href="#!" class="text-light">Special Video For Developer</a>
          </p>

          </div>
          <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold text-light">Contact</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p class="text-light">
          <i class="fas fa-home mr-3"></i> Nepal Sirha, Majhuliya - 8</p>
        <p class="text-light">
          <i class="fas fa-envelope mr-3"></i> mumtaz666raza@gmail.com</p>
        <p class="text-light">
          <i class="fas fa-phone mr-3"></i> + 977 9815759505</p>
        <p class="text-light">
          <!-- <i class="fas fa-print mr-3"></i> + 01 234 567 89</p> -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text-light" style="background:#161C27;">© 2022 Copyright:
    <a href="https://mdbootstrap.com/" class="text-light">techskill.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<script>

        // User Online offline & page Satus set. 
     function updateUserStatus(){
     jQuery.ajax({
       url:'php/user_status.php',
       success:function(response){
       }
     });
   }

   setInterval(function(){
     if($("#user_span").attr("user") != "User not login"){
        updateUserStatus();
     }

   },2000);

     //Enroll Buy Now Btn
     $(document).ready(function(){
      $(".buy-btn").click(function(){
        var user_name = $("#user_span").attr("user");

        var course_id = $(this).attr("course_id");

        if(user_name != "User not login"){
          $.ajax({
            type : "POST",
            url : "php/course_pay_session.php",
            data : {
              course_id : course_id
            },
            success : function(response){
              if(response.trim() == "session set"){
                location.replace("pages/pay_method.php");
              }
            }
          });

        }

        else{
          $(".buy-btn").attr("href","pages/login.php");
        }
      });
    });
 
// Menu button 
$(document).ready(function(){
   $(".menu-btn").each(function(){
      $(this).click(function(){
        $(this).addClass("px-3");
         $(".menu-btn").css({"background-color":"#03386F","color":"white"});
         $(this).css({"background":"white","color":"#03386F","padding":"7px"});
      });

   });
});

// profile open
$(document).ready(function(){
  $("#profile").click(function(){
     var user_email = $("#user_span").attr("user");
     if(user_email != "User not login"){
       $("#profile").attr("href","pages/profile.php");
     }

     else{
      $("#profile").attr("href","pages/login.php");
     }
  });
});

// Search with oninput video request
$(document).ready(function(){
   $(".search-input").on('input', function(){
     
      $(".search-result-box").addClass("d-flex");
      $(".search-result-box").removeClass("d-none");

      $(".search-icon").addClass("d-none");
     $(".search-cancle").removeClass("d-none");

     if($(this).val() != ""){
      var search_text = $(".search-input").val();

      $.ajax({
       type:"POST",
       url:"php/search.php",
       data : {
           	 	search_text : search_text
           	 },
    /*  xhr : function(){
      var request = new XMLHttpRequest(); 
      request.onprogress = function(e){
         var loaded = (e.loaded/1024/1024).toFixed(2);
         var total = (e.total/1024/1024).toFixed(2);
         var percentage = ((loaded*100)/total).toFixed(0);
         $(".form-progress-bar").css({
         width : percentage+"%",
         });
      }
         return request;
      },*/
       success : function(response){
            var search = response;
         if(response.trim(search).match("paid-img")){
          $(".search-result-box").html(response);
         }

         else{
            var user_name = $("#user_span").attr("user_name");
            if(user_name != ""){
              user_name = "<b class='font-weight-bold mb-1'>"+user_name+"</b>";
            }

            else{
              user_name = "";
            }
            
          $(".search-result-box").html("<div class='alert-danger p-2 px-4 d-flex justify-content-center align-items-center flex-column' style='width:90%'>"+user_name+"<p class='font-weight-bold mb-1'> No matching courses Name  </p> <p>Try a diffrent search term</p></div>");
         }

          
    }
     });
     }

     else{
       $(".search-result-box").html("");
       $(".search-result-box").removeClass("d-flex");
       $(".search-result-box").addClass("d-none");
       $(".search-icon").removeClass("d-none");
       $(".search-cancle").addClass("d-none");
     }

     
   });
});

// Search with on click video request
$(document).ready(function(){
   $(".search-icon").click(function(){
     
      $(".search-result-box").addClass("d-flex");
      $(".search-result-box").removeClass("d-none");

      $(".search-icon").addClass("d-none");
     $(".search-cancle").removeClass("d-none");

      var search_text = $(".search-input").val();
      $.ajax({
       type:"POST",
       url:"php/search.php",
       data : {
           	 	search_text : search_text
           	 },
    /*  xhr : function(){
      var request = new XMLHttpRequest(); 
      request.onprogress = function(e){
         var loaded = (e.loaded/1024/1024).toFixed(2);
         var total = (e.total/1024/1024).toFixed(2);
         var percentage = ((loaded*100)/total).toFixed(0);
         $(".form-progress-bar").css({
         width : percentage+"%",
         });
      }
         return request;
      },*/
      success : function(response){
            var search = response;
         if(response.trim(search).match("paid-img")){
            $(".search-result-box").html(response);
         }

         else{
            var user_name = $("#user_span").attr("user_name");
            if(user_name != ""){
              user_name = "<b class='font-weight-bold mb-1'>"+user_name+"</b>";
            }

            else{
              user_name = "";
            }
            
          $(".search-result-box").html("<div class='alert-danger p-2 px-4 d-flex justify-content-center align-items-center flex-column' style='width:90%'>"+user_name+"<p class='font-weight-bold mb-1'> No matching courses Name  </p> <p>Try a diffrent search term</p></div>");
         }
     
    }
     });
   });
});

// serch clear 
$(document).ready(function(){
  $(".search-cancle").click(function(){
     $(".search-input").val("");
      $(".search-result-box").html("");
      $(".search-result-box").removeClass("d-flex");
      $(".search-result-box").addClass("d-none");

      $(".search-icon").removeClass("d-none");
      $(".search-cancle").addClass("d-none");
  });
});

// Sesssion set click course
$(document).ready(function(){
$(".container-video").each(function(){
  $(this).click(function(){  
   var sesion_value = $(this).attr("course_id");
   $.ajax({
           type : "POST",
           url : "php/course_session.php",
           data : {
             session_name : sesion_value 
           }
         });
 
  });
  
});

});

//// whistles course in database
$(document).ready(function(){
  $(".whistles-icon").each(function(){
    $(this).click(function(){
      if($(this).css("color") == "rgb(33, 37, 41)"){
        $(this).css({"color": "red"});

       var user_email = $("#user_span").attr("user");
       var course_id = $(this).attr("id");
       var course_name = $(this).attr("course_name");
       var course_about = $(this).attr("course_about");
       var course_poster = $(this).attr("course_poster");
       var course_prize = $(this).attr("prize");

       $.ajax({
          // add Wishlisht
           type : "POST",
           url : "php/my_whistles.php",
           data : {
            user_email : user_email,
            course_id : course_id,
            course_name : course_name,
            course_about : course_about,
            poster : course_poster,
            prize : course_prize
           }
         });
      }

      else{
        // Delete Wishlisht
        $(this).css({"color": "rgb(33, 37, 41)"});
        var user_email = $("#user_span").attr("user");
        var course_id = $(this).attr("id");
       $.ajax({
           type : "POST",
           url : "php/del_my_whistles.php",
           data : {
            user_email : user_email,
            course_id : course_id
           }
         });
      }
       
    }); 
 
  });
});

// if user not login than whistles-icon hide
$(document).ready(function(){
  var user = $("#user_span").attr("user");
  var user_full_name = $("#user_span").attr("full_name");
   if(user != "User not login"){
   
     $(".whistles-icon").removeClass("d-none");  
     $(".play-icon-a").removeClass("d-none");
     $(".profile_span").html(user_full_name);
     $(".login-btn").addClass("d-none");
    $(".profile-btn").addClass("d-flex");
    $(".profile-btn").removeClass("d-none");
     $(".whistles-icon ").each(function(){

         var course_id = $(this).attr("id");
        $.ajax({
            type : "POST",
            url : "php/check_wishlish.php",
            data : {
              user_email : user,
              course_id : course_id
            },
            success : function(response){

              let text = response.trim();
              let result = text.replace(/ /g, ", ");
             
              $(result).css("color", "red");
      
            }
          });

     });

   }

   else{
    $(".login-btn").removeClass("d-none");
    $(".profile-btn").removeClass("d-flex");
    $(".profile-btn").addClass("d-none");
    $(".whistles-icon").addClass("d-none");
    $(".play-icon-a").addClass("d-none"); 

   }
});


// Profile menu show
$(document).ready(function(){
  $(".profile-btn").click(function(){
    $(".profile-btn-box").removeClass("d-none");
  });

  $( ".header-transparant" ).mouseover(function(){
    $(".profile-btn-box").addClass("d-none");
  });
});

// Profile menu show
$(document).ready(function(){
  $(".profile_menu").hover(function(){
    $(this).css("background-color","black");
    $(this).css("color","white");
  });

  $( ".profile_menu" ).mouseout(function(){
    $(this).css("color","black");
    $(this).css("background-color","white");
  });
});

$(document).ready(function(){
  var width = $(window).width(); 
 
  if ((width >= 768  )) {
    
        $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();

        if(scroll >= "100"){
          $("header").css({"background-color": "#006CA8"});
        }

        else{
          $("header").css({"background-color": ""});
        }

        if(scroll == "500"){
          $(window).scrollTop(680);
        }

      });

  }

});

// Course container hover effect
$(document).ready(function(){
  $(".container-video, .card-body").hover(function(){
    $(this).addClass("animate__pulse"); 
    $(".card-body").removeClass("animate__pulse"); 
  },function(){
    $(this).removeClass("animate__pulse");
  });

});

// Right Click Disable
$(document).ready(function () {
   $("body").on("contextmenu",function(e){
     return false;
   });
});

// inspect element disable 
document.onkeydown=function(e){
  // f12 disable
  if(event.keyCode == 123)
  {
    return false;
  }

  // ctrl+shift+i disable
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
    return false;
  }
  // ctrl+shift+j disable
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0))
  {
    return false;
  }

  // ctrl+shift+c disable
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0))
  {
    return false;
  }
  // ctrl+u disable
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0))
  {
    return false;
  }

}

// preloader
// var loader = document.getElementById("preloader");
// setTimeout(function(){
//   document.getElementById("preloader").innerHTML = "<div class='alert-danger d-flex justify-content-between align-items-center  p-2' style='transform: 0.3;'><span>Your Network Slow</span> <button class='btn'>close</button></div>";
// }, 7000);
// window.addEventListener("load",function(){
//    loader.style.display = "none";
//   document.getElementById("preloader").innerHTML = "";

// });

</script>


</body>
</html>