<?php 
 session_start();
 $_SESSION["on_page"] = "my_course.php";
 unset($_SESSION['course_click']);
 unset($_SESSION['course_buy']);
 if(isset($_SESSION['account_gmail']))    
 {
    $user_email = $_SESSION['account_gmail'];
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tech Skill</title>
    <!-- title icon -->
    <link rel = "icon" href ="../image/title.jpg" type = "image/x-icon">
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



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">

 
<link rel="stylesheet" href="css/mediaquery.css"> 

<style>


<style>
     a:hover{
  text-decoration: none;
  color:black;
}

a:hover{
  text-decoration: none;
  color:black;
}
   a{
  text-decoration: none;
  color:black;
}

.paid-img{
      width:45px;
      position: absolute;
      right:-7.5px;
  }

.ratings i {
    color: #827A78;
    font-size: 10px
}

.rating-color {
    color: #fbc634 !important
}
</style>
  
</head>
<?php 
    require("../admin/php/database.php");
?>

<body oncontextmenu="return false">
    <!-- Empety Header-->
<div class="empty-header"></div>

<span id="user_span" user="<?php echo $user_email; ?>"></span>

    <div class="p-3 d-md-none d-flex text-light  justify-content-between align-items-center" style="font-size:18px;background:#03386F;">
        <a href="profile.php"> <b class="text-light"><i class="fa fa-angle-left mr-3" aria-hidden="true"></i>My Course</b></a>
    </div> 

<?php 
// User name Retrive
   $user_name = "SELECT * FROM signup_user WHERE email='$user_email'";
   $name_response = $db->query($user_name);
   $name_data = $name_response->fetch_assoc();

   $first_name = $name_data['first_name'];
   $last_name = $name_data['last_name'];

?>

 
<!-- My Course-->
<div class="w-100 course-result mt-2  d-flex justify-content-around align-items-center flex-column" style="height:auto;padding-bottom:90px;">

<?php
  $course = "SELECT * FROM user_enroll WHERE email='$user_email'";
  $course_data = $db->query($course);
  while($course_response = $course_data->fetch_assoc()){
     $course_name = $course_response['course_name'];
     $course_id = $course_response['course_id'];
     $course_poster = $course_response['poster'];
     $course_prize = $course_response['pay_rize'];

    echo '
    <div class="d-flex mt-3 container-video animate__animated" course_id="'.$course_id.'" style="width:92%; height:90px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;position:relative;">
<img class="paid-img" src="../image/paid.png">
   <a href="inroll.php" class="d-flex h-100 container-video" style="width:92%"> 
    <div class="h-100 d-flex justify-content-center align-items-center"  style="width:30%">
        <img src="'.'../'.$course_poster.'" alt="" height="100%;" width="100%;">
    </div>

    <div class="h-100 pb-0 d-flex justify-content-between align-items-start flex-column"  style="width:70%; overflow:hidden;">

    <div class="w-100 p-2" style="height:65%;overflow:hidden;">
        <b class="course-name m-0" style="font-size:15px;">'.$course_name.'</b>
    </div>
      
      <div class="ratings w-100 d-flex justify-content-start align-items-center" style="height:35%;"> 

      <b class="d-flex mb-1 ml-1 px-2"  style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" style="height:100%;">₹ '.$course_prize.'</b> 
      
      
    <div class="d-flex mb-1 ml-1 p-2" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        <i class="fa fa-star rating-color ml-1"></i> 
        <i class="fa fa-star rating-color ml-1"></i> 
        <i class="fa fa-star rating-color ml-1"></i> 
        <i class="fa fa-star rating-color ml-1"></i> 
        <i class="fa fa-star ml-1"></i>
      </div> 
      </div>
    </div>
  </a>

 
</div>';
  }

 
 



?>



</div>
 

<!-- App Bootom Menu -->
<div class="buttom-menu position-fixed d-flex  justify-content-center align-items-center" style="height:80px; width:100%; z-index:100; position:absolute;bottom:0px;">
<div class="d-flex text-light justify-content-around align-items-center" style="width:90%;height:70%;border-radius:20px;background:#03386F;box-shadow:0px 0px 5px 2px black;">
    <a class="menu-btn" href="../index.php" style="text-decoration: none;color:white;border-radius:10px;"><span><i class="fa fa-home" aria-hidden="true" style="font-size:17px;"></i></span></a>
    <a class="menu-btn p-2 px-3 bg-light" href="my_course.php" style="text-decoration: none; color:#03386F;border-radius:10px;"><i class="fa fa-play-circle" aria-hidden="true" style="font-size:17px;"></i></i> My Cours</a>
    <a class="menu-btn" href="share.php" style="text-decoration: none;color:white;border-radius:10px;"><i class="fa fa-share-alt" aria-hidden="true" style="font-size:17px;"></i></a>
    <a class="menu-btn" href="profile.php" style="text-decoration:none;color:white;border-radius:10px;"><i class="fa fa-user" aria-hidden="true" style="font-size:17px;"></i></a>
</div>
</div>

</body>

<script>
          // User Online offline & page Satus set.
          function updateUserStatus(){
     jQuery.ajax({
       url:'../php/user_status.php'
     });
   }

   setInterval(function(){
     if($("#user_span").attr("user") != "User not login"){
        updateUserStatus();
     }

   },2000);
   
// Sesssion set click course
$(document).ready(function(){
$(".container-video").each(function(){
  $(this).click(function(){  
    $(this).parent(".container-video").addClass("animate__pulse");
    var sesion_value = $(this).attr("course_id");
   $.ajax({
           type : "POST",
           url : "../php/course_session.php",
           data : {
             session_name : sesion_value 
           }
         });
 
  });
  
});

});

  // Menu button 
$(document).ready(function(){
   $(".menu-btn").each(function(){
      $(this).click(function(){
        $(this).addClass("px-3");
         $(".menu-btn").css({"background":"#03386F","color":"white"});
         $(this).css({"background":"white","color":"#03386F","padding":"7px"});
      });
   });
});

// Check  user Course Buy or not
$(document).ready(function(){
  var course = $(this).find(".course-name").html();
   if(course == undefined){
     $(".course-result").html('<div class="bg-light p-3 d-flex justify-content-center align-items-center flex-column" style="width:90%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">\
   <b>Your purchased course will be appear here.</b>\
   <p class="p-1">You have not bought any courses Yet.</p>\
   <a href="all_course.php" class="text-dark rounded p-3 px-5" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">Buy Now</a>\
</div>'); 
   }
});

 // remove thise page on mobile
 $(window).resize(function(){
  var width = $(window).width(); 

  if ((width >= 768  )) {
    window.location.href = "pc/my_course_pc.php";
}
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
</script>
   
</html>