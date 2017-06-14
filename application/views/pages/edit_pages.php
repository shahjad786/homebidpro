
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="<?php echo base_url();?>admin/dashboard">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="<?php echo base_url();?>admin/pages">Manage CMS Pages</a>
					<i class="fa fa-angle-right"></i>
		</li>
			<li>
					<a href="">Edit CMS Page</a>
				</li>
		
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe"></i>Edit CMS Page
				</div>
				<div class="tools">
				</div>
			</div>
			
			<div class="portlet-body form">
				<?php foreach($result as $row){?>
				<form action="<?php echo base_url();?>admin/pages/do_upload" method="post" id="pages" class="form-horizontal" enctype="multipart/form-data">
				
					<div class="form-body">
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="form-group">
							
							 <label for="Phone_no" class="col-sm-3">Title</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
								<input type="text"  name="page_title" value="<?php echo $row->page_title?>" class="form-control input-sm" placehol der="Name">
								<p class="error"></p>
							</div>
						</div>
						
						
						<div class="form-group">
							
							<label for="Phone_no" class="col-sm-3">Meta Keyword</label>
							<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
								<input type="text"  name="meta_keyword" id = "meta_keyword" value= "<?php echo $row->meta_keyword?>" class="form-control input-sm" placehol der="Email">
								<p class="error"></p>
							</div>
						</div>
						
						<div class="form-group">
							
							<label for="price" class="col-sm-3">Meta Discription</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="meta_discription" value= "<?php echo $row->meta_discription?>"  name="meta_discription" type="text">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="id" value= "<?php echo $row->id;?>"  name="id" type="hidden">
								<p class="error"></p>
							</div>
						</div>


						<div class="form-group">
							
							<label for="price" class="col-sm-3">Meta Discription</label>
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
						  </div>
						</div>

						<div class="form-group">
							
							<label for="price" class="col-sm-3">Page Content</label>
							<div class="col-sm-8 @if($errors->has('email')) has-error @endif">
									<textarea id="customck" name="page_content" class="ckeditor form-control"  rows="6"><?php echo $row->page_content;?></textarea>
								<p class="error"></p>
							</div>
						</div>














					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green">Update</button>
							<a href="<?php echo base_url();?>admin/pages"><button type="button" class="btn green">Cancel</button></a>
						</div>
						</div>
					</div>
				</form>
				<?php } ?>
								
			</div>
		</div>
						
	</div>
</div>
			
		
