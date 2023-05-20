<?php

	$token = $_POST['stripeToken'];

	require_once('vendor/autoload.php');

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$product_name = $_POST['p-name'];
	$price = $_POST['price'];


	\Stripe\Stripe::setApiKey('sk_test_51KKidrSHKA1mWPZS5mCmRD92OiivHA5Fcvpo1BaV2EJGS3GBe8qSjPEwlrDKIxWJdwqjqfryB9lQXpDYUGRQNImn00100UEkmH');

	$customer = \Stripe\Customer::create([
	    'name' => $name,
	    'email' => $email,
	    'phone' => $phone,
	    'description' => $product_name,
	    'address' => [
	    	'line1' => 'street address',
	    	'city' => 'muzaffarpur',
	    	'state' => 'bihar',
	    	'country' => 'india'
	    ],
	 	'source' => $token

	]);


	$charge = \Stripe\Charge::create([
		'amount' => $price,
		'currency' => 'inr',
		'customer' => $customer->id
	]);

	
	if(empty($charge->failure_code))
	{
		$status = "success";
		echo "payment success your payment id is = ".$charge->id;
	}

	else{
		$status = "failed";
		echo "payment failed";
	}
	

?>

