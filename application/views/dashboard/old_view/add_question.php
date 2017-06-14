
		
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
							<div class="form-body">								<!-- BEGIN FORM-->
								<?php if(isset($result)){?>
									<form action="<?php echo base_url();?>questions/update_question" method="post" class="form-horizontal">
										
										<?php foreach ($result as $row){?>
											<div class="form-group">
												<label class="col-md-3 control-label"> Questions</label>
												<div class="col-md-4">
													<input type="text"  name="question" value="<?php echo $row->question;?>"class="form-control input-circle" placehol der="Enter	question">	
												</div>
											</div>
											
										<?php $options = $row->options;
											$sepOptions = explode(',',$options);?>
											<div class="form-group">
												<label class="col-md-3 control-label"> Options</label>
												<div class="col-md-4">
													<input type="text" value="<?php echo $sepOptions[0];?>"  name="option1"  class="form-control input-circle" placeholder="Enter option">
													<input type="text"  value="<?php echo $sepOptions[1];?>" name="option2" class="form-control input-circle" placeholder="Enter option">
													<input type="text"  value="<?php echo $sepOptions[2];?>" name="option3" class="form-control input-circle" placeholder="Enter option">
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<input type="hidden"  value="<?php echo $row->id;?>" name="id" class="form-control input-circle" placeholder="Enter option">
												</div>
											</div>
											<?php } ?>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" class="btn btn-circle blue">Submit</button>
														<button type="button" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
										   </div>
								</form>
								<?php }else{ ?>
									<form action="<?php echo base_url();?>questions/insert_question" method="post" class="form-horizontal">
										<div class="form-body">
											<div class="form-group">
												<label class="col-md-3 control-label"> Questions</label>
												<div class="col-md-4">
													<input type="text"  name="question" class="form-control input-circle" placehol der="Enter question">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label"> Options</label>
												<div class="col-md-4">
													<input type="text"  name="option1" class="form-control input-circle" placeholder="Enter option">
													<input type="text"  name="option2" class="form-control input-circle" placeholder="Enter option">
													<input type="text"  name="option3" class="form-control input-circle" placeholder="Enter option">
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
								<?php }?>
																			<!-- END FORM-->
							</div>
						</div>
				</div>
				
				<!-- END VALIDATION STATES-->
			</div>
		</div>