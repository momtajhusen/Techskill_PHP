<?php 
  require("../admin/php/database.php");
   session_start();
   $_SESSION["on_page"] = "inroll.php";
   unset($_SESSION['course_buy']);
   if(isset($_SESSION['course_click']))    
   {
      echo "";
   }
   
   else
   {
     echo '<script>window.location.href = "../index.php";</script>';
      exit("page not fount");
   }
   
   if(isset($_SESSION['account_gmail']))    
   {  
    $user_email = $_SESSION['account_gmail'];
   }
   
   else
   {
    $user_email  = "User not login";
   }

   $course_id = $_SESSION['course_click'];

   if(isset($_SESSION['account_name']))    
{  
    $user_name = $_SESSION['account_name'];
    $user_name = "Sorry ".$user_name." !";

    $full_name = $_SESSION['account_name'].' '.$_SESSION['last_name'];

}

else
{
  $user_name = "";
}
 
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Skill</title>
      <!-- title icon -->
  <link rel = "icon" href ="../image/title.jpg" type = "image/x-icon">
    
      <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">



  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
  rel="stylesheet"
/>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>

  <!--.................................. CDN ..................................-->

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">



 
<!-- JS, Popper.js, jQuery, Bootstrap.js-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

 
<link rel="stylesheet" href="../css/inroll.css"> 
<style>
    /* width */
