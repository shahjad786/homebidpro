 <div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href= "<?php echo base_url();?>admin/homeowner">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				
				<li>
					<a href="javascript:;">View Request Details</a>
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
							<i class="fa fa-gift"></i>
						</div>
					</div>
					
						<div class="portlet-body form">
								<form id ="expensesCreate" class="form-horizontal" action="<?php echo base_url();?>index.php/contractor/contractor" method="post">
									<div class="form-body">
										 <div class="alert alert-danger display-hide">
												<button class="close" data-close="alert"></button>
											You have some form errors. Please check below.
										</div>

										<div class="form-group">
											<label for="price" class="col-sm-3">Start Time</label>
											<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
												  <input class="form-control input-sm" placeholder="" autocomplete="off" id="job" name="job" type="text" value ="">
												<p class="error"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="price" class="col-sm-3">Completed Time</label>
											<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
												  <input class="form-control input-sm" placeholder="" autocomplete="off" id="job" name="job" type="text" value ="">
												<p class="error"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="price" class="col-sm-3">How long will it take for the job to be completed?</label>
											<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
												<input type="radio"  name="day" value="1" checked>1 Day
												 <input type="radio" name="day" value="2">2 Days
												 <input type="radio" name="day" value="3 to 6">3 to 6 Days
												 <input type="radio" name="day" value="1 to 2 weeks">1 to 2 weeks
												 <input type="radio" name="day" value="2 weeks plus">1 to 2 weeks Plus
												 <p class="error"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="Phone_no" class="col-sm-3">Detailed description of work to be preformed				</label>
											<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
												<textarea class="form-control"></textarea>
												<p class="error"></p>
											</div>
										</div>
																												<div class="form-group">
											<label for="Phone_no" class="col-sm-3">Price</label>
											<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
												<input class="form-control input-sm" placeholder="" autocomplete="off" id="start_date"  name="start_date" type="text" value ="">
												<p class="error"></p>
											</div>
										</div>
										<div class="form-actions">
										<div class="row">
										
											<div class="col-md-offset-3 col-md-9">
												<input type="submit" value="Submit Bids">
											</div>
											
										</div>	
										</div>
									</div>
								</form>
						</div>
				</div>
				<!-- END VALIDATION STATES-->
    </div>
</div>
