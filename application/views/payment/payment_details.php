<style>
  h4{line-height: 1.7em;
    
    color: #414042;
    text-decoration: none;
    border-bottom: solid 2px #414042;
    font-weight: 400;
    padding: 0;}
</style>
	<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					
					<a href="<?php echo base_url();?>admin/payments">Payments</a>
					<i class="fa fa-angle-right"></i>
				</li>
				
				<li>
					<a href="<?php echo base_url();?>admin/payment">View Payment Detail</a>
				</li>
				
			</ul>
			<div class="page-toolbar">
				<div class="btn-group pull-right">
					
				</div>
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		
		<div class="row">
			<div class="col-md-12">
				
				<!-- BEGIN VALIDATION STATES-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>View Payment Detail
						</div>
						
					</div>	
					
					<div class="portlet-body form">
					
						<form id = "expensesCreate" class="form-horizontal">
							<div class="form-body">
								<div class="alert alert-danger display-hide">
									<button class="close" data-close="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Job Name</label>
									<div class="col-sm-4">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="job" disabled="disabled" name="job" type="text" value ="<?php if(isset($job_details["job_name"])) echo $job_details["job_name"]; ?>">
										<p class="error"></p>
									</div>
									<div class="view-detail" style="font-size: 13px;margin-top: 5px;"> 
										<a href="<?php echo base_url()?>admin/jobs/job_detail?id=<?php echo $bid_details["job_id"]; ?>">View Job Detail</a>								
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

								<h4>Home Owner Detail</h4>
								<div class="form-group">
									
									<label for="home_owner_name" class="col-sm-3">Home Owner Name</label>
									<div class="col-sm-4">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="home_owner_name" disabled="disabled" name="home_owner_name" type="text" value ="<?php if(isset($home_owner_details["home_owner_name"])) echo $home_owner_details["home_owner_name"]; ?>">
										<p class="error"></p>
									</div>
								</div>
								<div class="form-group">
									
									<label for="home_owner_name" class="col-sm-3">Home Owner Email</label>
									<div class="col-sm-4">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="start_date" disabled="disabled" name="start_date" type="text" value ="<?php if(isset($home_owner_details["home_owner_email"])) echo $home_owner_details["home_owner_email"]; ?>">
										<p class="error"></p>
									</div>
								</div>
								<div class="form-group">
									
									<label for="home_owner_number" class="col-sm-3">Home Owner Number</label>
									<div class="col-sm-4">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="home_owner_number" disabled="disabled" name="home_owner_number" type="text" value ="<?php if(isset($home_owner_details["home_owner_number"])) echo $home_owner_details["home_owner_number"]; ?>">
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
		
