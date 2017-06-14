
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
					<a href= "<?php echo base_url();?>admin/dashboard">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/contractor">Manage Contractors</a>
						<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="javascript:;">Contractor Job History</a>
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
								<?php foreach($result as $row){?>
								<div class="caption">
									<i class="fa fa-globe"></i> <?php echo $row->username;?>
								</div>
								<?php } ?>
								<div class="tools">
								</div>
							</div>
							
							
							<div class="portlet-body">							
								<table class="table table-striped table-bordered table-hover" id="sample_1">
								<!--caption><a href="{{route('employees.create')}}"><h4>Create employees</h4></a></caption-->
									<thead>
										<tr>
											<!--<th class="text-center"># </th>-->
											<th class="text-center">#</th>
											<th class="text-center">Homeowner</th>
											<th class="text-center">Job Name</th>
											<th class="text-center">Contractor</th>
											<th class="text-center">Start  Time</th>
											<th class="text-center">Completed Time</th>
											<th class="text-center">Price</th>
										</tr>
									</thead>
									
								<tbody>
								<?php foreach($result as $row){?>
								<tr>					
									<td>
										 <?php echo $row->id;?>
									</td>
									<td>
										 <?php echo  ucfirst($row->owner_name);?>
									</td>
									<td>
										 <?php echo  ucfirst($row->job_name);?>
									</td>
									<td>
										 <?php echo $row->username;?>
									</td>
									<td>
										  <?php echo $row->start_time;?>
									</td>
									<td>
										 <?php echo $row->completed_time;?>
									</td>
									<td>
										 <?php echo $row->price;?>
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
			
			
			
			
		
			
			
			
			
			
			
			
			
