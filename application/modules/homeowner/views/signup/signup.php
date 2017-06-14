 <div class="container">   
    <div class="dashboard_heading">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1>Sign Up</h1>
            </div>
          </div>

    </div>  
        <div id="loginbox" style="margin-top:50px; margin-bottom:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                        <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title" style="text-align:left">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="<?php echo base_url();?>homeowner/login" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
						
                           <form id ="homeowner" name ="homeowner" class="form-horizontal" enctype="multipart/form-data" role="form" action="<?php echo base_url();?>homeowner/signup/signupData" method="POST">
                                
                               <!--  <div id="" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div> -->
                                    
                                 <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Name<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
                                    <div class="error" id="error"><?php echo $this->session->flashdata('message'); ?></div> 
                                    </div>
                                </div>
                                    
                               
                                <!--<div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    </div>
                                </div>
                                   
								 <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Phone Number<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone Number">
                                    </div>
                                </div>  
								 <div class="form-group">
                                    <label for="photo" class="col-md-3 control-label">Photo</label>
                                    <div class="col-md-9">
                                      <input type="file" class="form-control file_2"  name="file1" id="file1"  onchange="readURL(this);" />
                                    </div>
                                </div>
								<!-- <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Category<span>*</span></label>
                                    <div class="col-md-9">
										<select class="form-control input-sm" id = "job_category" name="job_category">		
												<?php foreach($job_category as $row)
												{ 
												?>
											    <option value="<?php echo $row->id;?>"><?php echo ucwords($row->job_category);?></option>
											
												 <?php } ?>																								
										</select>
                                    </div>
                                </div> -->
								   
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Address Line<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="address1" id="address1" placeholder="Address Line 1">
                                    </div>
                                </div>	
								
								<!-- <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Address Line 2</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="address2" id="address2" placeholder="Address Line 2">
                                    </div>
                                </div> -->
								<div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Country<span>*</span></label>
                                    <div class="col-md-9">
                                    <select class="form-control" id="country" name="country">
                                       <!--  <option value="">Select Country</option> -->
                                            
                                                <?php foreach($country as $row)
                                                { 
                                                ?>
                                        <option value="<?php echo $row->iso;?>"><?php echo $row->country;?></option>
                                            
                                                 <?php } ?>
                                        
                                    </select>
                                        
                                    </div>
                                </div> 
                                
								                                
                                 <div class="state form-group" id ="state1" style = "">
                                    <label for="icode" class="col-md-3 control-label">State<span>*</span></label>
                                    <div class="col-md-9">
                                    <select class="form-control" id="state" name="state">
                                        <option value="">Select State</option>
                                            
                                                <?php foreach($state as $row)
                                                { 
                                                ?>
                                        <option value="<?php echo $row->code;?>"><?php echo $row->name;?></option>
                                            
                                                 <?php } ?>
                                        
                                    </select>
                                        
                                    </div>
                                </div>



                                <div class= "counties form-group" id = "counties12" style = "display:none">
                                    <label for="icode" class="col-md-3 control-label">Counties<span>*</span></label>
                                    <div class="col-md-9">
                                    <select class="form-control" id="counties" name = "counties">
                                   
                                        
                                    </select>
                                        
                                    </div>
                                </div>

								
								
								
						        <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-2 col-md-9 text-center">
										<input id="btn-signup" type="submit" value="Submit" class="btn btn-info">	
										<!-- <input id="btn-signup" id="submit" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> -->
                                        <!--<span style="margin-left:8px;">or</span>-->  
                                    </div>
                                </div>
                                
                               <!-- <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div>-->
                                
                                
                                
                            </form>
                         </div>
                    </div>
         </div> 
    </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    $( document ).ready(function(){
        //alert("hlo");
    $("#password").keyup(function(){
       // alert("hlo");
        var email=$("#email").val();
        //alert(email);
        var url = "<?php echo base_url();?>homeowner/signup/check_email";
         $.ajax({

          type:"POST",  
          url: url,
          data: {email:email},

          success: function(data)
          {
            //alert(data);
            if(data == 'b') {

               // alert(data);

               $("#error").html('Email already exists'); 
               $('input[type="submit"]').attr('disabled','disabled');
            }   else{
                 $("#error").html(''); 
                 $('input[type="submit"]').removeAttr('disabled');
            } 
          }
        });

    });
});
    </script>
