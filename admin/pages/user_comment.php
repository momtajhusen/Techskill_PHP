<?php 
 session_start();
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
   echo '<script>window.location.href = "login.php";</script>';
    exit("page not fount");
 }
 require("../php/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Comment</title>
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
 
<link rel="stylesheet" href="../css/admin.css"> 
<script src="../js/script.js"></script>

<style>
  .message_box_scroll {
    background: red;
   overflow: scroll;
}

.message_box_scroll::-webkit-scrollbar {
    width: 0px;
    height:0px;
}

.message_box_scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 0px;
   


 .like-course:hover {
  color: red;
}

.enroll-course:hover {
  color: #17A2B8;
}
</style>


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
               <li class="d-flex align-items-center" style="color:white;">
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
                  <i class="fa fa-play-circle mr-2" style="font-size:18px;"></i>  All Course 
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
          <span>Videos Comments</span>   
        </div>

        <div class="admin-pic-box px-3 justify-content-end align-items-center">
        <a href="profile.php"><img src="../image/admin.png"  alt="admin.png" style="height:50px;"></a>
        </div>

    </header>

<div class="w-100 px-3 flex-column message-container">

<div class="row">
        <?php 
               require("../php/database.php");

               // Course Details Reteive
                $course = "SELECT * FROM user_query ORDER BY id DESC"; 
                $get_course_response = $db->query($course);
                echo "<div class='row p-0 m-0'>";
                while($all_course = $get_course_response->fetch_assoc())
                {
                   $comment_id  = $all_course['id']; 
                   $user_email = $all_course['user'];
                   $user_name = $all_course['name'];
                   $course_id = $all_course['course_id'];
                   $comment = $all_course['query_message'];
                   $date = $all_course['date'];

                   $course_name = "SELECT * FROM course WHERE course_id='$course_id'";
                   $course_response = $db->query($course_name);
                   $course_data = $course_response->fetch_assoc();
           
                   $course_titles_name = $course_data['course_name'];

                   echo '
                   <div class="d-flex p-0 pl-2 justify-content-center col-12 col-md-6 col-lg-4">
                   <div class="card p-0 w-100 mb-2">
                   <div class="card-body">
                     <b class="card-title m-0 mb-1">'.$user_name.'</b>
                     <h5 class="card-title m-0 mb-1">'.$course_titles_name.'</h5>
                     <h5 class="card-title">'.$date.'</h5>
                     <p class="card-text mb-3">'.$comment.'</p>
                     <a href="#" class="btn btn-primary delete-btn" course_id="'.$comment_id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>
 
                   </div>
                 </div>
                 </div>';
                }
 

          ?>
          </div>
 </div>
 
 
             
             <!-- <li class="active"><a>2</a></li> -->
 
  

</div>








<!--End Main Container-->

<script>
            // Delete course data send  
            $(document).ready(function(){
            $(".delete-btn").click(function(){
              var comment_id = $(this).attr("course_id");
              $.ajax({
                      type : "POST",
                      url : "../php/delete_comments.php",
                      data : {
                        comment_id : comment_id
                      },
                      success : function(response){
                        if(response.trim() == "Success Course Delete"){
                          location.reload();
                        }
                        
                        
                      }
                });
            });
            });
          </script>
 
</body>
</html>