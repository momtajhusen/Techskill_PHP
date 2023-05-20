<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style rel="stylesheet" href="style.css"></style>

</head>
<body>
	
	<script src="https://js.stripe.com/v3/"></script>
	<div class="container w-50 p-5">
	<form action="./payment.php" method="post" id="payment-form">
		<label>Customer name</label>
		<input type="text" name="name" class="form-control mb-3">
		<label>Email</label>
		<input type="text" name="email" class="form-control mb-3">
		<label>Phone</label>
		<input type="text" name="phone" class="form-control mb-3">
		<label>Product name</label>
		<input type="text" name="p-name" class="form-control mb-3">
		<label>Price</label>
		<input type="number" name="price" class="form-control mb-3">
	  <div class="form-row">
	    <label for="card-element">
		
	    </label>
	    <div id="card-element" class="form-control">
	      <!-- A Stripe Element will be inserted here. -->
	    </div>

	    <!-- Used to display form errors. -->
	    <div id="card-errors" role="alert"></div>
	  </div>

	  <button class="btn btn-primary my-3">Submit Payment</button>
	</form>

	<br><br>

	<h4>Refund request</h4>
	<form method="post" action="refund.php">
		
		<input type="text" name="id" class="form-control mb-3" placeholder="Enter payment id">
		<button class="btn btn-primary">Request refund</button>
	
	</form>
</div>
<script src="script.js"></script>
</body>
</html>