::-webkit-scrollbar {
  width: 0px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #03386F;
  padding-right:10px;
  border-radius:10px; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

header{
      width:100%;
      background:#006CA8;
      position:fixed;
      z-index: 10;
      box-shadow: 0 8px 6px -6px black;

  }

  .search-input{
    outline:none;
    border:none;
  }

  .search-icon{
    background:#03386F;
    border-radius:5px;
  }

  .paid-img{
      width:45px;
      position: absolute;
      right:-7.5px;
  }

  a{
  text-decoration: none;
  color:black;
}

a:hover { 
   text-decoration: none; 
   color:black;
}

.video-container:first{
 background: red;
}

.ratings i {
    color: #827A78;
    font-size: 10px;
    margin-left:5px;
}

.rating-color {
    color: #fbc634 !important
}

.login-btn,.profile-btn{
     border:1px solid white;
     border-radius:10px;
     font-weight:bold;
     font-family:sans-serif;
   
  }

  /* #preloader{
  background: black url("image/preloader.gif") no-repeat center;
  background-size: 10%;
  opacity: 0.8;
  width:100%;
  height:100vh;
  z-index: 200;
  position:fixed;
  top:0px;
  left:0px;
} */


/*Start loading lecture */
.text-placeholder {
  height: 8px;
  margin-bottom: 5px;
}

.placeholder {
  display: inline-block;
  background-color: #b0c0c7;
  animation-name: shine;
  animation-duration: 2.4s;
  animation-iteration-count: infinite;
}

@keyframes shine {
  0% { 
    opacity: 1;
  }
  50% {
    opacity: 0.35;
  }
  100% {
    opacity: 1;
  }
}


/*End loading lecture */
 
</style>
 
</head>
<body oncontextmenu="return false">

<!-- PreLoader -->
<!-- <div id="preloader"></div> -->

<!-- Header Contener-->
<header class=" px-3 justify-content-between align-items-center">

<a href="../index.php" ><img class="logo-img-pc" src="../image/logo.png"></a>

<div class="input-group d-flex justify-content-around align-items-center flex-column" style="width:400px;">
      <a href="index.php"><img class="logo-img-mobile mb-4 mt-1" src="../../image/logo.png" style="width:150px"></a>
      <div class="d-flex bg-light flex-column" style="overflow:hidden; border-radius: 8px;">
          <div class="d-flex justify-content-between align-items-center">
             <input placeholder="Search Course" class="search-input p-2 bg-light" type="text"><i class="fa fa-times search-cancle d-none search-icon p-2 m-2 text-light" aria-hidden="true"></i><i class="fa fa-search search-icon p-2 m-2 text-light" aria-hidden="true"></i>
          </div>
      </div>

      <!-- Search box Result-->
      <div class="search-result-box bg-light d-none py-3 justify-content-start align-items-center flex-column" style="height:auto; position:absolute; top:106%; width:95%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

      </div>
   </div>

   <div class="login_profile_box d-none d-md-block">
     <div>
       <a href="login.php" class="login-btn p-2 px-3 bg-light " style="cursor:pointer;">Login</a> 
       <div class="profile-btn px-1 bg-light d-flex justify-content-around align-items-center" style="height:40px;cursor:pointer;"> <i class="fa fa-user mx-2" aria-hidden="true"></i> <span class="profile_span">Profile</span> <i class="fa fa-caret-down mx-2" aria-hidden="true"></i></div> 
     </div>
   </div>

<div class=" profile-btn-box d-none" style="width:175px; position:absolute;top:85px;right:15px;z-index:100;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
  <div class="bg-light w-100 d-flex justify-content-center align-items-center flex-column">
    <a href="../index.php" class="p-1 w-100 profile_menu pl-2">Home</a>
     <a href="pc/profile.php" class="p-1 w-100 profile_menu pl-2">Profile</a>
     <a href="pc/my_course_pc.php" class="p-1 w-100 profile_menu pl-2">My Course</a>
     <a href="pc/my_whistles.php" class="p-1 w-100 profile_menu pl-2">My Wishlish</a>
     <a href="pc/all_course.php" class="p-1 w-100 profile_menu">All Course</a>
     <a href="../php/logout.php" class="p-1 w-100 profile_menu pl-2">Logout</a>
  </div>
</div>

</header>
<!-- Empety Header-->
<div class="empty-header"></div>
<span id="user_span" user="<?php echo $user_email; ?>" user_name="<?php echo $user_name; ?>" full_name="<?php echo $full_name; ?>"></span>

  <div class="p-3 d-md-none course-details" style="font-size:18px;background:#03386F;"><a href="../index.php"><b class="text-light"><i class="fa fa-angle-left mr-3 text-light" aria-hidden="true"></i> Course Details</b></a></div> 
 <div class="row flex-wrap-reverse w-100 p-0 m-0 row-container" style="background:#FEF8EF;">


 <!-- User Email And Course Name Baypass Hidden-->
 <span class="course_id" course="<?php echo $course_id; ?>"></span>
 <span class="user_email" user="<?php echo $user_email; ?>"></span>
 

 <?php 
   $course_details = "SELECT * FROM course WHERE course_id='$course_id'";
   $course_response = $db->query($course_details);
   $course_data = $course_response->fetch_assoc();
   $course_name = $course_data['course_name'];
   $course_about = $course_data['course_about'];
   $course_require = $course_data['course_require'];
   $course_prize = $course_data['course_prize']; 
   $course_poster = $course_data['course_poster'];

    // Total Enroll User
    $total_lecture= "SELECT COUNT(lecture_title) AS lecture_no FROM lecture WHERE course_id='$course_id'";
    $lecture_data = $db->query($total_lecture);
    $details_lecture = $lecture_data->fetch_assoc();
    $course_lecture = $details_lecture['lecture_no'];
 ?>

<span class="course_detais" course_name="<?php echo $course_name; ?>" course_about="<?php echo $course_about; ?>" course_poster="<?php echo $course_poster; ?>" course_prize="<?php echo $course_prize; ?>"></span>
  
 
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered d-flex justify-content-center " role="document">
    <div class="modal-content" style="width:70%;background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
      <div class="modal-header">
        <h6 class="modal-title text-light" id="exampleModalLongTitle"><?php echo "BUY NOW"; ?></h6>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

 
         <img src="<?php echo '../'.$course_poster; ?>" alt="" width="100%;">
 

         <div class="name-box py-1 my-3 px-2 d-md-flex  flex-column" style="height:50px;overflow:hidden;">
            <b class="card-text text-light " style="font-family:sans-serif;"><?php echo $course_name; ?></b>
          </div> 

          <a href="#" type="button" class="btn buy-btn mb-1 py-3 btn-secondary w-100" course_id="<?php echo  $_SESSION['course_click']; ?>" style="font-size:14px;">Buy ₹ : <?php echo  $course_prize; ?></a>
      </div>
 
    </div>
  </div>
</div>
 
   <!--Start Tabs Container-->
    <div class="col-sm-12 col-md-6 pt-2 pb-0" style="border-bottom:0.5px solid #ddd;background:#FEF8EF;">
    <ul class="nav nav-tabs mb-1 d-flex justify-content-around align-items-cente" id="myTab0" role="tablist">
      <li class="nav-item d-flex justify-content-center align-items-center" role="presentation" style="width:25%">
        <button class="nav-link w-100 active d-flex justify-content-center align-items-center" id="home-tab0" data-mdb-toggle="tab" data-mdb-target="#home0" type="button" role="tab" aria-controls="home" aria-selected="true" style="border-radius:0px;">
          Videos
      </button>
      </li>

      <li class="nav-item d-flex justify-content-center align-items-center" role="presentation" style="width:25%">
        <button class="nav-link w-100 d-flex justify-content-center align-items-center" id="profile-tab0" data-mdb-toggle="tab" data-mdb-target="#profile0" type="button" role="tab" aria-controls="profile" aria-selected="false" style="border-radius:0px;">
          Overview
        </button>
      </li>

      <li class="nav-item d-flex justify-content-center align-items-center" role="presentation" style="width:25%">
        <button class="nav-link w-100 d-flex justify-content-center align-items-center" id="profile-tab0" data-mdb-toggle="tab" data-mdb-target="#profile0" type="button" role="tab" aria-controls="profile" aria-selected="false" style="border-radius:0px;">
          Test
        </button>
      </li>



      <li class="nav-item d-md-none" role="presentation" style="width:25%">
        <button class="nav-link w-100 d-flex justify-content-center align-items-center" id="profile-tab0" data-mdb-toggle="tab" data-mdb-target="#comment" type="button" role="tab" aria-controls="profile" aria-selected="false" style="border-radius:0px;">
          Comments
        </button>
      </li>
 
</ul>

<div class="tab-content" id="myTabContent0">

  <!-- START VIDEO COURSE -->
  <div class="tab-pane fade show active" id="home0" role="tabpanel" aria-labelledby="home-tab0">
  <div id="accordion">




  <!-- VIDEO Category 1 -->
  <div class="card mt-1 mb-3">

  <?php
     $course = $_SESSION['course_click'];

  // Course Details Reteive

  $course_details ="SELECT * FROM course WHERE course_id='$course'";
  $course_response = $db->query($course_details);
                         
  while($course_data = $course_response->fetch_assoc())
{
  $course_id =  $course_data['section'];
}

echo '<div class="card-header py-1 bg-dark text-light" id="headingOne">
                   <h5 class="mb-0">
                     <div class="border-0 d-flex justify-content-between align-items-center py-2" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse" style="font-size:15px;">
                       <b class="d-flex justify-content-around align-items-center">'.$course_id.'</b>
                       <div class="d-flex justify-content-around align-items-center flex-column" style="font-size:10px;">
                          <span class="mb-1 total-lecture" lecture='.$course_lecture.'>'.$course_lecture.'</span>
                          <span>Total Lecture</span>
                       </div>
                     </div>    
                   </h5>
                 </div>
             
                 <div id="collaps" class="collapse show"  aria-labelledby="headingOne"  data-parent="#accordion">
                   <div class="card-body bg-dark px-2 pt-1 pb-0" >';

// 
   $result_per_page = 10;
   echo '<span class="per_page" per='.$result_per_page.'></span>';

      // Lecture query
         echo '<div class="lecture-box">
   
          </div>';

   $number_of_pages = ceil($course_lecture/$result_per_page);

  //  echo $this_page_first_result = ($page-1)*$result_per_page;
 
     // lecture 
     echo'<div class="w-100 py-3 justify-content-center align-items-center">';
    for($page=1;$page<=$number_of_pages;$page++){

      for ($x = 1; $x <= 9; $x++) {
        if($page == $x){
          $page = "0$x";
        }
    }
       echo '<button class="btn mx-1 mb-1 limit-btn" id="limit-ntn-'.$page.'" limit='.$page.' style="border:1px solid black;">'.$page.'</button>';
    }

    echo'</div>';




        // echo '<div class="w-100 py-2 d-flex justify-content-between align-center">
        //       <button class="btn add-lecture">More 40 Lectures</button>
        //       <button class="btn">View all Lectures</button>
        // </div>';
        
        echo '</div></div>';

                   
 ?>
    

  </div>
  <!-- VIDEO Category 1 -->


</div>
  </div>
    <!-- END VIDEO COURSE -->

  <!-- START OVERVIEW -->
  <div class="tab-pane p-3 fade" id="profile0" role="tabpanel" aria-labelledby="profile-tab0" style="text-align:justify;">
    <?php echo $course_require; ?>
  </div>
   <!-- END OVERVIEW -->

     <!-- START Comment -->
<?php  
    // Total comment
    $total_comment = "SELECT COUNT(query_message) AS comment_no FROM user_query WHERE course_id='$course'";
    $comment_data = $db->query($total_comment);
    $details_comment = $comment_data->fetch_assoc();
    $course_comment = $details_comment['comment_no'];

?>
     
  <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="profile-tab0" style="text-align:justify;">
    <div class="query-box w-100" style="position:relative;">
        <h5 class="p-2"><span class="total-comment"><?php echo $course_comment; ?></span> Comments</h5>

        <div class="w-100 mb-2">
              <form class="query_form" enctype="multipart/form-data">
                 <textarea class="p-2 w-100 rounded" required id="w3review" placeholder="Add Your Comment..." name="message" rows="2" style="width:100%; border:1px solid gray; none;outline:none;resize: none;background:#FEF8EF;"></textarea>
                 <input class="btn shadow-none border" id="submit" type="submit" value="Post Comment">
                 <input class="btn shadow-none border" type="reset" value="Cancle">
              </form>

              <hr class="w-100" style="height:1px;border-width:0;color:gray;background-color:gray">
        </div>

            <div class="overflow-auto">
               <div class="query_message">
                  <!-- Query message retrive here with Ajax    -->
              </div>
               <div class="w-100 pl-3 pb-3 d-flex justify-content-end">
                  <div class="btn text-lowercase shadow-none border all-coments">View all comments</div>
               </div>
            </div>

 

 
      </div>
  </div>
   <!-- END Comment -->

  <div class="tab-pane fade" id="contact0" role="tabpanel" aria-labelledby="contact-tab0">
    Tab 3 content
  </div>
</div>
    </div>
<!--End Tabs Container-->

<!--Start Tabs Container-->
 
    <div class="col-sm-12 mt-2 mt-md-4 col-md-6 video_query_container pb-3" style="position:relative;border-bottom:0.5px solid #ddd;background:#FEF8EF;">
      
    <!-- Video link  -->
    <?php 
      $course_first_lectre = "SELECT * FROM lecture WHERE course_id='$course'";
      $lecture_response = $db->query($course_first_lectre);
      $lecture_data = $lecture_response->fetch_assoc();
      $first_lecture = $lecture_data['video_url'];
    ?>

       <div style="padding:56.25% 0 0 0;position:relative;border-radius:10px;border:0px solid black;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;overflow:hidden;">
         <iframe src="<?php echo $first_lecture; ?>" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="momtaj"></iframe>
      </div><script src="https://player.vimeo.com/api/player.js"></script>
        
      <div class="w-100 d-flex pt-2 buy_like_box" style="height:70px;">
         <a class="w-100 buy-btn" href="#" course_id="<?php echo  $_SESSION['course_click']; ?>" ><div class="h-100 text-light w-100 mr-2 d-flex justify-content-center align-items-center" style="width:80%;background:#8710D8;"><b>BUY NOW RS : <?php echo $course_prize ; ?></b></div></a> 
          <div class="h-100 d-flex justify-content-center align-items-center like-icon text-dark" style="width:20%;cursor:pointer;"><i class="fa fa-heart" aria-hidden="true"></i></div>
      </div>



      <!-- Start Comment Box for pc-->
      <div class="query-box d-none d-md-block mt-2 w-100" style="overflow-wrap: anywhere;">
      <div class="w-100 d-flex justify-content-start">
        
         <h5 class="p-2"><span class="total-comment"><?php echo $course_comment; ?></span> Comment</h5>
      </div>

      <div class="w-100 mb-3">
      <form class="query_form" enctype="multipart/form-data">
                 <textarea class="p-2 w-100 rounded query_input" required id="w3review" placeholder="Add Your Comment..." name="message" rows="2" style="width:100%; border:1px solid gray; none;outline:none;resize: none;background:#FEF8EF;"></textarea>
                 <input class="btn border shadow-none" id="submit" type="submit" value="Post Comment">
                 <input class="btn border shadow-none" type="reset" value="Cancle">
              </form>

              <hr class="w-100" style="height:1px;border-width:0;color:gray;background-color:gray">

      </div>
        
            <div class="overflow-auto" style="height:380px;">
               <div class="query_message">
                  <!-- Query message retrive here with Ajax    -->
              </div>

               <div class="btn btn-sm my-3 ml-3 text-lowercase all-coments">View all comments</div>
            </div>

 

 
      </div>

      <!-- End Comment Box for pc-->
        
    </div>

  </div>
<!--End Tabs Container-->

 <!-- footer -->
 <div class="d-none d-md-block">
<?php
   include("footer.php");
?>
</div>


<script>
// all comment
$(document).ready(function(){
  $(".all-coments").click(function(){
    $(".total-comment").html();
    $.ajax({
          type : "POST",
            url : "../php/get_query_message.php",
          data : {
                all_comment : $(".total-comment").html()
              },

        success : function(response){
            $(".query_message").html(response);

            $(".all-coments").addClass("d-none");

          }
        });
  });
});

  // get lecture window load
  $(document).ready(function(){
    var btn_no = 1;
     var total_lecture = $(".total-lecture").attr('lecture');
     var per_pages_lecture = $(".per_page").attr("per");
     $("#limit-ntn-01").css("border", "1px solid #888");
              $.ajax({
                 type : "POST",
                  url : "../php/lecture.php",
                 data : {
                      btn_no : btn_no,
                      per_pages_lecture : per_pages_lecture
                    },

               success : function(response){
                  $(".lecture-box").html(response);
                }
        });
  });

  // add lecture click btn
  $(document).ready(function(){
    $(".limit-btn").each(function(){
      $(this).click(function(){
     var btn_no = $(this).attr("limit");
     var total_lecture = $(".total-lecture").attr('lecture');
     var per_pages_lecture = $(".per_page").attr("per");
     $(".limit-btn").css("border", "1px solid black");
     $(this).css("border", "1px solid #888");
              $.ajax({
                 type : "POST",
                  url : "../php/lecture.php",
                 data : {
                      btn_no : btn_no,
                      per_pages_lecture : per_pages_lecture
                    },

               success : function(response){
                  $(".lecture-box").html(response);
                }
        });

      });
    });
  });

$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});

 
// User Query message 
$(document).ready(function(){
      $(".query_form").submit(function(e){
        e.preventDefault();


        var login_user =  $("#user_span").attr("user");
        if(login_user != "User not login"){
         var message = $(".query_input").val();
         var user_name =  $("#user_span").attr("full_name");         

              $.ajax({
                type : "POST",
                url : "../php/query_message.php",
                data : new FormData(this),
                contentType : false,
                processData : false,
                catch : false,
                beforeSend: function(){
                  // $("#submit").attr("value", "wait..");
                  // $("#submit").attr("disabled","disabled");
                  // $("#submit").addClass( "bg-warning" );
                  // $(".username").attr("disabled","disabled");
                  // $(".password").attr("disabled","disabled");
                
                },
                success : function(response){
                  if(response.trim() == "Send success"){
                    //  alert("send Seccess");
                    // $(".query_input").val("");
                     getQuerymessage();
                     $('.query_form').trigger("reset");
                    var comment = parseInt($(".total-comment").html());
                    $(".total-comment").html(comment+1);
                  }

                }
              });
        }

        else{
          window.location.href = "login.php";
        }
      
 

    });


  });


  // get query message
  function getQuerymessage(){
     jQuery.ajax({
       url:'../php/get_query_message.php',
       success:function(response){
         $(".query_message").html(response);
         $(".all-coments").removeClass("d-none");
       }
     });
   }

   $(document).ready(function(){
     getQuerymessage();
   });
 

