
<?php foreach($result as $row);
//cho "<pre>";
//print_r($result);
 //foreach($row->image as $key=>$val){
//print_r($val);
//}
//die();?>
<style>
.status_checks.btn.a{
	 pointer-events: none;        
	 cursor: default;
}
</style>
<div class="container">
  <!-- dashboard heading
    ================================================== -->
  <div class="dashboard_heading">
    <div class="row">
      <div class="col-md-12 text-center">
      <h1> <img style="width: 49px;height: 49px;" src="<?php echo base_url();?>/media/img/<?php echo $row->images_name?>" alt="Responsive image"/> <?php echo $row->name;?> 
      </h1>
      </div>
      <div class="col-md-12 text-right">

        <?php

         foreach($check_bidder_status as $data);
        // foreach($status_bid as $bid_status);
         if(isset($data) && count($data)>0){
    ?>  
   <a href="<?php echo base_url();?>homeowner/managejobs?id=<?php echo $row->job_id;?>">
    <button disabled="disabled" class="btn btn-default" title ="You can't edit because it accepted"  data-toggle="modal" data-target="#myModalHorizontal" >
     EDIT JOB
    </button></a>     

 <?php
  }

else  { ?>  
      <a href="<?php echo base_url();?>homeowner/managejobs?id=<?php echo $row->job_id;?>">
      <button class="btn btn-default" data-toggle="modal"  data-target="#myModalHorizontal" >
         EDIT JOB
      </button></a> 
      
<?php } ?>

<?php if(isset($cancel_project_status) && count($cancel_project_status)>0){?>


<a href="<?php echo base_url();?>homeowner/jobs/updateCancelJobs?id=<?php echo $row->job_id;?>">
    <button  class="btn btn-default"  data-toggle="modal" data-target="#myModalHorizontal" >
     Resubmit Your Project
    </button></a>     

 <?php
  }else{
?>

    <a href="<?php echo base_url();?>homeowner/managejobs?id=<?php echo $row->job_id;?>">
    <button  class="btn btn-default" style ="display:none" data-toggle="modal" data-target="#myModalHorizontal" >
     Resubmit Your Project
    </button></a>    


<?php } ?>
       
    </div>
    </div>
  </div>
   <!-- <div id="breadcrumb">
        <ul class="crumbs">
          <li class="first"><a href="<?php echo base_url();?>" style="z-index:9;"><span></span>Home</a></li>
          <li><a href="<?php echo base_url();?>homeowner/dashboard" style="z-index:8;">Dashboard</a></li>
          <li><a href="http://dev.homebidpro.com/homeowner/jobs?id=<?php echo $row->job_id;?>" style="z-index:7;"><?php echo $row->name;?> </a></li>
        
        </ul>
  </div> -->
  
  <div class="project_desc">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 left">
        <div class="slider">
          <ul class="bxslider  base_img">
          <?php foreach($row->image as $key=>$val){ ?>
          
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
      <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 right">
        <div class="project_info">
          <h5><b>Created:</b><?php echo date('F d, Y', strtotime($row->created_at));?> </h5>
          <h5><b>Expires:</b> <?php echo $row->expire_time; ?> </h5>
        </div>
        <p> <?php echo $row->project_discription; ?></p>
      </div>
    </div>
  </div>
  <!--project description end -->
  <!--bid info nd testimonial start -->
  <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 bids_info bids_das_margin">
      <h2 class="h2-heading">Bids </h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in. </p>
    <input type="hidden" value="<?php echo $row->job_id;?>" id="job_bid_id">
     <input type="hidden" value="<?php $job_id=$_GET['id'];echo $job_id;?>" id="job_id">
     <div class="container-fluid" id="user_table">

     </div>

  <?php
        
         foreach($check_bidder_status as $data);
        // foreach($status_bid as $bid_status);
         if(isset($data) && count($data)>0 || isset($cancel_project_status) && count($cancel_project_status)>0){
    ?>  
    
    <button type="button" disabled = "disabled" class="btn btn-default" title = "You can't cancel">
    CANCEL PROJECT
    </button>
         

 <?php
  }

else  { ?>  
      <a onclick="return ConfirmDialog();"  href="<?php echo base_url();?>homeowner/jobs/cancel_job?job_id=<?php echo $row->job_id;?>">
      <button type="button"  class="btn btn-default">CANCEL PROJECT</button>
      </a>
      
<?php } ?>

    </div>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
      <form action="" id="conversation" method="post" >
            <input type="hidden" value="<?php $session_data = $this->session->userdata('logged_in');
                     echo $session_data['id'];?>" id="owner_id">
            <input type="hidden" value="<?php echo $row->job_id;?>" id="job_id">
             <?php foreach($contractor as $contractor_id){ ?>
             <input type="hidden" value="<?php echo $contractor_id->contractor_id;?>" id="contractor_id">
             <?php } ?>
          <div class="dashboard_msg">
          <div class="chat_heading"> <h2 class="h2-heading">messages</h2> </div>
            <div class="dashboard_innner" style="border-bottom:none;"  id="fillgrid">
             
                
            </div>
        </div>
        
        <div class="message_box">
           <textarea data-autoresize rows='1' class="text_message" id="message" type="text" name="message" placeholder="Send a Message"></textarea>
        </div>
      
       <p class ="messagevalidation"><p>
         <div class="error"></div>
      <div class="col-lg-12 das_btn"><input type="submit" id="submit" value="send" class="send-message"></div>
  
   </form>
</div>

  </div>
 
  <!-- bid info nd testimonial ends -->
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script>
 $(document).on('click','.status_checks',function(){

      var status = ($(this).hasClass("a")) ? '0' : '2';
    
      var msg = (status=='0')? 'Deactivate' : 'Activate';
        var current_element = $(this);
        var job_id=$("#job_id").val();
        //alert(job_id);
   	 url = "<?php echo base_url();?>homeowner/jobs/update";
     
       $.ajax({

          type:"POST",

          url: url,

          data: {id:$(current_element).attr('data'),status:status,job_id:job_id},

          success: function(data)
           
          {   
      
            changecolor();

          }

        });         
    });
 </script>


<script>
/*jQuery.each(jQuery('textarea[data-autoresize]'), function() {
    var offset = this.offsetHeight - this.clientHeight;
 
    var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
});*/
</script>
 <script>
 function changecolor(){
  var job_bid_id=$("#job_bid_id").val();
   var url = "<?php echo base_url();?>homeowner/jobs/fetch_table";
   $.ajax({
           type:"POST",
          url: url,
          data: {id:job_bid_id},
           success: function(data)
          {
          // alert(data);
          
            $("#user_table").html(data);
            var numItems = $('.status_checks.btn.a').length;
            if(numItems > 0){
            	$(".status_checks").css( 'pointer-events', 'none');  
            	$(".status_checks").css( 'cursor', 'default');         

            }
				

    $('#sample_1').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
          }
      });
}
$( document ).ready(function(){
	
  changecolor();
});

 </script>


