<?php 
 require("../admin/php/database.php");
 session_start();

 if(isset($_SESSION['course_click']))  
 {
    $course = $_SESSION['course_click'];
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

 $all_comments;
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
  $all_comments = $_POST['all_comment'];
  $message_query = "SELECT * FROM user_query  WHERE course_id='$course' ORDER BY id DESC LIMIT $all_comments"; 
            $meaasage_query_response = $db->query($message_query);
                while($meassage_data = $meaasage_query_response->fetch_assoc())
            {
              $query_id  = $meassage_data['id']; 
              $query_user  =   $meassage_data['user'];
              $names  =   $meassage_data['name'];
              $message  =   $meassage_data['query_message'];
              $date = $meassage_data['date'];

             

                    echo  '<div class="user">

                    <div id="user-message-box" class="h-100 d-flex justify-content-between  p-3 pt-0" style="width:100%;float:left;">
                    <div class="d-flex flex-column">
                      <b>'.$names.'</b>
                      <span style="color:#ccc;">'.$date.'</span>
                      <span>'.$message.'</span>
                    </div>

                    <div class="delete-edit-box d-none" quert_user="'.$query_user.'" account_user="'.$user_email.'">
                       <i class="fa fa-trash trash-icon" course="'.$query_id.'" aria-hidden="true" style="cursor:pointer"></i>
                    </div>

                

                    </div>
                    <hr class="w-100" style="height:1px;border-width:0;color:gray;background-color:gray">
                </div>
                
                ';
            }
 }

 else{
  $all_comments = 4;
 $message_query = "SELECT * FROM user_query  WHERE course_id='$course' ORDER BY id DESC LIMIT $all_comments"; 
            $meaasage_query_response = $db->query($message_query);
         
                while($meassage_data = $meaasage_query_response->fetch_assoc())
            {
              $query_id  = $meassage_data['id']; 
              $query_user  =   $meassage_data['user'];
              $names  =   $meassage_data['name'];
              $message  =   $meassage_data['query_message'];
              $date = $meassage_data['date'];

            

                    echo  '<div class="user">

                    <div id="user-message-box" class="h-100 d-flex justify-content-between  p-3 pt-0" style="width:100%;float:left;">
                    <div class="d-flex flex-column">
                      <b>'.$names.'</b>
                      <span style="color:#ccc;">'.$date.'</span>
                      <span>'.$message.'</span>
                    </div>

                    <div class="delete-edit-box d-none" quert_user="'.$query_user.'" account_user="'.$user_email.'">
                       <i class="fa fa-trash trash-icon" course="'.$query_id.'" aria-hidden="true" style="cursor:pointer"></i>
                    </div>

                

                    </div>
                    <hr class="w-100" style="height:1px;border-width:0;color:gray;background-color:gray">
                </div>
                
                ';
            }
 }
                       
            

        ?>


<script>
    // User Query delete & Edit 
$(document).ready(function(){
  $(".delete-edit-box").each(function(){
    var query_user = $(this).attr('quert_user');
    var account_user = $(this).attr('account_user');
     if(query_user != account_user){
        $(this).addClass("d-none");   
     }

     else{
      $(this).removeClass("d-none"); 
     }

 
  });

});


// Query Delete
$(document).ready(function(){
  $(".trash-icon").each(function(){
    $(this).click(function(){
      var course_id = $(this).attr('course');

      $(this).parent().parent().parent().addClass("d-none");

      $.ajax({
       type : "POST",
       url : "../php/query_delete.php",
       data : {
         course_id : course_id
       },
       beforeSend : function(){
        // $(this).removeClass("fa-trash");
        // $(this).addClass("fa-spinner");
       },
       success : function(response){

           if(response.trim() == "Delete success"){
             //  alert("Delete Success");
             getQuerymessage();
             var comment = parseInt($(".total-comment").html());
             $(".total-comment").html(comment-1);
           }
           
       }
     });

    });
  });
});
</script>