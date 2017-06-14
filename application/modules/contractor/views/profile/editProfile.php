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
<?php foreach($result as $key => $value);?>
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

    <div id="breadcrumb">
                <ul class="crumbs">
                    <li class="first"><a href = "<?php echo base_url();?>contractor/dashboard" style="z-index:9;"><span></span>Dashboard</a></li>
                    

                <!--    <li><a href="#" style="z-index:8;">Archives</a></li>
                    <li><a href="#" style="z-index:7;">2011 Writing</a></li>
                    <li><a href="#" style="z-index:6;">Tips for jQuery Development in HTML5</a></li> -->
                </ul>
    </div>
        <div id="loginbox"  margin-top:50px class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Edit Profile</div>
                        </div>  
                        <div class="panel-body" >
                            <?php 
                            
                        foreach($result as $hbp){                                          
                                                ?>
                           <form id ="profile" name ="contractor" class="form-horizontal" role="form" action="<?php echo base_url();?>contractor/profile/update" enctype="multipart/form-data" method="POST">
                    
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Name<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value = "<?php echo $value['name'];?>" name="name" id="name">
                                    </div>
                                </div>
                                    

                        
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Email<span>*</span></label>
                                    <div class="col-md-9">
                                       <input type="text" class="form-control" value="<?php echo $value['email'];?>"  name="email" id="email"/>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Category<span>*</span></label>
                                    <div class="col-md-9">
                                       <select class="form-control input-sm" id = "job_category"  name="job_category[]"  multiple>
                                          <?php 

                                                            
                                            foreach($value['contractor_category_ids'] as $key1 => $val1)
                                            { 
                                                $session[] = $val1['id']; 

                                            }

                                        ?>                                               
                                    
                                            
                                          <?php foreach($job_category as $category)
                                                { 

                                                    //echo "<pre>"; print_r($category);die;

                                                echo '<option value="' . $category->id . '" ' . (in_array($category->id,$session) ? 'selected="selected"' : '') . '>' . $category->job_category . '</option>'; 
                                                ?>                                               
                                            
                                                    
                                               <?php } ?>
                                                                                   
                                        </select>
                                    </div>
                                </div>
                                 
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Phone Number<span>*</span></label>
                                    <div class="col-md-9">
                                      <input type="text" class="form-control" value="<?php echo $value['phone_number'];?>"   name="phone_no" id="phone_no" onchange="readURL(this);" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="photo" class="col-md-3 control-label">Photo<span>*</span></label>
                                    <div class="col-md-9">

                                        
                                      <?php if(isset($value['profile_pic']) && $value['profile_pic'] != ""){ ?>
                                      <div class="checkExist" style="display:none"><?php echo $value['profile_pic']; ?></div>
                                      <?php } else{ ?>

                                        <div class="checkExist" style="display:none">0</div>
                                      <?php } ?>  
                                      <input type="file" class="form-control file_2"  name="file1" id="file_1"  onchange="readURL(this);" />
                                      <img src ="<?php echo base_url();?>uploads/<?php echo $value['profile_pic'];?>" id = "image" style="height:44px; width:60px;" value = "<?php echo $value['profile_pic']; ?>">
                                    <input type = "hidden" value = "<?php echo $value['profile_pic']; ?>" id = "image_data" name  = "image_data">

                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Company Name<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value = "<?php echo $value['company_name'];?>"  name="company_name" id="company_name">
                                    </div>
                                </div>  
            
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Company Bio<span>*</span></label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="company_bio" id="company_bio" ><?php echo $value['company_bio'];?></textarea>
                                    </div>
                                </div> 

                               <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Year’s Experience<span>*</span></label>
                                    <div class="col-md-9">
                        
                                        <input type="text" class="form-control" name="experience" id="experience" value = "<?php echo $value['years_experience'];?>">
                                                                              
                                    </div>
                                </div>                                     
                                
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Company Address<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="company_address" id="company_address" value = "<?php echo $value['company_address'];?>">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">State License Number<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="state_license_number" id="state_license_number" value = "<?php echo $value['state_license_number'];?>" selected = "selected">
                                    </div>
                                </div> 
            
                               <!--<input type="hidden" value="<?php //echo $hbp->id;?>"class="form-control" placeholder="id" name="id" id="id">-->
                                      
                                
                                <!--<div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Country</label>
                                    <div class="col-md-9">
                                    <input class="form-control input-sm" placeholder="country" autocomplete="off" id="country" value = "<?php echo $value['country_id'];?>"  name="country" type="text" disabled="disabled">
                                        
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">City<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="City" value = "<?php echo $value['city'];?>">
                                    </div>
                                </div>






                                <div class="state form-group" id ="state1">
                                    <label for="icode" class="col-md-3 control-label">State<span>*</span></label>
                                    <div class="col-md-9">
                                    <select class="form-control" id="state" name="state">
                                        <?php  $session[] = $value['code']; ?>                                               
                                    
                                            
                                          <?php foreach($state as $state_code)
                                                { 

                                                    //echo "<pre>"; print_r($category);die;

                                                    echo '<option value="' . $state_code->code . '" ' . (in_array($state_code->code,$session) ? 'selected="selected"' : '') . '>' . $state_code->name . '</option>'; 
                                               

                                                ?>                                               
                                            
                                                    
                                               <?php } ?>
                                    </select>
                                        
                                    </div>
                                </div>

                                <div class= "counties form-group" id = "counties12">
                                    <label for="icode" class="col-md-3 control-label">Counties<span>*</span></label>
                                    <div class="col-md-9">
                                     <select class="form-control input-sm" id = "counties" name="counties[]" multiple>
                                          <?php 

                                                            
                                         foreach($value['contractor_counties_ids'] as $key1 => $val1)
                                        { 
                                            $session[] = $val1['id']; 


                                        }
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

                                
                              <div class="form-group">                                      
                                    <div class="col-md-offset-2 col-md-9 text-center">
                                            
                                        <input id="btn-signup" type="submit" value="Submit" class="btn btn-info">
                                        <!--<span style="margin-left:8px;">or</span>-->  
                                    </div>
                                </div>   
                            </form>
                            <?php } ?>
                        
                         </div>
                    </div>
         </div> 
</div>
</div> 
