<?php
session_start();
if(isset($_SESSION['course_buy']))    
{
   echo "";
}

else
{
  echo '<script>window.location.href = "../../pages/pc/all_course.php";</script>';
   exit("page not fount");
}
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

// database
  require("../../admin/php/database.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.

			$order_id = $_POST['ORDERID'];
			$amount = $_POST['TXNAMOUNT'];
			$currency = $_POST['CURRENCY'];
			$bank_name = $_POST['BANKNAME'];
			$status = $_POST['STATUS'];
			$date = $_POST['TXNDATE'];
  
			$course_id = $_SESSION['course_buy']; 
			$user_email = $_SESSION['account_gmail'];
 

			// insert success payment
			$course = "INSERT INTO user_payment (user_email, course_id, order_id, pay_amount, currency, bank_name, pay_status, order_date)
			VALUES ('$user_email', '$course_id', '$order_id', '$amount', '$currency', '$bank_name', '$status', '$date')";
			
			if ($db->query($course) === TRUE) {

               
				// Course Details
				$course_details = "SELECT * FROM course WHERE course_id='$course_id'";
				$course_response = $db->query($course_details);
				$course_data = $course_response->fetch_assoc();
				$course_name = $course_data['course_name'];
				$course_about = $course_data['course_about'];
				$course_require = $course_data['course_require'];
				$course_prize = $course_data['course_prize']; 
				$course_poster = $course_data['course_poster'];


				// insert Buy Course in user table
				$course = "INSERT INTO user_enroll (course_id, course_name, course_about, course_require, poster, email, pay_rize)
				VALUES ('$course_id', '$course_name', '$course_about', '$course_require', '$course_poster', '$user_email', '$course_prize')";
				if ($db->query($course) === TRUE) {
					
					echo "course will be purchase success full";
					$_SESSION["course_click"];
                    
					echo $course_id;
					echo $user_email;

	 
						echo '<script>window.location.href = "../../pages/inroll.php";</script>';
	 
					
					
				} 
				
				else {
				    echo "failed".$db->error;
				}
					 

			} 
			
			else {
		     	echo "failed".$db->error;
			}
 

	}

	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}

else {
	echo "<b>Checksum mismatched.</b>".$db->error;
	//Process transaction as suspicious.
}

?>