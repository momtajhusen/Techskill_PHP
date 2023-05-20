<?php 
 session_start();
 if(isset($_SESSION['admin_login']))    
 {
    $user_email = $_SESSION['admin_login'];
 }
 
 else
 {
    echo '<script>window.location.href = "../admin.php";</script>';
    exit("page not fount");
 }
 
 require("database.php");

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   $course_name = mysqli_real_escape_string($db,$_POST["course-name"]);
   $course_about = mysqli_real_escape_string($db,$_POST["course-about"]);
   $course_required = mysqli_real_escape_string($db,$_POST["course-required"]);
   $course_id = mysqli_real_escape_string($db,$_POST["course-id"]);
   $course_img =  $_FILES["course-image"];
   $course_img_location = $course_img["tmp_name"];
   $lecture_img =  $_FILES["lecture-image"];
   $lecture_img_location = $lecture_img["tmp_name"];

   $course_prize = mysqli_real_escape_string($db,$_POST["course-prize"]);

   $section = $_POST['section-name'];

   $lecture_name = $_POST['lecture'];
   $video = $_POST['video-url'];
   $duri = $_POST['video-time'];

   $alert_message;
   
   if($course_img_location != ""){
            // Upload course img
            list($header_img_width, $header_img_height) = getimagesize($course_img_location);
            if($header_img_width == 750 && $header_img_height == 546){
          if(move_uploaded_file($course_img_location,"../../course_assets/course-img/$course_id.jpg"))
          {

            if($lecture_img_location != ""){

                
                // lecture img
                list($lecture_img_width, $lecture_img_height) = getimagesize($lecture_img_location);
                if($lecture_img_width == 400 && $lecture_img_height == 206){

                if(move_uploaded_file($lecture_img_location,"../../course_assets/lecture-img/$course_id.jpg"))
                {

                  // update course name
            $course = "UPDATE course SET course_name='$course_name', course_about='$course_about', course_require='$course_required', course_poster='course_assets/course-img/$course_id.jpg', course_prize='$course_prize', section='$section' WHERE course_id='$course_id'";
            if ($db->query($course) === TRUE) {

                $delete_lecture = "DELETE FROM lecture WHERE course_id='$course_id'";
                if ($db->query($delete_lecture) === TRUE) {
                                // Insert Lecture 
                                $count = count($_POST['lecture']);
                                for($i=0;$i<$count;$i++)
                                {

                                    $tmpFilePath =  $_FILES["lecture-notes"]['tmp_name'][$i];
                                    echo $tmpFilePath;
                                // $lecture_files_location = $lecture_files["tmp_name"][$i];

                                    //Make sure we have a file path
                                if ($tmpFilePath != ""){
                                    //Setup our new file path
                                    $newFilePath = "../../course_assets/lecture-notes/$course_id/$course_id-$i.zip";

                                    //Upload the file into the temp dir
                                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                                        $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes, lectute_duri, paid_free) 
                                        VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', 'course_assets/lecture-notes/$course_id/$course_id-$i.zip', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                                        if ($db->query($lecture_insert) === TRUE) {
                                        echo "New record created successfully";
                                        } 
                                        
                                        else {
                                        echo "Error: " .$lecture_insert. "<br>" . $db->error;
                                        }

                                    }
                                }


                                else{
                                    $tmp_value = $_POST['lecture-value'][$i];

                                        $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes,  lectute_duri, paid_free) 
                                        VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', '$tmp_value', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                                        if ($db->query($lecture_insert) === TRUE) {
                                        echo "New record created successfully";
                                        } 
                                        
                                        else {
                                        echo "Error: " .$lecture_insert. "<br>" . $db->error;
                                        }
                                    
                                }

                                }

                } 
                
                else {
                    $alert_message = "Error deleting record: " . $db->error;
                }
                 
            } 
            
            else {
                $alert_message = "Error: " . $course . "<br>" . $db->error;
            }

            // user enroll update
            $user_enroll = "UPDATE user_enroll SET course_name='$course_name', poster='course_assets/course-img/$course_id.jpg', pay_rize='$course_prize' WHERE course_id='$course_id'";
            if ($db->query($user_enroll) === TRUE) {
                $alert_message = "Update Sucessfull";
            }

            else{
                echo "Error user enroll update: " . $db->error;  
            }

            // user_whistles update
            $user_whistles = "UPDATE user_whistles SET course_name='$course_name', course_poster='course_assets/course-img/$course_id.jpg', course_prize='$course_prize' WHERE course_id='$course_id'";
            if ($db->query($user_whistles) === TRUE) {
                $alert_message = "Update Sucessfull";
            }

            else{
                $alert_message = "Error user enroll update: " . $db->error;  
            }  

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
                // update course name
            $course = "UPDATE course SET course_name='$course_name', course_about='$course_about', course_require='$course_required', course_poster='course_assets/course-img/$course_id.jpg', course_prize='$course_prize', section='$section' WHERE course_id='$course_id'";
            if ($db->query($course) === TRUE) {

                $delete_lecture = "DELETE FROM lecture WHERE course_id='$course_id'";
                if ($db->query($delete_lecture) === TRUE) {
                                // Insert Lecture 
                                $count = count($_POST['lecture']);
                                for($i=0;$i<$count;$i++)
                                {

                                    $tmpFilePath =  $_FILES["lecture-notes"]['tmp_name'][$i];
                                    echo $tmpFilePath;
                                // $lecture_files_location = $lecture_files["tmp_name"][$i];

                                    //Make sure we have a file path
                                if ($tmpFilePath != ""){
                                    //Setup our new file path
                                    $newFilePath = "../../course_assets/lecture-notes/$course_id/$course_id-$i.zip";

                                    //Upload the file into the temp dir
                                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                                        $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes, lectute_duri, paid_free) 
                                        VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', 'course_assets/lecture-notes/$course_id/$course_id-$i.zip', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                                        if ($db->query($lecture_insert) === TRUE) {
                                        echo "New record created successfully";
                                        } 
                                        
                                        else {
                                        echo "Error: " .$lecture_insert. "<br>" . $db->error;
                                        }

                                    }
                                }
                    

                                else{
                                    $tmp_value = $_POST['lecture-value'][$i];

                                        $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes,  lectute_duri, paid_free) 
                                        VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', '$tmp_value', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                                        if ($db->query($lecture_insert) === TRUE) {
                                        echo "New record created successfully";
                                        } 
                                        
                                        else {
                                        echo "Error: " .$lecture_insert. "<br>" . $db->error;
                                        }
                                    
                                }

                            }
                } 
                
                else {
                    $alert_message = "Error deleting record: " . $db->error;
                }
                 
            } 
            
            else {
                $alert_message = "Error: " . $course . "<br>" . $db->error;
            }

            // user enroll update
            $user_enroll = "UPDATE user_enroll SET course_name='$course_name', poster='course_assets/course-img/$course_id.jpg', pay_rize='$course_prize' WHERE course_id='$course_id'";
            if ($db->query($user_enroll) === TRUE) {
                $alert_message = "Update Sucessfull";
            }

            else{
                echo "Error user enroll update: " . $db->error;  
            }

            // user_whistles update
            $user_whistles = "UPDATE user_whistles SET course_name='$course_name', course_poster='course_assets/course-img/$course_id.jpg', course_prize='$course_prize' WHERE course_id='$course_id'";
            if ($db->query($user_whistles) === TRUE) {
                $alert_message = "Update Sucessfull";
            }

            else{
                $alert_message = "Error user enroll update: " . $db->error;  
            }
            
            }

    
          }

          else{
              echo "course img not upload";
          }
        }
    
        else{
            $alert_message = "Poster Size 750 x 546";
         }
   }

     // Without poster upload 
   else{
       
    if($lecture_img_location != ""){

        // lecture img
        list($lecture_img_width, $lecture_img_height) = getimagesize($lecture_img_location);
        if($lecture_img_width == 400 && $lecture_img_height == 206){

        if(move_uploaded_file($lecture_img_location,"../../course_assets/lecture-img/$course_id.jpg"))
        {
            // insert course name
       $course = "UPDATE course SET course_name='$course_name', course_about='$course_about', course_require='$course_required', course_poster='course_assets/course-img/$course_id.jpg', course_prize='$course_prize', section='$section' WHERE course_id='$course_id'";
       if ($db->query($course) === TRUE) {

           $delete_lecture = "DELETE FROM lecture WHERE course_id='$course_id'";
           if ($db->query($delete_lecture) === TRUE) {
                    // Insert Lecture 
                    $count = count($_POST['lecture']);
                    for($i=0;$i<$count;$i++)
                    {

                        $tmpFilePath =  $_FILES["lecture-notes"]['tmp_name'][$i];
                        echo $tmpFilePath;
                    // $lecture_files_location = $lecture_files["tmp_name"][$i];

                        //Make sure we have a file path
                    if ($tmpFilePath != ""){
                        //Setup our new file path
                        $newFilePath = "../../course_assets/lecture-notes/$course_id/$course_id-$i.zip";

                        //Upload the file into the temp dir
                        if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                            $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes, lectute_duri, paid_free) 
                            VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', 'course_assets/lecture-notes/$course_id/$course_id-$i.zip', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                            if ($db->query($lecture_insert) === TRUE) {
                            echo "New record created successfully";
                            } 
                            
                            else {
                            echo "Error: " .$lecture_insert. "<br>" . $db->error;
                            }

                        }
                    }


                    else{
                        $tmp_value = $_POST['lecture-value'][$i];

                            $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes,  lectute_duri, paid_free) 
                            VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', '$tmp_value', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                            if ($db->query($lecture_insert) === TRUE) {
                            echo "New record created successfully";
                            } 
                            
                            else {
                            echo "Error: " .$lecture_insert. "<br>" . $db->error;
                            }
                        
                    }

                    }
           } 
           
           else {
              $alert_message = "Error deleting record: " . $db->error;
           }
            
       } 
       
       else {
          $alert_message = "Error: " . $course . "<br>" . $db->error;
       } 

        // user enroll update
        $user_enroll = "UPDATE user_enroll SET course_name='$course_name', poster='course_assets/course-img/$course_id.jpg', pay_rize='$course_prize' WHERE course_id='$course_id'";
        if ($db->query($user_enroll) === TRUE) {
            $alert_message = "Update Sucessfull";
        }

        else{
            $alert_message = "Error user enroll update: " . $db->error;  
        }

        // user_whistles update
        $user_whistles = "UPDATE user_whistles SET course_name='$course_name', course_poster='course_assets/course-img/$course_id.jpg', course_prize='$course_prize' WHERE course_id='$course_id'";
        if ($db->query($user_whistles) === TRUE) {
            $alert_message = "Update Sucessfull";
        }

        else{
            $alert_message = "Error user enroll update: " . $db->error;  
        }
        }

        else{
            echo "Lecture img not upload";
        }
    }

    else{
        echo "Lecture img 400 x 206";
    }
}

