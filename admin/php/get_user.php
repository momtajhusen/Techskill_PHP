<?php 
      require("database.php");
      

      // Course Details Reteive
         $signup_user = "SELECT * FROM signup_user"; 
         $get_signup_response = $db->query($signup_user);
         while($all_signup_user = $get_signup_response->fetch_assoc())
         {
            $first_name = $all_signup_user['first_name'];
            $last_name = $all_signup_user['last_name'];
            $email = $all_signup_user['email'];
            $user_pic = $all_signup_user['user_pic'];
            $status = $all_signup_user['verify_status'];
            $on_page = $all_signup_user['on_page'];
            $device = $all_signup_user['user_device'];
           

            // User whistles Count
            $enroll =  "SELECT COUNT(email) AS `count` FROM `user_enroll` WHERE email='$email'";
            $enroll_data = $db->query($enroll);
            while($enroll_user = $enroll_data->fetch_assoc())
            {
              $enroll_no = $enroll_user['count'];
            }
            
            // User whistles Count
            $whistles =  "SELECT COUNT(user_email) AS `count_whistles` FROM `user_whistles` WHERE user_email='$email'";
            $whistles_data = $db->query($whistles);
            while($whistles_user = $whistles_data->fetch_assoc())
            {
              $whistles_no = $whistles_user['count_whistles'];
            }

            // Check user online or offline
            $time = time();
            $user_status = 'offline';
            $class = "btn-dark";
            $fa_size = "10";
            $page_class = "d-block";
            if($all_signup_user['last_login']>$time){
              $user_status = 'online';
              $class = "btn-success"; 

            }

            elseif($device == "fa-mobile-phone"){
              $fa_size = "15";  
            }

            elseif($status == "pending"){
              $page_class = "d-none";
            }



            echo '<div class="p-2 lg:w-1/3 md:w-1/2 w-full">
            <div class="h-full user-box animate__animated flex items-center border-gray-200 border p-4 rounded-lg" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;overflow:hidden;position:relative;">
              <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="'.$user_pic.'">
              <div class="m-2 d-flex justify-content-center align-content-center " style="position:absolute;top:0px;right:0px;">

                <div class="bg-dark '.$page_class.' text-light m-1 p-1 px-2 rounded" style="font-size:10px;">
                   <span>'.$on_page.'</sapan>&nbsp&nbsp<i class="fa '.$device.'" style="font-size:'.$fa_size.'px"></i>
                </div>
                
                <div class="'.$class.' text-light m-1 p-1 rounded px-2" style="font-size:10px;">'.$user_status.'</div>
              </div>
              
              <div class="flex-grow">
                <h2 class="text-gray-900 title-font font-medium">'.$first_name.' '.$last_name.'</h2>
                <p class="text-gray-500 user-gmail">'.$email.'</p>
                <div class="d-flex align-items-center justify-content-around" style="font-size:13px;">
                
                <p class="text-gray-500 mr-4 enroll-course" user_email="'.$email.'" user_name="'.$first_name.' '.$last_name.'" data-toggle="modal" data-target="#myModal" style="cursor:pointer;">
                  <i class="fa fa-play-circle mr-2"></i><b>Buy : '.$enroll_no.'</b>
                </p>

                <p class="text-gray-500 mr-4 like-course" user_email="'.$email.'" user_name="'.$first_name.' '.$last_name.'" data-toggle="modal" data-target="#myModal" style="cursor:pointer;">
                  <i class="fa fa-heart mr-2"></i><b>Like : '.$whistles_no.'</b>
                </p>

                <p class="text-gray-500">
                  <b> '.$status.'</b>
                </p>
               </div>
              </div>
            </div>
          </div>';
         }
   ?>

<script>
// Check user which enroll course
$(document).ready(function(){
    $(".enroll-course").each(function(){
      $(this).click(function(){
         var user = $(this).attr("user_email");
         var user_name = $(this).attr("user_name");
         $(".modal-title").html(user_name+" Purchased Course.");
        $.ajax({
            type : "POST",
            url : "../php/get_user_enroll.php",
            data : {
              user_email : user
            },
            success : function(response){
             
             if(response != ""){
              $(".buy-course-box").html(response);
             }

             else{
              $(".buy-course-box").html("<h3>This Use No Purched Any Course</h3>");
             }
            }
          });
      });
    });
  });
 

   // Check user which wishlish course
   $(document).ready(function(){
    $(".like-course").each(function(){
      $(this).click(function(){
         var user = $(this).attr("user_email");
         var user_name = $(this).attr("user_name");
         $(".modal-title").html(user_name+" Liked Course.");
        $.ajax({
            type : "POST",
            url : "../php/get_user_widhlish.php",
            data : {
              user_email : user
            },
            success : function(response){
             
             if(response != ""){
              $(".buy-course-box").html(response);
             }

             else{
              $(".buy-course-box").html("<h3>This Use No Like Any Course</h3>");
             }
            }
          });
      });
    });
  });

</script>