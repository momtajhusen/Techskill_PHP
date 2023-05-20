<?php 
 session_start();

echo "<h1>Login Success</h1>";

     echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
     echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
     echo '<h3><b>Name :</b> '.$_SESSION['user_name'].'</h3>';
     echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
     echo '<h3><a href="logout.php">Logout</h3></div>';

?>