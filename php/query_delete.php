<?php 
 require("../admin/php/database.php");
 session_start();

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {

    $course_id = mysqli_real_escape_string($db,$_POST["course_id"]);


   $delete_query = "DELETE FROM user_query WHERE id = '$course_id';";

    if ($db->query($delete_query) === TRUE) {
        echo "Delete success";
       }

        else{
            echo "Delete fails".$db->error; 
        }
 
 }

 else{
    echo '<script>window.location.href = "../index.php";</script>';
 }


?>