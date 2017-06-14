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
					<a href="<?php echo base_url();?>admin/questions">Manage Questions</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<?php if(isset($result)){?>
				<li>
					<a href="">Edit Question</a>
				</li>
				<?php }else{ ?>
				
				<li>
					<a href="">Add New Question</a>
				</li>
				<?php } ?>				
				
			</ul>
			<div class="page-toolbar">
				<div class="btn-group pull-right">
					
				</div>
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		
		<div class="row">
			<div class="success"></div>
			<div class="col-md-12">
				<!-- BEGIN VALIDATION STATES-->
				<div class="portlet box blue-hoki">
											<!-- BEGIN EDIT FORM-->
							<?php if(isset($result)){?>
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Edit Question
						</div>
						
					</div>
					<div class="portlet-body form">
						
								<form action="<?php echo base_url();?>admin/questions/update_question" method="post" class="form-horizontal" id = "question">
									<div class="form-body">
										<?php foreach ($result as $row){?>
												<div class="form-group">
													<label class="col-md-3 control-label"> Question</label>
													<div class="col-md-4">
													<input type="text"  name="question" value="<?php echo $row->question;?>"class="form-control input-sm" placehol der="Enter question">
																															   			</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label"> Question Type</label>
													<div class="col-md-4">
													<input type="text"  name="question_type" id="question_type"  value="<?php echo $row->question_type;?>"class="form-control input-sm" placehol der="Question Type">
																															   			</div>
												</div>
											<?php  $options = $row->options;
	 										       $sepOptions = explode(',',$options);
											       $options_id = $row->question_options_id;
											       $sepOptions_id = explode(',',$options_id);
											       /*
											       $sepOptions=array('options' => explode(',',$options),
											       					'options_id' => explode(',',$options_id));
											       	echo "<pre>";
											       	print_r($sepOptions);
											       	die();
											       */
											       	$arr=array_combine($sepOptions,$sepOptions_id);

											 ?>
	<div class="form-group ">
		<label class="col-md-3 control-label"> Options</label>
		    <div class="col-md-4 field_wrapper">
				<?php $i=0;
				 $numItems = count($arr);
						

					foreach($arr as $key=>$val){

						?>
							<input type="text"  id="opt_<?php echo $i;?>" value="<?php echo $key;?>"  name="option[]"  class="form-control input-sm" placeholder="Enter option">
							<input type="hidden"  value="<?php echo $val;?>"  name="option_id[]"  class="form-control input-sm" placeholder="Enter option">
							<?php if($numItems == '1') {
							echo "";
							}
							else
							{
								?>
							<a href="<?php echo base_url();?>admin/questions/delete_options?id=<?php echo $val;?>&question_id=<?php echo $row->id;?>" class="remove_question" title="Remove field"><img src="<?php echo base_url();?>media/img/remove-icon.png"/></a>

							<?php 	} ?>
							
					
					<?php $i++;}?>
					<?php $i=1;
					?>
					<a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url();?>media/img/add-icon.png"/></a>
			</div>
	</div>
 	<div class="form-group">
			<div class="col-md-4">
				<input type="hidden"  value="<?php echo $row->id;?>" name="id" class="form-control input-sm" placeholder="Enter option">
			</div>
	</div>
<?php } ?>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
													<button type="submit" class="btn green">Update</button>
												    <a href="<?php echo base_url();?>admin/questions"><button type="button" class="btn green">Cancel</button></a>
													</div>
												</div>
											</div>
									</div>
								</form>
                            <?php }else{ ?>
                           			<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Add New Question
						</div>
						
					</div>
					<div class="portlet-body form">
						
		 <!-- BEGIN ADD FORM-->
								<form action="<?php echo base_url();?>admin/questions/insert_question" method="post" class="form-horizontal" id="question">
									<div class="form-body">
										<div class="form-group">
											<label class="col-md-3 control-label"> Questions</label>
											<div class="col-md-4">
											<input type="text"  name="question" class="form-control input-sm" placehol der="Enter question">																		   			</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label"> Question Type</label>
											<div class="col-md-4">
											<input type="text" id="question_type" name="question_type" class="form-control input-sm" placeholder="Question Type">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label"> Options</label>
											<div class="col-md-4 field_wrapper">
											<input type="text"  name="option1[]" class="form-control input-sm" placeholder="Enter option">
											
											</div>
										</div>
										<div style="width:29%;text-align:right;">
										<a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url();?>media/img/add-icon.png"/></a>
										</div>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-offset-3 col-md-9">
												<button type="submit" class="btn green">Submit</button>
												<a href="<?php echo base_url();?>admin/questions"><button type="button" class="btn green">Cancel</button></a>
												</div>
											</div>
										</div>
									</div>
								</form>
							<?php }?>
											<!-- END FORM-->
						</div>
					</div>
				</div>
				
				<!-- END VALIDATION STATES-->
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 6; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" class="form-control input-sm" placeholder="Enter option" name="option1[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url();?>media/img/remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>