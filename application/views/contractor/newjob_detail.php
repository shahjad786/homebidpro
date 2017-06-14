  <?php foreach($result as $row)?>  
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
							<i class="fa fa-gift"></i>View Request Details 
						</div>
						
					</div>
					
	<div class="portlet-body form">
			<?php foreach($result as $row)?>  
			<form id ="expensesCreate" class="form-horizontal" method="post">
				<div class="form-body">
					<div class="alert alert-danger display-hide">
						<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
					</div>
					<div class="form-group">
						<label for="price" class="col-sm-3">Homeowner</label>
						<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
							<input class="form-control input-sm" placeholder=""    autocomplete="off" id="job" disabled="disabled" name="job" type="text" value ="<?php echo $row->name;?>">
							<p class="error"></p>
						</div>
					</div>
					<div class="form-group">
						<label for="price" class="col-sm-3">Job</label>
						<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
							<textarea class="form-control input-sm" ><?php echo $row->project_discription;?></textarea>
							<p class="error"></p>
						</div>
					</div>
					<div class="form-group">
						<label for="Phone_no" class="col-sm-3">Category </label>
						<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
							<input class="form-control input-sm" placeholder="" autocomplete="off" id="start_date" disabled="disabled" name="start_date" type="text" value ="<?php echo $row->job_category;?>">					<p class="error"></p>
						</div>
					</div>
					<div class="form-group">
							<label for="Phone_no" class="col-sm-3">Payment</label>
							<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="start_date" disabled="disabled" name="start_date" type="text" value ="<?php echo $row->price;?>">
								<p class="error"></p>
							</div>
					</div>
					<div class="form-actions">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							
							<!--<input type="button" onclick="location.href='<?php //echo base_url();?>contractor/contractor/bids_approval_form';" value="Go to Bid" />-->
						</div> 		
					</div>
				</div>
			</form>
						<!-- END FORM-->
		</div>
	</div>
				<!-- END VALIDATION STATES-->
</div>
	
 
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		
		<div class="row">
			<div class="col-md-12">
				
				<!-- BEGIN VALIDATION STATES-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Hit The Bid.
						</div>
						
					</div>
					
						<div class="portlet-body form">
								<form id ="expensesCreate" class="form-horizontal" action="<?php echo base_url();?>contractor/contractor/applyBid" method="post">
									<div class="form-body">
										 <div class="alert alert-danger display-hide">
												<button class="close" data-close="alert"></button>
											You have some form errors. Please check below.
										</div>

										<div class="form-group">
											<label for="price" class="col-sm-3">Start Time</label>
											<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
												  <input class="form-control input-sm" placeholder="" autocomplete="off" id="start_time" name="start_time" type="text" value ="">
												<p class="error"></p>
											</div>
										</div>
										<div class="form-group">
											<label for="price" class="col-sm-3">Completed Time</label>
											<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
												  <input class="form-control input-sm" placeholder="" autocomplete="off" id="completed_time" name="completed_time" type="text">
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
												<textarea class="form-control" name="detail" id = "detail"></textarea>
												<p class="error"></p>
											</div>
										</div>
																												<div class="form-group">
											<label for="Phone_no" class="col-sm-3">Price</label>
											<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
												<input class="form-control input-sm" placeholder="" autocomplete="off" id="price"  name="price" type="text">
												<input type="hidden" value="<?php echo $row->owner_id; ?>" name ="owner_id" id="owner_id">
												<input type="hidden" value="<?php echo $row->id;?>" name ="job_id" id="job_id">
												<input type="hidden" value="<?php echo $row->category_id;?>" name ="category_id" id="category_id">
												
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