// $(document).ready(function(){
//   $(".video-container:first").removeAttr("style");
//   $(".video-container:first").css("background-color", "black");
// });

        // User Online offline & page Satus set.
        function updateUserStatus(){
     jQuery.ajax({
       url:'../php/user_status.php'
     });
   }

   setInterval(function(){
     if($("#user_span").attr("user") != "User not login"){
        updateUserStatus();
     }

   },2000);

  // Search with oninput video request
$(document).ready(function(){
   $(".search-input").on('input', function(){
     
      $(".search-result-box").addClass("d-flex");
      $(".search-result-box").removeClass("d-none");

      $(".search-icon").addClass("d-none");
     $(".search-cancle").removeClass("d-none");

     if($(this).val() != ""){
      var search_text = $(".search-input").val();

      $.ajax({
       type:"POST",
       url:"../php/inroll_search.php",
       data : {
           	 	search_text : search_text
           	 },
    /*  xhr : function(){
      var request = new XMLHttpRequest(); 
      request.onprogress = function(e){
         var loaded = (e.loaded/1024/1024).toFixed(2);
         var total = (e.total/1024/1024).toFixed(2);
         var percentage = ((loaded*100)/total).toFixed(0);
         $(".form-progress-bar").css({
         width : percentage+"%",
         });
      }
         return request;
      },*/
       success : function(response){
            var search = response;
         if(response.trim(search).match("paid-img")){
          $(".search-result-box").html(response);
         }

         else{
            var user_name = $("#user_span").attr("user_name");
            if(user_name != ""){
              user_name = "<b class='font-weight-bold mb-1'>"+user_name+"</b>";
            }

            else{
              user_name = "";
            }
            
          $(".search-result-box").html("<div class='alert-danger p-2 px-4 d-flex justify-content-center align-items-center flex-column' style='width:90%'>"+user_name+"<p class='font-weight-bold mb-1'> No matching courses Name  </p> <p>Try a diffrent search term</p></div>");
         }

          
    }
     });
     }

     else{
       $(".search-result-box").html("");
       $(".search-result-box").removeClass("d-flex");
       $(".search-result-box").addClass("d-none");
       $(".search-icon").removeClass("d-none");
       $(".search-cancle").addClass("d-none");
     }

     
   });
});

