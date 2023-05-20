<?php
include 'dbconfig.php';
session_start();
$course_id = $_SESSION['course_click'];
if( isset($_REQUEST['oid']) && isset( $_REQUEST['amt']) && isset( $_REQUEST['refId']) )
{ 
 
	$sql = "SELECT * FROM course WHERE course_id = '".$course_id."'";

	$result = mysqli_query( $conn, $sql);
	if(  $result )
	{
	   if( mysqli_num_rows($result) == 1)
		{

              $order = mysqli_fetch_assoc($result);
                
                     $course_name = htmlspecialchars($order['course_name'],ENT_QUOTES);
                     $course_about = htmlspecialchars($order['course_about'],ENT_QUOTES);
                     $course_require = htmlspecialchars($order['course_require'],ENT_QUOTES);
                     $course_poster = htmlspecialchars($order['course_poster'],ENT_QUOTES);
                     $user_email = $_SESSION['account_gmail'];
                     $course_prize = htmlspecialchars($order['course_prize'],ENT_QUOTES);



              $url = "https://uat.esewa.com.np/epay/transrec";
              $data =[
                  'amt'=> $order['course_prize'],
                  'rid'=>  $_REQUEST['refId'],
                  'pid'=>  $_REQUEST['oid'],
                  'scd'=> 'EPAYTEST'
                ];
                

                   $curl = curl_init($url);
                   curl_setopt($curl, CURLOPT_POST, true);
                   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                   $response = curl_exec($curl);

                   if( strpos($response, "Success" ) !== false){
                       $_SESSION["pay_success"] = "pay";
                    		// insert success payment
                            $course = "INSERT INTO user_payment (user_email, course_id, pay_amount, currency, bank_name, pay_status)
                            VALUES ('$user_email', '$course_id', '$course_prize', 'NPR', 'eSewa', 'TXN_SUCCESS')";
                            if ($conn->query($course) === TRUE) {

                                 // insert Buy Course in user table
                                $course_query = "INSERT INTO user_enroll (course_id, course_name, course_about, course_require, poster, email, pay_rize)
                                VALUES ('$course_id', '$course_name', '$course_about', '$course_require', '$course_poster', '$user_email', '$course_prize')";
                                if ($conn->query($course_query) === TRUE) {

                                    echo '<script>window.location.href = "success.php";</script>';
                                    
                                } 
				
                                else {
                                    echo "your payment success but course not insert contact us now";
                                }
                                
                            }
                        

                   }
                    
                    else{
                       echo "Payment Failed"; 
                    }
                   curl_close($curl);

             }

       }





}

?>
 