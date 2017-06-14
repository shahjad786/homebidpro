<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				
				<li>
					<a href="<?php echo base_url();?>admin/jobs">Manage Jobs</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="">Add New Job</a>
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
							<i class="fa fa-gift"></i>Add New Job
						</div>
						
					</div>	
					
					<div class="portlet-body form">
					
						<form id = "expensesCreate" class="form-horizontal" action = "<?php echo base_url();?>jobs/jobs/insert_job" enctype="multipart/form-data" method="POST">
							<div class="form-body">
								<div class="alert alert-danger display-hide">
									<button class="close" data-close="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Project Name</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="name" name="name" type="text">
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">photo upload</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input type="file" name="file1" id="file_1" onchange="readURL(this);" />
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="price" class="col-sm-3">video upload</label>
									<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
											<input type="file" name="file2" id="file_2"/>
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">price</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="price" name="price" type="text">
										<p class="error"></p>
									</div>
								</div>
								
								<div class="form-group" id="store-row">
									<label for="store_id" class="col-sm-3">country</label>
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
								
									<label for="store_id" class="col-sm-3">job_category</label>
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
								
								<div class="form-group">
									
									<label for="detail" class="col-sm-3">project discription</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<textarea class="form-horizontal" cols="35" rows="7"  name="project_detail" id="project_detail"></textarea>
										
									<p class="error"> </p>
									</div>
								
								</div>
								
								
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green">Submit</button>
									<a href="<?php echo base_url();?>admin/jobs"><button type="button" class="btn green">Cancel</button></a>
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
		
