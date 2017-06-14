  <?php foreach($result as $row);

  // echo "<pre>";print_r($row);die;
  /*foreach($row->categories as $row1){


     $category_ids[] = $row1[0]->id;



   //echo "<pre>";print_r();



  }
*/


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
					<a href="<?php echo base_url();?>admin/jobs">Manage Jobs</a>
						<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="javascript:;">Job Detailed Info</a>
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
							<i class="fa fa-gift"></i><?php echo ucfirst($row->job_title); ?>
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
									
									<label for="price" class="col-sm-3">Job Title</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="name" disabled="disabled" name="name" type="text" value ="<?php echo $row->job_title;?>">
										<p class="error"></p>
									</div>
								</div>
								
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Job Owner</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="phone_no" disabled="disabled" name="Phone_no" type="text" value ="<?php echo $row->name;?>">
										<p class="error"></p>
									</div>
								</div>
								<div class="form-group">
                                    <label for="category" class="col-md-3 ">Category</label>
                                    <div class="col-md-4">
                                        <input class="form-control input-sm" placeholder="" autocomplete="off" id="password" disabled="disabled" name="Phone_no" type="text" value ="<?php echo $row->job_category;?>">
                                    </div>
                                </div>
								
								<!-- <div class="form-group">
									
									<label for="price" class="col-sm-3">Country</label>
									<div class="col-sm-4 @if($errors->has('email')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="email" disabled="disabled" name="name" type="text" value ="<?php echo $row->country;?>">
										<p class="error"></p>
									</div>
								</div> -->
								
								<div class="form-group">
									
									<label for="Phone_no" class="col-sm-3">Job Description</label>
									<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
										<textarea  style="width: 500px;height: 168px;"class="form-control input-sm"  autocomplete="off" id="password" disabled="disabled" name=""><?php echo $row->project_discription;?></textarea>
										<p class="error"></p>
									</div>
								</div>
							
								<?php  $jobId = $_GET['id'];
								?>
								
								
								<div class="form-group">
									
									<label for="detail" class="col-sm-3">Starting Date</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="password" disabled="disabled" name="address1" type="text" value ="<?php echo date('F d, Y', strtotime($row->started_time));?>">
									<p class="error"> </p>
									</div>
								
								</div>
								
								<div class="form-group">
									
									<label for="detail" class="col-sm-3">Expiring Date</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="address2" disabled="disabled" name="address2" type="text" value ="<?php echo $row->expire_time;?>">
									<p class="error"> </p>
									</div>
								
								</div>
								
								
								<div class="form-group">
									<label for="detail" class="col-sm-3">Status</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="password" disabled="disabled" name="Phone_no" type="text" value ="<?php echo $row->status_name;?>">
									<p class="error"> </p>
									</div>
								</div>
								<div class="form-group">
									<label for="detail" class="col-sm-3">State</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="password" disabled="disabled" name="Phone_no" type="text" value ="<?php echo $row->state_name;?>">
									<p class="error"> </p>
									</div>
								</div>		

								<div class="form-group">
									<label for="detail" class="col-sm-3">County</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="password" disabled="disabled" name="Phone_no" type="text" value ="<?php echo $row->county;?>">
									<p class="error"> </p>
									</div>
								</div>	
							
					<div class="form-group">
					<label for="Phone_no" class="col-sm-3">Images</label>
					<?php 
							$i=1;
					foreach($row->image as $key=>$val){ ?>  
							<img width="200px" style="margin-left:16px;"  height="148px" data-toggle="modal" data-target=".bs-example-modal-sm_<?php echo $i;?>" src="<?php echo base_url();?>uploads/<?php echo $val;?>">
								<div class="modal fade bs-example-modal-sm_<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
									<div class="modal-dialog modal-sm">
									    <div class="modal-content" style="width:500px;">
									      
									<!-- <iframe allowfullscreen="" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0" class="embed-responsive-item"></iframe>
									 -->   <img width="500px"  data-toggle="modal" data-target=".bs-example-modal-sm" src="<?php echo base_url();?>uploads/<?php echo $val;?>">
									 		<div class="modal-footer" style="width:500px;">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									      </div>
									 	</div>
									     
									 </div>
									</div>
  					<?php $i++; } ?>
  				</div>
  				<div class="form-group">
  						<label for="Phone_no" class="col-sm-3">Video</label>
					
							<video width="200px"  style="margin-left:16px;" data-toggle="modal" data-target=".bs-example-modal-sm_<?php echo $i;?>" src="<?php echo base_url();?>videos/<?php echo $row->video;?>">
								</video><div class="modal fade bs-example-modal-sm_<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
									<div class="modal-dialog modal-sm">
									    <div class="modal-content" style="width:400px;">
									   <video width="400px" controls name="media"><source src="<?php echo base_url();?>videos/<?php echo $row->video;?>" type="video/mp4"></video>   
									  
									 		<div class="modal-footer" style="width:400px;">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									      </div>
									 	</div>
									     
									 </div>
									</div>
					</div>	
					<div class="form-group">
									<label for="detail" class="col-sm-3">Bidders List</label>
									<div class="col-sm-4 @if($errors->has('detail')) has-error @endif">							
								<table class="table table-striped table-bordered table-hover" id="sample_1">
								<!--caption><a href="{{route('employees.create')}}"><h4>Create employees</h4></a></caption-->
									<thead>
										<tr>
											<!--<th class="text-center"># </th>-->
											<th class="text-center">Contractor Id</th>
											<th class="text-center">Contractor Name</th>
											<th class="text-center">Bid Amount </th>
											<th class="text-center">View Bid Info</th>
										</tr>
									</thead>
									
									<tbody>
									<?php 

										 foreach($selected_contractor as $selected){
										 	}
									foreach($bidders as $bidder){	
										$name  = explode(',', $bidder->contractor_name);

										$id  = explode(',', $bidder->id);
										$price  = explode(',', $bidder->price);
									//	$bidderDetail=array_combine($name,$id);
										//print_r($bidderDetail);
										//die();
	            						foreach($id as $key => $val){

	            							if(isset($selected)){
	            								if(in_array($id[$key],$selected)){?>
	            								<tr id="odd">
												<td>
													<?php  echo "<a  href='<?php echo base_url();?>admin/contractor/complete_information?id=<?php echo $id[$key];?>'" . (in_array($id[$key],$selected) ? 'class="abc"' : '') . '>' . $id[$key] . "</a>"; ?>
												 
											</td>
												<td>
                                                
												 <a  href="<?php echo base_url();?>admin/contractor/complete_information?id=<?php echo $id[$key];?>"><?php echo  ucfirst($name[$key]);?></a> 
											</td>
												<td>
													<?php echo  "$".$price[$key];?>
												</td>
													<td>
														<a href="<?php echo base_url();?>admin/jobs/complete_information?id=<?php echo $val;?>&job_id=<?php echo $jobId;?>" title="Contractors Detailed"><i class="icon-list"></i></a>												 
												</td>
				
											</tr>
	            							<?php } }else{ ?>
	            								<tr id="even">
												<td>
													
												  <a href="<?php echo base_url();?>admin/contractor/complete_information?id=<?php echo $id[$key];?>"><?php echo  $id[$key];?></a>
											</td>
												<td>
												 <a  href="<?php echo base_url();?>admin/contractor/complete_information?id=<?php echo $id[$key];?>"><?php echo  ucfirst($name[$key]);?></a> 
											</td>
												<td>
													<?php echo  "$".$price[$key];?>
												</td>
													<td>
														<a href="<?php echo base_url();?>admin/jobs/complete_information?id=<?php echo $val;?>&job_id=<?php echo $jobId;?>" title="Contractors Detailed"><i class="icon-list"></i></a>												 
												</td>
				
											</tr>
	            							<?php } 
	            							 }
									} ?>
									</tbody>
									
									
								</table>
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
		



<?php  ?>
<style>
div#sample_1_length {
    display: none;
}
div#sample_1_filter {
    display: none;
}
div#sample_1_paginate {
    display: none;
}
div#sample_1_info {
    display: none;
}
.table-scrollable {
	width:550px!important;
}
select[multiple].input-sm, textarea.input-sm {
    height: auto;
    width: 307px;
}
#odd{
	background-color:#9ECE9E;
}
a {
    padding: 4px;
    text-decoration: none;
    color: black;
}

</style>
