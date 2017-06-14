<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>View Request Details 
				</div>
			</div>
			<div class="portlet-body form">
				<?php foreach($result as $row)?>  
				<form id = "expensesCreate" class="form-horizontal">
					<div class="form-body">
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="form-group">
							<label for="price" class="col-sm-3">Homeowner</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="job" disabled="disabled" name="job" type="text" value ="<?php echo $row->name;?>">
								<p class="error"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="price" class="col-sm-3">Job</label>
							<div class="col-sm-4 @if($errors->has('price')) has-error @endif">
								<textarea class="form-control input-sm" ><?php echo $row->project_discription;?></textarea>
								<p class="error"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="Phone_no" class="col-sm-3">Location</label>
							<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="location" disabled="disabled" name="location" type="text" value ="<?php echo $row->location;?>">
								<p class="error"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="col-sm-3">Start Date</label>
							<div class="col-sm-4 @if($errors->has('username')) has-error @endif">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="contractor" disabled="disabled" name="contractor" type="text" value ="<?php echo $row->start_time;?>">
								<p class="error"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="Phone_no" class="col-sm-3">End Date</label>
							<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="start_date" disabled="disabled" name="start_date" type="text" value ="<?php echo $row->completed_time;?>">
								<p class="error"></p>
							</div>
						</div>
																		 							<div class="form-group">
							<label for="Phone_no" class="col-sm-3">Payment</label>
							<div class="col-sm-4 @if($errors->has('Phone_no')) has-error @endif">
								<input class="form-control input-sm" placeholder="" autocomplete="off" id="start_date" disabled="disabled" name="start_date" type="text" value ="<?php echo $row->payment;?>">
								<p class="error"></p>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
										<!--<button type="submit" class="btn green">Update</button>
										<button type="button" class="btn default" id="cancel">Cancel</button>-->
									<input type="hidden" value="<?php echo $_GET['id'];?>" id="id1">
									<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI'];?>" id="editlink">
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
		
