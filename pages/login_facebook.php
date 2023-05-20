<?php
include('../Login_with_Facebook/config.php');


// login with facebook 
$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper(); 

if(isset($_GET['code']))
{
  if(isset($_SESSION['access_token']))
  {
   $acount_token = $_SESSION['access_token'];
  }

  else{
    $access_token = $facebook_helper->getAccessToken();
    $_SESSION['access_token'] = $access_token;
    $facebook->setDefaultAccessToken($_SESSION['access_token']);
  }
  $graph_response = $facebook->get("/me?fields=name,email",$access_token);

  $facebook_user_info = $graph_response->getGraphUser();
  if(!empty($facebook_user_info['id']))
  {
    $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
  }

  if(!empty($facebook_user_info['name']))
  {
    $_SESSION['user_name'] =  $facebook_user_info['name'];
  }

  if(!empty($facebook_user_info['email']))
  {
    $_SESSION['user_email'] =  $facebook_user_info['email'];
  }
}

else{
    $facebook_permission = ['email'];

    $facebook_login_url = $facebook_helper->getLoginUrl('https://greenhouses-pro.co.uk/demo',$facebook_premission);
    $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><button class="btn">FacebookLogin</button></a></div>';
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
</head>
<body>


</body>
</html>