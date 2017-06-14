





<?php 

/*foreach($job_category as $value){

	echo "<pre>";print_r($value);





}






die;*/


foreach($result as $key => $value);


//echo "<pre>";print_r($result);



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
					<a href="javascript:;">Contractor Detailed Info</a>
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
							<i class="fa fa-gift"></i><?php echo ucfirst($value['name']);?>
						</div>
						
					</div>
					
					<div class="portlet-body form">
					
						<form id = "expensesCreate" class="form-horizontal">
							<div class="form-body">
								<div class="alert alert-danger display-hide">
									<button class="close" data-close="alert"></button>
									You have some form errors. Please check below.
								</div>

								<div class="table-toolbar" style = "margin-left: 808px;">
									<div class="btn-group">
										<a class="btn green"  href="<?php echo base_url();?>admin/contractor/business_information?id=<?php echo $value['id'];?>">
											
											Working Hours</i>
											
										</a><div class="success"><?php echo $this->session->flashdata('message'); ?></div>
									</div>			
							   </div>


								<div class="form-group">
									<label for="profile" class="col-sm-3">Profile Pic</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<img width="200px"  height="148px"  src="<?php echo base_url();?>uploads/<?php echo $value['profile_pic'];?>">
  									</div>
  								</div>
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Name</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="name" disabled="disabled" name="name" type="text" value ="<?php echo $value['name'];?>">
										<p class="error"></p>
									</div>
								</div>
								
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Email</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="email" disabled="disabled" name="email" type="text" value ="<?php echo $value['email'];?>">
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Company Name</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="phone_no" disabled="disabled" name="company_name" type="text" value ="<?php echo $value['company_name'];?>">
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Company Address</label>
									<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="email" disabled="disabled" name="company_address" type="text" value ="<?php echo $value['company_address'];?>">
										<p class="error"></p>
									</div>
								</div>
							
							 <div class="form-group">
                                    <label for="category" class="col-md-3 ">Category</label>
                                    <div class="col-md-9">
                                        <select class="form-control input-sm" id = "job_category" disabled="disabled" name="job_category[]"  multiple>
                                          <?php 

                           									
					            	        foreach($value['contractor_category_ids'] as $key1 => $val1)
					                 		{ 
					                        	$session[] = $val1['id']; 

					                        }

					                    ?>                                               
					                
					                        
					                      <?php foreach($job_category as $category)
                                             	{ 

                                             		//echo "<pre>";	print_r($category);die;

                                                echo '<option value="' . $category->id . '" ' . (in_array($category->id,$session) ? 'selected="selected"' : '') . '>' . $category->job_category . '</option>'; 
                                                ?>                                               
                                            
                                                    
                                               <?php } ?>
                                                                                   
                                        </select>
                                    </div>
                            </div>
								
								
								<div class="form-group">
									
									<label for="username" class="col-sm-3">Phone Number</label>
									<div class="col-sm-4 @if($errors->has('username')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="phone_number" disabled="disabled" name="phone_number" type="text" value ="<?php echo $value['phone_number'];?>">
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Experience</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="years_experience" disabled="disabled" name="years_experience" type="text" value ="<?php echo $value['years_experience'];?>">
										<p class="error"></p>
									</div>
								</div>
								
								
								
								
								<div class="form-group">
									
									<label for="detail" class="col-sm-3">State License Number</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="country" autocomplete="off" id="state_license_number" value = "<?php echo $value['state_license_number'];?>" disabled="disabled" name="state_license_number" type="text">
									<p class="error"> </p>
									</div>
								
								</div>
								
								<div class="form-group">
									<label for="price" class="col-sm-3">Country</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="country" autocomplete="off" id="country" value = "<?php echo $value['country_id'];?>" disabled="disabled" name="country" type="text">
										<p class="error"></p>
									</div>
								</div>	


								<div class="form-group">
									
									<label for="price" class="col-sm-3">State</label>
									<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="email" disabled="disabled" name="state" type="text" value ="<?php echo $value['state_name'];?>">
										<p class="error"></p>
									</div>
							  </div>

							
							  <div class="form-group">
                                    <label for="category" class="col-md-3 ">Counties</label>
                                    <div class="col-md-9">
                                        <select class="form-control input-sm" id = "counties" name="counties[]" multiple disabled="disabled">
                                          <?php 

                           									
					            	foreach($value['contractor_counties_ids'] as $key1 => $val1)
					                 	{ 
					                        $session[] = $val1['id']; 


					                    }
					                    ?>                                               
					                
					                        
					                    <?php foreach($county as $county_id)
                                             	{ 

                                             		//echo "<pre>";	print_r($category);die;

                                                	echo '<option value="' . $county_id->id . '" ' . (in_array($county_id->id,$session) ? 'selected="selected"' : '') . '>' . $county_id->county . '</option>'; 
                                               

                                                ?>                                               
                                            
                                                    
                                               <?php } ?>
                                                                                   
                                        </select>
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