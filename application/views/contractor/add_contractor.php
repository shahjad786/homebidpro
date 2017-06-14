<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href= "<?php echo base_url();?>admin/login_admin">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				
				<li>
					<a href="<?php echo base_url();?>admin/contractor">Manage Contractors</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<?php if(isset($result)){?>
				<li>
					<a href="">Edit Contractor</a>
				</li>
				<?php }else{ ?>
				
				<li>
					<a href="">Add New Contractor</a>
				</li>
				<?php } ?>
				
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
							<i class="fa fa-gift"></i>Add New Contractor
						</div>
						
					</div>	
						<div class="portlet-body form">

							<form action="<?php echo base_url();?>admin/contractor/insert" method="post" id="contractor" class="form-horizontal">
							
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="form-group">
										
										 <label for="Phone_no" class="col-sm-3">Name</label>
										<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
											<input type="text"  name="name" value=""class="form-control input-sm" placehol der="Name">
											<p class="error"></p>
										</div>
									</div>
									
									
									<div class="form-group">
										
										<label for="Phone_no" class="col-sm-3">Email</label>
										<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
											<input type="text"  name="email" id = "email" class="form-control input-sm" placehol der="Email">
											<p class="error"></p>
										</div>
									</div>
									
									<div class="form-group">
									
									<label for="price" class="col-sm-3">Password</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="password"  name="password" type="text">
										<p class="error"></p>
									</div>
								   </div>
									<div class="form-group">
										
										<label for="price" class="col-sm-3">Company Name</label>
										<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
												<input type="text"  id="company_name "name="company_name" value=""class="form-control input-sm" placehol der="Company name">
											<p class="error"></p>
										</div>
									</div>
									
									<div class="form-group">
										
										<label for="Phone_no" class="col-sm-3">Phone Number</label>
										<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
											<input type="text"  name="phone_number" value=""class="form-control input-sm" placehol der="Enter Phone Number">
											<p class="error"></p>
										</div>
									</div>
									
									<div class="form-group" id="store-row">
										<label for="store_id" class="col-sm-3">Country</label>
										<div class="col-sm-4 @if($errors->has('store_id')) has-error @endif">
											<select class="form-control input-sm" id="country" name="country">
											<option value="">Select country</option>
												
												<?php foreach($result1 as $row){ ?>
													
											<option value="<?php echo $row->id;?>"><?php echo $row->country;?></option>
												
													 <?php } ?>
											
											</select>
											<p class="error" id="no-store"></p>
											
										</div>
								   </div>
									<div class="form-group" id="store-row">
								
									<label for="store_id" class="col-sm-3">Job Category</label>
									<div class="col-sm-4 @if($errors->has('store_id')) has-error @endif">
										<select class="form-control input-sm" id="category" name="category[]" multiple>
										<option value="">Select</option>
											
												<?php foreach($category as $row)
												{ 
												?>
											    <option value="<?php echo $row->id;?>"><?php echo $row->job_category;?></option>
											
												 <?php } ?>
										
										
										
										</select>
										<p class="error" id="no-store"></p>
										
									</div>
								</div>
									<div class="form-group">
										
										<label for="Phone_no" class="col-sm-3">Address1</label>
										<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
											<input type="text"  name="address1" value=""class="form-control input-sm" placehol der="Enter Address">
											<p class="error"></p>
										</div>
									</div>
<div class="form-group">
										
										<label for="Phone_no" class="col-sm-3">Address2</label>
										<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
											<input type="text"  name="address2" value=""class="form-control input-sm" placehol der="Enter Address">
											<p class="error"></p>
										</div>
									</div>
<div class="form-group">
										
										<label for="Phone_no" class="col-sm-3">City</label>
										<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
											<input type="text"  name="city" value=""class="form-control input-sm" placehol der="Enter Address">
											<p class="error"></p>
										</div>
									</div>
<div class="form-group">
										
										<label for="Phone_no" class="col-sm-3">State</label>
										<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
											<input type="text"  name="state" value=""class="form-control input-sm" placehol der="Enter Address">
											<p class="error"></p>
										</div>
									</div>
									
									<div class="form-group" id="store-row">
										<label for="store_id" class="col-sm-3">Experience</label>
										<div class="col-sm-4 @if($errors->has('store_id')) has-error @endif">
											<select class="form-control input-sm" id="experience" name="experience">
												<option value="">Select</option>
												<option value="1">1 year</option>
												<option value="2">2 year</option>
												<option value="3">3 year</option>
												<option value="4">4 year</option>
												<option value="5">5 year</option>
											</select>
											<p class="error" id="no-store"></p>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">Submit</button>
										<a href="<?php echo base_url();?>admin/contractor"><button type="button" class="btn green">Cancel</button></a>
										</div>
									</div>
								</div>
							</form>
						<!-- END FORM-->
					</div>
				</div>
				<!-- END VALIDATION STATES-->
			</div>
		</div>
		
