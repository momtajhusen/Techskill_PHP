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
 
 require("database.php");

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
 
   $course_id = mysqli_real_escape_string($db,$_POST["course_id"]);

   $alert_message;
 
   // Delete course
   $delete_course = "DELETE FROM course WHERE course_id='$course_id'";
    if ($db->query($delete_course) === TRUE) {
        $alert_message = "Success Course Delete";

       // Delete course poster
        $poster_path = "../../course_assets/course-img/".$course_id.".jpg"; 
        if (!unlink($poster_path)) { 
            $alert_message = "Poster cannot be deleted"; 
        } 
        else { 
            $alert_message = "Success Course Delete"; 
        }

        // Delete course poster
        $lecture_poster_path = "../../course_assets/lecture-img/".$course_id.".jpg"; 
        if (!unlink($lecture_poster_path)) { 
            $alert_message = "Lecture poster cannot be deleted"; 
        } 
        else { 
            $alert_message = "Lecture poster Delete"; 
        }

        // Delete Lecture Notes Folder
        // $notes_poster_path = "../../course_assets/lecture-notes/".$course_id.""; 
        // if (!DirectoryIterator($notes_poster_path)) { 
        //     $alert_message = "Lecture poster cannot be deleted"; 
        // } 
        // else { 
        //     $alert_message = "Lecture poster Delete"; 
        // }

                    // Delete lecture
                $delete_lecture = "DELETE FROM lecture WHERE course_id='$course_id'";
                if ($db->query($delete_lecture) === TRUE) {

                        // Check Enroll course
            $check_enroll = "SELECT course_id FROM user_enroll WHERE course_id='$course_id'";
            $enroll_result = $db->query($check_enroll);
            if ($enroll_result->num_rows != 0) {
                    // User Enroll course
                    $delete_course = "DELETE FROM user_enroll WHERE course_id='$course_id'";
                    if ($db->query($delete_course) === TRUE) {
                        $alert_message = "Success Course Delete";
                    } 
                    
                    else {
                        $alert_message = "Error deleting record: " . $db->error;
                    }
            }

                // Check whistles Course
                $user_whistles = "SELECT course_id FROM user_whistles WHERE course_id='$course_id'";
                $whistles_result = $db->query($user_whistles);
                if ($whistles_result->num_rows != 0) {
                        // User Enroll course
                        $whistles_course = "DELETE FROM user_whistles WHERE course_id='$course_id'";
                        if ($db->query($whistles_course) === TRUE) {
                            $alert_message = "Success Course Delete";
                        } 
                        
                        else {
                            $alert_message = "Error deleting record: " . $db->error;
                        }
                }
        } 
        
        else {
            $alert_message = "Error deleting record: " . $db->error;
        }
    } 
    
    else {
        $alert_message = "Error deleting record: " . $db->error;
    }

    echo $alert_message;

    
    }

    else{
       echo '<script>window.location.href = "../pages/login.php";</script>';

    }

?>