// Search with on click video request
$(document).ready(function(){
   $(".search-icon").click(function(){
     
      $(".search-result-box").addClass("d-flex");
      $(".search-result-box").removeClass("d-none");

      $(".search-icon").addClass("d-none");
     $(".search-cancle").removeClass("d-none");

      var search_text = $(".search-input").val();
      $.ajax({
       type:"POST",
       url:"../php/inroll_search.php",
       data : {
           	 	search_text : search_text
           	 },
    /*  xhr : function(){
      var request = new XMLHttpRequest(); 
      request.onprogress = function(e){
         var loaded = (e.loaded/1024/1024).toFixed(2);
         var total = (e.total/1024/1024).toFixed(2);
         var percentage = ((loaded*100)/total).toFixed(0);
         $(".form-progress-bar").css({
         width : percentage+"%",
         });
      }
         return request;
      },*/
      success : function(response){
            var search = response;
         if(response.trim(search).match("paid-img")){
          $(".search-result-box").html(response);
         }

         else{
            var user_name = $("#user_span").attr("user_name");
            if(user_name != ""){
              user_name = "<b class='font-weight-bold mb-1'>"+user_name+"</b>";
            }

            else{
              user_name = "";
            }
            
          $(".search-result-box").html("<div class='alert-danger p-2 px-4 d-flex justify-content-center align-items-center flex-column' style='width:90%'>"+user_name+"<p class='font-weight-bold mb-1'> No matching courses Name  </p> <p>Try a diffrent search term</p></div>");
         }

          
    }
     });
   });
});

