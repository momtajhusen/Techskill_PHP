<?php 
 session_start();
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
   echo '<script>window.location.href = "../pages/login.php";</script>';
    exit("page not fount");
 }
  
?>
<?php 
 require("database.php");
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   $course_name = mysqli_real_escape_string($db,$_POST["course-name"]);
   $course_img =  $_FILES["course-image"];
   $course_img_location = $course_img["tmp_name"];

   $lecture_img =  $_FILES["lecture-image"];
   $lecture_img_location = $lecture_img["tmp_name"];
   
   $course_prize = mysqli_real_escape_string($db,$_POST["course-prize"]);
   $course_about = mysqli_real_escape_string($db,$_POST["course-about"]);
   $course_required = mysqli_real_escape_string($db,$_POST["course-required"]);

   $section = $_POST['section-name'];

   $lecture_name = $_POST['lecture'];
   $video = $_POST['video-url'];
   $duri = $_POST['video-time'];

   $course_id = time();

   //Check course id
   $check_course_id = "SELECT course_id FROM course WHERE course_id=' $course_id'";
   $result_id = $db->query( $check_course_id);
   if ($result_id->num_rows > 0) {
    echo "Retry upload beacuse course id match";
  }

  else{
    
   // Check Exist Course name
   $course_check = "SELECT course_name FROM course WHERE course_name='$course_name'";
   $result = $db->query($course_check);
   if ($result->num_rows > 0) {
     echo "Already This Course Name Please Change Course name";
   }


   else{
 
          // Upload course img
   list($header_img_width, $header_img_height) = getimagesize($course_img_location);
   if($header_img_width == 750 && $header_img_height == 546){
        if(move_uploaded_file($course_img_location,"../../course_assets/course-img/$course_id.jpg"))
      {

            // lecture img
            list($lecture_img_width, $lecture_img_height) = getimagesize($lecture_img_location);
            if($lecture_img_width == 400 && $lecture_img_height == 206){

              if(move_uploaded_file($lecture_img_location,"../../course_assets/lecture-img/$course_id.jpg"))
              {
                // insert course name & poster & prize & section
            $course = "INSERT INTO course (course_id, course_name, course_about, course_require, course_poster, course_prize, section)
            VALUES ('$course_id', '$course_name', '$course_about', '$course_required', 'course_assets/course-img/$course_id.jpg', '$course_prize', '$section')";
            if ($db->query($course) === TRUE) {
              echo "New record created successfully";
            } 
            
            else {
              echo "Error: " . $course . "<br>" . $db->error;
            }
    
            if(mkdir("../../course_assets/lecture-notes/".$course_id)){
                          // Insert Lecture 
                        $count = count($_POST['lecture']);
                        for($i=0;$i<$count;$i++)
                        {

                          $tmpFilePath =  $_FILES["lecture-notes"]['tmp_name'][$i];
                        // $lecture_files_location = $lecture_files["tmp_name"][$i];

                            //Make sure we have a file path
                          if ($tmpFilePath != ""){
                            //Setup our new file path
                            $newFilePath = "../../course_assets/lecture-notes/$course_id/$course_id-$i.zip";

                            //Upload the file into the temp dir
                            if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                              $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes, lectute_duri, paid_free) 
                              VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', 'course_assets/lecture-notes$course_id/$course_id-$i.zip', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                              if ($db->query($lecture_insert) === TRUE) {
                                echo "New record created successfully";
                              } 
                              
                              else {
                                echo "Error: " .$lecture_insert. "<br>" . $db->error;
                              }

                            }
                          }
          

                        else{
 
                              $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, lectute_duri, paid_free) 
                              VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                              if ($db->query($lecture_insert) === TRUE) {
                                echo "New record created successfully";
                              } 
                              
                              else {
                                echo "Error: " .$lecture_insert. "<br>" . $db->error;
                              }

          
                        }

                    }
            }



          
                //     // Insert Lecture 
                //     $count_file = count($_FILES['lecture-notes']);
                //     for($i=0;$i<$count_file;$i++)
                //     {
      
                //       echo 'print_valur :- '.$_FILES["lecture-notes"]['tmp_name'][$i];
                //       // $lecture_files_location = $lecture_files["tmp_name"][$i];
      
                // }




      }

          else{
            echo "lecture img not upload";
          }

        }

        else{
          echo "Lecture img size 400 * 206"; 
        }

      }

      else{
        echo "course img not upload";
      }

   }

   else{
      echo "course img size 750 * 546";
   }

   }
  }

 }
?>