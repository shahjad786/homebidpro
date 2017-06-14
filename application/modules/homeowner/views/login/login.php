


   <div class="container">   
    <div class="sigin_logo text-center" style="min-height:100px;">   </div>


    	<div class="signupmessage"><?php echo $this->session->flashdata('signup'); ?></div>
    	<p class ="homeownerFlashData"><?php echo $this->session->flashdata('homeownerFlash'); ?></p>
        <div id="signin" style="margin-top:50px; margin-bottom:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 homeowner_login">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
								<form id="loginform" class="form-horizontal" action = "<?php echo base_url();?>homeowner/verifylogin" role="form" method = "POST">
											
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input id="login-username" type="text" class="form-control" name="email"  value = "<?php if($this->input->cookie('email',true)){echo $this->input->cookie('email',true);}?>" placeholder="Email" >  
		
									</div>
										
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input id="login-password" type="password" class="form-control" name="password"  value = "<?php if($this->input->cookie('password',true)){echo $this->input->cookie('password',true);}?>" placeholder="Password">
                                       <div class="error"><?php echo $this->session->flashdata('message'); ?></div>                                  
									</div>      
									<div class="input-group">
									  <div class="checkbox">
										<label>
										  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
										 <a id="forgot_password" href="<?php echo base_url();?>homeowner/forgetpswd">Forgot password?</a>
										
										</label>
									  </div>
									</div>


										<div style="float:right;" class="form-group">
											<!-- Button -->

											<div class="col-sm-12 controls" style="text-align:right;">
											  <input type ="submit" id="btn-login" class="btn btn-success" value="Login">
										  	</div>

										</div>


										<div class="form-group" style="clear:both;">
											<div class="col-md-12 control">
												<div class = "signinAccount">
													Don't have an account! 
											   <!-- <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
													Sign Up Here
												</a>-->
												 <a id="signup"href="<?php echo base_url();?>homeowner/signup">
													Sign Up Here
												</a>
												</div>
											</div>
										</div>    
								</form>     



                        </div>                     
                    </div>  
        </div>
    </div>
    <style>
    .radio label, .checkbox label {
    	padding-left: 20px !important;
    }
    </style>
 