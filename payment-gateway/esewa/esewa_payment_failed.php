<!DOCTYPE html>
<html>
<head>
	<title>Tech Skill</title>
	<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- JS, Popper.js, jQuery, Bootstrap.js-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

 

    <style type="text/css">

        body
        {
            background:#f2f2f2;
        }

        .payment
	    {
		    border:1px solid #f01b1b;
		    height:280px;
            border-radius:20px;
            background:#fff;
	    }
       .payment_header
       {
	       background:#f01b1b;
	       padding:20px;
           border-radius:20px 20px 0px 0px;
	   
       }
   
       .check
       {
	       margin:0px auto;
	       width:50px;
	       height:50px;
	       border-radius:100%;
	       background:#fff;
	       text-align:center;
       }
   
       .check i
       {
	       vertical-align:middle;
	       line-height:50px;
	       font-size:30px;
       }

        .content 
        {
            text-align:center;
        }

        .content  h1
        {
            font-size:25px;
            padding-top:25px;
        }

        .content a
        {
            width:200px;
            height:35px;
            color:#fff;
            border-radius:30px;
            padding:5px 10px;
            background:#f01b1b;
            transition:all ease-in-out 0.3s;
        }

        .content a:hover
        {
            text-decoration:none;
            background:#000;
        }
   
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="width:100vw;height:100vh;">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5  animate__animated animate__bounceIn">
         <div class="payment shadow-lg" style="width:350px;">
            <div class="payment_header" >
               <div class="check"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
            </div>
            <div class="content">
               <h1>Opps ! Transaction failed</h1>
               <p class="px-2">Your transaction cancled something went wrong try to again payment. </p>
               <a href="../../pages/pay_method.php" class="px-4 p-2 rounded">Try Again</a>
            </div>
            
         </div>
      </div>
   </div>
</div>

</body>
</html>