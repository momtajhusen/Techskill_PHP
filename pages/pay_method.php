<?php 
 session_start();
 $_SESSION["on_page"] = "pay_method.php";
 unset($_SESSION['pay_success']);
 require("../admin/php/database.php");
 if(isset($_SESSION['course_buy']))    
 {
  $course_id = $_SESSION['course_buy'];
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
  echo '<script>window.location.href = "login.php";</script>';
  exit("page not fount");
}


// Check course user buy or not 
$course_check = "SELECT course_id FROM user_enroll WHERE email='$user_email' AND course_id='$course_id'";
$course_result = $db->query($course_check);
if ($course_result->num_rows != 0){
  echo '<script>window.location.href = "inroll.php";</script>';
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
      <!-- title icon -->
  <link rel = "icon" href ="../image/title.jpg" type = "image/x-icon">
    

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
<link
 rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

  <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>

<!-- khalti api cdn  -->
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

 
<link rel="stylesheet" href="../css/mediaquery.css"> 
<style>
    /* width */
::-webkit-scrollbar {
  width: 0px;
}
 
 
  a:hover{
  text-decoration: none;
  color:black;
}
   a{
  text-decoration: none;
  color:black;
}


</style>
 
</head>
<body oncontextmenu="return false">

 
   
<!-- Main Container -->
<div class="content d-flex justify-content-center align-items-center" style="height:100vh;background:#FEF8EF;">

<?php
   $course_details = "SELECT * FROM course WHERE course_id='$course_id'";
   $course_response = $db->query($course_details);
   $course_data = $course_response->fetch_assoc();
   $course_name = $course_data['course_name'];
   $course_about = $course_data['course_about'];
   $course_require = $course_data['course_require'];
   $course_prize = $course_data['course_prize']; 
   $course_poster = $course_data['course_poster'];


?>

 
 
    <!-- Profile Container -->
    <div class="p-3 d-flex flex-column" style="width:360px; height:90%; border-top: 4px solid #888;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
       <div class="w-100 d-flex justify-content-center align-items-center flex-column" style="height:200px;background: #0f0c29;  /* fallback for old browsers */
                 background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
                 background: linear-gradient(to right, #24243e, #302b63, #0f0c29);"> 
          <img class="img-fluid mb-2" src="<?php echo "../".$course_poster; ?>"  style="width:150px;border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
          <b class="text-light"> <?php echo "PAY PRIZE NP ₹ <span id='course_amount'>".$course_prize."</span>" ?> </b>
          <span><?php echo "course : <span id='course_name'>".$course_name."</span>" ?></span>
          <b class="text-light"> <?php echo  "ORDS<span id='course_id'>" .$course_id."</span> "?> </b>
          
       </div>
 

       <!--Start Paytm  -->
          <form method="post" class="mb-1" action="../payment-gateway/Paytm/pgRedirect.php">
            <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS".rand(10000,999999999); ?>">
            <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo  "CUST".rand(1000,1000); ?>">
            <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
            <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
            <input type="hidden" title="TXN_AMOUNT" tabindex="10"  name="TXN_AMOUNT" value="<?php echo round($course_prize/1.6,) ?>">

            <button  type="submit" class="w-100 px-3 d-flex justify-content-between align-items-center mt-1 shadow-sm" style="height:60px;border:1px solid #ddd; cursor:pointer;outline:none;">
              <div class="d-flex align-items-center">
                <img class="img-fluid" src="../image/paytm.png" width="60px" alt="">
            </div>
              <div><b>PAY : <?php echo round($course_prize/1.6,) ?></b> <i class="fa fa-chevron-right" aria-hidden="true"></i></div>
            </button>
        </form>
    <!--End Paytm  -->

     <!--Start Esewa  -->
        <form action="https://uat.esewa.com.np/epay/main" class="mb-1" method="POST">
          <input value="<?php echo $course_prize; ?>" name="tAmt" type="hidden">
          <input value="<?php echo $course_prize; ?>" name="amt" type="hidden">
          <input value="<?php echo $course_id; ?>" name="product_id" type="hidden">
          <input value="0" name="txAmt" type="hidden">
          <input value="0" name="psc" type="hidden">
          <input value="0" name="pdc" type="hidden">
          <input value="EPAYTEST" name="scd" type="hidden">
          <input value="<?php echo rand(10000,999999999); ?>" name="pid" type="hidden">
          <input value="https://techskill.epizy.com/payment-gateway/esewa/esewa_payment_success.php" type="hidden" name="su">
          <input value="https://techskill.epizy.com/payment-gateway/esewa/esewa_payment_failed.php" type="hidden" name="fu">

          <button value="Submit" type="submit" class="w-100 px-3 d-flex justify-content-between align-items-center mt-1 shadow-sm" style="height:60px;border:1px solid #ddd; cursor:pointer;outline:none;">
            <div class="d-flex align-items-center">
                <img class="img-fluid" src="../image/esewa.png" width="80px" alt="">
            </div>
            <div><b>PAY : <?php echo $course_prize; ?></b> <i class="fa fa-chevron-right" aria-hidden="true"></i></div>
          </button>
        </form>
    <!--Start Esewa  -->

   <!--Start Card Payment  -->
      <div>
        <button value="Submit" type="submit" class="w-100 px-3 d-flex justify-content-between align-items-center mt-1 shadow-sm" style="height:60px;border:1px solid #ddd; cursor:pointer;outline:none;">
          <div class="d-flex align-items-center flex-column">
            <!-- <span>All Card Accept</span> -->
              <img class="img-fluid" src="../image/strip.png" width="80px" alt="">
          </div>
          <div><b>PAY : <?php echo $course_prize; ?></b> <i class="fa fa-chevron-right" aria-hidden="true"></i></div>
        </button>
    </div>
   <!--Start Card Payment  -->

<span class="khalti_result"></span>


      <!--Start Khalti  -->
      <button value="Submit" type="submit" id="payment-button" class="w-100 mb-1 px-3 d-flex justify-content-between align-items-center mt-1 shadow-sm" style="height:60px;border:1px solid #ddd; cursor:pointer;outline:none;">
        <div class="d-flex align-items-center">
            <img class="img-fluid" src="../image/khalti.png" width="80px" alt="">
        </div>
        <div><b>PAY : <?php echo $course_prize; ?></b> <i class="fa fa-chevron-right" aria-hidden="true"></i></div>
      </button>
  
    <script>
     
     function khaltiverification(payload){
      console.log(payload);
      $.ajax({
          type : "POST",
          url : '../payment-gateway/khaliti/khalti_verifaction.php',
          data: {
            coursedata : payload
          },
       success : function(response){
           alert(response);  
           $(".khalti_result").html(response);
       }
     });

   }
       var courseid = document.getElementById("course_id").innerHTML;
       var courseName = document.getElementById("course_name").innerHTML;
        var config = {
         
            // replace the publicKey with yours
            "publicKey": "test_public_key_921e5272029b48e1b5c2614c8ae5570e",
            "productIdentity": courseid,
            "productName": courseName,
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    khaltiverification(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var course_amount = document.getElementById("course_amount").innerHTML;
        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: course_amount});
        }
    </script>
  <!--End Khalti  -->




    </div>
        
 </div>
 
  <script>
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
 
 
// // Right Click Disable
// $(document).ready(function () {
//    $("body").on("contextmenu",function(e){
//      return false;
//    });
// });

// inspect element disable 
// document.onkeydown=function(e){
//   // f12 disable
//   if(event.keyCode == 123)
//   {
//     return false;
//   }

//   // ctrl+shift+i disable
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
//     return false;
//   }
//   // ctrl+shift+j disable
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0))
//   {
//     return false;
//   }

//   // // ctrl+shift+c disable
//   // if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0))
//   // {
//   //   return false;
//   // }
//   // ctrl+u disable
//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0))
//   {
//     return false;
//   }

// }
</script>

 
</body>
</html>