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

//Create Section
$(document).ready(function(){
  $count = 6;
   $(".append-btn").click(function(){
    $count++;
      $(".lecture_box").append('\
      <div class="bg-light d-flex justify-content-around align-items-center lecture-box ">\
      <div class="d-flex justify-content-around align-items-center border border-2 p-2 play" video_url="url-'+$count+'"  lecture="lecture-'+$count+'" data-toggle="modal" data-target="#exampleModal" style="width:10%;background:#ddd;cursor:pointer;">\
      <i class="fa fa-play-circle"  aria-hidden="true"></i>\
     </div>\
      <input type="text" class="lecture-'+$count+'" required name="lecture[]" placeholder="Lecture Title"  style="width:25%;">\
      <input type="url" class="url-'+$count+'" required name="video-url[]" placeholder="Video Url"  style="width:20%;">\
      <input type="text" required name="video-time[]" placeholder="video duration"  style="width:20%;">\
      <select class="p-1" name="video-lock[]" style="width:20%;">\
      <option value="fa-lock">lock</option>\
      <option value="selected">Unlock</option>\
    </select>\
    <div class="bg-dark d-flex justify-content-center align-items-center" name="video-lock[]" style="width:5%;overflow:hidden;">\
    <input type="file" name="lecture-notes[]" id="file-'+$count+'" class="inputfile" accept=".zip" />\
       <label for="file-'+$count+'" class="d-flex p-2 m-0 justify-content-center" style="width:100%;height:100%;overflow:hidden;">\
         <i class="fa fa-file-pdf-o" aria-hidden="true"></i>\
     </label>\
  </div>\
      </div>');
   });
});


  //Update Lecture Create
  $(document).ready(function(){
    $counts = $(".total-lecture").val();
     $(".update-append-btn").click(function(){
      $counts++;
        $(".update_lecture_box").append('\
        <div class="bg-light d-flex justify-content-around align-items-center lecture-box ">\
        <div class="d-flex justify-content-around align-items-center border border-2 p-2 play" video_url="url-'+$counts+'"  lecture="lecture-'+$counts+'" data-toggle="modal" data-target="#exampleModal" style="width:10%;background:#ddd;cursor:pointer;">\
        <i class="fa fa-play-circle"  aria-hidden="true"></i>\
       </div>\
        <input type="text" class="lecture-'+$counts+'" required name="lecture[]" placeholder="Lecture Title"  style="width:35%;">\
        <input type="url" class="url-'+$counts+'" required name="video-url[]" placeholder="Video Url"  style="width:20%;">\
        <input type="text" required name="video-time[]" placeholder="video duration"  style="width:20%;">\
        <select class="p-1" name="video-lock[]" style="width:20%;">\
        <option value="fa-lock">lock</option>\
        <option value="selected">Unlock</option>\
      </select>\
      <div class="bg-dark d-flex justify-content-center align-items-center" name="video-lock[]" style="width:5%;overflow:hidden;">\
      <input type="file" name="lecture-notes[]" id="file-'+$counts+'" class="inputfile" accept=".zip" />\
      <input type="text" class="p-0 m-0 border-0" value="no-files" name="lecture-value[]" style="width:0px;"/>\
         <label for="file-'+$counts+'" class="d-flex p-2 m-0 justify-content-center" style="width:100%;height:100%;overflow:hidden;cursor:pointer;">\
           <i class="fa fa-file-pdf-o text-light" aria-hidden="true"></i>\
       </label>\
    </div>\
        </div>');
     });
  });


// Course Upload Coding 
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

// Course Update Coding 
$(document).ready(function(){
  $(".update_submit").submit(function(e){
     e.preventDefault();
      $.ajax({
        type : "POST",
        url : "php/update_course.php",
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

 


 






