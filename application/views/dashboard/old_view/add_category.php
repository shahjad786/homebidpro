
		
		<!--h3 class="page-title">
		Add New Border Post <small>Add New Border Post</small>
		</h3-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.html">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="index.php">Manage Question</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Add New Question</a>
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
				<div class="portlet box purple">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Add New Question
						</div>
						
					</div>
					<div class="portlet-body form">
								<!-- BEGIN FORM-->
						 <?php if(isset($result)){?>
							<div class="form-body">
								 <form action="<?php echo base_url();?>index.php/category/update_category" method="post" class="form-horizontal">
									
										<div class="form-group">
											<label class="col-md-3 control-label">Job Categories</label>
												<div class="col-md-4">
													 <?php foreach($result as $row){ ?>
														  <input type="text" value="<?php echo $row->job_category; ?>" name="job_category" class="form-control input-circle" placeholder="Enter text">
														  <input type="hidden" value="<?php echo $row->id; ?>" name="job_category_id" class="form-control input-circle" placeholder="Enter text">
													  <?php }?>
												</div>
										</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<button type="submit" class="btn btn-circle blue">Submit</button>
												<button type="button" class="btn btn-circle default">Cancel</button>
											</div>
										</div>
									</div>
								</form>
							<?php }else{
									?>
								   <form action="<?php echo base_url();?>index.php/category/insert_category" method="post" class="form-horizontal">
										 <div class="form-body">
											<div class="form-group">
												<label class="col-md-3 control-label">Job Categories</label>
												<div class="col-md-4">
													<input type="text" name="job_category" class="form-control input-circle" placeholder="Enter text">
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" class="btn btn-circle blue">Submit</button>
														<button type="button" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
											</div>
										</div>
									</form>
							<?php } ?>
								<!-- END FORM-->
										
						</div>
				  </div>
				</div>
				
				<!-- END VALIDATION STATES-->
			</div>
		</div>