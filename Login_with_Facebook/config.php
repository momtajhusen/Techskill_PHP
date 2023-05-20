<?php 
//config
require_once 'vendor/autoload.php';

if(!session_id())
{
  session_start();
}

$facebook = new \Facebook\Facebook([
    'app_id'                => '288035693309615',
    'app_secret'            => '698656d7e4ace59b25736dd4db58289f',
    'default_graph_version' => 'v2.10'
]);

?>