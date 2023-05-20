<?php 
 session_start();
 $_SESSION["on_page"] = "my_course.php";
 unset($_SESSION['course_click']);
 unset($_SESSION['course_buy']);
 require("../../admin/php/database.php");
 if(isset($_SESSION['account_gmail']))    
{  
    $user_email = $_SESSION['account_gmail'];

}

else
{
  $user_email  = "User not login";
  echo '<script>window.location.href = "../../index.php";</script>';
  exit("page not fount");
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
            <link rel = "icon" href ="../../image/title.jpg" type = "image/x-icon">
    

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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
 
 
<link rel="stylesheet" href="../../css/mediaquery.css"> 
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
      background:#006CA8;

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
    font-size: 13px
}

.rating-color {
    color: #fbc634 !important
}

 

  

</style>
 
</head>
<body oncontextmenu="return false">

<!-- Header Contener-->
<header class="d-flex px-3 justify-content-between align-items-center"style="z-inddex:100;">

<a href="../../index.php"><img class="logo-img-pc" src="../../image/logo.png"></a>

   <div class="input-group d-flex justify-content-around align-items-center flex-column" style="width:400px;">
      <a href="index.php"><img class="logo-img-mobile mb-4 mt-1" src="../../image/logo.png" style="width:150px"></a>
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
    <div>
      <a href="../pages/login.php" class="login-btn p-2 px-3 bg-light " style="cursor:pointer;">Login</a> 
      <div class="profile-btn px-1 bg-light d-flex justify-content-around align-items-center" style="height:40px;cursor:pointer;"> <i class="fa fa-user mx-2" aria-hidden="true"></i> <span class="profile_span">Profile</span> <i class="fa fa-caret-down mx-2" aria-hidden="true"></i></div> 
    </div>
</div>

<div class="bg-danger profile-btn-box d-none" style="width:175px; position:absolute;top:85px;right:15px;z-index:100;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
  <div class="bg-light w-100 d-flex justify-content-center align-items-center flex-column">
    <a href="../../index.php" class="p-1 w-100 profile_menu pl-2">Home</a>
     <a href="profile.php" class="p-1 w-100 profile_menu pl-2">Profile</a>
     <a href="my_course_pc.php" class="p-1 w-100 profile_menu pl-2" style="background:black;color:white;">My Course</a>
     <a href="my_whistles.php" class="p-1 w-100 profile_menu pl-2">My Wishlish</a>
     <a href="all_course.php" class="p-1 w-100 profile_menu pl-2">All Course</a>
     <a href="../../php/logout.php" class="p-1 w-100 profile_menu pl-2">Logout</a>
  </div>
</div>

</header>



<!-- Empety Header-->
<div class="empty-header d-md-none"></div>
 
<span id="user_span" user="<?php echo $user_email; ?>" user_name="<?php echo $user_name; ?>" full_name="<?php echo $full_name; ?>"></span>
 
<!-- Course Header-->
<div class="course-head justify-content-center align-items-center" style="font-size:30px;font-weight:bold;font-family:sans-serif;">
    All Courses
