





<?php 

/*foreach($job_category as $value){

	echo "<pre>";print_r($value);





}






die;*/


foreach($result as $row);


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
					<a href="<?php echo base_url();?>admin/reviews">Manage Reviews</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="javascript:;">Reviews Detailed Info</a>
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
							<i class="fa fa-gift"></i>Reviews Detailed 
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
									<label for="profile" class="col-sm-3">Contractor Name</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
											<input class="form-control input-sm" placeholder="" autocomplete="off" id="name" disabled="disabled" name="name" type="text" value ="<?php echo $row->contractor_name;?>">
										<p class="error"></p>  									</div>
  								</div>
								<div class="form-group">
									
									<label for="price" class="col-sm-3">Homeowner Name</label>
									<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
										<input class="form-control input-sm" placeholder="" autocomplete="off" id="name" disabled="disabled" name="name" type="text" value ="<?php echo $row->owner_name;?>">
										<p class="error"></p>
									</div>
								</div>

									<div class="form-group">
										
										<label for="username" class="col-sm-3">Reviews </label>
										<div class="col-sm-4 @if($errors->has('username')) has-error @endif">
											
											<textarea  id="review" class="ckeditor form-control"  disabled="disabled" rows="6"><?php echo 
											$row->reviews; ?></textarea>
										</div>
									</div>
								
								
									<div class="form-group">
										
										<label for="Phone_no" class="col-sm-3">Ratings</label>
										<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
											<input class="form-control input-sm" placeholder="" autocomplete="off" id="years_experience" disabled="disabled" name="years_experience" type="text" value ="<?php echo $row->rating;?>">
											<p class="error"></p>
										</div>
									</div>
									<div class="form-group">
									     <div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
												<input class="form-control input-sm" placeholder="" autocomplete="off" id="status" disabled="disabled" name="status" type="hidden" value ="<?php echo $row->status;?>">
												<p class="error"></p>
										 </div>
									</div>
								
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">							
                          			<a   data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn green" href="javascript:;">Take Action</a>
                          				
                          			 <a href = "<?php echo base_url();?>admin/reviews"   class="btn green">
                          				Back
                          			 </a>

										<input type="hidden" value="<?php echo $_GET['id'];?>" id="id1">
										<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" id="editlink">
									</div>
									
								</div>
							</div>
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">



  <div class="modal-dialog" role="document">



    <div class="modal-content">



      <div class="modal-header">



        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>



        <h4 class="modal-title" id="exampleModalLabel">Select Your Action</h4>



      </div>



      <div class="modal-body">



        <form id = "home_owner">


 <a class="btn green"  id="button" href="<?php echo base_url();?>admin/reviews/status_approve?id=<?php echo $_GET['id']; ?>">Approve</a>
<a class="btn red"  id="button" href="<?php echo base_url();?>admin/reviews/status_denied?id=<?php echo $_GET['id']; ?>">Denied</a>
        



        </form>



      </div>



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

div#cke_review {
    width: 500px;
}



 #button {
color: #FFF;
width: 32%;
margin-left: 46px;
margin-right: 12px;
height: 39px;
text-transform: uppercase;
font-size: 19px;
}
.btn
{
color: #FFF;
height: 39px;

font-size: 19px;
}
button, html input[type="button"], input[type="reset"], input[type="submit"] {
    cursor: pointer;
}

.modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
    height: 150px;
    width: 457px;
    margin-top: 176px;
    margin-left: 100px;
}





</style>
