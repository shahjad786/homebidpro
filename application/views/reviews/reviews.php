<style type="text/css">
.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
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
									<i class="fa fa-globe"></i>Manage Reviews
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
											<th class="text-center">#</th>
											<th class="text-center">Contractor Name</th>
											<th class="text-center">Homeowner Name</th>
											<th class="text-center">Reviews</th>
											<th class="text-center">Rating</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
                                              
											
										</tr>
									</thead>
									
								<tbody>
								
							     	
									<?php 

									$i= 0;

									foreach($result as $row){

										$i++;
											
									?>
									<tr>
										<td>
										 <?php echo $i; ?>
									</td>
										<td>
											 <?php echo ucfirst($row->contractor_name);?>
										</td>
										<td>
											<?php echo ucfirst($row->owner_name);?>
									    </td>
										<td class="center">
											 <?php echo $row->reviews;?>
										</td>
											<td class="center">
											 
											<?php echo $row->rating;?>
											 
										</td>

											<td class="center">
											 
											<?php  if($row->status==0){?>

											<span class="badge" style ="background-color:red;">&nbsp;</span>

											<?php }

											if($row->status==2){ ?>
												
												<span class="badge" style ="background-color:yellow;">&nbsp;</span>
											

											<?php }if($row->status==1){ ?>

												<span class="badge" style ="background-color:green;">&nbsp;</span>


											<?php } ?>
											 
										</td>
										
										<td>
										<a href="<?php echo base_url();?>admin/reviews/review_detail?id=<?php echo $row->id;?>" title="Full Detail"><i class="icon-list"></i></a></a>&nbsp;
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
			
