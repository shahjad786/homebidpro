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

 <div class="container"> 
	 <div class="dashboard_heading">
      <div class="row">
        <div class="col-md-12 text-center">
           <h1>Edit A Project</h1>
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
                            <div class="panel-title">Edit A Project</div>
                        </div>  
                        <div class="panel-body" >
						<?php 
                            
                        foreach($result as $hbp){ 
                         // print_r($hbp);print_r($hbp->job_category_ids);die();

                                                ?>
                           <form id ="profile" name ="homeowner" class="form-horizontal" role="form" action="<?php echo base_url();?>homeowner/managejobs/update?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data" method="POST">
                    
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Job Title<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo $hbp->name;?>"name="name" id="name" placeholder="Name">
                                    </div>
                                </div>
                              
                        
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Job Description<span>*</span></label>
                                    <div class="col-md-9">
                                      <textarea class="form-control" placeholder="Project Description" name="description"><?php echo $hbp->project_discription;?></textarea>
                                    </div>
                                </div>
                                 <!-- <div class="form-group">
                                        <label class="control-label col-md-3">Start Date</label>
                                        <div class="col-md-9">
                                              <input type="text" name="start_time"  id = "start_time" size="16" class="form-control form-control-inline input-medium date-picker" placeholder="Selected Date">
                                        </div>
                                </div> -->
                                 <div class="form-group">
                                        <label for="icode" class="col-md-3 control-label">Expire Date<span>*</span></label>
                                        <div class="col-md-9">
                                                <input type="text"  name="completed_time" value="<?php echo $hbp->expire_time;?>" id="completed_time"  class="form-control form-control-inline input-medium date-picker" placeholder="Selected Date">
                                        </div>
                                </div>
                                <!--  <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Photo</label>
                                    <div class="col-md-9">
                                      <input type="file" class="form-control"  name="file1[]" id="file_1" multiple  onchange="readURL(this);" />
                                    <div class="validation" style="display:none;color:red;"> Upload Max 3 Files allowed </div>
                                    </div>
                                </div> -->
                               
                              <!--   <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Video</label>
                                    <div class="col-md-9">
                                       <input type="file" class="form-control" name="file2" id="file_2"/>
                                        <div class="error"><?php echo $this->session->flashdata('message'); ?></div>
                                    </div>
                                </div> -->

                              <div class="form-group">
                                <label for="Phone_no" class="col-md-3 control-label">Images<span>*</span></label>
                                <div class="col-md-9 addimge2">
                                
                                <?php 
                                    $i=1;

                                 //  echo "<pre>"; print_r(count($hbp->image));die;

                                foreach($hbp->image as $key=>$val){ ?>  
                                   
                                                            <?php if(isset($val) && $val != ""){ ?>
                                                            <div class="checkExist1" style="display:none"><?php echo $val; ?></div>
                                                            <?php }else{ ?>

                                                              <div class="checkExist1" style="display:none">0</div>
                                                            <?php } ?>  
                                                           <input type="file"  class="form-control file_1"  value = "<?php echo $val; ?>"  name="data<?php echo $i;?>" id=""   onchange="readURL(this);" />
                                                           <img  id = "data<?php echo $i;?>" src="<?php echo base_url();?>uploads/<?php echo $val;?>" width="100px;">
                                          
                                                          <input type = "hidden" value = "<?php echo $val; ?>" class="photo_box" id = "image_data1[]" name  = "old_image<?php echo $i; ?>">

                                                         
                                        <div class="modal fade bs-example-modal-sm_<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content" style="width:500px;">
                                              
                                        <!-- <iframe allowfullscreen="" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0" class="embed-responsive-item"></iframe>
                                         -->   <img width="500px"  data-toggle="modal" data-target=".bs-example-modal-sm" src="<?php echo base_url();?>uploads/<?php echo $val;?>">
                                               <div class="modal-footer" style="width:500px;">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                          </div>
                                             
                                         </div>
                                        </div>
                                  <?php $i++; } ?>
                                  <input type="hidden" value="<?php echo count($hbp->image);?>" name ="counimages">
                                </div>
                                </div>
                                 <!--  <div class="form-group">
                                    <label for="photo" class="col-md-3 control-label">Video</label>
                                    <div class="col-md-9">
                                      <?php if(isset($hbp->video) && $hbp->video != ""){ ?>
                                      <div class="checkExist" style="display:none"><?php echo $hbp->video; ?></div>
                                      <?php }else{ ?>

                                        <div class="checkExist" style="display:none">0</div>
                                      <?php } ?>  
                                      <input type="file" class="form-control"   name="file4" id="file_1"  onchange="readURL(this);" />
                                     <video width="100px" id="image" controls="" name="media"><source src="<?php echo base_url();?>videos/<?php echo $hbp->video;?>" type="video/mp4"></video>   
                    
                                    <input type = "hidden" value ="<?php echo $hbp->video; ?>" id ="image_data" name  ="image_data">

                                    </div>
                                </div> -->


                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Budget<span>*</span></label>
                                    <div class="col-md-9">
                                         <select class="form-control input-sm" id = "price" name="price">
                                           
                                         

                                        <?php foreach($budget as $row)
                                            { 
                                            ?>
                                            <option value="<?php echo $row->amount;?>"><?php echo $row->amount;?></option>
                                          

                                        <?php } ?>




                                        </select>
                                    </div>
                                </div>  

















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
                                     <select class="form-control input-sm" id ="counties" name="counties" >
                                          

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
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Category<span>*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control input-sm" id = "job_category" name="job_category" >
                                         <?php $session[]= $hbp->category_id;
                                               ?>             
                                         
                                                                                  
                                    
                                            
                                        <?php foreach($job_category as $category)
                                                { 

                                                    //echo "<pre>"; print_r($counties);die;

                                                    echo '<option value = "' . $category->id . '" ' . (in_array($category->id,$session) ? 'selected="selected"' : '') . '>' . $category->job_category . '</option>'; 
                                               

                                                ?>                                               
                                            
                                                    
                                               <?php } ?>                                                                                      
                                        </select>
                                    </div>
                                </div>
                                
						                    <div class="form-group">                                      
                                    <div class="col-md-offset-2 col-md-9 text-center">
									                         	<input id="btn-signup" type="submit" class="btn btn-info" value="Submit">
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
