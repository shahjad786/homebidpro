
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
					<a href="javascript:;">Manage Jobs</a>
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
									<i class="fa fa-globe"></i>Manage Jobs
								</div>
								<div class="tools">
								</div>
							</div>
							
							
							<div class="portlet-body">	

								<div class="table-toolbar" style ="display:none;">
									<div class="btn-group">
										<a href="<?php echo base_url();?>admin/jobs/create">
											<button id="" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button>
										</a>									
									</div>
								</div>
								
								
								
							<table class="table table-striped table-bordered table-hover" id="sample_1">
								<!--caption><a href="{{route('employees.create')}}"><h4>Create employees</h4></a></caption-->
									<thead>
										<tr>
											<!--<th class="text-center"># </th>-->
											<th class="text-center">#</th>
											<th class="text-center">Homeowner</th>
											<th class="text-center">Counties</th>
											<th class="text-center">Project Discription</th>
											<th class="text-center">Status</th>
											<th class="text-center">Price</th>
											<th class="text-center">Posted Date</th>
											<th class="text-center">Project Detail</th>
										</tr>
									</thead>
									
								<tbody>
								<?php $id = 0;?>
								<?php foreach($result as $row){
									
									$id++;
									
									?>
								<tr>					
									<td>
										 <?php echo $id;?>
									</td>
									<td>
										 <?php echo  ucfirst($row->name);?>
									</td>
									<td>
										 <?php echo $row->counties;?>
									</td>
									<td>
										  <?php echo $row->project_discription;?>
									</td>
									
									
									<td>
										 <?php echo $row->status_name;?>
									</td>
									
									<td>
										  $<?php echo $row->price;?>
									</td>
									<td>
										  <?php echo $row->created_at;?>
									</td>
									<td>
										<!--<a href="<?php //echo base_url();?>admin/jobs/job_comment?id=<?php// echo $row->id;?>">Details</a>-->
										<a href = "<?php echo base_url();?>admin/jobs/job_detail?id=<?php echo $row->id;?>"><i  title = "Detail" class="icon-list"></i></a>
										<a class="delete" href="<?php echo base_url();?>admin/jobs/delete_job?id=<?php echo $row->id;?>&owner_id=<?php echo $row->owner_id;?>"><i title="Delete" class="fa fa-trash"></i></a>
									</td>	
								</tr>
								<?php } ?>
								</tbody>
									
									
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			
			</div>
			
			
			
			
		
			
			
			
			
			
			
			
			
