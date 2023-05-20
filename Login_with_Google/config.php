<?php

//start session on web page
// session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('98202149235-s2k5i5bs0fmo9kbfji7qlhrp83ui18vn.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://techskill.epizy.com/Login_with_Google/set_user_data.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>