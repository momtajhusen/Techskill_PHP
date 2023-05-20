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
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Course</title>
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
 
<link rel="stylesheet" href="css/admin.css"> 
<script src="js/script.js"></script>




</head>
<body>
   <!-- Delete Course conform Box-->
<div class="d-none logout-box justify-content-center align-items-center" style="width:100%; height:250px;position:absolute;top:40%;z-index:100;">
   <div class="d-flex justify-content-start bg-light flex-column" style="width:370px;height:200px;border-radius:20px;overflow:hidden;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
     <h5 class="p-3 mb-3 text-light d-flex justify-content-center align-items-center" style="background:#03386F;">TechSkill</h4>  

     <div class="d-flex mb-2 py-1 justify-content-around align-items-center flex-column">
         <h6 style="font-family:sans-serif;font-weight:bold;"> Delete This Course.</h6>
         <p class="message_box" >Are You Sure You Want to Delete this Course ?</p>
     </div>

     <div class="d-flex mb-2 justify-content-around align-items-center">
        <div class="yes-btn p-2 px-5 w-25 rounded d-flex justify-content-center text-light" course_id="000" style="border:1px solid #03386F;background:#03386F;font-weight:bold;font-family:sans-serif;cursor:pointer;">Yes</div>
        <div class="cancle-btn p-2 px-5 w-25 rounded d-flex justify-content-center" style="border:1px solid #03386F;font-weight:bold;font-family:sans-serif;cursor:pointer;">Cancle</div>
     </div>

   </div>
</div>

<!--Start Slide Bar-->
    <di class="sidebar">

       <div class="sidebar-menu text-light p-4 d-flex align-items-center align-items-center ">
           <img src="image/logo.png" alt="logo.png" width="150px;">
           <i class="fa fa-times mx-3 close-btn" style="font-size:25px;" aria-hidden="true"></i> 
        </div>

        <div class="sidebar-menu mt-5">
           <ul class="p-0">

              <a href="admin.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-dashboard mr-2" style="font-size:18px;"></i>  Dashboard 
               </li>
             </a> 

             <a href="upload_course.php">
               <li class=" d-flex align-items-center" style="color:white;">
                  <i class="fa fa-upload mr-2" style="font-size:18px;"></i>  Upload Course
               </li>
             </a> 

             <a href="course.php">
               <li class=" d-flex align-items-center" style="color:#F7546E;background: #F2F5FC;">
                  <i class="fa fa-play-circle mr-2" style="font-size:18px;"></i> All Course 
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
<header class="mb-1">
    <div class="header-title d-flex align-items-center pl-3">
      <i class="fa fa-bars mx-3 menu-btn" style="font-size:25px;" aria-hidden="true"></i> 
      <span>All Course</span>   
    </div>

    <div class="admin-pic-box px-3 justify-content-end align-items-center">
      <a href="pages/profile.php"><img src="image/admin.png" style="width:50px;"></a>
    </div>
</header>



