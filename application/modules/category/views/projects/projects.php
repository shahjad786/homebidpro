
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">



  <div class="modal-dialog" role="document">



    <div class="modal-content">



      <div class="modal-header">



        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>



        <h4 class="modal-title" id="exampleModalLabel">Select Your Role</h4>



      </div>



      <div class="modal-body">



        <form id = "home_owner">



     <button type="button" id = "button1"  onclick="window.location.href ='<?php echo base_url(); ?>homeowner/login'" class="btn btn-default">HOMEOWNER</button>



         <button type="button" id = "button1" class="btn btn-default" onclick="window.location.href ='<?php echo base_url(); ?>contractor/login'">CONTRACTOR</button>



        </form>



      </div>



    </div>



  </div>



</div>

<?php 

///echo "<pre>";print_r($result);die;

?>
<div class="container">

<?php 
    
     foreach ($category_name as $row); 

    $category_id = $_GET['id'];
 ?>

<?php $data12 = count(array_filter($result));

echo '<h1 class="project_list_title">'.$data12.'-Projects found  from '.$row->job_category.' </h1>';
?>
   <?php if(isset($result) && count($result)>0)
          {  
              
                
              foreach($result as $value)  { 

                if(isset($value) && count($value)>0){
                ?>


   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="contractor_dash">
                  <div class="contractor_dash_name col-lg-3 col-md-3 col-sm-12 col-xs-12"> 
                  


                      <div role="presentation" class="contractor_product_inbox">
                            <h5><b>Created: </b> <?php echo date('F d, Y', strtotime($value->started_time));?> </h5>
                            <h5><b>Expires: </b> <?php echo $value->expire_time;?> </h5>
                     </div>
                 </div>
                    <div class="contractor_dash_info col-lg-9 col-md-9 col-sm-12 col-xs-12">
                     <?php    if($this->session->userdata('logged_in'))
                            {
                                     //echo "hello";die("data is");
                               $session_data = $this->session->userdata('logged_in'); 
                               $role_id =  $session_data['role_id']; 
                               if($role_id==2) { ?> 
                                <a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value->id;?>"> 
                                   <h3 style ="color:#1ca3a6;text-decoration: underline;"><?php echo  ucfirst($value->name);?></h3>
                                </a> 
                                <?php } elseif($role_id==1) { ?>


                                    <a href="<?php echo base_url();?>category/jobs?id=<?php echo $value->id;?>&category_id=<?php echo $category_id; ?>"> 
                                       <h3 style ="color:#1ca3a6;text-decoration: underline;"><?php echo  ucfirst($value->name);?></h3>
                                    </a> 
                               <?php  } 

                              }else{ ?>

                                <a href="<?php echo base_url();?>category/jobs?id=<?php echo $value->id;?>&category_id=<?php echo $category_id; ?>"> 
                                   <h3 style ="color:#1ca3a6;text-decoration: underline;"><?php echo  ucfirst($value->name);?></h3>
                                </a> 

                           <?php } ?>
                           <h4>Project Detail</h4>
                         <h5><b>Homeowner</b><br /> <?php echo ucfirst($value->owner_name);?> </h5>                
                         <h5><b>State</b><br /> <?php echo $value->state_name;?> </h5>
                         <h5><b>County</b><br /> <?php echo $value->county;?> </h5>
                        <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                          <?php    if($this->session->userdata('logged_in'))
                            {
                                     //echo "hello";die("data is");
                               $session_data = $this->session->userdata('logged_in'); 
                               $role_id =  $session_data['role_id']; 
                               if($role_id==2) { ?> 
                                <p class = "project_discription"><?php echo $value->project_discription;?><a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value->id;?>"> <span style = "color:#1ca3a6;">Read More</span></a></p>
                                <?php } elseif($role_id==1) { ?>


                                     <p class = "project_discription"><?php echo $value->project_discription;?><a href="<?php echo base_url();?>category/jobs?id=<?php echo $value->id;?>&category_id=<?php echo $category_id; ?>"> <span style = "color:#1ca3a6;">Read More</span></a></p>
                               <?php  } 

                              }else{ ?>

                                 <p class = "project_discription"><?php echo $value->project_discription;?><a href="<?php echo base_url();?>category/jobs?id=<?php echo $value->id;?>&category_id=<?php echo $category_id; ?>"> <span style = "color:#1ca3a6;">Read More</span></a></p>

                           <?php } ?>


























                       
                        





                        </div>
                  </div>
        
          </div>

   </div>
   
   <?php } }

}

   else{

?>      
        <p class="dashboard-norecord">Sorry No New Jobs Matching Your Selected Category</p>
        <div class = "border_line"></div>
<?php


}

?>
</div>
