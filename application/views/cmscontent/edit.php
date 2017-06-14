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
					<a href="<?php echo base_url();?>admin/cmscontent">Manage Banners</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="">Edit Banner</a>
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
							<i class="fa fa-gift"></i>Edit Banner
						</div>
						
					</div>
					<div class="portlet-body form">
								<!-- BEGIN FORM-->
							<form action="<?php echo base_url();?>admin/cmscontent/do_upload"  id="cmscontent" class="form-horizontal form-bordered" enctype="multipart/form-data" method="POST">
									<!-- <div class="form-body">
										
										<div class="form-group last">
											<label class="control-label col-md-3">Banner Upload</label>
											<div class="col-md-9">
											    <input type="file" name="file1" id="file_1"/>
												<input type="hidden" value="<?php //echo $_SERVER['REQUEST_URI'];?>" name="edit" id="link">
												<input type="hidden" value="<?php //echo $_GET['id'];?>" name="id" id="id">
											</div>
										</div>
									</div> -->


								<div class="form-group">
                                    <label class="control-label col-md-3">Banner Upload</label>
                                    <div class="col-md-9">

                                        
		                                      <?php if(isset($row->image) && $row->image != ""){ ?>
		                                      <div class="checkExist" style="display:none"><?php echo $row->image; ?></div>
		                                      <?php }else{ ?>

		                                        <div class="checkExist" style="display:none">0</div>
		                                      <?php } ?>  
		                                      <input type="file" class="form-control"  name="file1" id="file_1"  onchange="readURL(this);" />
		                                      <img src ="<?php echo base_url();?>uploads/<?php echo $row->image;?>" id = "image" style="height:44px; width:60px;" value = "<?php echo $row->image; ?>">
		                                      <input type = "hidden" value = "<?php echo $row->image; ?>" id = "image_data" name  = "image_data">
		                                      <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" name="edit" id="link">
											  <input type="hidden" value="<?php echo $_GET['id'];?>" name="id" id="id">
                                    </div>
                                </div>















									<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">Submit</button>
										<a href="<?php echo base_url();?>admin/cmscontent"><button type="button" class="btn green">Cancel</button></a>
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