else{
   // insert course name
   $course = "UPDATE course SET course_name='$course_name', course_about='$course_about', course_require='$course_required', course_poster='course_assets/course-img/$course_id.jpg', course_prize='$course_prize', section='$section' WHERE course_id='$course_id'";
   if ($db->query($course) === TRUE) {

       $delete_lecture = "DELETE FROM lecture WHERE course_id='$course_id'";
       if ($db->query($delete_lecture) === TRUE) {
                                  // Insert Lecture 
                                    $count = count($_POST['lecture']);
                                    for($i=0;$i<$count;$i++)
                                    {
            
                                        $tmpFilePath =  $_FILES["lecture-notes"]['tmp_name'][$i];
            
                                        //Make sure we have a file path
                                 if ($tmpFilePath != ""){
                                        //Setup our new file path
                                        $newFilePath = "../../course_assets/lecture-notes/$course_id/$course_id-$i.zip";
            
                                        //Upload the file into the temp dir
                                        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
            
                                            $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes, lectute_duri, paid_free) 
                                            VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', 'course_assets/lecture-notes/$course_id/$course_id-$i.zip', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                                            if ($db->query($lecture_insert) === TRUE) {
                                            echo "New record created successfully";
                                            } 
                                            
                                            else {
                                            echo "Error: " .$lecture_insert. "<br>" . $db->error;
                                            }
            
                                        }
                                   }
                        
            
                                    else{
                                        $tmp_value = $_POST['lecture-value'][$i];

                                            $lecture_insert = "INSERT INTO lecture(course_id, course_name, lecture_sn_no, lecture_title, lecture_img, video_url, notes,  lectute_duri, paid_free) 
                                            VALUE('$course_id', '$course_name', '".$i."', '".$_POST['lecture'][$i]."', 'course_assets/lecture-img/$course_id.jpg',  '".$_POST['video-url'][$i]."', '$tmp_value', '".$_POST['video-time'][$i]."', '".$_POST['video-lock'][$i]."')";
                                            if ($db->query($lecture_insert) === TRUE) {
                                            echo "New record created successfully";
                                            } 
                                            
                                            else {
                                            echo "Error: " .$lecture_insert. "<br>" . $db->error;
                                            }
                                        
                                    }
            
                                }
       } 
       
       else {
          $alert_message = "Error deleting record: " . $db->error;
       }
        
   } 
   
   else {
      $alert_message = "Error: " . $course . "<br>" . $db->error;
   } 

    // user enroll update
    $user_enroll = "UPDATE user_enroll SET course_name='$course_name', poster='course_assets/course-img/$course_id.jpg', pay_rize='$course_prize' WHERE course_id='$course_id'";
    if ($db->query($user_enroll) === TRUE) {
        $alert_message = "Update Sucessfull";
    }

    else{
        $alert_message = "Error user enroll update: " . $db->error;  
    }

    // user_whistles update
    $user_whistles = "UPDATE user_whistles SET course_name='$course_name', course_poster='course_assets/course-img/$course_id.jpg', course_prize='$course_prize' WHERE course_id='$course_id'";
    if ($db->query($user_whistles) === TRUE) {
        $alert_message = "Update Sucessfull";
    }

    else{
        $alert_message = "Error user enroll update: " . $db->error;  
    }
}


   }
   
   echo $alert_message;

 }

 else{
    echo '<script>window.location.href = "../admin.php";</script>';

 }

 ?>