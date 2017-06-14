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
					<a href="">Edit Category</a>
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
								<i class="fa fa-gift"></i>Edit Category
							</div>
						
							</div>
						<div class="portlet-body form">
							<div class="form-body">
								 <form action="<?php echo base_url();?>admin/category/do_upload" method="post" class="form-horizontal" enctype="multipart/form-data" id = "jobCategory">
									
										<div class="form-group">
											<label class="col-md-3 control-label">Job Categories</label>
												<div class="col-md-4">
													 <?php foreach($result as $row){ 
													 		//echo $row['job_category'];die();
													 	?>
														  <input type="text" value="<?php echo $row->job_category; ?>" name="job_category" id ="job_category" class="form-control input-sm" placeholder="Enter text">
														  <input type="hidden" value="<?php echo $row->id; ?>" name="job_category_id" class="form-control input-sm	" placeholder="Enter text">
														 <!--  <input type = "hidden" value = "" id = "image_data" name  = "image_data"> -->
													  <?php }?>
												</div>
										</div>


								  <div class="form-group">
                                    <label class="col-md-3 control-label">Image Upload</label>
                                    <div class="col-md-4">

                                        
		                                      <?php if(isset($row->images_name) && $row->images_name != ""){ ?>
		                                      <div class="checkExist" style="display:none"><?php echo $row->images_name; ?></div>
		                                      <?php }else{ ?>

		                                        <div class="checkExist" style="display:none">0</div>
		                                      <?php } ?>  
		                                      <input type="file" class="form-control"  name="file1" id="file_1"  onchange="readURL(this);" />
		                                      <img src ="<?php echo base_url();?>media/img/<?php echo $row->images_name;?>" id = "image" style="max-width: 43px;" value = "<?php echo $row->images_name; ?>">
		                                      <input type = "hidden" value = "<?php echo $row->images_name; ?>" id = "image_data" name  = "image_data">
		                                      <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" name="edit" id="link">
											  <input type="hidden" value="<?php echo $_GET['id'];?>" name="id" id="id">
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
								</form>
							
								<!-- END FORM-->
										
						</div>
				  </div>
				</div>
				
				<!-- END VALIDATION STATES-->
			</div>
		</div>



<!--<script src ="<?php echo base_url(); ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {       
           // initiate layout and plugins
           get_random_name();

        });  

function get_random_name(){
			
			    var url = "<?php echo base_url();?>admin/category/get_random_name";
				$.ajax({
					url: url,
					success: function(data)
					{
						$("#image_name").html(data);
						
					}
				});
		}	


</script>-->