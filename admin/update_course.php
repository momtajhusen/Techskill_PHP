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

 if(isset($_SESSION['course_id']))    
 {

    $course_id = $_SESSION["course_id"];
 }
 
 else
 {
   echo '<script>window.location.href = "admin.php";</script>';
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/course.css">  
<script src="js/script.js"></script>

<style>
      .inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}

.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}

.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label * {
	pointer-events: none;
}
</style>



</head>
<body>
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
               <li class=" d-flex align-items-center" style="color:white;">
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
    <header class="mb-4">
        <div class="header-title d-flex align-items-center pl-3">
          <i class="fa fa-bars mx-3 menu-btn" style="font-size:25px;" aria-hidden="true"></i> 
          <span>Udate Course</span>   
        </div>

        <div class="admin-pic-box px-3 justify-content-end align-items-center">
        <a href="pages/profile.php"><img src="image/admin.png" height="50px" alt=""></a>
        </div>

    </header>
    <?php
        // Total No Verify  User
        $course_details = "SELECT * FROM course WHERE course_id='$course_id'";
        $course_details_data = $db->query($course_details);
        $course = $course_details_data->fetch_assoc();

        $course_name = $course['course_name'];
        $course_about = $course["course_about"];
        $course_required =  $course["course_require"];
        $course_poster = $course['course_poster'];
        $course_prize = $course['course_prize'];
        $course_section = $course['section'];

    ?>

    <form class="update_submit" enctype="multipart/form-data">
      
        <div class="row m-0 d-flex justify-content-around align-items-center content-box">
          
            <div class="col-12 col-md-4 p-0">
                <div class=" p-3 m-1 d-flex flex-column" style="border:2px solid #888;">
                    <h5>Course Name</h5>
                    <input class="mb-1" required value="<?php echo $course_name; ?>" name="course-name"  placeholder="Course Name" type="text">
                </div>
            </div>

            <input value="<?php echo $course_id; ?>" type="hidden" name="course-id">

            <div class="col-12 col-md-4 p-0">
                <div class="p-3 m-1 d-flex flex-column" style="border:2px solid #888;">
                    <h5>Course Prize</h5>
                    <input class="mb-1" required value="<?php echo $course_prize; ?>" name="course-prize" placeholder="Course Prize" type="number">
                                   
                </div>
            </div>

            <div class="col-12 col-md-4 p-0">
              <div class="p-3  m-1 d-flex" style="border:2px solid #888;">
                 <div class="w-50" style="overflow:hidden">
                    <h5>Course Poster</h5>
                    <input type="file"  name="course-image"  id="image_uploads"  accept=".jpg, .jpeg, .png, .gif">
                  </div>
                  
                 <div class="w-50" style="overflow:hidden">
                    <h5>Lecture Poster</h5>
                    <input type="file"  name="lecture-image"  id="lecture_uploads"  accept=".jpg, .jpeg, .png, .gif">
                 </div>
              </div>
            </div>
            
        </div>

        <div class="row m-0 d-flex justify-content-around align-items-center content-box">
          
          <div class="col-12 col-md-6 p-0">
              <div class=" p-3 m-1 d-flex flex-column" style="border:2px solid #888;">
                  <h5>About Course</h5>
                  <textarea class="mb-1" required name="course-about" placeholder="About this course"  rows="4" ><?php echo $course_about; ?></textarea>
              </div>
          </div>


          <div class="col-12 col-md-6 p-0">
              <div class=" p-3 m-1 d-flex flex-column" style="border:2px solid #888;">
                  <h5>Course Required</h5>
                  <textarea class="mb-1" required name="course-required" placeholder="Course Required"  rows="4" ><?php echo $course_required; ?></textarea>
              </div>
          </div>
          
      </div>

        <div class="row m-0 d-flex justify-content-around align-items-center content-box">
             <div class="col-12 p-0 mx-1 mt-1">
                          <!-- Create Section & lectures -->
                      <div class="py-2 px-2 mx-1 m-1d-flex justify-content-center align-items-center flex-column" style="border:2px solid #888;">
                        
                        <h5 class="ml-2">Add Video Lecture</h5>
                      <!-- Start One Section & lectures -->
                        <div id="section" class="lecture-section p-1 m-1 d-flex flex-column">

                                           <!-- Video Play Container-->
                                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lecture Video Test</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div style="padding:56.25% 0 0 0;position:relative;"><iframe class="video-play" src="https://player.vimeo.com/video/669819937?h=1f1c4fe6a6&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="HTML Introduction"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
                                  <h6 class="lecture-title">Lecture Title</h6>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="p-1 d-flex flex-column">
                          <div class="d-flex mb-1"style="height:35px;">
                            <input class="input" required value="<?php echo $course_section; ?>" name="section-name"  placeholder="Section Name" type="text" style="width:59%;"> 
                            <div class="update-append-btn bg-info mr-1 p-2 text-light d-flex justify-content-center align-items-center" style="width:20%;font-size:15px;cursor:pointer;">Add</div>
                            <div class="remove p-2 text-light d-flex justify-content-center align-items-center" style="width:20%;font-size:15px;cursor:pointer;background:#F7546E;">Remove</div>
                          </div>
                        <div class="w-100 bg-light">
                          <div class="d-flex flex-column update_lecture_box">
                            <?php

                                // Total Enroll User
                                $total_lecture= "SELECT COUNT(lecture_title) AS lecture_no FROM lecture WHERE course_id='$course_id'";
                                $lecture_data = $db->query($total_lecture);
                                $details_lecture = $lecture_data->fetch_assoc();
                                $course_lecture = $details_lecture['lecture_no'];

                                echo "<input class='total-lecture' type='hidden' value='".$course_lecture."'>";

                              $course = "SELECT * FROM lecture WHERE course_id='$course_id'"; 
                              $get_course_response = $db->query($course);
                              $count = 0;
                              while($all_course = $get_course_response->fetch_assoc())
                              {
                               
                                  $lecture_title = $all_course['lecture_title'];
                                  $video_url = $all_course['video_url'];
                                  $video_notes = $all_course['notes'];
                                  $video_time = $all_course['lectute_duri'];
                                  $paid_free = $all_course['paid_free'];
                                  $count++;

                     

                                  if($video_notes != "no-files"){
                                    $file_class = "file-lable d-none";
                                    $file_bg_color = "<i class='fa fa-file-pdf-o text-success'  aria-hidden='true'></i>";
                                    $file_trash = '<label class="p-2 m-0 justify-content-center d-flex file_trash" file_path="'.$video_notes.'"  style="width:100%;height:100%;overflow:hidden;cursor:pointer;">
                                                     <i class="fa fa-trash text-light" aria-hidden="true"></i>
                                                   </label>';
                                  }

                                  else{
                                    $file_class = "d-flex";
                                    $file_bg_color = "<i class='fa fa-file-pdf-o text-light' aria-hidden='true'></i>";
                                    $file_trash = "";
                                  }

                                  echo '<div class="d-flex justify-content-around align-items-center lecture-box">
                                  <div class="d-flex justify-content-around align-items-center p-2 play" video_url="url-'.$count.'" lecture="lecture-'.$count.'" data-toggle="modal" data-target="#exampleModal"  style="width:10%;background:#ddd;cursor:pointer;">
                                   <i class="fa fa-play-circle" aria-hidden="true"></i>
                                  </div>
                                  <input type="text" class="lecture-'.$count.'" required value="'.$lecture_title.'" name="lecture[]" placeholder="Lecture Title" style="width:35%;">
                                  <input type="url" class="url-'.$count.'" required value="'.$video_url.'" name="video-url[]"  placeholder="Video Url" style="width:20%;">
                                  <input type="text" required value="'.$video_time.'" name="video-time[]"  placeholder="time" style="width:20%;">
                                  <select class="p-1" name="video-lock[]" style="width:20%;">
                                    <option class="select-option" value="fa-lock"  >lock</option>
                                    <option value="selected" '.$paid_free.'>Unlock</option>
                                  </select>
                                  <div class="bg-dark d-flex justify-content-center align-items-center" name="video-lock[]" style="width:5%;overflow:hidden;">
                                  
                                  <input type="file" name="lecture-notes[]"  id="file-'.$count.'" class="inputfile" accept=".zip" />
                                  <input type="text" class="p-0 m-0 border-0" value="'.$video_notes.'" name="lecture-value[]" style="width:0px;"/>
                                   <label for="file-'.$count.'" class="p-2 m-0 justify-content-center  '.$file_class.'" style="width:100%;height:100%;overflow:hidden;cursor:pointer;">
                                        '.$file_bg_color.'
                                   </label>

                                   '.$file_trash.'

                                   
                                   
                                </div>
                                  </div>';
                              }  
                            ?>
                            
                          </div>
                        </div>
                      </div>  
                        </div>
                          <div class="w-100 d-flex justify-content-center align-items-center">
                            <input type="submit" name="submit" value="Update" id="submit" class="submit w-50 bg-info text-light btn">
                          </div>
                        </form>
                    
                      <!-- End One Section & lectures -->

                      
                      
                  </div>
             </div>
        </div>
 
