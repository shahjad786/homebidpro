<?php //echo "<pre>"; print_r($result);?>

<style type="text/css">.col-md-3.mm {
	
   margin-left: -14px;
   }

   h4{line-height: 1.7em;
    
    color: #414042;
    text-decoration: none;
    border-bottom: solid 2px #414042;
    font-weight: 400;
    padding: 0;}
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
           
         </div>
      </div>
   </div>
   <div class="col-md-2 col-sm-12 left-box-link" style="border-radius: 4px; padding-top: 9px; color: rgb(0, 0, 0); background: none repeat scroll 0px 0px rgb(249, 249, 249); border: 1px solid rgb(49, 112, 143);">
      <ul class="sidebar-nav">
      </ul>
   </div>
   <div id="breadcrumb">
				<ul class="crumbs">
					<li class="first"><a href="#" style="z-index:9;"><span></span>All Payments</a></li>
					<li><a href="#" style="z-index:8;">Payment Detail</a></li>
				<!-- 	<li><a href="#" style="z-index:8;">Archives</a></li>
					<li><a href="#" style="z-index:7;">2011 Writing</a></li>
					<li><a href="#" style="z-index:6;">Tips for jQuery Development in HTML5</a></li> -->
				</ul>
 </div>
   <!-- <div class="sigin_logo text-center" style="min-height:100px;">   </div> -->
   <div id="loginbox" style="margin-bottom:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
         <div class="panel-heading">
            <div class="panel-title">Payment Detail</div>
         </div>
         
           <div class="row">
							<div class="">
								
								<!-- BEGIN VALIDATION STATES-->
								<div class="">
									
									
									<div class="portlet-body form">
									
										<form id = "expensesCreate" class="form-horizontal">
											<div class="form-body">
												
												<div class="form-group">
													
													<label for="price" class="col-sm-3">Job Name</label>
													<div class="col-sm-4">
														<input class="form-control input-sm" placeholder="" autocomplete="off" id="job" disabled="disabled" name="job" type="text" value ="<?php if(isset($job_details["job_name"])) echo $job_details["job_name"]; ?>">
														<p class="error"></p>
													</div>
												</div>
												
												<h4>Payment Detail</h4>
												<div class="form-group">
													
													<label for="Phone_no" class="col-sm-3">Transaction Id</label>
													<div class="col-sm-4">
														<input class="form-control input-sm" placeholder="" autocomplete="off" id="transaction_id" disabled="disabled" name="transaction_id" type="text" value ="<?php if(isset($payment_details["transaction_id"])) echo $payment_details["transaction_id"]; ?>">
														<p class="error"></p>
													</div>
												</div>

												<div class="form-group">
													
													<label for="Phone_no" class="col-sm-3">Card Number</label>
													<div class="col-sm-4">
														<input class="form-control input-sm" placeholder="" autocomplete="off" id="card_number" disabled="disabled" name="card_number" type="text" value ="<?php if(isset($payment_details["card_number"])) echo $payment_details["card_number"]; ?>">
														<p class="error"></p>
													</div>
												</div>
												
												
												<div class="form-group">
													
													<label for="price" class="col-sm-3">Payment Amount</label>
													<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
														<input class="form-control input-sm" placeholder="" autocomplete="off" id="amount" disabled="disabled" name="amount" type="text" value ="<?php if(isset($payment_details["amount"])) echo $payment_details["amount"]; ?>">
														<p class="error"></p>
													</div>
												</div>
												
												<h4>Contractor Detail</h4>
												<div class="form-group">
													
													<label for="username" class="col-sm-3">Contractor Name</label>
													<div class="col-sm-4 @if($errors->has('username')) has-error @endif">
														<input class="form-control input-sm" placeholder="" autocomplete="off" id="contractor" disabled="disabled" name="contractor" type="text" value ="<?php if(isset($contractor_details["contractor_name"])) echo $contractor_details["contractor_name"]; ?>">
														<p class="error"></p>
													</div>
												</div>
												
												
												<div class="form-group">
													
													<label for="Phone_no" class="col-sm-3">Contractor Email</label>
													<div class="col-sm-4">
														<input class="form-control input-sm" placeholder="" autocomplete="off" id="contractor_email" disabled="disabled" name="contractor_email" type="text" value ="<?php if(isset($contractor_details["contractor_email"])) echo $contractor_details["contractor_email"]; ?>">
														<p class="error"></p>
													</div>
												</div>

												<div class="form-group">
													
													<label for="Phone_no" class="col-sm-3">Contractor Number</label>
													<div class="col-sm-4">
														<input class="form-control input-sm" placeholder="" autocomplete="off" id="contractor_number" disabled="disabled" name="contractor_number" type="text" value ="<?php if(isset($contractor_details["contractor_number"])) echo $contractor_details["contractor_number"]; ?>">
														<p class="error"></p>
													</div>
												</div>

															
											</div>
											<!--div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<!--<button type="submit" class="btn green">Update</button>
														<button type="button" class="btn default" id="cancel">Cancel</button>-->
														<!--input type="hidden" value="<?php echo $_GET['id'];?>" id="id1">
														<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" id="editlink">
													<!--/div>
													
												</div>
											</div-->
										</form>
										<!-- END FORM-->
									</div>
								</div>
								<!-- END VALIDATION STATES-->
							</div>
						</div>
         </div>
      </div>
   </div>