// serch clear 
$(document).ready(function(){
  $(".search-cancle").click(function(){
     $(".search-input").val("");
      $(".search-result-box").html("");
      $(".search-result-box").removeClass("d-flex");
      $(".search-result-box").addClass("d-none");

      $(".search-icon").removeClass("d-none");
      $(".search-cancle").addClass("d-none");
  });
});

// Sesssion set click course
$(document).ready(function(){
$(".container-video").each(function(){
  $(this).click(function(){  
   var sesion_value = $(this).attr("course_id");
   $.ajax({
           type : "POST",
           url : "../../php/course_session.php",
           data : {
             session_name : sesion_value 
           }
         });
 
  });
  
});

});



  // Po pup buy box 
  $(document).ready(function(){
    $(".login-close").click(function(){
      $(".login-main-box").removeClass( "d-flex" );
      $(".login-main-box").addClass( "d-none" );
    });
  });

  

  // Buy Now Btn
    $(document).ready(function(){
      $(".buy-btn").click(function(){
        var user_name = $(".user_email").attr("user");

        var course_id = $(this).attr("course_id");

        if(user_name != "User not login"){
          $.ajax({
            type : "POST",
            url : "../php/course_pay_session.php",
            data : {
              course_id : course_id
            },
            success : function(response){
              if(response.trim() == "session set"){
                location.replace("../pages/pay_method.php");
              }
            }
          });

        }

        else{
          $(".buy-btn").attr("href","login.php");
        }
      });
    });

