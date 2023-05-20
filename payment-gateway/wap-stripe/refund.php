<?php
	
	$id = $_POST['id'];
	require_once('vendor/autoload.php');
	\Stripe\Stripe::setApiKey('sk_test_Y5PHnVgAssjgQULGfoXqypn600s16jeLIl');

	$retrieve = \Stripe\Charge::retrieve($id);

	if($retrieve->amount_refunded == 0)
	{
		$refund = \Stripe\Refund::create([
			'charge' => $id
		]);

		echo "Refund request accepted your refund id is = ".$refund->id;
	}

	else{
		echo "already refunded";
	}
?>