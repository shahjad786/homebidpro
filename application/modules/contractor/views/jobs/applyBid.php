 <?php $_GET['owner_id'];?>
 
 <div class="container"> 
	 <div class="dashboard_heading">
      <div class="row">
        <div class="col-md-12 text-center">
         
         
        </div>
      </div>

    </div>
        <div id="signupbox"  margin-top:50px class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title" style = "color:white;">Submit The Bid</div>
                        </div>  
                        <div class="panel-body" >
						
                           <form id ="newjob" name ="homeowner" class="form-horizontal" role="form" action="<?php echo base_url();?>contractor/jobs/applyBid" method="POST">
                       
								<div class="form-group">
								  <label class="control-label col-md-3">Start time</label>
								  <div class="col-md-9">
									<input type="text" value="" name="start_time"    id = "start_time" size="16" class="form-control form-control-inline input-medium date-picker" placeholder="Selected Date">
									<input type="hidden" value="<?php echo $_GET['owner_id'];?>"  name="owner_id"       id = "owner_id">
									<input type="hidden" value="<?php echo $_GET['category_id'];?>"  name="category_id"    id = "category_id">
									<input type="hidden" value="<?php echo $_GET['job_id'];?>"  name="job_id"    id = "job_id">
								  </div>
								</div>
								
								 
	                          <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Completion time</label>
                                    <div class="col-md-9">
									<select class="form-control" id="completed_time" name = "completed_time">
										<option value="">Select time</option>
										<option value="1 Day">1 Day</option>
										<option value="2 Day">2 Day</option>
										<option value="3 to 6 Days">3 to 6 Days</option>
										<option value="1 to 2 weeks">1 to 2 weeks</option>
										<option value="2 weeks Plus">2 weeks Plus</option>
										
									</select>
                                        
                                    </div>
                                </div>

    						  <div class="form-group">
								<label for="email" class="col-md-3 control-label">Description of work</label>
								<div class="col-md-9">
								   
									<textarea class="form-control" name="project_description" placeholder="Description of work"  id="project_description"></textarea>
								</div>
                              </div>								                             
				                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Price</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                                    </div>
                                </div>
							
						        <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
											
										<input id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>
                                        <!--<span style="margin-left:8px;">or</span>-->  
                                    </div>
                                </div>
               
                            </form>
                         </div>
                     </div>
        </div> 
</div>
</div> 
