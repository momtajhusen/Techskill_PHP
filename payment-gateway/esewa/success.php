<?php 
  session_start();
 if(isset($_SESSION["pay_success"]))    
 {
  $course_id = $_SESSION['course_buy'];
 }
 
 else
 {
   echo '<script>window.location.href = "../../pages/inroll.php";</script>';
    exit("page not fount");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tech Skill</title>

	
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- JS, Popper.js, jQuery, Bootstrap.js-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


</head>
<body  style="background-color:#ddd;">
<?php
 $full_name = $_SESSION["account_name"].' '.$_SESSION["last_name"];

?>

<div class="d-flex justify-content-center align-items-center" style="width:100%;height:100vh;">

  <div class="bg-dark rounded shadow-lg animate__animated animate__bounceIn" style="width:350px; height:90%;overflow:hidden;">
     <div class="d-flex py-3 justify-content-center align-items-center flex-column" style="background-color:#8BC34A;">
		  <h4><b class="text-light" style="letter-spacing: 3px;">SUCCESS</b></h4>
		  <h4><?php echo $full_name; ?></h4>
		  <span class="w-100" align="center">Congratulations, your course has been successfully purchesed.</span>
		  <!-- <span class="w-100" align="center">This course all lecture unlocked now learn countinus.</sapn> -->
	  </div>

	   <div style="border-right:  8px solid #8BC34A; border-left: 8px solid #8BC34A; border-bottom: 8px solid #8BC34A;position:relative; ">
	     <div class="bg-dark w-100 h-100 d-flex justify-content-center align-items-end" style="position: absolute;top:0px; opacity:0.6;">
		    <a href="../../pages/inroll.php"><button class="btn shadow-none border btn-dark px-5 mb-2">Learn Now</button></a>
		 </div>
	      <img class="card-img-top" src="../../course_assets/course-img/<?php echo $course_id; ?>.jpg" height="" alt="Card image cap">
       </div>
	   <div>
		   <span class="px-5 pt-3 d-flex justify-content-center align-items-center" align="center" style="color:#888;">This course add in your profile <br> My course Section.</span>
		   <span class="px-4 pt-3 d-flex justify-content-center align-items-center" align="center" style="color:#888;">All lecture lock remove for this course<br> Now you can learn easly.</span>
		   <span class="px-4 pt-3 d-flex justify-content-center align-items-center" align="center" style="color:#888;">If you face any kind of problems than contact us from contacts us section.</span>

	   </div>

    </div>
	
</body>
</html>