<?php
session_start();
$con=mysqli_connect("sql302.epizy.com","epiz_30522185","dAjkcnMg9kKGG","epiz_30522185_techskill");
$name=mysqli_real_escape_string($con,$_POST['name']);
$id=mysqli_real_escape_string($con,$_POST['id']);

echo $name;

echo $id;


// $res=mysqli_query($con,"select * from user where fb_id='$id'");
// $_SESSION['FB_ID']=$id;
// $_SESSION['FB_NAME']=$name;
// if(mysqli_num_rows($res)>0){
	
// }

// else{
// 	mysqli_query($con,"insert into user(name,fb_id) values('$name','$id')");
// }
?>