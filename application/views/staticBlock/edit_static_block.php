
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo base_url();?>admin/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo base_url();?>admin/staticblock">Manage Static Block Pages</a>
					<i class="fa fa-angle-right"></i>
		</li>
			<li>
					<a href="javaScript:;">Edit Static Block </a>
				</li>
		
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe"></i>Edit Static Block
				</div>
				<div class="tools">
				</div>
			</div>
			
			<div class="portlet-body form">
				<?php foreach($result as $row){?>
				<form action="<?php echo base_url();?>admin/staticblock/do_upload" enctype="multipart/form-data" method = "POST" id = "static_block" class="form-horizontal">
				
					<div class="form-body">
						
						<div class="form-group">
							
							 <label for="Phone_no" class="col-sm-3">Container Marketing Static</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
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
								<p class="error"></p>
							</div>
						</div>
						
						
						<div class="form-group">
							
							<label for="Phone_no" class="col-sm-3">Content</label>
							<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
								<textarea class="form-control" rows="3" name="content" id = "content">
	                        <?php echo $row->content?>
	                      </textarea>
								<p class="error"></p>
							</div>
						</div>
						
						<div class="form-group">
							
							<label for="price" class="col-sm-3">Number</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
								<input type="text"  name="number" value="<?php echo $row->number?>" class="form-control input-sm" placehol der="Number">
								<p class="error"></p>
							</div>
						</div>
						
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green">Update</button>
							   <a href="<?php echo base_url();?>admin/staticblock"><button type="button" class="btn green">Cancel</button></a>
							</div>
						</div>
					</div>
				</form>
				<?php } ?>
								
			</div>
		</div>
						
	</div>
</div>
			
		