<!--Video Container -->



    <section class="text-gray-600 body-font">
  <div class="mx-auto">

    <div class="flex flex-wrap m-0">
      
    <?php 
               require("php/database.php");

               // Course Details Reteive
                $course = "SELECT * FROM course ORDER BY id DESC"; 
                $get_course_response = $db->query($course);
                while($all_course = $get_course_response->fetch_assoc())
                {
                   $course_id = $all_course['course_id'];
                   $course_name = $all_course['course_name'];
                   $course_poster = $all_course['course_poster'];
                   $course_prize = $all_course['course_prize'];

                         // Total user comments
                          $total_user_comment = "SELECT COUNT(id) AS comment_no FROM user_query WHERE course_id='$course_id'";
                          $user_comment_data = $db->query($total_user_comment);
                          $user_comment = $user_comment_data->fetch_assoc();
                          $course_comments = $user_comment['comment_no'];

                   echo '<div class="xl:w-1/4 md:w-1/2 p-2 animate__animated animate__zoomIn">
                   <div class="bg-gray-100 p-6 rounded-lg" style="height:400px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                     <img class="h-40 rounded w-full object-cover object-center mb-6" src="'.'../'.$course_poster.'" alt="content">
                     <h3 class="tracking-widest mb-1 text-indigo-500 text-xs font-medium title-font">
                       <i class="fa fa-star rating-color ml-1"></i> 
                       <i class="fa fa-star rating-color ml-1"></i> 
                       <i class="fa fa-star rating-color ml-1"></i> 
                       <i class="fa fa-star rating-color ml-1"></i> 
                       <i class="fa fa-star ml-1"></i>
                     </h3>
                     <h2 class="text-lg text-gray-900 font-medium title-font mb-2">₹ '.$course_prize.'</h2>
                     <div class="mb-2" style="height:52px;overflow:hidden;">
                       <p class="leading-relaxed text-base">'.$course_name.'</p>
                    </div>
                     <div class="p-1" style="font-size:20px;">
                         <i class="fa fa-trash p-2 delete-course" course_id="'.$course_id.'" aria-hidden="true" style="background:#ddd;cursor:pointer;"></i>
                         <a class="edit-btn" href="update_course.php" course_id="'.$course_id.'"> 
                           <i class="fa fa-pencil-square-o p-2" aria-hidden="true" style="background:#ddd;cursor:pointer;"></i>
                        </a>

                        <div class="p-2 comment-icon d-flex" course_id="'.$course_id.'" course_name="'.$course_name.'" data-toggle="modal" data-target="#myModal" style="background:#ddd;cursor:pointer;float:right">
                          <span class="mr-2" style="font-size:13px;">'.$course_comments.'</span>
                          <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>

                     </div>
                   </div>
                 </div>
           
            ';
                }
 
    
          
          ?>

      

    </div>
  </div>
</section>
 
<!--End Main Container-->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background:#F2F5FC;">
      <div class="modal-heade p-3 d-flex align-items-center justify-content-between" style="background:#F7546E;font-width:bold;">
        <h3 class="modal-title text-light" style="font-size:20px;font-width:bold;">Modal Header</h3>
        <button type="button" class="close text-light" data-dismiss="modal" style="font-size:20px;font-width:bold;"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>
      <div class="modal-body">
      <section class="text-gray-600 body-font">
  <div class="container mx-auto">
    <div class="flex flex-wrap -m-2 get_comment_box">
   

    </div>
  </div>
</section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default alert-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  // Course Comment
$(document).ready(function(){
    $(".comment-icon").each(function(){
      $(this).click(function(){
         var course_id = $(this).attr("course_id");
         var course_name = $(this).attr("course_name");
         $(".modal-title").html("Comments "+course_name);
        $.ajax({
            type : "POST",
            url : "php/get_course_comment.php",
            data : {
              course_id : course_id
            },
            success : function(response){
             
             if(response.trim() != ""){
              $(".get_comment_box").html(response);
             }

             else{
              $(".get_comment_box").html("<h3>This Use No Any Comments</h3>");
             }
            }
          });
      });
    });
  });
 
 // Sesssion set click course
$(document).ready(function(){
  $(".edit-btn").each(function(){
  $(this).click(function(){  
   var course_id = $(this).attr("course_id");
   $.ajax({
           type : "POST",
           url : "php/update_session.php",
           data : {
             course_id : course_id
           }
         });
 
  });
  
});

});

// Logout click Show logout conform box 
$(document).ready(function(){
  $(".delete-course").each(function(){
    $(this).click(function(){
     var course = $(this).attr("course_id");
     $(".yes-btn").attr("course_id", course);
     $(".logout-box").addClass("d-flex");
    $(".logout-box").removeClass("d-none");
    });

  });
});

// cancle 
$(document).ready(function(){
  $(".cancle-btn").click(function(){
    $(".logout-box").removeClass("d-flex");
    $(".logout-box").addClass("d-none");
  });
});

// Delete course data send  
$(document).ready(function(){
$(".yes-btn").click(function(){
   var course_id = $(this).attr("course_id");
  $.ajax({
           type : "POST",
           url : "php/delete_course.php",
           data : {
            course_id : course_id
           },
           success : function(response){
             if(response == "Success Course Delete"){
               $(".message_box").html("<h4 class='alert-success'>Success Course Deleted</h4>");
             }

             else{
              $(".message_box").html("<h4 class='alert-danger'>"+response+"</h4>");
             }
             
          }
     });
 });
});

</script>

</body>
</html>