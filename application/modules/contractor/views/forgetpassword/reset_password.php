<div class="container">   
    <div class="sigin_logo text-center" style="min-height:100px;"></div>
        <div id="loginbox" style="margin-top:50px; margin-bottom:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
            
                    <div class="panel-heading">

                        <div class="panel-title">Reset Password</div>

                    </div>     



                    <div style="padding-top:30px" class="panel-body" >



                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                            

                <form id="loginform" class="form-horizontal" action = "<?php echo base_url();?>contractor/forgetpassword/update" role="form" method = "POST">

                      

                  <div style="margin-bottom: 25px" class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                    <input  type="text" class="form-control" name="password" id="password" placeholder="Password" >                                        

                  </div>

                  <div style="margin-bottom: 25px" class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                    <input id="confirmpassword" type="text" class="form-control confirmpassword" name="confirmpassword"  placeholder = "Confirm Password">
                  </div>

                                    <input class="form-control form-control-solid placeholder-no-fix" type="hidden" autocomplete="off" placeholder="email12" value="<?php echo $result;?>" name="email12"/>

                         

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

                        <input type ="submit" id="btn-login"  class="btn btn-success" value="Submit">

                       

                      </div>

                    </div>
                </form>     
                       </div>                     

                    </div>  

        </div>

    </div>