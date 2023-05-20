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

$file_path =  $_POST['file_path'];
$file_delete = "UPDATE lecture SET notes='no-files' WHERE notes='$file_path'";

if ($db->query($file_delete) === TRUE){
  echo "Record updated successfully";

            $filename = "../../".$file_path;

            if (unlink($filename)) {
                echo 'The file was deleted successfully!';
            } else {
                echo 'There was a error deleting the file ';
            }

} 

else {
  echo "Error updating record: " . $db->error;
}

 }

 else{
  echo '<script>window.location.href = "../pages/login.php";</script>';
 }


?>
