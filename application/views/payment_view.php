<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/jquery.creditCardValidator.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
	
	</br>
	<p style="color:red;font-size:15px"><?php if(isset($response_error)) echo $response_error;  ?></p>
	</br>
	
 <b>Total Payable Amount = $<?php echo $amount; ?></b>
 </br>
<form class="" action="<?php echo base_url(); ?>payment/do_user_payment?bid_id=<?php echo $_GET["bid_id"]; ?>" method="post">
    <input type="hidden" value="<?php echo $amount; ?>" name="amount">
    <div class="form-group ">
       <label for="first_name">First Name:</label><br>
      <input type="text" value="" class="form-control" id="first_name" name="first_name">
    </div>
    <div class="form-group ">
			<label for="last_name">Last Name:</label><br>
      <input type="text" value="" class="form-control" id="last_name" name="last_name">
    </div>
    <div class="form-group ">
			 <label for="address">Address:</label><br>
      <input type="text" value="" class="form-control" id="address" name="address">
    </div>

    <div class="form-group ">
	 		<label for="city">City:</label><br>
     	<input type="text" value="" size="40" class="form-control" id="city" name="city">
    </div>

    <div class="form-group ">
	 		 <label for="state">State:</label><br>
         <input type="text" value="" size="2" class="form-control" id="state" name="state">
    </div>
    <div class="form-group ">
	 		 <label for="zip">Zip:</label><br>
         <input type="text" value="" size="9" class="form-control" id="zip" name="zip">
    </div>
 		<div class="form-group ">
	    <label for="UserCountry">Country:</label><br>
	      <input type="text" disabled value="USA" class="form-control" id="country_hide" name="country_hide" >
	      <input type="hidden" value="USA" class="form-control" id="country" name="country" >
	 	</div>
	
		<div class="form-group ">
	    <label for="card_num">Card Number:</label><br>
         <input type="text" data-validation="number" value="" autocomplete="off" size="45" class="form-control" id="card_num" name="card_num">
         </
         br>
         <p class="log"></p>
         <p class="card-error"></p>
	 	</div>

		 <div class="form-group ">
         <label for="card_code">Card Code:</label><br>
         <input type="text" data-validation="number length" data-validation-length="3-3" value="" autocomplete="off" size="45" class="form-control" id="card_code" name="card_code">
         
      </div>
      <div class="form-group ">
         <label for="CardExpiration">Expiration (MM/YY):</label><br>
         <input type="text" value="" data-validation="number" autocomplete="off" maxlength="5" size="5" class="form-control" id="crMonth" name="crMonth"> / <input type="text" value="" autocomplete="off" maxlength="5" size="5" data-validation="number" class="form-control" id="crYear" name="crYear">
      </div>
	
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>

<script>
   $(function() {
       $('#card_num').validateCreditCard(function(result) {
       		 //console.log(result.valid);
       		 // if(result.valid == false) {
 							
       		 // 		$('.card-error').html("Card number is not valid.");

       		 // }else{

       		 // 		$('.card-error').html("");
       		 // }
       		 // if(result.length_valid == false) {

       		 // 		$('.card-error').html("Not a valid Length.");

       			// }else{

       			// 	$('.card-error').html("");
       			// }

           $('.log').html(
           					'Card type: ' + (result.card_type == null ? '-' : result.card_type.name)
                    + '<br>Valid: ' + result.valid
                    + '<br>Length valid: ' + result.length_valid
                    //+ '<br>Luhn valid: ' + result.luhn_valid
            );
     		});
   });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
<script> $.validate(); </script>
</html>
