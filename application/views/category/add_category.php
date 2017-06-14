	<!--h3 class="page-title">
		Add New Border Post <small>Add New Border Post</small>
		</h3-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/category">Manage Categories</a>
					<i class="fa fa-angle-right"></i>
				</li>

				

				
				<li>
					<a href="">Add New Category</a>
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
			<div class="success"></div>
			<div class="col-md-12">
				<!-- BEGIN VALIDATION STATES-->
				<div class="portlet box blue-hoki">				
					<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Add New Category
							</div>
						</div>
						<div class="portlet-body form">
							<div class="form-body">
								   <form action="<?php echo base_url();?>admin/category/do_upload" method="post" enctype="multipart/form-data" class="form-horizontal" id="jobCategory">
										 <div class="form-body">
											<div class="form-group">
												<label class="col-md-3 control-label">Job Categories</label>
												<div class="col-md-4">


													<input type="text" name="job_category"  id ="job_category" class="form-control input-sm" placeholder="Enter text">
													<!-- <input type="hidden" name="name"  id ="name" class="form-control input-sm"> -->
													
												</div>

							
												
											</div>


									    <div class="form-group">
											<label class="control-label col-md-3">Image Upload</label>
											<div class="col-md-4">
												<input type="file" name="file1" id="file_1"/>
												<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" name="create" id="link1">
												<input type = "hidden" value = "" id = "image_data" name  = "image_data">
											</div>
										</div>



										<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" class="btn green">Submit</button>
														<a href="<?php echo base_url();?>admin/category"><button type="button" class="btn green">Cancel</button></a>
													</div>
												</div>
										</div>
										</div>
									</form>
						</div>
				  </div>
				</div>
			</div>
		</div>
