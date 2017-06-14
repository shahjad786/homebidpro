<?php //echo "<pre>"; print_r($result);?>

<style type="text/css">
.col-md-3.mm {
   margin-left: -14px;
   }
   
   #btn-signup {
    margin-left: 12pc;
}
</style>
<style type="text/css">
   .col-md-offset-3 {
   margin-left:6.333% !important;
   }
   .left-box-link li {
   list-style: outside none none;
   line-height: 25px;
   }
   .left-box-link ul {
   padding-left: 5px;
   }.sidebar-nav a{
   color: hsl(240, 1%, 26%) !important;
   text-decoration: none;
   }
   .left-box-link li a:hover{
   color:#31708f !important;
   cursor:pointer;
   }
</style>
<div class="container">
   <div class="dashboard_heading">
      <div class="row">
         <div class="col-md-12 text-center">
           <h1>All Payment</h1>
         </div>
      </div>
   </div>
   <div class="col-md-2 col-sm-12 left-box-link" style="border-radius: 4px; padding-top: 9px; color: rgb(0, 0, 0); background: none repeat scroll 0px 0px rgb(249, 249, 249); border: 1px solid rgb(49, 112, 143);">
      <ul class="sidebar-nav">
      </ul>
   </div>
   <div id="breadcrumb">
				<ul class="crumbs">
					<li class="first"><a href="#" style="z-index:9;"><span></span>All Payments</a></li>
				<!-- 	<li><a href="#" style="z-index:8;">Archives</a></li>
					<li><a href="#" style="z-index:7;">2011 Writing</a></li>
					<li><a href="#" style="z-index:6;">Tips for jQuery Development in HTML5</a></li> -->
				</ul>
			</div>
   <!-- <div class="sigin_logo text-center" style="min-height:100px;">   </div> -->
   <div id="loginbox" style="margin-bottom:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

			


      <div class="panel panel-info">
         <div class="panel-heading">
            <div class="panel-title">All Payments</div>
         </div>
         <div class="panel-body" >
            <table class="table table-striped table-bordered table-hover" id="sample_5">
								<!--caption><a href="{{route('employees.create')}}"><h4>Create employees</h4></a></caption-->
									<thead>
										<tr>
											<!--<th class="text-center"># </th>-->
											<th class="text-center">#</th>
											<th class="text-center">Contractor</th>
											<th class="text-center">Contractor Email</th>
											<th class="text-center">Job Name</th>
											<th class="text-center">Payment</th>
											<th class="text-center">Payment Detail</th>
											
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
									<td class="center">
										 <?php echo $row->email;?>
									</td>
									<td class="center">
										 <?php echo $row->job_name;?>
									</td>
									<td class="center">
										 <?php echo $row->payment;?>
									</td>
									<td class="center">
										<a href="<?php echo base_url();?>homeowner/payment/payment_details?id=<?php echo $row->id;?>">View Detail</a>
									</td>
								</tr>
								<?php } ?>
								</tbody>
									
								</table>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#sample_5').DataTable();
    
    
} );

</script>
