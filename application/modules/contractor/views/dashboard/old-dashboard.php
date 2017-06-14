<div class="container">
   <!-- dashboard heading
      ================================================== -->
   <div class="dashboard_heading">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>Dashboard</h1>
            
         </div>
      </div>
   </div>
</div>
<div class="container dashboard-row">


   <!-- /.dashboard heading -->
   <?php 



         // echo "<pre>";print_r($result);
         //echo count($result);die("fgdfgfh");
//die;
          if(isset($result) && count($result)>0)
          {

                echo '<h2 class="dashboard-title">Available Jobs</h2>';
                foreach($result as $key => $value){


           ?>
    
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="contractor_dash">
            <div class="contractor_dash_name col-lg-3 col-md-3 col-sm-12 col-xs-12">  
             

        <div role="presentation" class="contractor_product_inbox">
          <h5><b>Created: </b><?php echo date('F d, Y', strtotime($value['started_time']));?> </h5>
          <h5><b>Expires:</b> <?php echo $value['expire_time'];?> </h5>
      </div>
         </div>
        <div class="contractor_dash_info col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"> 
              <h3 style ="color:#1ca3a6;text-decoration: underline;"><?php echo  ucfirst($value['name']);?></h3>
          </a> 
                  <h4>Project Detail</h4>
                 <h5><b>Homeowner</b><br /> <?php echo ucfirst($value['owner_name']);?> </h5>
                 <h5><b>Category</b><br /> 
                  <?php foreach($value['jobs_category_ids'] as $key1 => $val1) {
                         
                        if($key1 != 0) {

                          echo ", ";   
                        }
                        
                          echo $val1['job_category'];

                       }
                       ?> </h5>
                 <h5><b>State:</b><br /> <?php echo $value['state_name'];?> </h5>
                 <h5><b>County:</b><br /> <?php echo $value['county'];?> </h5>
                 <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <p class = "project_discription"><?php echo $value['project_discription'];?><a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"><span style = "color:#1ca3a6;">Read More</span></a></p>
                  </div>
        </div>
                 
            <div role="presentation" class="contractor_product_bids">
            </div>
      
      </div>

   </div>
   <?php }

}

else{

?>      <h2 class="dashboard-title" >New  Available Jobs ?</h2>
        <p class="dashboard-norecord">Sorry No New Jobs Matching Your Profile Please Wait...!</p>
        <div class = "border_line"></div>
<?php


}

?>



</div>
<div class="container dashboard-row">

   <?php

    if(isset($result1) && count($result1)>0)
     {
        echo '<h2 class="dashboard-title" >Applied Bid on Jobs</h2>';
    foreach($result1 as $key => $value){?>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="contractor_dash">
          <div class="contractor_dash_name col-lg-3 col-md-3 col-sm-12 col-xs-12">  
                 

              <div role="presentation" class="contractor_product_inbox">
                     <h5><b>Created: </b> <?php echo date('F d, Y', strtotime($value['started_time']));?> </h5>
                     <?php if(isset($value['applied_date'])) { ?>
                     <h5><b>Applied: </b><?php echo date('F d, Y', strtotime($value['applied_date'])) ; ?> </h5>
                     <?php } ?>
                     <h5><b>Expires: </b><?php echo $value['expire_time'];?> </h5>
                     
              </div>
         </div>
        <div class="contractor_dash_info col-lg-9 col-md-9 col-sm-12 col-xs-12">
                 <a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"> 
                    <h3 style ="color:#1ca3a6;text-decoration: underline;"><?php echo ucfirst($value['name']);?></h3>
                </a>
                 <h4>Project Detail</h4>
                 <h5><b>Homeowner</b><br /> <?php echo ucfirst($value['owner_name']);?> </h5>
                 <h5><b>Category</b><br /> 
                  <?php foreach($value['jobs_category_ids'] as $key1 => $val1) {
                         
                        if($key1 != 0) {

                          echo ", ";   
                        }
                        
                          echo $val1['job_category'];

                       }
                       ?> </h5>
                 <h5><b>State</b><br /> <?php echo $value['state_name'];?> </h5>
                 <h5><b>County</b><br /> <?php echo $value['county'];?> </h5>


               

                  <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <p class="project_discription"> <?php echo $value['project_discription'];?></p>
                   </div>

                
                
                <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4>Bid Detail</h4>
                 </div>
                    <h5><b>Start time</b><br /> <?php echo date('F d, Y', strtotime($value['start_time'])) ; ?></h5>
                    <h5><b>Completed time</b><br /> <?php echo $value['completed_time'];?> </h5>
                    <h5><b>Price</b><br />$<?php echo $value['price'];?> </h5>
                    
                    <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="project_discription"><?php echo $value['detail'];?><a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"><span style = "color:#1ca3a6;">Read More</span></a></p>
                     </div>   
                  
        

        </div>
        
        
                 
            <div role="presentation" class="contractor_product_bids">
            </div>
      
      </div>

   </div>
   <?php }


   } else { ?>
<h2 class="dashboard-title" >Apply the New Bid!!!</h2>
<p class="dashboard-norecord" > Apply the bid and get The opportunity to earn the money</p>
<div class = "border_line"></div>
<?php } ?>






</div>