// Check this course Wishlish
// if user not login than whistles-icon hide
$(document).ready(function(){

  var user = $(".user_email").attr("user");
  var course_id = $(".course_id").attr("course");
  var user_full_name = $("#user_span").attr("full_name");

   if(user != "User not login"){

    $(".profile_span").html(user_full_name);
     $(".login-btn").addClass("d-none");
    $(".profile-btn").addClass("d-flex");
    $(".profile-btn").removeClass("d-none");
    $(".like-icon").addClass("d-flex"); 
    $(".like-icon").removeClass("d-none"); 
 
        $.ajax({
            type : "POST",
            url : "../php/check_wishlish.php",
            data : {
              user_email : user,
              course_id : course_id
            },
            success : function(response){
              if(response != ""){
                $(".like-icon").removeClass("text-dark"); 
                $(".like-icon").addClass("text-danger"); 
              }
      
            }
          });

   

   }

   else{
    $(".like-icon").removeClass("d-flex"); 
    $(".like-icon").addClass("d-none"); 

    $(".login-btn").removeClass("d-none");
    $(".profile-btn").removeClass("d-flex");
    $(".profile-btn").addClass("d-none");
   }
});

// Profile menu show
$(document).ready(function(){
  $(".profile-btn").click(function(){
    $(".profile-btn-box").removeClass("d-none");
  });

  $( ".header-transparant" ).mouseover(function(){
    $(".profile-btn-box").addClass("d-none");
  });
});

