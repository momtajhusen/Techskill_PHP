<?php
/*
 * Basic Site Settings and API Configuration
 */

// Database configuration
define('DB_HOST', 'sql302.epizy.com');
define('DB_USERNAME', 'epiz_30522185');
define('DB_PASSWORD', 'dAjkcnMg9kKGG');
define('DB_NAME', 'epiz_30522185_techskill');
define('DB_USER_TBL', 'users');

// Facebook API configuration
define('FB_APP_ID', '288035693309615');
define('FB_APP_SECRET', '698656d7e4ace59b25736dd4db58289f');
define('FB_REDIRECT_URL', 'https://techskill.epizy.com/fb_login/');

// Start session
if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require_once __DIR__ . '/facebook-php-graph-sdk/autoload.php';

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

// Call Facebook API
$fb = new Facebook(array(
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => 'v3.2',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}