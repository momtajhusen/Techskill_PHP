<?php 
 session_start();
 $_SESSION["on_page"] = "profile.php";
 unset($_SESSION['course_click']);
 unset($_SESSION['course_buy']);
 require("../admin/php/database.php");
 if(isset($_SESSION['account_gmail']))    
 {
    $user_email = $_SESSION['account_gmail'];
 }
 
 else
 {
   echo '<script>window.location.href = "index.php";</script>';
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


<style>
     a{
  text-decoration: none;
  color:black;
}

   a:hover{
  text-decoration: none;
  color:black;
}

</style>
  
</head>

<body oncontextmenu="return false">
    <!-- Empety Header-->
<div class="empty-header"></div>
    <div class="p-3 d-md-none d-flex text-light  justify-content-between align-items-center" style="font-size:18px;background:#03386F;">
        <a href="../index.php"> <b class="text-light"><i class="fa fa-angle-left mr-3" aria-hidden="true"></i>Profile</b></a>
        <a href="#" class="logout-btn"> <b class="text-light"><i class="fa fa-sign-out ml-3 text-light" style="font-size:25px;" aria-hidden="true"></i></b></a>
    </div> 

<?php 
   $user_name = "SELECT * FROM signup_user WHERE email='$user_email'";
   $name_response = $db->query($user_name);
   $name_data = $name_response->fetch_assoc();

   $gmail = $name_data['email'];
   $first_name = $name_data['first_name'];
   $last_name = $name_data['last_name'];
   $user_pic = $name_data['user_pic'];

?>
<!-- Logout conform Box-->
<div class="d-none logout-box justify-content-center align-items-center" style="width:100%; height:250px;position:absolute;top:40%;z-index:100;">
   <div class="d-flex bg-light justify-content-start flex-column" style="height:200px;width:370px;border-radius:20px;overflow:hidden;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
     <h5 class="p-3 text-light d-flex justify-content-center align-items-center" style="background:#03386F;">TechSkill</h4>  

     <div class="d-flex py-1 justify-content-around align-items-center flex-column">
         <h6 style="font-family:sans-serif;font-weight:bold;"><?php echo $first_name; ?></h6>
         <p>Are You Sure You Want to Logout ?</p>
     </div>

     <div class="d-flex justify-content-around align-items-center">
        <a href="../php/logout.php"><div class="yes-btn p-2 px-5 w-25 rounded d-flex justify-content-center text-light" style="border:1px solid #03386F;background:#03386F;font-weight:bold;font-family:sans-serif;cursor:pointer;">Yes</div></a>
        <div class="cancle-btn p-2 px-5 w-25 rounded d-flex justify-content-center" style="border:1px solid #03386F;font-weight:bold;font-family:sans-serif;cursor:pointer;">Cancle</div>
     </div>

   </div>
</div>


<!-- Profile Box-->
<div class="w-100 d-flex justify-content-center align-items-center">
<div class="d-flex my-2 border border-3 justify-content-center align-items-center flex-column" style="height:100%;width:95%">
    <div class="m-4 d-flex justify-content-center align-items-center" style=" border-radius: 100px; width:150px; height:150px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;overflow:hidden;">
        <img src="<?php echo $user_pic; ?>" width="100%" />
    </div>
    <h4 class="mb-2"><?php echo $first_name.' '.$last_name; ?></h4>
    <h6 class="mb-3"><?php echo $gmail; ?></h6>
</div>
</div>

<!-- My Course-->
<div class="w-100 py-2 px-3 d-flex justify-content-between align-items-start" style="height:auto;">

<a href="my_course.php" class="border border-3 rounded animate__animated profile-menu-btn" style="width:45%;height:40px;">
  <div class="font-weight-bold w-100 h-100 d-flex justify-content-start align-items-center" style="cursor:pointer;font-size:11px;">
  <i class="fa fa-play-circle mx-3" style="font-size:17px;" aria-hidden="true" style="cursor:pointer"></i> <span>My Courses</span>
  </div>
</a>
 
<a href="my_whistles.php" class="border border-3 rounded animate__animated profile-menu-btn" style="width:45%;height:40px;">
  <div class="font-weight-bold w-100 h-100 d-flex justify-content-start align-items-center" style="cursor:pointer;font-size:11px;">
  <i class="fa fa-heart mx-3" style="font-size:15px;" aria-hidden="true" style="cursor:pointer"></i> <span>My Whistles</span>
  </div>
</a>

</div>

<div class="w-100 py-2 px-3 d-flex justify-content-between align-items-start" style="height:auto;">

<a href="contact_us.php" class="border border-3 rounded animate__animated profile-menu-btn" style="width:45%;height:40px;">
  <div class="font-weight-bold w-100 h-100 d-flex justify-content-start align-items-center" style="cursor:pointer;font-size:11px;">
  <i class="fa fa-question-circle mx-3" style="font-size:17px;" aria-hidden="true" style="cursor:pointer"></i> <span>Contact Us</span>
  </div>
</a>
 
 <a href="about.php" class="border border-3 rounded animate__animated profile-menu-btn" style="width:45%;height:40px;">
  <div class="font-weight-bold w-100 h-100 d-flex justify-content-start align-items-center" style="cursor:pointer;font-size:11px;">
  <i class="fa fa-info-circle mx-3" style="font-size:17px;" aria-hidden="true" style="cursor:pointer"></i> <span>About TechSkill</span>
  </div>
</a>

</div>
 

<!-- App Bootom Menu -->
<div class="buttom-menu position-fixed d-flex  justify-content-center align-items-center" style="height:80px; width:100%; z-index:100; position:absolute;bottom:0px;">
<div class="d-flex text-light justify-content-around align-items-center" style="width:90%;height:70%;border-radius:20px;background:#03386F;box-shadow:0px 0px 5px 2px black;">
    <a class="menu-btn" href="../index.php" style="text-decoration: none;color:white;border-radius:10px;"><span><i class="fa fa-home" aria-hidden="true" style="font-size:17px;"></i></span></a>
    <a class="menu-btn" href="my_course.php" style="text-decoration: none;color:white;border-radius:10px;"><i class="fa fa-play-circle" aria-hidden="true" style="font-size:17px;"></i></i></a>
    <a class="menu-btn" href="share.php" style="text-decoration: none;color:white;border-radius:10px;"><i class="fa fa-share-alt" aria-hidden="true" style="font-size:17px;"></i></a>
    <a class="menu-btn p-2 px-3 bg-light" href="profile.php" style="text-decoration:none;color:#03386F;border-radius:10px;"><i class="fa fa-user" aria-hidden="true" style="font-size:17px;"></i> Profile</a>
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

// Logout click Show logout conform box 
$(document).ready(function(){
  $(".logout-btn").click(function(){
    $(".logout-box").addClass("d-flex");
    $(".logout-box").removeClass("d-none");
  });
});

// cancle 
$(document).ready(function(){
  $(".cancle-btn").click(function(){
    $(".logout-box").removeClass("d-flex");
    $(".logout-box").addClass("d-none");
  });
});

 // remove thise page on mobile
 $(window).resize(function(){
  var width = $(window).width(); 

  if ((width >= 768  )) {
    window.location.href = "pc/profile.php";
}
});

$(document).ready(function(){
  $(".profile-menu-btn").each(function(){
    $(this).click(function(){
      $(this).addClass("animate__pulse");
      $(this).css({"background-color":"black","color":"white"});
    });
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
</script>
   
</html>