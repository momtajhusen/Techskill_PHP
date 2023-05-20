<?php 
      require("database.php");
      
      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
        $get_course_id = mysqli_real_escape_string($db,$_POST["course_id"]);

     // Course Details Reteive
      $course = "SELECT * FROM user_query WHERE course_id='$get_course_id' ORDER BY id ASC"; 
      $get_course_response = $db->query($course);
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

         echo '<div class="card mr-2 mb-2" style="width:350px;float:left;">
         <div class="card-body">
           <b class="card-title m-0 mb-1">'.$user_name.'</b>
           <h5 class="card-title m-0 mb-1">'.$course_titles_name.'</h5>
           <h5 class="card-title">'.$date.'</h5>
           <p class="card-text mb-3">'.$comment.'</p>
           <a href="#" class="btn btn-primary delete-btn" course_id="'.$comment_id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>

         </div>
       </div>';
         }

      }


   ?>

 
</script>