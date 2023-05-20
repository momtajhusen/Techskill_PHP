<?php
$host = 'sql302.epizy.com';
$db = 'epiz_30522185_techskill';
$user = 'epiz_30522185'; // Your database user
$password ='dAjkcnMg9kKGG'; // Your Database password

$conn = new mysqli($host, $user, $password, $db);
if( $conn ->connect_error)
{
	echo "Failed to connect to MySQL". $conn->connect_error;
	exit;
}