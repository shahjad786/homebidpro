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

  <?php foreach($result as $hbp);

  // echo "<pre>";print_r($row);die;
  /*foreach($hbp->categories as $row1){


     $category_ids[] = $row1[0]->id;



   //echo "<pre>";print_r();



  }*/



   //echo "<pre>";print_r($category_ids);

//die;
  ?> 













 <div class="container"> 
	 <div class="dashboard_heading">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>My Profile</h1>
        </div>
      </div>

    </div>
	    <div class="col-md-2 col-sm-12 left-box-link" style="border-radius: 4px; padding-top: 9px; color: rgb(0, 0, 0); background: none repeat scroll 0px 0px rgb(249, 249, 249); border: 1px solid rgb(49, 112, 143);">
	       					 		<ul class="sidebar-nav">
		       					 		
	       					 		 </ul> 
		 	 </div>
        <div id="loginbox"  margin-top:50px class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
       						
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Edit Profile</div>
                        </div>  
                        <div class="panel-body" >
						
                           <form id ="profile" name ="homeowner" class="form-horizontal" role="form" action="<?php echo base_url();?>homeowner/profile/update" enctype="multipart/form-data" method="POST">
                    
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Name<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo $hbp->name;?>"name="name" id="name" placeholder="Name">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Phone Number<span>*</span></label>
                                    <div class="col-md-9">
                                      <input type="text" class="form-control" value="<?php echo $hbp->phone_no;?>" placeholder="Phone Number"  name="phone_no" id="phone_no" onchange="readURL(this);" />
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Email<span>*</span></label>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" value="<?php echo $hbp->email;?>" placeholder="Email" name="email" id="email"/>
                                    </div>
                                </div>

                               <!--  <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Category<span>*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control input-sm" id = "job_category" name="job_category">
                                          <?php 

                                          

                                         foreach($job_category as $category)
                                              { 

                                                //echo "<pre>"; print_r($category);die;

                                                echo '<option value="' . $category->id . '" ' . (in_array($category->id,$category_ids) ? 'selected="selected"' : '') . '>' . $category->job_category . '</option>'; 
                                                ?>                                               
                                            
                                                    
                                               <?php } ?>                                                                                       
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="photo" class="col-md-3 control-label">Photo</label>
                                    <div class="col-md-9">
                                      <?php if(isset($hbp->profile_pic) && $hbp->profile_pic != ""){ ?>
                                      <div class="checkExist" style="display:none"><?php echo $hbp->profile_pic; ?></div>
                                      <?php }else{ ?>

                                        <div class="checkExist" style="display:none">0</div>
                                      <?php } ?>  
                                      <input type="file" class="form-control file_2"  name="file1" id="file_1"  onchange="readURL(this);" />
                                      <img src ="<?php echo base_url();?>uploads/<?php echo $hbp->profile_pic;?>" id = "image" style="height:44px; width:60px;" value = "<?php echo $hbp->profile_pic; ?>">
                                    <input type = "hidden" value = "<?php echo $hbp->profile_pic; ?>" id = "image_data" name  = "image_data">

                                    </div>
                                </div>
                                  

				                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Address line 1<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" value="<?php echo $hbp->address1;?>"class="form-control" placeholder="Address line 1" name="address1" id="address1">
                                    </div>
                                </div> 
								   
                                <!-- <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Address line 2</label>
                                    <div class="col-md-9"> 
                                      <input type="text" value="<?php echo $hbp->address2;?>"class="form-control" placeholder="Address line 2" name="address2" id="address2">
                                        </div>
                                </div>-->
								
                                      <input type="hidden" value="<?php echo $hbp->id;?>"class="form-control" placeholder="id" name="id" id="id">
                                    
                                 <div class="state form-group" id ="state1">
                                    <label for="icode" class="col-md-3 control-label">State<span>*</span></label>
                                    <div class="col-md-9">
                                    <select class="form-control" id="state" name="state">
                                        <?php  $session[] = $hbp->code;                                                
                                       //print_r($session);
                                       //die();?>
                                            
                                          <?php foreach($state as $state_code)
                                                { 

                                                   //echo "<pre>"; print_r($state_code);die;

                                                    echo '<option value="' . $state_code->code . '" ' . (in_array($state_code->code,$session) ? 'selected="selected"' : '') . '>' . $state_code->name . '</option>'; 
                                               

                                                ?>                                               
                                            
                                                    
                                               <?php } ?>
                                    </select>
                                        
                                    </div>
                                </div>
                                 <div class= "counties form-group" id = "counties12">
                                    <label for="icode" class="col-md-3 control-label">Counties<span>*</span></label>
                                    <div class="col-md-9">
                                     <select class="form-control input-sm" id = "counties" name="county" >
                                          

                                               <?php $session[]= $hbp->counties;
                                               ?>             
                                         
                                                                                  
                                    
                                            
                                        <?php foreach($county as $counties)
                                                { 

                                                    //echo "<pre>"; print_r($counties);die;

                                                    echo '<option value = "' . $counties->id . '" ' . (in_array($counties->id,$session) ? 'selected="selected"' : '') . '>' . $counties->county . '</option>'; 
                                               

                                                ?>                                               
                                            
                                                    
                                               <?php } ?>
                                                                                   
                                        </select>
                                        
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">City</label>
                                    <div class="col-md-9"> 
                                       <input type="text" value="<?php echo $hbp->city;?>"class="form-control" placeholder="City" name="city" id="city" >
                                
                                    </div>
                                </div>   -->
				
								
              						        <div class="form-group">                                      
                                    <div class="col-md-offset-2 col-md-9 text-center">
              				                    <input id="btn-signup" type="submit" value="Submit" class="btn btn-info">
              			                     <!-- <input id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> -->
                                        <!--<span style="margin-left:8px;">or</span>-->  
                                    </div>
                                  </div>   
                            </form>
                            <?php  ?>
                         </div>
                    </div>
         </div> 
</div>
</div> 
