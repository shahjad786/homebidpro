<?php //echo form_open_multipart('admin/cmscontent/do_upload');?>
<?php foreach($result as $row);?>
<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href= "<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				
				<li>
					<a href="<?php echo base_url();?>admin/video">Manage Videos</a>
					<i class="fa fa-angle-right"></i>
				</li>
					<li>
					<a href="javascript:;">Edit Video</a>
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
							<i class="fa fa-gift"></i>Edit Video
						</div>
						
					</div>
					<div class="portlet-body form">
								<!-- BEGIN FORM-->
							<form action="<?php echo base_url();?>admin/video/do_upload" class="form-horizontal form-bordered" id="cmscontent" enctype="multipart/form-data" method="POST">
									<!-- <div class="form-body">
										
										<div class="form-group last">
											<label class="control-label col-md-3">Video Upload</label>
											<div class="col-md-9">
												<input type="file" name="file1" id="file_1"/>
												<input type="hidden" value="<?php //echo $_SERVER['REQUEST_URI'];?>" name="edit" id="link">
												<input type="hidden" value="<?php //echo $_GET['id'];?>" name="id" id="id">
											</div>
										</div>
									</div> -->

								<div class="form-group">
                                    <label class="control-label col-md-3">Video Upload</label>
                                    <div class="col-md-9">
                                      <?php if(isset($row->video) && $row->video != ""){ ?>
                                      <div class="checkExist" style="display:none"><?php echo $row->video; ?></div>
                                      <?php }else{ ?>

                                        <div class="checkExist" style="display:none">0</div>
                                      <?php } ?>  
                                      <input type="file" class="form-control"  name="file1" id="file_1"  onchange="readURL(this);" />
                                     <video width="100px" id="image" controls="" autoplay="" name="media"><source src="<?php echo base_url();?>videos/<?php echo $row->video;?>" type="video/mp4"></video>   
                    
                                    <input type = "hidden" value ="<?php echo $row->video; ?>" id ="image_data" name  ="image_data">
                                    <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" name="edit" id="link">
												<input type="hidden" value="<?php echo $_GET['id'];?>" name="id" id="id">
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