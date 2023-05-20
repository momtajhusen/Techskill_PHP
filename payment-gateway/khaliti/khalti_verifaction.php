<?php
 
  $data = $_POST["coursedata"];
  $amount = $data["amount"];
  $token = $data["token"];
 

$args = http_build_query(array(
    'token' => $token,
    'amount'  => $amount
));

 

$url = "https://khalti.com/api/v2/payment/verify/";

# Make the call using API.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = ['Authorization: test_secret_key_6d9aa169a60246239084d6526b216cbb'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Response
echo "response :- ".$response = curl_exec($ch);
echo "<br>status_code :- ".$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
curl_close($ch);







?>