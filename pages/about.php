<?php 
 session_start();
 $_SESSION["on_page"] = "about.php";
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
        <a href="profile.php"> <b class="text-light"><i class="fa fa-angle-left mr-3" aria-hidden="true"></i> About</b></a>
    </div> 
 
 
<!-- My Course-->
<div class="w-100 p-2 px-3 d-flex justify-content-around align-items-start flex-column" style="height:auto;">
  <h4 class="p-0">About TechSkill</h4>
  <p style="text-align: justify;"> Ipsum is simply dummy text of the printing and 
  typesetting industry. Lorem Ipsum has been the industry
  standard dummy text ever since the 1500s, when an unknown 
  printer took a galley of type and scrambled it to make a 
  type specimen book. It has survived not only five centuries, 
  but also the leap into electronic typesetting, remaining 
  essentially unchanged. It was popularised in the 1960s with 
  the release of Letraset sheets containing Lorem Ipsum passages, 
  and more recently with desktop publishing software like Aldus 
  PageMaker including versions of Lorem Ipsum.
</p>
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