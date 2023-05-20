<?php 
 session_start();
 $_SESSION["on_page"] = "share.php";
 unset($_SESSION['course_click']);
 unset($_SESSION['course_buy']);
 require("../admin/php/database.php");
 if(isset($_SESSION['account_gmail']))    
{  
    $user_email = $_SESSION['account_gmail'];


}

else
{
  $user_email  = "User not login";
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min"/>



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">


<style>
    a:hover{
  text-decoration: none;
  color:black;
}
   a{
  text-decoration: none;
  color:black;
}
 
</style>
  
</head>
<body oncontextmenu="return false">
    <!-- Empety Header-->
<div class="empty-header"></div>

<span id="user_span" user="<?php echo $user_email; ?>"></span>

    <div class="p-3 d-md-none d-flex text-light  justify-content-between align-items-center" style="font-size:18px;background:#03386F;">
        <a href="../index.php"> <b class="text-light"><i class="fa fa-angle-left mr-3" aria-hidden="true"></i>Share</b></a>
    </div> 
 
 
<!-- My Course -->
<div class="w-100 mt-2 p-3 d-flex justify-content-around align-items-center flex-column" style="height:auto;">

<!-- Start Carousel -->
<div class="w-100 mt-3 d-flex justify-content-center align-items-center">
      <div id="carouselExampleIndicators" class="carousel carousel-box  slide bg-dark mb-3" data-ride="carousel" style="height:150px; width:350px; border-radius:10px;overflow:hidden;">
      <ol class="carousel-indicators" style="z-index:1">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="overflow:hidden;">
         <div class="carousel-item active h-100">
           <center> <img class="d-block" src="../image/one.jpg" alt="First slide"> </center>
         </div>
         <div class="carousel-item">
         <center> <img class="d-block" src="../image/one.jpg" alt="Second slide"> </center>
         </div>
         <div class="carousel-item">
         <center> <img class="d-block" src="../image/one.jpg" alt="Third slide"> </center>
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


<div class="mb-2 p-0 w-100">
<h5 class="mb-0 p-0 font-weight-bold" style="color:#03386F;">Tech Skill Web Link.</h5>
<p class="font-weight-bold">Copy this link and share with your friends.</p>
</div>

<div class="input-group mx-2">
  <input class="form-control" type="url" value="https://www.techskill.com/r/ba8de9" placeholder="Recipient's text" aria-label="Recipient's" style="box-shadow:none;border:2px dotted">
  <div class="input-group-append d-flex justify-content-center align-items-center flex-column">
     <a href="#" class="btn btn-primary active copy-btn" role="button" style="box-shadow:none !important;"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </a>
  </div>
</div>

<div class="p-3 w-100 d-flex justify-content-center align-items-center">
<a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" title="Share on Facebook" target="_blank"><i class="fa fa-facebook p-1 ml-2 d-flex justify-content-center align-items-center" aria-hidden="true" style="color:#4267B2;border:2px solid 	#4267B2; cursor:pointer; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius:100px; font-size:20px; height:40px; width:40px;"></i></a>
      <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share">
        <i class="fa fa-whatsapp p-1 ml-2 d-flex justify-content-center align-items-center" aria-hidden="true" style="color:#25D366;border:2px solid #25D366; cursor:pointer; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius:100px; font-size:20px; height:40px; width:40px;"></i>
        </a>

      <a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><i class="fa fa-twitter p-1 ml-2 d-flex justify-content-center align-items-center" aria-hidden="true" style="color:#1DA1F2;border:2px solid #1DA1F2; cursor:pointer; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius:100px; font-size:20px; height:40px; width:40px;"></i></a>
     
      
</div>

 

</div>

 

<!-- App Bootom Menu -->
<div class="buttom-menu position-fixed d-flex  justify-content-center align-items-center" style="height:80px; width:100%; z-index:100; position:absolute;bottom:0px;">
<div class="d-flex text-light justify-content-around align-items-center" style="width:90%;height:70%;border-radius:20px;background:#03386F;box-shadow:0px 0px 5px 2px black;">
    <a class="menu-btn" href="../index.php" style="text-decoration: none;color:white;border-radius:10px;"><span><i class="fa fa-home" aria-hidden="true" style="font-size:17px;"></i></span></a>
    <a class="menu-btn play-icon-a " href="my_course.php" style="text-decoration: none;color:white;border-radius:10px;"><i class="fa fa-play-circle text-light" aria-hidden="true" style="font-size:17px;"></i></i></a>
    <a class="menu-btn p-2 px-3 bg-light" href="share.php" style="text-decoration: none;color:#03386F;border-radius:10px;"><i class="fa fa-share-alt" aria-hidden="true" style="font-size:17px;"></i> Share</a>
    <a class="menu-btn" icon="user" id="profile" href="#" style="text-decoration:none;color:white;border-radius:10px;"><i class="fa fa-user text-light" aria-hidden="true" style="font-size:17px;"></i></a>
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

// profile open
$(document).ready(function(){
  $("#profile").click(function(){
     var user_email = $("#user_span").attr("user");
     if(user_email != "User not login"){
       $("#profile").attr("href","profile.php");
     }

     else{
      $("#profile").attr("href","login.php");
     }
  });
});

// if user not login than my course hide
$(document).ready(function(){
  var user = $("#user_span").attr("user");
  if(user != "User not login"){
    $(".play-icon-a").Class("d-none");
  }

  else{
    $(".play-icon-a").addClass("d-none"); 
  }
 
});

// copy refial code
$(".copy-btn").click(function(){
    $("input").select();
    document.execCommand('copy');
});

  // remove thise page on pc
  $(window).resize(function(){
  var width = $(window).width(); 

  if ((width >= 768  )) {
    window.location.href = "../index.php";
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