</div>

   
<!-- Main Container -->
<div class="content">

    <div class="row m-0 bg-danger" style="background:#ECF6FD;height:auto" >


 
        <!-- Content Container Recomented for you -->
        <div class="container-col header-transparant pb-4 col-12 d-flex flex-wrap justify-content-center align-items-center" style="background:#FEF8EF;height:auto;position:relative;">

          <div class="d-flex flex-wrap justify-content-center align-items-center" style="width:90%;height:150px;">
             <b style="font-size:30px;">MY PURCHASED COURSE</b>
          </div>

                    <!-- My Course-->
         <div class="w-100 course-result d-flex flex-wrap justify-content-center align-items-center" style="height:auto;">


            <?php 
               require("../../admin/php/database.php");

               // Course Details Reteive
                $course = "SELECT * FROM user_enroll WHERE email='$user_email'";
                $get_course_response = $db->query($course);
                while($all_course = $get_course_response->fetch_assoc())
                {
               
                   $course_name = $all_course['course_name'];
                   $course_about = $all_course['course_about'];
                   $course_id = $all_course['course_id'];
                   $course_poster = $all_course['poster'];
                   $course_prize = $all_course['pay_rize'];

                          // Total Enroll User
                          $total_lecture= "SELECT COUNT(lecture_title) AS lecture_no FROM lecture WHERE course_id='$course_id'";
                          $lecture_data = $db->query($total_lecture);
                          $details_lecture = $lecture_data->fetch_assoc();
                          $course_lecture = $details_lecture['lecture_no'];

                   echo '<div class="card container-video animate__animated m-2" course_id="'.$course_id.'" style="position:relative;">
                   <a href="../inroll.php">
                   <img class="paid-img" src="../../image/paid.png">
                   <img class="card-img-top" src="'.'../../'.$course_poster.'" alt="Card image cap">

                   <div class="card-body py-2 px-2 d-flex justify-content-between align-items-center" style="height:30px;overflow:hidden;">
                   <div class="ratings"> <i class="fa fa-star rating-color">
                     </i> <i class="fa fa-star rating-color">
                     </i> <i class="fa fa-star rating-color">
                     </i> <i class="fa fa-star rating-color">
                     </i> <i class="fa fa-star"></i>
                   </div><a/>
                   <i class="fa fa-heart d-none whistles-icon p-2 mt-2" id="'.$course_id.'" course_name="'.$course_name.'" course_about="'.$course_about.'" course_poster="'.$course_poster.'" prize="'.$course_prize.'" aria-hidden="true" style="cursor:pointer"></i>
               </div>
              
               <a href="../inroll.php">
               <div class="card-body py-1 px-2 d-flex  flex-column" style="height:30px;overflow:hidden;">
                <span class="card-text"><b class="course-name" style="line-height:1px;font-family:sans-serif;">'.$course_name.'</b></span>
              </div>
                 

                  
                   <div class="card-body d-none d-md-block py-1 px-2 d-md-flex  flex-column" style="height:50px;overflow:hidden;">
                     <span class="card-text" style="font-family:sans-serif;">'.$course_about.'</span>
                   </div> 

                 <div class="card-body py-1 px-2 d-none d-md-block d-md-flex justify-content-around align-items-center" style="height:50px;overflow:hidden;">
                   <span><i class="fa fa-play-circle" aria-hidden="true"></i> Videos : '.$course_lecture.'</span>
                </div>  </a>



                
                <div class="card-body mb-3 py-2 px-4 d-flex justify-content-between align-items-center" style="height:45px;overflow:hidden;">
                <a href="../inroll.php"> <b class="course-name py-2">₹ '.$course_prize.'</b>  </a>
                <a href="../inroll.php"> <button class="btn d-none d-md-block btn-info bg-success">LEARN</button> </a>
               </div>
              

                
                   </div>';
                }
 
    
          
          ?>

</div>
           
        </div>
        
        </div>


 
    </div>

</div>



<!-- footer -->
<?php
include("../footer.php");
?>


<script>
  // User Online offline & page Satus set.
  function updateUserStatus(){
     jQuery.ajax({
       url:'../../php/user_status.php',
       success:function(response){
       }
     });
   }

   setInterval(function(){
     if($("#user_span").attr("user") != "User not login"){
        updateUserStatus();
     }

   },2000);


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
       url:"../../php/search_pc.php",
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
       url:"../../php/search_pc.php",
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
           url : "../../php/course_session.php",
           data : {
             session_name : sesion_value 
           }
         });
 
  });
  
});

});

// Check user Course Buy or not
$(document).ready(function(){
  var course = $(this).find(".course-name").html();
   if(course == undefined){
     $(".course-result").html('<div class="py-5 d-flex align-items-center flex-column" style="width:90%;">\
   <b style="font-size:12px;">Your Purchased course will be appear here.</b>\
   <p class="p-1" style="font-size:13px;">You are not Purchased any courses Yet.</p>\
</div>'); 
   }
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
           url : "../../php/my_whistles.php",
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
           url : "../../php/del_my_whistles.php",
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
            url : "../../php/check_wishlish.php",
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

// remove thise page on pc
$(window).resize(function(){
  var width = $(window).width(); 

  if ((width <= 768  )) {
    window.location.href = "../my_course.php";
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
 
</script>

 
</body>
</html>