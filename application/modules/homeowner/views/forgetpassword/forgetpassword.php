  <div class="container">   
   <div class="sigin_logo text-center" style="min-height:100px;">   </div>
        <div id="loginbox" style="margin-top:50px; margin-bottom:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 homeowner_login">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Forget Password</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
								<form id="loginform" class="form-horizontal" action = "<?php echo base_url(); ?>homeowner/forgetpswd/forget_password" role="form" method = "POST">
											
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="login-username" type="text" class="form-control" name="email"  value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email']; }?>" placeholder="Email" >  <div class="error"><?php echo $this->session->flashdata('message'); ?></div>                                      
									</div>
										     
									<!--<div class="input-group">
									  <div class="checkbox">
										<label>
										  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
										</label>
									  </div>
									</div>-->


										<div style="margin-top:10px" class="form-group">
											<!-- Button -->

											<div class="col-sm-12 controls">
											  <input type ="submit" id="btn-login" class="btn btn-success" value="Submit">
										   
											</div>
										</div>

								</form>     



                        </div>                     
                    </div>  
        </div>
    </div>