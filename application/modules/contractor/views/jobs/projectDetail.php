<?php foreach($result as $row);


//echo "<pre>";print_r($row);

//die;

?>
<div class="container">

<div class="dashboard_heading">
	<div class="row">
   		<div class="col-md-12 text-center">
      <h1><img style="width: 49px;height: 49px;" src="<?php echo base_url();?>media/img/<?php echo $row->images_name?>" alt="Responsive image"/> <?php echo $row->name;?> </h1>
     </div>
  </div>
</div>
     <p class ="jobDetailFlash1"><?php echo $this->session->flashdata('jobDetailFlash'); ?><p>             
<!-- dashboard heading
   ================================================== -->  
<div class="row">  
      <div class="row-left">

       
         <div class="row-left-inner-left">
             
             <h2 class="h2-heading">My Bid</h2>
             
              <?php if($status){                
                 foreach($status as $row);
                 if(isset($row) && count($row)>0) {  ?>   

                        <p class="smallheading">Current Bid<span>$</span><?php echo $row->price; ?>

                      

               <?php   } } ?>
               </p>

               <?php

                     if($status){
                     foreach($status as $row);
                     foreach($status_bid as $bid_status);
                     if(isset($row) && count($row)>0){

                       $job_id  =  $row->job_id;
                       $contractor_id  =  $row->contractor_id;
                 
                    ?>      


              <p class="smallheading">
                  New Bid
                    <input  id ="updateBid" name ="updateBid" type ="text" />
                    <p id ="updateBidamount" style ="color:red;margin-left: 51px;"></p>
                   <input type="hidden" value="<?php echo $job_id;?>" id="job_id">
                   <input type="hidden" value="<?php echo $contractor_id;?>" id="contractor_id">
              </p>
              <p class="smallheading">
              <a  onclick="return ConfirmDialog();"  href ="<?php echo base_url()?>contractor/jobs/deleteBid?job_id=<?php echo $job_id;?>&contractor_id=<?php echo $contractor_id;?>">           
                  <button class="btn btn-primary btn-lg enabled_button" <?php if(isset($bid_status) && count($bid_status)){ ?> style ="display:none"  class ="btn btn-primary btn-lg disabled_button"<?php } ?>>
                         CANCEL PROJECT
                  </button>
              </a> 
                <button class="btn btn-primary btn-lg enabled_button"  id ="updateBid1" <?php if(isset($bid_status) && count($bid_status)){ ?>disabled="disabled" title="Your bid accepted so you can't update" class ="btn btn-primary btn-lg disabled_button"<?php } ?>>
                     UPDATE
               </button>
              <?php if(isset($bid_status) && count($bid_status)){ ?>

                <a  onclick="return Confirmclose();"  href ="jobs/update_complete_status?job_bid_id=<?php echo $row->id;?>&job_id=<?php echo $job_id;?>">
                 <button class="btn btn-primary btn-lg enabled_button"  id ="close" <?php if(isset($completed_status) && count($completed_status)>0){ ?>disabled="disabled" title="Your already close this project" class ="btn btn-primary btn-lg disabled_button"<?php } ?>>
                       close
                 </button>

               </a>
               <?php } ?>





              </p>

            <?php } 


          } ?>

          <!-- <p class ="project_discription"><?php echo $row->detail; ?></p> -->
         </div> 

 
        <div class="row-left-inner-right">
        
                         
                   <h2 class="h2-heading">Bid Competition</h2>
                    <?php 

                        if($high_lowbid){                                              
                        foreach ($high_lowbid as $budget){
                     if( $budget->minprice ){ ?>

                    <p class="smallheading">Highest Bid

                      <span>$<?php echo $budget->minprice;?>
                    </span> 

                   </p>

                  <p class="smallheading">Lowest Bid

                      <span>$<?php echo $budget->minprice;?>
                    </span> 

                  </p>

                  <?php  } } } ?>
                   
        </div>
        
   <!--bid info nd testimonial start -->
