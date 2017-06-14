
<style>
div.dataTables_length label {
    font-weight: normal;
    float: left;
    text-align: left;
    display: none;
}

div.dataTables_filter label {
    font-weight: normal;
    float: right;
    display: none;
}
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
					<a href="javascript:;">Manage Banners</a>
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
									<i class="fa fa-globe"></i>Manage Banners
								</div>
								<div class="tools">
								</div>
							</div>
							
							
							<div class="portlet-body">		
							
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="<?php echo base_url();?>admin/cmscontent/create">
											<button id="" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button><div class="success"><?php echo $this->session->flashdata('message'); ?></div>
										</a>									
									</div>
								</div>
							
							
								<table class="table table-striped table-bordered table-hover" id="sample_1">
								<!--caption><a href="{{route('employees.create')}}"><h4>Create employees</h4></a></caption-->
									<thead>
										<tr>
											<!--<th class="text-center"># </th>-->
											<th class="text-center">#</th>
											<th class="text-center">Name</th>
											<th class="text-center">Image</th>
											<th class="text-center">EDIT/DELETE</th>
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
											 <?php echo  ucfirst($row->image);?>
										</td>
										<td>
											 <img src ="<?php echo base_url();?>uploads/<?php echo $row->image;?>"/ style="height:44px; width:60px;">
										</td>				
										<td>
											<a href="<?php echo base_url();?>admin/cmscontent/edit?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i></a>
											<a><i data="<?php echo $row->id;?>" class="status_checks btn  <?php echo ($row->status)?'a': 'b'?>"><?php echo ($row->status)? '<i title="active" class="fa fa-check"></i>' : '<i title="Deactive" class="fa fa-times"></i>'?></i></a>
											<a class="delete" href="<?php echo base_url();?>admin/cmscontent/delete_cmsContent?id=<?php echo $row->id;?>"><i title="Delete" class="fa fa-trash"></i></a>
											
											<input type="hidden" value="cmscontent" name="role" id="role">
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