// Profile menu show
$(document).ready(function(){
  $(".profile_menu").hover(function(){
    $(this).css("background-color","black");
    $(this).css("color","white");
  });

  $( ".profile_menu" ).mouseout(function(){
    $(this).css("color","black");
    $(this).css("background-color","white");
  });
});


//// whistles course in database
$(document).ready(function(){
    $(".like-icon").click(function(){

      var like_color = $(this).attr("class").match("text-danger"); 
      if(like_color != "text-danger"){
        $(this).removeClass("text-dark");
        $(this).addClass("text-danger");

        var user_email = $(".user_email").attr("user");
        var course_id = $(".course_id").attr("course");
        var course_name = $(".course_detais").attr("course_name");
        var course_about = $(".course_detais").attr("course_about");
        var course_poster = $(".course_detais").attr("course_poster");
        var course_prize = $(".course_detais").attr("course_prize");
       

       $.ajax({
           type : "POST",
           url : "../php/my_whistles.php",
           data : {
            user_email : user_email,
            course_id : course_id,
            course_name : course_name,
            course_about : course_about,
            poster : course_poster,
            prize : course_prize
           }
         });
      }

      else{
        $(this).removeClass("text-danger");
        $(this).addClass("text-dark");
        var user_email = $(".user_email").attr("user");
        var course_id = $(".course_id").attr("course");
       $.ajax({
           type : "POST",
           url : "../php/del_my_whistles.php",
           data : {
            user_email : user_email,
            course_id : course_id
           }
         });
      }
       
    }); 
});

// hide menu box
$(document).ready(function(){
  $(".row-container").hover(function(){
    $(".profile-btn-box").addClass("d-none");
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

  // // ctrl+shift+i disable disable inspect Element
  // if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
  //   return false;
  // }
  // ctrl+shift+j disable disable inspect Element
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0))
  {
    return false;
  }

  // ctrl+shift+c disable disable inspect Element
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0))
  {
    return false;
  }

  // ctrl+u disable disable inspect Element 
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0))
  {
    return false;
  }

}

</script>
 
</body>
</html>