
		<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						 Widget settings form goes here
					</div>
					<div class="modal-footer">
						<button type="button" class="btn blue">Save changes</button>
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		
		<!-- BEGIN PAGE HEADER-->
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
					<a href="javascript:;">Manage Contractors</a>
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
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						
			
					
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-globe"></i>Manage Contractors
								</div>
								<div class="tools">
								</div>
							</div>
							
							
							<div class="portlet-body">
							
							<div class="table-toolbar" style = "display:none;">
										<div class="btn-group">
										<a href="<?php echo base_url();?>admin/contractor/add_contractor">
											<button id="" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button>
										</a><div class="success"><?php echo $this->session->flashdata('message'); ?></div>
										</div>			
							</div>
								
								<table class="table table-striped table-bordered table-hover" id="sample_1">
								<!--caption><a href="{{route('employees.create')}}"><h4>Create employees</h4></a></caption-->
									<thead>
										<tr>
											<th class="text-center">id</th>
											<th class="text-center">Name</th>
											<th class="text-center">Experience(yrs)</th>
											<th class="text-center">Skills</th>
											<th class="text-center">State</th>
											<th class="text-center">Counties</th>
											<th class="text-center">Action</th>
                                              
											
										</tr>
									</thead>
									
								<tbody>
								
							     	<?php $id = 0;?>
									<?php foreach($result as $key => $value){
										
											$id++;
									?>
									<tr>
										<td>
											 <?php echo $id;?>
										</td>
										<td>
											<?php echo ucfirst($value['name']);?>
									    </td>
										<td class="center">
											 <?php echo $value['years_experience'];?>
										</td>
											<td class="center">
											 
											 <?php foreach($value['contractor_category_ids'] as $key1 => $val1) {
												 
												if($key1 != 0) {
													echo ","; 	
												}
												
													echo $val1['job_category'];

											 }
											 ?>
											 
										</td>
										<td class="center">
											 <?php echo $value['state_name'];?>
										</td>
										 <td class="center">
											 
											 <?php foreach($value['contractor_counties_ids'] as $key1 => $val1) {
												 
												if($key1 != 0) {
													echo ","; 	
												}
												
													echo $val1['county'];

											 }
											 ?>
											 
										</td> 
										<td>
										<a href="<?php echo base_url();?>admin/contractor/complete_information?id=<?php echo $value['id'];?>" title="Personal Detail"><i class="icon-list"></i></a></a>&nbsp;
										<a href="<?php echo base_url();?>admin/contractor/contractor_history?id=<?php echo $value['id'];?>" title="Job History"><i class="icon-clock"></i></a>
										 <a><i data="<?php echo $value['id'];?>" class="status_checks btn  <?php echo $value['status']?'a': 'b'?>"><?php echo ($value['status'])?'<i title="Active" class="fa fa-check"></i>' : '<i title="Deactive" class="fa fa-times"></i>'?></i></a>
										<a class="delete" onclick="return ConfirmDialog();" href="<?php echo base_url();?>admin/contractor/delete_contractor?id=<?php echo $value['id'];?>"><i title="Delete" class="fa fa-trash"></i></a>
										<input type="hidden" name="role" id="role" value="contractor">
 									</i>
									</td>
									</tr>
									
									<?php }?>
								</tbody>		
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			
			</div>
			