<div class="row-left-inner-full">
     <h2 class="h2-heading">Bids Overview</h2>
     <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in. </p>
     <div class="container-fluid" id="user_table">

      <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                  <tr>

                    <th>Name</th>
                    <th>Price Quoted</th>
                    <th>Date</th>
                  </tr>
             </thead>
    <tbody class="status">
       <?php  if(count($fetchAllBider)>0){
        

        foreach ($fetchAllBider as $row) { ?>


          <tr>
                <td>
                  <div>
                    <img class="img-circle" id="circle" src=<?php echo  base_url(); ?>uploads/<?php echo $row->profile_pic?>>
                  </div>
                  <div class="bidder_property"><a href = "<?php echo base_url(); ?>contractor/jobs/view_busness?contractor_id=<?php echo $row->contractor_id;?>"><?php echo $row->contractor_name; ?></a></div>
                </td>
                <td>$<?php echo $row->price; ?></td> 
                <td> <?php echo  date('F d, Y', strtotime($row->created_at)) ?></td>           
          </tr>





        <?php 

           }

        }
        ?>
       </tbody>

       </table>
        
    


     </div>
  </div>
</div>

<div class="row-right">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <form  action="javascript:add_admin();" id ="conversation" method="post" >
            <input type="hidden" value="<?php $session_data = $this->session->userdata('logged_in');
                     echo $session_data['id'];?>" id="contractor_id">
            <input type="hidden" value="<?php echo $row->job_id;?>" id="job_id">
              <?php foreach($homeowner as $owner_id); ?>
             <input type="hidden" value="<?php echo $owner_id->owner_id;?>" id="owner_id">
             
        <div class="dashboard_msg">
            <div class="chat_heading"> <h2 class="h2-heading">messages</h2> 
            </div>
            <div class="dashboard_innner" style="border-bottom:none;"  id="fillgrid">                
            </div>
        </div>


        
          <div class="message_box" style="padding-top:7px;">
            <textarea data-autoresize rows='1' class="text_message" id="message" type="text" name="message" placeholder="Send a Message"></textarea>
          </div>
        
      <p class ="messagevalidation"><p>            
        <div class="col-lg-12 das_btn">
                <input type="submit" id="submit" value="send" class="send-message">
              </div>
        </form>
           </div>
           <!-- bid info nd testimonial ends -->
</div>

</div>
   



<div class="row">
 <div class="project_desc">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 left">
            <div class="slider">
          <ul class="bxslider  base_img">
          <?php 


          foreach($result as $row);

          foreach($row->image as $key=>$val){ ?>
          
            <li><img src="<?php echo base_url();?>uploads/<?php echo $val;?>" class="img-responsive" alt="Responsive image"  /></li>
          <?php } ?>
          </ul>
          <div id="bx-pager"> 
            <?php foreach($row->image as $key=>$val){ ?>
          
            <a data-slide-index="<?php echo $key;?>" href="">
              <img src="<?php echo base_url();?>uploads/<?php echo $val;?>">
            </a> 
            <?php } ?> </div>
        </div>
         </div>
         <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 right textbox">
            <div class="project_info">
             <h5><b>Created:</b><?php echo date('F d, Y', strtotime($row->started_time));?>
             <h5><b>Expires:</b> <?php echo $row->expire_time; ?> </h5>
            </div>
            <p class ="project_discription"> <?php echo $row->project_discription; ?></p>
         </div>

  
      </div>
   </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>

$(document).ready(function() {
    $('#sample_1').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
    
    
} );



jQuery.each(jQuery('textarea[data-autoresize]'), function() {
    var offset = this.offsetHeight - this.clientHeight;
 
    var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
});

$(function() {
    $("#start_time").datepicker({
        format: 'yyyy-mm-d',
        autoclose: true,
        startDate: 'd'

    });

});
 
 $(document).ready(function(){

           $("#updateBid1").click(function(){

           var updateBidPrice =    $("#updateBid").val();

           if(updateBidPrice=="")
           {

              $("#updateBidamount").html("Please give the some amount");
           }
           else{
           var updateBidPrice
           var job_id    =          $("#job_id").val();
           var contractor_id    =    $("#contractor_id").val();
          $.ajax({
          url:'<?php echo base_url();?>contractor/jobs/updateBidAmount',
          type: "POST",
          data: {updateBidPrice: updateBidPrice,job_id: job_id,contractor_id: contractor_id},
          success: function(response){

            if(response==1){


                    //alert(response);
                    window.location.href = '<?php echo base_url();?>contractor/jobs?id='+job_id;
                    
            }
                       
          }
          
        })
}
        });
    })

</script>

