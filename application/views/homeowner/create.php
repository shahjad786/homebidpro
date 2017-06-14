<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href= "<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				
				<li>
					<a href="<?php echo base_url();?>admin/homeowner">Manage Homeowners</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<?php if(isset($result)){?>
				<li>
					<a href="">Edit Homeowner</a>
				</li>
				<?php }else{ ?>
				
				<li>
					<a href="">Add New Homeowner</a>
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
							<i class="fa fa-gift"></i>Add New Homeowner
						</div>
						
					</div>
					
					<div class="portlet-body form">
					
						<form id = "homeowner" name = "homeowner" class="form-horizontal" action="<?php echo base_url();?>admin/homeowner/insert" method="post">
							<div class="form-body">
								<div class="alert alert-danger display-hide">
									<button class="close" data-close="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Name</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="name"  name="name" type="text" value ="">
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Phone Number</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="phone_no"  name="phone_no" type="text" value ="">
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Email</label>
									<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="email"  name="email" type="text" value ="">
										<p class="error"></p>
									</div>
								</div>
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Password</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="password"  name="password" type="text" value ="">
										<p class="error"></p>
									</div>
								</div>
								
								<div class="form-group">
									<label for="detail" class="col-sm-3">Address Line 1</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="address1"  name="address1" type="text" value ="">
									<p class="error"> </p>
									</div>								
								</div>	
								
								<div class="form-group">
									<label for="detail" class="col-sm-3">Address Line 2</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="address2"  name="address2" type="text" value ="">
									<p class="error"> </p>
									</div>								
								</div>

								<div class="form-group">
									<label for="detail" class="col-sm-3">State</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="state"  name="state" type="text" value ="">
									<p class="error"> </p>
									</div>								
								</div>
								

								<div class="form-group">
									<label for="detail" class="col-sm-3">City</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="city"  name="city" type="text" value ="">
									<p class="error"> </p>
									</div>								
								</div>

								<div class="form-group" id="store-row">
									<label for="store_id" class="col-sm-3">Country</label>
									<div class="col-sm-4 @if($errors->has('store_id')) has-error @endif">
										<select class="form-control input-sm" id="country" name="country">
										<option value="">Select country</option>
											
												<?php foreach($country as $row)
												{ 
												?>
									    <option value="<?php echo $row->id;?>"><?php echo $row->country;?></option>
											
												 <?php } ?>
										
										</select>
										<p class="error" id="no-store"></p>
										
									</div>
								</div>
								<div class="form-group" id="store-row">
								
									<label for="store_id" class="col-sm-3">Job Category</label>
									<div class="col-sm-4 @if($errors->has('store_id')) has-error @endif">
										<select class="form-control input-sm" id="job_category" name="job_category">
										<option value="">Select</option>
											
												<?php foreach($job_category as $row)
												{ 
												?>
											    <option value="<?php echo $row->id;?>"><?php echo $row->job_category;?></option>
											
												 <?php } ?>
										
										
										
										</select>
										<p class="error" id="no-store"></p>
										
									</div>
								</div>
								

							</div>
							<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">Submit</button>
										<a href="<?php echo base_url();?>admin/homeowner"><button type="button" class="btn green">Cancel</button></a>
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
		
