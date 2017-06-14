<div class="container">
   <div class="sigin_logo text-center" style="min-height:100px;">   </div>
   <div id="loginbox" style="margin-top:50px; margin-bottom:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 contractor_login">
      <div class="panel panel-info" >
         <div class="panel-heading">
            <div class="panel-title">Forget Password</div>
         </div>
         <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <form id="loginform" class="form-horizontal" action = "<?php echo base_url(); ?>contractor/forgetpassword/forget_password" role="form" method = "POST">
               <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>						<input id="email" type="text" class="form-control" name="email" placeholder="Email" >										
                  <div class="error"><?php echo $this->session->flashdata('message'); ?></div>
               </div>
               <div style="margin-top:10px" class="form-group">
                  <!-- Button -->											
                  <div class="col-sm-12 controls">
                  	<button type ="submit" id="btn-login"  class="btn btn-success">Submit</button>
                  	<button type="button" id="back-login" class="btn btn-default" onclick= "window.location.href ='<?php echo base_url();?>contractor/login';" >Back</button>
                  	

                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
