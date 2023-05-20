<?php
  session_start();
  unset($_SESSION['course_click']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iPortfolio Bootstrap Template - Index</title>
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
 
 a:hover{
  text-decoration: none;
  color:white;
}
   a{
  text-decoration: none;
  color:white;
}

    .sigin_con{
        width:100%;
        height:100vh;
        background: #F5D2BB;
        overflow:hidden;
    }

    .sigin_box{
        width:330px;
        height:550px;
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
        require("../php/database.php");

 
?>

<body oncontextmenu="return false" class="sigin_con d-flex justify-content-center align-items-center">


<div class="sigin_box">
<div id="header" class="header w-100 py-5  d-flex justify-content-center align-items-center flex-column">
<a href="../index.php"><img class="img-fluid mb-2" src="../image/logo.png"  width="200px;"></a>
         <h6 class="text-light py-2">ADMIN LOGIN</h6>
         <p class="m-0">Enter your email or Password.</p>
     </div>
 
       <form class="login_form w-100 mt-3 pt-3 pb-1 d-flex align-items-center flex-column" enctype="multipart/form-data">

          <div class="mb-3 w-75 pr-4 input-div d-flex justify-content-center align-items-center animate__animated animate__zoomIn animate__slow animate__delay-2s">
          <i class="fa fa-envelope-o" style="font-size:20px; color:white;" aria-hidden="true"></i>
           <input type="email" required name="email" class="username user-email py-2 w-100 pl-3" placeholder="Email">
          </div>

          <div class="mb-2 w-75 pr-4 input-div d-flex justify-content-around align-items-center animate__animated animate__zoomIn animate__slow animate__delay-3s">
           <i class="fa fa-key animate__animated animate__swing animate__infinite animate__slower 3s" style="font-size:20px; color:white;" aria-hidden="true"></i>
           <input type="password" required name="password" class="password py-2 w-100 pl-3" placeholder="Password">
           <i class="fa fa-eye open-eye" style="font-size:20px; color:white;" aria-hidden="true"></i>
           <i class="fa fa-eye-slash close-eye d-none" style="font-size:20px; color:white;" aria-hidden="true"></i>
          </div>
          
              <a href="#" class="my-1 w-75 d-flex justify-content-end align-items-end animate__animated animate__slideInRight animate__slow animate__delay-4s">Forget password ?</a>
          
              <div class="mb-2 w-75">
              <button type="submit" id="submit" class="mt-2 text-light  font-weight-bold submit animate__animated animate__zoomInDown animate__slow  w-100 btn mb-2" style="background-color:#990026;">Login</button>
          </div>

       </form>




</div>


<script>
$(document).ready(function() {
  $(".open-eye, .close-eye").click(function(){
   if($(".password").attr("type") == "password"){
      $(".password").attr("type","text");
      $(".open-eye").addClass("d-none"); 
      $(".close-eye").removeClass("d-none");
   }

   else{
    $(".password").attr("type","password");
    $(".open-eye").removeClass("d-none"); 
    $(".close-eye").addClass("d-none");
   }

  }); 
});


$(document).ready(function(){
      $(".login_form").submit(function(e){
         e.preventDefault();
          $.ajax({
            type : "POST",
            url : "../php/login.php",
            data : new FormData(this),
            contentType : false,
            processData : false,
            catch : false,
            beforeSend: function beforeSend() {
              $("#submit").html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:20px;color:white"></i> Loading');
              $("#submit").attr("disabled","disabled");
              $("#submit").css("background-color", "#640119");

              $(".username").attr("disabled","disabled");
              $(".password").attr("disabled","disabled");
            
            },
            success : function(response){

            if(response.trim() == "Login Success"){
                $("#submit").html("<i class='fa fa-check' style='font-size:20px;color:white'></i> success"); 
                $("#submit").removeClass( "bg-warning" );
                $("#submit").addClass( "bg-success" ); 
                $("#submit").css("background-color", "#016420");
                location.replace("../admin.php");
            }

            
            else if(response.trim() == "Incrroct Email"){
                 $("#submit").html("Wrong Email"); 
                 $("#submit").addClass( "bg-danger" ); 
                 
                setTimeout(function(){
                    $("#submit").html("Login");
                    $(".username").removeAttr("disabled","disabled");
                    $(".password").removeAttr("disabled","disabled");
                    $("#submit").removeAttr("disabled","disabled");
                    $("#submit").removeClass( "bg-danger" );
                    $("#submit").removeClass( "bg-warning" );
                    $("#submit").css("background-color", "#990026");
                    
                }, 1000);
            }

            else if(response.trim() == "Incrroct password"){
                 $("#submit").html("Wrong Password"); 
                 $("#submit").addClass( "bg-danger" ); 
                 
                setTimeout(function(){
                    $("#submit").html("Login");
                    $(".username").removeAttr("disabled","disabled");
                    $(".password").removeAttr("disabled","disabled");
                    $("#submit").removeAttr("disabled","disabled");
                    $("#submit").removeClass( "bg-danger" );
                    $("#submit").removeClass( "bg-warning" );
                    $("#submit").css("background-color", "#990026");
                    
                }, 1000);
            }

            else if(response.trim() == "user not verify"){
                window.location.href='gmail_verify.php';
            }

            else{
                $("#submit").html("Incrroct"); 
                $("#submit").addClass( "bg-danger" ); 
                 
                setTimeout(function(){
                    $("#submit").html("Login");
                    $(".username").removeAttr("disabled","disabled");
                    $(".password").removeAttr("disabled","disabled");
                    $("#submit").removeAttr("disabled","disabled");
                    $("#submit").removeClass( "bg-danger" );
                    $("#submit").removeClass( "bg-warning" );
                    $("#submit").css("background-color", "#990026");
                    
                }, 1000); 
            }


            }
          });

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

</body> 
</html>