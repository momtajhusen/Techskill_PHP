<?php 
 session_start();
 unset($_SESSION['course_click']);
 unset($_SESSION['course_buy']);
 if(isset($_SESSION['password_verify']))    
 {
    echo "";
 }
 
 else
 {
   echo '<script>window.location.href = "../index.php";</script>';
    exit("page not fount");
 }
  
 $email = $_SESSION["password_verify"];

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tech Skill</title>
    <!-- title icon -->
    <link rel = "icon" href ="../image/title.jpg" type = "image/x-icon">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<!--.................................. CDN ..................................-->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- JS, Popper.js, jQuery, Bootstrap.js-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- fa fa-icon Font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min"/>



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">


<style>
 

    .sigin_con{
        width:100%;
        height:100vh;
        background: #F5D2BB;
        overflow:hidden;
    }

    .sigin_box{
        width:330px;
        height:600px;
        background: #000232;
        box-sizing: border-box;
        border-radius:10px;
        box-shadow:0px 0px 10px 10px gray;
    }

    .logo-box{
        width: 100px;
        height:100px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border:5px groove #F5D2BB;

    }

    .header{
        height:35%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-left-radius: 40px;
        background-color:#990026;
        box-shadow: 0 8px 6px -6px black;
        animation: borde_anim 10s infinite;
       
    }

    @keyframes borde_anim {
        25%  {border-bottom-left-radius: 0px; border-bottom-right-radius: 50px;}
        50%  {border-bottom-right-radius: 0px;border-bottom-left-radius: 50px;}
        75%  {border-bottom-left-radius: 0px; border-bottom-right-radius: 50px;}
        100% {border-bottom-right-radius: 0px;border-bottom-left-radius: 50px;}
}

    @keyframes mymove {
        25%  {background-color:#990026;}
        50%  {background-color:#990000;}
        75%  {background-color:#000066;}
        100% {background-color:#4d4d4d;}
}



    form{
        height: 50%;
}

    .input-div{
        border-bottom:2px solid #B689B0;
    }

    input{
        background:none;
        outline:none;
        border:none;
        color:white;
    }
    p{
        color:#ddd;
        font-size:12px;
    }
</style>
  
</head>
<?php 
        require("../admin/php/database.php");

 
?>

<body oncontextmenu="return false" class="sigin_con d-flex justify-content-center align-items-center">

<div class="sigin_box">
     <div id="header" class="header   w-100 pt-3 pb-1  d-flex justify-content-center align-items-center flex-column">
         <div style="background-image: url('../image/verification.png); " class="logo-box bg-dark rounded-circle mb-2"></div>
         <h4 class="text-light">Verification</h4>
         <p class="p-0 m-0">We are send veryficatin code on this email</p>
            <p class="p-0 m-0 active-gmail"><?php echo $email; ?></p>
     </div>
 
       <form class="verify_form w-100 mt-3 pt-3 pb-1 d-flex justify-content-center align-items-center flex-column" enctype="multipart/form-data">
           

          <div class="mb-3 w-75 pr-4 input-div d-flex justify-content-center align-items-center animate__animated animate__zoomIn animate__slow animate__delay-2s">
           <input type="number" id="active-code" required name="verify_code" class="username py-2 w-100" placeholder="Verify Code">
          </div>
          
          <div class="mb-2 w-75">
             <button class="active-btn animate__animated animate__zoomInDown animate__slow  w-100 btn mb-2" style="background-color:#B689B0;">PROCEED</button>
          </div>

       </form>

</div>

</body>

<script>

$(document).ready(function(){

$(".active-btn").click(function(){
     
    if($("#active-code").val() != "")
{
     var code = btoa($("#active-code").val());
     var email = btoa($(".active-gmail").html());
     
     $.ajax({
       type : "POST",
       url : "../php/password_verify.php",
       data : {
         code : code,
         email : email
       },
       beforeSend : function(){
        $(".active-btn").html("wait..");
        $(".active-btn").css("opacity","0.5");
       },
       success : function(response){

           if(response.trim() == "Verify success"){
             window.location.href = "new_password.php"; 
           }

           else{
               alert(response);
           }

       }
     });
}

else{
  $(".active-btn").html("Enter code");
  setTimeout(function(){
      $(".active-btn").html("Check");
  },3000);
}
});

});

// Right Click Disable
$(document).ready(function () {
   $("body").on("contextmenu",function(e){
     return false;
   });
});

// inspect element disable 
document.onkeydown=function(e){
  // f12 disable
  if(event.keyCode == 123)
  {
    return false;
  }

  // ctrl+shift+i disable
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
    return false;
  }
  // ctrl+shift+j disable
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0))
  {
    return false;
  }

  // ctrl+shift+c disable
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0))
  {
    return false;
  }
  // ctrl+u disable
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0))
  {
    return false;
  }

}
</script>
   
</html>