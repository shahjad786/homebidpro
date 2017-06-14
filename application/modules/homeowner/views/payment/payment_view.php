



<style type="text/css">.col-md-3.mm {
   margin-left: -14px;
   }
   
   #btn-signup {
    margin-left: 12pc;
}
</style>
<style type="text/css">
   .col-md-offset-3 {
   margin-left:6.333% !important;
   }
   .left-box-link li {
   list-style: outside none none;
   line-height: 25px;
   }
   .left-box-link ul {
   padding-left: 5px;
   }.sidebar-nav a{
   color: hsl(240, 1%, 26%) !important;
   text-decoration: none;
   }
   .left-box-link li a:hover{
   color:#31708f !important;
   cursor:pointer;
   }
</style>
<div class="container">
   <div class="dashboard_heading">
      <div class="row">
         <div class="col-md-12 text-center">
           <h1>Payment Section</h1>
         </div>
      </div>
   </div>
   <div class="col-md-2 col-sm-12 left-box-link" style="border-radius: 4px; padding-top: 9px; color: rgb(0, 0, 0); background: none repeat scroll 0px 0px rgb(249, 249, 249); border: 1px solid rgb(49, 112, 143);">
      <ul class="sidebar-nav">
      </ul>
   </div>
   <!-- <div class="sigin_logo text-center" style="min-height:100px;">   </div> -->
   <div id="loginbox" style="margin-bottom:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
         <div class="panel-heading">
            <div class="panel-title">Payment Section</div>
         </div>
         <div class="panel-body" >
            <form id="payment_form" class="form-horizontal" enctype="multipart/form-data" role="form" action="<?php echo base_url(); ?>homeowner/payment/do_user_payment?bid_id=<?php echo $_GET["bid_id"]; ?>" method="POST">
               <!--  <div id="" style="display:none" class="alert alert-danger">
                  <p>Error:</p>
                  <span></span>
                  </div> -->
               <div class="form-group ">
                  <label for="firstname" class="col-md-3 control-label">First Name</label>
                  <div class="col-md-9">
                     <input type="text" value="" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                  </div>
               </div>
               <div class="form-group">
                  <label for="lastname" class="col-md-3 control-label">Last Name</label>
                  <div class="col-md-9">
                     <input type="text" value="" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                  </div>
               </div>
               <div class="form-group">
                  <label for="address" class="col-md-3 control-label">Address</label>
                  <div class="col-md-9">
                     <input type="text" value="" class="form-control" id="address" name="address" placeholder="Address">
                  </div>
               </div>
               <div class="form-group">
                  <label for="city" class="col-md-3 control-label">City</label>
                  <div class="col-md-9">
                     <input type="text" value="" size="40" class="form-control" id="city" name="city" placeholder="City">
                  </div>
               </div>
               <div class="form-group">
                  <label for="state" class="col-md-3 control-label">State</label>
                  <div class="col-md-9">
                     <input type="text" value="" size="2" class="form-control" id="state" name="state" placeholder="State">
                  </div>
               </div>
               <div class="form-group">
                  <label for="state" class="col-md-3 control-label">Zip</label>
                  <div class="col-md-9">
                     <input type="text" value="" size="9" class="form-control" id="zip" name="zip" placeholder="Zip">
                  </div>
               </div>
               <div class="form-group">
                  <label for="country" class="col-md-3 control-label">Country</label>
                  <div class="col-md-9">
                     <input type="text" disabled value="USA" class="form-control" id="country_hide" name="country_hide" >
                     <input type="hidden" value="USA" class="form-control" id="country" name="country" >
                  </div>
               </div>

 <div class="form-group">
                  <label for="country" class="col-md-3 control-label">Amount</label>
                  <div class="col-md-9">
                     <input type="text" disabled  value="$<?php echo $amount;?>" class="form-control" id="amount" name="amount" >
                     <input type="hidden" value="amount" class="form-control" id="amount" name="amount" >
                  </div>
               </div>

               <div class="form-group">
                  <label for="cardNumber" class="col-md-3 control-label">Card Number</label>
                  <div class="col-md-9">
                     <input type="text" data-validation="number" value="" autocomplete="off" size="45" class="form-control" id="card_num" name="card_num">
                  </div>
               </div>
               <div class="form-group">
                  <label for="cardNumber" class="col-md-3 control-label"></label>
                  <div class="col-md-9">
                     <p class="log"></p>
                     <p class="card-error"></p>
                  </div>
               </div>
               <div class="form-group">
                  <label for="cardNumber" class="col-md-3 control-label">Card Code</label>
                  <div class="col-md-9">
                     <input type="text" data-validation="number length" data-validation-length="3-3" value="" autocomplete="off" size="45" class="form-control" id="card_code" name="card_code" placeholder="Card Code">
                  </div>
               </div>
               <div class="form-group">
                  <label for="CardExpiration" class="col-md-3 control-label">Expiration (MM/YY)</label>
                  <div class="col-md-3">
                     <input type="text" value="" data-validation="number" autocomplete="off" maxlength="2" size="5" class="form-control" id="crMonth" name="crMonth"> 
                  </div>
                  <div class="col-md-3">  
                     <input type="text" value="" autocomplete="off" maxlength="2" size="5" data-validation="number" class="form-control" id="crYear" name="crYear">
                  </div>
               </div>
               <div class="form-group">
                  <!-- Button -->                                        
                  <div class="col-md-offset-3 col-md-9">
                     <input id="btn-signup" id="submit" type="submit" class="btn btn-info"  value="Submit"><i class="icon-hand-right"></i>
                     <!--<span style="margin-left:8px;">or</span>-->  
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
