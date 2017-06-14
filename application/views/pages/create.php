
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
				<a href="">Add New Page</a>
			</li>	
	</ul>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe"></i>Add New Page
				</div>
				<div class="tools">
				</div>
			</div>
			
			<div class="portlet-body form">
				<form action="<?php echo base_url();?>admin/pages/do_upload" method="post" id="pages" class="form-horizontal" enctype="multipart/form-data">
				
					<div class="form-body">
						
						<div class="form-group">
							
							 <label for="Phone_no" class="col-sm-3">Title</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
								<input type="text"  name="page_title" value=""class="form-control input-sm" placehol der="Name">
								<p class="error"></p>
							</div>
						</div>
						
						
						<div class="form-group">
							
							<label for="Phone_no" class="col-sm-3">Meta Keyword</label>
							<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
								<input type="text"  name="meta_keyword" id = "meta_keyword" class="form-control input-sm" placehol der="Email">
								<p class="error"></p>
							</div>
						</div>
						
						<div class="form-group">
							
							<label for="price" class="col-sm-3">Meta Discription</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="meta_discription"  name="meta_discription" type="text">
								<p class="error"></p>
							</div>
						</div>

						<div class="form-group">
							
							<label for="price" class="col-sm-3">Image Upload</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
								<input type="file" name="file1" id="file_1"/>
								<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" name="create" id="link1">
								<input type = "hidden" value = "" id = "image_data" name  = "image_data">
							</div>
						</div>


						<div class="form-group">
							
						<label for="price" class="col-sm-3">Page Content</label>
							<div class="col-sm-8 @if($errors->has('email')) has-error @endif">
									<textarea id="customck" name="page_content" class="ckeditor form-control"  rows="6"><?php //	echo $row->name;?></textarea>
								<p class="error1"></p>
							</div>
						</div>

					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
							<button type="submit" id ="btnOk" class="btn green">Submit</button>
							<a href="<?php echo base_url();?>admin/pages"><button type="button" class="btn green">Cancel</button></a>
						</div>
						</div>
					</div>
				</form>

								
			</div>
		</div>
						
	</div>
</div>
			
		
