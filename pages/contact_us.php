<?php 
 session_start();
 $_SESSION["on_page"] = "contact.php";
 unset($_SESSION['course_click']);
 unset($_SESSION['course_buy']);
 require("../admin/php/database.php");
 if(isset($_SESSION['account_gmail']))    
{  
    $user_email = $_SESSION['account_gmail'];
    $user_name = $_SESSION["account_name"].' '.$_SESSION["last_name"];

}

else
{
  $user_email  = "";
  $user_name = "";
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

<script src="https://cdn.tailwindcss.com"></script>



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

input{
  border:2px solid #ccc;
  outline:none;
  height:45px;
}

textarea{
  border:2px solid #ccc;
  outline:none !important;
  box-shadow:none !important;
}
 
</style>
  
</head>
<body oncontextmenu="return false">
    <!-- Empety Header-->
<div class="empty-header"></div>

<span id="user_span" user_name="<?php echo $user_name; ?>"  user="<?php echo $user_email; ?>"></span>

    <div class="p-3 d-md-none d-flex text-light  justify-content-between align-items-center" style="font-size:18px;background:#03386F;">
        <a href="profile.php"> <b class="text-light"><i class="fa fa-angle-left mr-3" aria-hidden="true"></i> Contact Us</b></a>
    </div> 
 
 
<!-- My Course-->
<div class="w-100  mt-2 d-flex justify-content-around align-items-center flex-column" style="height:auto;">
     <div class="w-100 d-flex  justify-content-center align-items-center flex-column" style="height:170px;">
           <img class="img-fluid mt-1" src="../image/logo2.png" alt="logo.png" style="width:200px;">
           <b class="mt-4">Contact via</b>
           <div class="d-flex">
              <div class="p-2 m-2" style="border-radius:100px; border:1.5px solid green;">
                 <a href="tel:+9779815759505"><img class="img-fluid" src="../image/call.png" width="20px;" alt="call.png" ></a>
              </div>
              

              <div class="p-2 m-2  bg-ingo" style="border-radius:100px; border:1.5px solid red;">
              <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=mumtaz666raza@gmail@gmail.com"><img class="img-fluid" src="../image/gamil.png" width="20px;" alt="call.png" ></a>
              </div>
            

              <div class="p-2 m-2 bg-ingo" style="border-radius:100px; border:1.5px solid green;">
                <a href="https://api.whatsapp.com/send?phone=+9779815759505"><img class="img-fluid" src="../image/whatsapp.png" width="20px;" alt="call.png" ></a>
              </div>
           </div>
     </div>

     <!--Form Contact-->
      <form class="w-100 email_form  d-flex justify-content-center align-items-center flex-column" enctype="multipart/form-data" style="position:relative;">
          <div class="d-flex flex-column mb-2" style="width:85%;">
            <p class="mb-1">Full Name</p>
            <input class="rounded pl-2 user-name" name="name" type="text" required="required" placeholder="Provide Your Name Please">
          </div>

          <div class="d-flex flex-column mb-2" style="width:85%;">
            <p class="mb-1">Email Address</p>
            <input class="rounded pl-2 user-email" name="email" type="email" required="required" placeholder="Provide Your Email Address">
          </div>

          <div class="d-flex flex-column mb-2" style="width:85%;">
            <p class="mb-1">Mobile Number</p>
            <input class="rounded pl-2" name="number" type="number" placeholder="Please Enter Your Number">
          </div>

          <div class="d-flex flex-column mb-3" style="width:85%;">
            <p class="mb-1">Your Message</p>
            <textarea class="rounded pl-2" name="message" id="message-input" rows="3" required="required" placeholder="Enter Your Meaasge"></textarea>
          </div>

          <div class="d-flex flex-column mb-2" style="width:85%;">
            <input class="rounded pl-2" id="submit" type="submit" value="Send" style="background:#030968;color:#ddd;">
          </div>

          <!--Loading Container-->
          <div class="w-100  d-none h-100 message-container justify-content-center align-items-center" style="position:absolute;">
                 <div class="rounded d-flex justify-content-center align-items-center flex-column" style="height:150px; background:#03386F; width:170px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                     <div class="spinner-border loading-spinn mb-1" role="status" style="color:white;">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <i class="fa fa-check d-none alert-success p-2 tick-send rounded-circle" aria-hidden="true" style="font-size:18px;border:4px solid green;"></i>
                    <p class="font-weight-bold text-light sending-text">Sending...</p>
                 </div>
          </div>

      </form>
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
 
// profile open
$(document).ready(function(){
     var user_email = $("#user_span").attr("user");
     var user_name = $("#user_span").attr("user_name");
     if(user_email != "User not login"){
       $(".user-email").val(user_email);
       $(".user-name").val(user_name);

     }

     else{
      $("#profile").attr("href","login.php");
      alert(user_email);
     }
 
});

// if user not login than my course hide
$(document).ready(function(){
  var user = $("#user_span").attr("user");
  if(user != "User not login"){
    $(".play-icon-a").Class("d-none");
    
  }

  else{
    $(".play-icon-a").addClass("d-none"); 
    alert(user);
  }
 
});

// Email Send 
$(document).ready(function(){
      $(".email_form").submit(function(e){
         e.preventDefault();

            $.ajax({
            type : "POST",
            url : "../php/contact_mail.php",
            data : new FormData(this),
            contentType : false,
            processData : false,
            catch : false,
            beforeSend: function beforeSend() {
              $("#submit").addClass("d-none");
              $(".message-container").addClass("d-flex");
              $(".message-container").removeClass("d-none"); 
              
                  $(".loading-spinn").removeClass("d-none");
                  $(".tick-send").addClass("d-none");
                  $(".sending-text").html("Sending...");
            },
            success : function(response){
              alert(response);
               if(response.trim() == "Your mail has been sent successfully."){
                  $(".loading-spinn").addClass("d-none");
                  $(".tick-send").removeClass("d-none");
                  $(".sending-text").html("Send Success.");
                  setTimeout(function(){
                    $('#message-input').val("");
                    $(".message-container").removeClass("d-flex");
                    $(".message-container").addClass("d-none"); 
                    $("#submit").removeClass("d-none");
                  }, 2000);
               }
            }
          });
 

    });
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