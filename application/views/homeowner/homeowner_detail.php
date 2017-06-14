  <?php foreach($result as $row);

  // echo "<pre>";print_r($row);die;
  /*foreach($row->categories as $row1){


     $category_ids[] = $row1[0]->id;



   //echo "<pre>";print_r();



  }*/



   //echo "<pre>";print_r($category_ids);

//die;
  ?>  
	<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href= "<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/homeowner">Manage Homeowners</a>
						<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="javascript:;">Homeowner Detailed Info</a>
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
							<i class="fa fa-gift"></i><?php echo ucfirst($row->name);?>
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
									<label for="profile" class="col-sm-3">Profile Pic</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<img width="200px"  height="148px"  src="<?php echo base_url();?>uploads/<?php echo $row->profile_pic;?>">
  									</div>
  								</div>
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Name</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="name" disabled="disabled" name="name" type="text" value ="<?php echo $row->name;?>">
										<p class="error"></p>
									</div>
								</div>
								
								
								
								
								
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Email</label>
									<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="email" disabled="disabled" name="name" type="text" value ="<?php echo $row->email;?>">
										<p class="error"></p>
									</div>
								</div>
								
								<!-- <div class="form-group">
									
									<label for="detail" class="col-sm-3">Address Line 1</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="password" disabled="disabled" name="address1" type="text" value ="<?php echo $row->address1;?>">
									<p class="error"> </p>
									</div>
								
								</div>
								
								
								<div class="form-group">
									
									<label for="detail" class="col-sm-3">Address Line 2</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="address2" disabled="disabled" name="address2" type="text" value ="<?php echo $row->address2;?>">
									<p class="error"> </p>
									</div>
								
								</div> -->
								<!-- <div class="form-group">
                                    <label for="category" class="col-md-3">Category</label>
                                    <div class="col-md-9">
                                        <select class="form-control input-sm" disabled="disabled"  id = "job_category" name="job_category[]" multiple>
                                           <?php foreach($job_category as $category)
                                             	{ 

                                             		//echo "<pre>";	print_r($category);die;

                                                echo '<option value="' . $category->id . '" ' . (in_array($category->id,$category_ids) ? 'selected="selected"' : '') . '>' . $category->job_category . '</option>'; 
                                                ?>                                               
                                            
                                                    
                                               <?php } ?>
                                                                                   
                                        </select>
                                    </div>
                                </div> -->
                                
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Phone Number</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="phone_no" disabled="disabled" name="Phone_no" type="text" value ="<?php echo $row->phone_no;?>">
										<p class="error"></p>
									</div>
								</div>							
								
								 <div class="form-group">
									<label for="price" class="col-sm-3">Country</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="country" autocomplete="off" id="country" value = "<?php echo $row->country_id;?>" disabled="disabled" name="country" type="text">
										<p class="error"></p>
									</div>
								</div>	 
								<div class="form-group">
									<label for="price" class="col-sm-3">State</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="country" autocomplete="off" id="country" value = "<?php echo $row->state_name;?>" disabled="disabled" name="country" type="text">
										<p class="error"></p>
									</div>
								</div>	
								<div class="form-group">
									<label for="price" class="col-sm-3">Counties</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="country" autocomplete="off" id="country" value = "<?php echo $row->county;?>" disabled="disabled" name="country" type="text">
										<p class="error"></p>
									</div>
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

</style>