<?php //echo form_open_multipart('admin/cmscontent/do_upload');?>

<!--	<input type="file" name="file1" id="file_1" onchange="readURL(this);" />
	<input type="file" name="file2" id="file_2"/>
    <br/><br/>
    <input type="hidden" value="<?php //echo $_SERVER['REQUEST_URI'];?>" name="create" id="link1">
	<input type="submit" value="upload" />

</form>-->
<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
						<a href="<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				
				<li>
					<a href="<?php echo base_url();?>admin/video">Manage Videos</a>
						<i class="fa fa-angle-right"></i>
				</li>
					<li>
					<a href="">Add New Video</a>
					
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
							<i class="fa fa-gift"></i>Add New Video
						</div>
						
					</div>
					<div class="portlet-body form">
							<!-- BEGIN FORM-->
						<form action="<?php echo base_url();?>admin/video/do_upload" class="form-horizontal form-bordered" id="cmscontent" enctype="multipart/form-data" method="POST">
								<div class="form-body">
									
									<div class="form-group last">
										<label class="control-label col-md-3">Video Upload</label>
										<div class="col-md-9">
												<input type="file" name="file1" id="file_1"/>
												<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" name="create" id="link1">
												<input type = "hidden" value = "" id = "image_data" name  = "image_data">
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
											<a href="<?php echo base_url();?>admin/video"><button type="button" class="btn green">Cancel</button></a>
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
		