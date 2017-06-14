<?php 

foreach($result as $row);

?> 



	<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href= "<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/contractor">Manage Contractors</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="javascript:;">Contractor Bid Detailed</a>
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
							<i class="fa fa-gift"></i><?php echo ucfirst($row->contractor_name);?> 
						</div>
						
					</div>
					
					<div class="portlet-body form">
					
						<form id = "expensesCreate" class="form-horizontal">
							<div class="form-body">
								<div class="alert alert-danger display-hide">
									<button class="close" data-close="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Contractor Name</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="name" disabled="disabled" name="name" type="text" value ="<?php echo ucfirst($row->contractor_name);?>">
										<p class="error"></p>
									</div>
								</div>
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Owner Name</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="name" disabled="disabled" name="name" type="text" value ="<?php echo ucfirst($row->owner_name);?>">
										<p class="error"></p>
									</div>
								</div>
								
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Job</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="email" disabled="disabled" name="email" type="text" value ="<?php echo $row->name;?>">
										<p class="error"></p>
									</div>
								</div>

								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Start Time </label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="phone_no" disabled="disabled" name="company_name" type="text" value ="<?php echo $row->start_time;?>">
										<p class="error"></p>
									</div>
								</div>

								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Completed Time </label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="phone_no" disabled="disabled" name="company_name" type="text" value ="<?php echo $row->completed_time;?>">
										<p class="error"></p>
									</div>
								</div>
								
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Description Of Work</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<textarea name="data" id ="customck" class="ckeditor form-control" disabled="disabled" name="editor1" rows="6"><?php echo $row->detail;?></textarea>

									</div>
								</div>
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Bid Amount </label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="phone_no" disabled="disabled" name="company_name" type="text" value ="$<?php echo $row->price;?>">
										<p class="error"></p>
									</div>
								</div>
								
								
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<!--<button type="submit" class="btn green">Update</button>
										<button type="button" class="btn default" id="cancel">Cancel</button>-->
										<input type="hidden" value="<?php echo $_GET['id'];?>" id="id1">
										<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" id="editlink">
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
		
<style>


select[multiple].input-sm, textarea.input-sm {
    height: auto;
    width: 307px;
}
div#cke_customck {
    width: 550px;
}






</style>