<style type="text/css">


.portlet-body #sample_1_wrapper div.row:nth-of-type(2) div.col-md-6:nth-of-type(1) {
  float: left;
}

.portlet-body #sample_1_wrapper div.row:nth-of-type(2) div.col-md-6:nth-of-type(2) {
  float: left;
}

.portlet-body #sample_1_wrapper div.row:nth-of-type(1) {
  margin: 16px 0 0 !important;
  position: absolute;
  width: 100%;
}
.portlet-body div:nth-of-type(2) .form-actions .btn.green {
  margin: 2px 0 0;
  padding: 5px 15px;
}
.portlet-body #sample_1_wrapper div.row:nth-of-type(2) div.col-md-6:nth-of-type(1) {
  float: left;
  margin-top: 1px;
}

.portlet-body div:nth-of-type(2) .form-actions {
  float: left;
}

.portlet-body div:nth-of-type(2) .form-group {
  float: left;
  margin: 0 0 0 11pc;
  width: 52%;
}


.portlet-body #sample_1_wrapper div:nth-of-type(3) {
  clear: both;
  margin: 95px 0 0 !important;
}

.portlet-body #sample_1_wrapper div.row:nth-of-type(2) {
  clear: unset !important;
  margin-bottom: 17px !important;
  margin-top: -49px;
  position: absolute;
  width: 96%;
  z-index: 0;
}

.portlet-body #sample_1_wrapper div.row:nth-of-type(2) div.col-md-6:nth-of-type(2) #sample_1_filter {
  margin-top: -3px;
}
.range_date {   margin: 27px 0 0;
    position: absolute;
	width:80%;
    z-index: 9999999 !important;}
</style>
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
					<a href="javascript:;">Manage Homeowners</a>
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
									<i class="fa fa-globe"></i>Manage Homeowners
								</div>
								<div class="tools">
								</div>
							</div>
							
							
							<div class="portlet-body">	

							<div class="table-toolbar" style="display:none;">
									<div class="btn-group">
										<!--<a href="<?php echo base_url();?>admin/homeowner/add_homeowner">-->
											<a href="javascript:;">
											<button id="" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button>
										</a>									
									</div>
							</div>
							<p class="success">
								<?php echo $this->session->flashdata('message'); ?>
							</p>
						<div class="range_date">
							<form id = "date" name = "date" class="form-horizontal" action = "<?php echo base_url();?>admin/homeowner/" method="post">	
								<div class="form-group">
									<label class="control-label col-md-4">Date Range</label>
									<div class="col-md-8">
										<div class="input-group input-medium date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
											<input type="text" class="form-control" value="<?php echo isset($_POST['from']) ? $_POST['from'] : '' ?>" id="from" name="from">
											<span class="input-group-addon">
											to </span>
											<input type="text" class="form-control" value="<?php echo isset($_POST['to']) ? $_POST['to'] : '' ?>" id="to" name="to">
										</div>
										<!-- /input-group -->
									</div>
								</div>
								
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
										<button type="submit" onclick="showInput();" class="btn green">Search</button>										
										</div>
									</div>
							    </div>	
							</form>
						</div>
							<table class="table table-striped table-bordered table-hover" id="sample_1">
								<!--caption><a href="{{route('employees.create')}}"><h4>Create employees</h4></a></caption-->
									<thead>
										<tr>
											<!--<th class="text-center"># </th>-->
											<th class="text-center">#</th>
											<th class="text-center">Name</th>
											<th class="text-center">Email</th>
											<!-- <th class="text-center">Country</th> -->
											<th class="text-center">County</th>
											<th class="text-center">State</th>
											
											<th class="text-center">Phone Number</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									
									<tbody>
									<?php  $id = 0; ?>
							<?php if(count($result)>0){

							foreach($result as $row) { 
								$id++;?>
								<tr>
								     <td>
										 <?php echo $id;?>
									</td>
									
									<td>
										 <?php echo  ucfirst($row->name);?>
									</td>
									<td>
										  <?php echo $row->email;?>
									</td>
									<!-- <td>
										 <?php echo $row->country_id;?>
									</td> -->

									<td>
										 <?php echo $row->county;?>
									</td>
									
									<td>
										 <?php echo $row->state_name;?>
									</td>
									
									



									<td class="center">
										 <?php echo $row->phone_no;?>
									</td>
										
									<td>
										<a href="<?php echo base_url();?>admin/homeowner/complete_information?id=<?php echo $row->id;?>" title="Personal Detail"><i class="icon-list"></i></a>
										<a href="<?php echo base_url();?>admin/homeowner/jobs?id=<?php echo $row->id;?>" title="Job History"><i class="icon-clock"></i></a>
									    <a><i data="<?php echo $row->id;?>" class="status_checks btn  <?php echo ($row->status)?'a': 'b'?>"><?php echo ($row->status)? '<i title="active" class="fa fa-check"></i>' : '<i title="inactive" class="fa fa-times"></i>'?></i></a>
										<a class="delete" onclick="return ConfirmDialog();" href="<?php echo base_url();?>admin/homeowner/delete_homeowner?id=<?php echo $row->id;?>"><i title="Delete" class="fa fa-trash"></i></a>
										<input type="hidden" name="role" id="role" value="homeowner">
									</td>
									
								</tr>
								<?php } }else{
									echo "<p class='success'>No homeowner register in this dates</p>";
								}?>
								</tbody>		
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
				</div>		
			</div>
			