<div class="container dashboard-row">

   <?php

    if(isset($accepted_project) && count($accepted_project)>0)
     {
        echo '<h2 class="dashboard-title">Accepted jobs from the homeowner</h2>';
   foreach($accepted_project as $key => $value){?>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="contractor_dash">
          <div class="contractor_dash_name col-lg-3 col-md-3 col-sm-12 col-xs-12">  
                 

              <div role="presentation" class="contractor_product_inbox">
              
                     <h5><b>Created: </b> <?php echo date('F d, Y', strtotime($value['started_time']));?> </h5>
                    <?php if(isset($value['accepted_date'])) { ?>
                     <h5><b>Accepted: </b> <?php echo date('F d, Y', strtotime($value['accepted_date'])) ; ?> </h5>
                     <?php } ?>

                     <h5><b>Expires: </b> <?php echo $value['expire_time'];?> </h5>
                     

              </div>
         </div>
        <div class="contractor_dash_info col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"> 
                    <h3 style ="color:#1ca3a6;text-decoration: underline;"><?php echo ucfirst($value['name']);?></h3>
                </a>
                <h4>Project Detail</h4>
                 <h5><b>Homeowner</b> <?php echo ucfirst($value['owner_name']);?> </h5>
                 <h5><b>Category</b> 
                  <?php foreach($value['jobs_category_ids'] as $key1 => $val1) {
                         
                        if($key1 != 0) {

                          echo ", ";   
                        }
                        
                          echo $val1['job_category'];

                       }
                       ?> </h5>
                 <h5><b>State</b> <?php echo $value['state_name'];?> </h5>
                 <h5><b>County</b> <?php echo $value['county'];?> </h5>
                 <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <p class="project_discription"> <?php echo $value['project_discription'];?></p>
                   </div>
                   
                 <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4>Bid Detail</h4>
                 </div>
                    <h5><b>Start time</b><br /> <?php echo date('F d, Y', strtotime($value['start_time'])) ; ?></h5>
                    <h5><b>Completed time</b><br /> <?php echo $value['completed_time'];?> </h5>
                    <h5><b>Price</b><br />$<?php echo $value['price'];?> </h5>
                    
                    <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="project_discription"><?php echo $value['detail'];?><a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"><span style = "color:#1ca3a6;">Read More</span></a></p>
                     </div>  
                     
                     
                
        </div>
                 
            <div role="presentation" class="contractor_product_bids">
            </div>
      
      </div>

   </div> <?php }


   } else { ?>
<h2 class="dashboard-title" > Accepted Bid?</h2>
<p class="dashboard-norecord" > No New  bid accepted from the homeowner</p>
<div class = "border_line"></div>

<?php } ?>


</div>

<div class="container dashboard-row">

   <?php

    if(isset($completed_project) && count($completed_project)>0)
     {
        echo '<h2 class="dashboard-title" >Completed jobs</h2>';
   foreach($completed_project as $key => $value){?>
   
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="contractor_dash">
          <div class="contractor_dash_name col-lg-3 col-md-3 col-sm-12 col-xs-12">  
                

              <div role="presentation" class="contractor_product_inbox">
                     <h5><b>Created: </b> <?php echo date('F d, Y', strtotime($value['started_time']));?> </h5>
                     <?php if(isset($value['updated_at'])) { ?>
                     <h5><b>Completed: </b> <?php echo date('F d, Y', strtotime($value['updated_at'])) ; ?> </h5>
                     <?php } ?>

                     <h5><b>Expires: </b> <?php echo $value['expire_time'];?> </h5>
                     
              </div>
         </div>
        <div class="contractor_dash_info col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"> 
                    <h3 style ="color:#1ca3a6;text-decoration: underline;"><?php echo ucfirst($value['name']);?></h3>
                </a> 
                <h4>Project Detail</h4>
                 <h5><b>Homeowner</b><br /> <?php echo ucfirst($value['owner_name']);?> </h5>
                 <h5><b>Category</b> <br />
                  <?php foreach($value['jobs_category_ids'] as $key1 => $val1) {
                         
                        if($key1 != 0) {

                          echo ", ";   
                        }
                        
                          echo $val1['job_category'];

                       }
                       ?> </h5>
                 <h5><b>State</b><br /> <?php echo $value['state_name'];?> </h5>
                 <h5><b>County</b><br /> <?php echo $value['county'];?> </h5>
                 <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <p class="project_discription"> <?php echo $value['project_discription'];?></p>
                   </div>
                   
                 <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4>Bid Detail</h4>
                 </div>
                    <h5><b>Start time</b><br /> <?php echo date('F d, Y', strtotime($value['start_time'])) ; ?></h5>
                    <h5><b>Completed time</b><br /> <?php echo $value['completed_time'];?> </h5>
                    <h5><b>Price</b><br />$<?php echo $value['price'];?> </h5>
                    
                    <div class="contractor_job_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="project_discription"><?php echo $value['detail'];?><a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"><span style = "color:#1ca3a6;">Read More</span></a></p>
                     </div>  
        </div>
                 
            <div role="presentation" class="contractor_product_bids">
            </div>
      
      </div>

   </div>
   <?php }


   } else { ?>
<h2 class="dashboard-title" >Completed Jobs?</h2>
<p class="dashboard-norecord" > No completed jobs here</p>
<div class = "border_line"></div>

<?php } ?>
<?php //foreach($pagination as $row);

  //echo "<pre>";print_r($pagination);die;

?>
</div>
</div>
<!-- /.container -->


