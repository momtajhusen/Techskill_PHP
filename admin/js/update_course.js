$(document).ready(function(){
    $(".sidebar-menu li").each(function(){
        $(this).click(function(){
            $(".sidebar-menu li").css("background-color", "#F7546E");
            $(".sidebar-menu li").css("color", "#FFFFFF");

            $(this).css("background-color", "#F2F5FC");
            $(this).css("color", "#F7546E");
        });
    });
});

$(document).ready(function(){
   $(".menu-btn").click(function(){
       $(".main-content").css({"position":"absolute"});
       $(".sidebar").css({"position":"relative","left":"0px"});
   });
});

$(document).ready(function(){
   $(".close-btn").click(function(){
       $(".sidebar").css({"position":"absolute","left":"-300px"});
   });
});

// Course Upload Coding 
//Create Section
 
  $(document).ready(function(){
     $(".append-btn").click(function(){

        $(".lecture_box").append('\
        <div class="bg-light d-flex justify-content-around align-items-center lecture-box">\
        <input type="text" name="lecture[]" placeholder="Lecture Title"  style="width:35%;">\
        <input type="url" name="video-url[]" placeholder="Video Url"  style="width:20%;">\
        <input type="text" name="video-time[]" placeholder="time"  style="width:20%;">\
        <select class="p-1" name="video-lock[]" style="width:25%;">\
        <option value="fa-lock">lock</option>\
        <option value="">Unlock</option>\
      </select>\
        </div>');
     });
  });



  $(document).ready(function(){
    $(".course_submit").submit(function(e){
       e.preventDefault();
        $.ajax({
          type : "POST",
          url : "php/course.php",
          data : new FormData(this),
          contentType : false,
          processData : false,
          catch : false,
          success : function(response){
            alert(response);
          }
        });

  });
});

 


 






