<?php 
   require("../admin/php/database.php");
 session_start();
        $course_id = $_SESSION['course_click'];
        //  User Email And Course Name Baypass Hidden
        echo '<span class="course_id" course="<?php echo $course_id; ?> p-0 m-0"></span>';
        echo '<span class="user_email" user="<?php echo $user_email; ?> p-0 m-0"></span>';

        if(isset($_SESSION['account_gmail']))    
        {  
        $user_email = $_SESSION['account_gmail'];
        }

        else
        {
        $user_email  = "User not login";
        }

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
           $btn_no = $_POST['btn_no'];
           $per_pages_lecture = $_POST['per_pages_lecture'];

            $this_page = ($btn_no-1)*$per_pages_lecture;
        }

                   $query = "SELECT * FROM lecture  WHERE course_id='$course_id' LIMIT $this_page,$per_pages_lecture"; 
                   $query_response = $db->query($query);

           
                 while($lecture_data = $query_response->fetch_assoc())
              {
                $video_title  =  $lecture_data['lecture_title'];
                $video_no  =  $lecture_data['lecture_sn_no'];
                $video_img  =  $lecture_data['lecture_img'];
                $video_url  =  $lecture_data['video_url'];
                $video_notes  =  $lecture_data['notes'];
                $video_duri  =  $lecture_data['lectute_duri'];  
                $video_lock  =  $lecture_data['paid_free'];

                $files;

                 $http = $_SERVER['REQUEST_SCHEME'] . '://';
                 $server_name = $_SERVER['SERVER_NAME'];

                // Start Check notes avable or not
                if($video_notes != "no-files"){
                  $files = '<a href="https://'.$server_name.'/'.$video_notes.'" class="lecture-notes" download="'.$video_title.'-Lect-'.$video_no.'">
                  <div class="d-flex px-2 h-100 text-light justify-content-center align-items-center"  data-toggle="modal">
                      <img src="../image/download_icon.png" style="width:18px;">  
                  </div>
                  </a>';
                }
                else{
                  $files = '<div class="d-flex px-2 h-100 text-light justify-content-center align-items-center" >
                     <p style="width:18px;"></p>  
                   </div>';
                }
                // End Check notes avable or not

                  //Start Video URL Secure 
                  if($user_email != "User not login"){

                    if($video_lock == "fa-lock"){
                        // Check course user buy or not 
                        $course_check = "SELECT course_id FROM user_enroll WHERE email='$user_email' AND course_id='$course_id'";
                        $course_result = $db->query($course_check);
                        if ($course_result->num_rows == 0){
                            $video_url = "#";
                        }
                    }
                  }
                  else{
                    if($video_lock == "fa-lock"){
                       $video_url = "#";
                    }
                  }
                   //End Video URL Secure

                   //Start Check this course user Buy or not
                    $course_buy = "SELECT course_id FROM user_enroll WHERE email='$user_email' AND course_id='$course_id'";
                    $buy_result = $db->query($course_buy);
                    if ($buy_result->num_rows != 0){
                      $video_lock = "selected";
                    }

                   //Start Check this course user Buy or not

                  $video_no++;
                   for ($x = 1; $x <= 9; $x++) {
                      if($video_no == $x){
                        $video_no = "0$x";
                      }
                  }

                      echo  '<div class="d-flex" style="height:55px; margin-bottom:1px; cursor:pointer; width:100%;border-radius:3px;  background: #000000; background: -webkit-linear-gradient(to right, #434343, #000000); background: linear-gradient(to right, #434343, #000000);  ">
                      <div class="d-flex py-1  video-container" id="video-container" data-toggle="modal" link="'.$video_url.'" style="height:55px; margin-bottom:1px; cursor:pointer; width:100%;border-radius:3px;  background: #000000; background: -webkit-linear-gradient(to right, #434343, #000000); background: linear-gradient(to right, #434343, #000000);  ">
                      <div class="text-light px-2 d-flex justify-content-center align-items-center"><b>'.$video_no.'</b></div>
                         
                          <div style="overflow:hidden;position:relative;" class="d-flex lecture-img-box justify-content-center align-items-center">
                           
                         <div class="w-100 h-100 bg-dark" style="position:absolute;top:0px;left:0px;opacity:0.8;"></div>
                           <i class="fa fa-play-circle text-light" aria-hidden="true" style="position:absolute;"></i>
                            <img src="../'.$video_img.'" width="100%" height="100%" alt="">
                            <span class="text-light" style="position:absolute;bottom:0px;right:5px;font-size:10px;">'.$video_duri.'</span>
                         </div>
                          
                         <div style="width:10%;" class="d-flex text-light justify-content-center align-items-center">
                            <i class="fa '.$video_lock.' lock_unlock" aria-hidden="true"></i>
                         </div>
                           
                         <div style="font-size:13px; overflow:hidden;" class="d-flex title-name text-light pt-2 align-items-start">'.$video_title.'</div>
                          
                       </div>
                       '.$files.'
                       </div>
                       ';
              }

              ?>

<script>

// Notes Download 
$(document).ready(function(){
  $(".lecture-notes").each(function(){
 
    var lock_unlock = $(this).parent().children().find(".lock_unlock").attr("class");
    
 
       if(lock_unlock.match("fa-lock")){
         $(this).removeAttr("download");
         $(this).attr("href","#");
         $(this).children().attr("data-target","#exampleModalCenter");
       }
 
 
  });
});
  
// video play 
  $(document).ready(function(){
     $(".video-container").each(function(){
        
        $(this).click(function(){

          
          var lock_unlock = $(this).find('.lock_unlock').attr('class');
           if(lock_unlock.match("fa-lock"))
           {

             $(this).attr("data-target","#exampleModalCenter");

           }

           else{
            var video_link = $(this).attr("link");
            var video_frame = $('iframe').attr("src");
            $("iframe").attr('src', video_link);

            $(".video-container").css("background-image","linear-gradient(to right, #434343, #000000)");
            $(this).css("background","#000");
           }
        });

     }); 
  });

  // Check User this course Buy or Not
  // $(document).ready(function(){
    
  //   var course = $(".course_id").attr('course');
  //   var user = $(".user_email").attr('user');
   
  //     $.ajax({
  //            type : "POST",
  //            url : "../php/inroll_course_buy.php",
  //            data : {
  //              course_id : course, 
  //              user_name : user
  //            },
  //            success : function(response){
  //            if(response.trim() == "This Course Buy"){
  
  //             $(".lock_unlock").each(function(){
  //               $(this).removeClass("fa-lock");
  //             });
  
  //             $(".buy_like_box").removeClass("d-flex");
  //             $(".buy_like_box").addClass("d-none");
  
  //            }

  //           //  else{
  //           //   $(".lock_unlock").each(function(){
  //           //     $(this).addClass("fa-lock");
  //           //   });
  //           //  }
   
  
  //          }
  
  //          });
  //   });

</script>