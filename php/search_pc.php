<?php
 require("../admin/php/database.php");
 session_start();

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
 
   $search_text = htmlspecialchars($_POST["search_text"],ENT_QUOTES);
   $video_data = "SELECT * FROM course WHERE course_name LIKE '%$search_text%' limit 3 ";

  if($get_video_response = $db->query($video_data)){
  
    while($video_all_data = $get_video_response->fetch_assoc())
    {
      $course_name =  $video_all_data['course_name'];
      $course_id = $video_all_data['course_id'];
      $course_poster =  $video_all_data['course_poster'];
      $course_prize =  $video_all_data['course_prize'];
      echo '
      <a href="../inroll.php" id="container-video" course_id="'.$course_id.'" class="d-flex container-video mb-2" style="width:90%;height:95px;cursor:pointer;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;position:relative;">
      <img class="paid-img" src="../../image/paid.png">
      <div class="h-100 bg-info d-flex justify-content-center align-items-center" style="width:40%;">
          <img src="'.'../../'.$course_poster.'" alt="" height="100%;" width="100%;">
        </div>
  
        <div class="w-75 h-100" style="width:60%;">
        
         <div class="p-2" style="height:60%; overflow:hidden;">
           <b class="course-name m-0" style="font-size:15px;">'.$course_name.'</b>
        </div>
  
           <div class=" p-0 w-100 py-1 px-2 d-flex justify-content-between align-items-start" style="overflow:hidden;">
  
             <b class="course-prize px-3" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">₹ '.$course_prize.'</b> 
  
           <div class="ratings py-2 px-3 d-flex" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"> 
             <i class="fa fa-star rating-color ml-1"></i> 
             <i class="fa fa-star rating-color ml-1"></i> 
             <i class="fa fa-star rating-color ml-1"></i> 
             <i class="fa fa-star rating-color ml-1"></i> 
             <i class="fa fa-star ml-1"></i> 
           </div>
  
  
          </div>
            
         </div>
  
  
  
  
        </di>
        </a>  
           ';
    }
  }

  else{
    echo "Course Not Found";
  }

 

}

else{
  echo '<script>window.location.href = "../index.php";</script>';

}

?>
<html>
 
    <script>
      // Sesssion set click course
// Sesssion set click course
$(document).ready(function(){
$(".container-video").each(function(){
  $(this).click(function(){  
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
    </script>
</html>