</div>
<!--End Main Container-->

 <script>

   $(document).ready(function(){
     $(".file_trash").each(function(){
       $(this).click(function(){
           var file_path =  $(this).attr("file_path");
          $.ajax({
            type : "POST",
            url : "php/files_delete.php",
            data : {
              file_path : file_path
            },
            success : function(response){
             
             if(response != ""){
              location.reload();
             }

             else{
              alert(response);
             }

            }
          });

       });
     });
   });



   $(document).ready(function(){
     $(".remove").click(function(){
        $(".lecture-box:last").remove();
     });
   }); 

   $(document).ready(function(){
    $("body").on("click", ".play", function(){
       $(".video-container").removeClass("d-none");
       var video_url = $(this).attr("video_url");
       var lecture = $(this).attr("lecture");

       $(this).find("i").removeClass("fa-play-circle");
       $(this).find("i").addClass("fa-pause");

       var url_class = "."+video_url;
       var lecture_class = "."+lecture;
      
        var url = $(url_class).val();
        var lecture = $(lecture_class).val();

        $(".video-play").attr("src", url);
        $(".lecture-title").html(lecture);
    });
   });

   $(document).ready(function(){
      $(".close").click(function(){
          $(".lecture-box").find("i").addClass("fa-play-circle");
          $(".lecture-box").find("i").removeClass("fa-pause"); 
      });
   });

 </script>
 

</body>
</html>