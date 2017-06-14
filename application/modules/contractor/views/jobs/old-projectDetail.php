<?php foreach($result as $row);


//echo "<pre>";print_r($row);

//die;

?>
<div class="container">
<!-- dashboard heading
   ================================================== -->
	<div class="dashboard_heading">
	<div class="row">
   		<div class="col-md-12 text-center">
      <h1> <img style="width: 49px;height: 49px;" src="<?php echo base_url();?>/media/img/<?php echo $row->cat_image?>" alt="Responsive image"/> <?php echo $row->name;?> </h1>
     <!-- <a href="<?php //echo base_url();?>contractor/jobs/createBid?owner_id=<?php echo $row->owner_id;?>&category_id=<?php echo $row->category_id;?>&job_id=<?php echo $row->job_id;?>"> 
      <button type="button" class="btn btn-default">Apply the Bid
      </button>
      </a>-->
      <!-- Button trigger modal -->
    </div>

   <div class="col-md-12 text-right">
    <?php

         foreach($status as $data);
         foreach($status_bid as $bid_status);
         if(isset($data) && count($data)>0){

           $job_id  =  $data->job_id;
           $contractor_id  =  $data->contractor_id;

    ?>      
      <!-- <button class="btn btn-primary btn-lg disabled_button" title = "You already applied bid" data-toggle="modal" data-target="#myModalHorizontal" disabled = "disabled">
            Submit A Bid
      </button>


      <a   onclick="return ConfirmDialog();"  href = "<?php echo base_url()?>contractor/jobs/deleteBid?job_id=<?php echo $job_id;?>&contractor_id=<?php echo $contractor_id;?>">           
        <button class="btn btn-primary btn-lg enabled_button" <?php if(isset($bid_status) && count($bid_status)){ ?>disabled="disabled" title="Your bid accepted so you can't withdraw" class ="btn btn-primary btn-lg disabled_button"<?php } ?>>
               Withdraw Your Bid
        </button>
    </a> -->

 <?php
  }

else  { ?>  
      <!-- <button class="btn btn-primary btn-lg enabled_button" data-toggle="modal" data-target="#myModalHorizontal">
            Submit A Bid
      </button>

      <button class="btn btn-primary btn-lg" style = "display:none">
               Withdraw Your Bid
      </button> -->
<?php } ?>


      <!-- Modal -->
      <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <button type="button" class="close" 
                     data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title text-center" id="myModalLabel" >
                     Submit A Bid 
                  </h4>
               </div>
               <!-- Modal Body -->
               <div class="modal-body">
                  <form class="form-horizontal" role="form" id = "bidForm" action="<?php echo base_url();?>contractor/jobs/applyBid" method="POST">
                     <div class="form-group">
                        <label  class="col-sm-2 control-label"
                           for="inputEmail3">Start Time</label>
                        <div class="col-sm-10">
                            <input type="text"    name="start_time" id = "start_time" size="16" class="form-control form-control-inline input-medium date-picker" placeholder="Start Time">             
              <input type="hidden"  name="owner_id" id = "owner_id" value = "<?php echo $row->owner_id;?>">
              <input type="hidden"  name="category_id" id = "category_id" value = "<?php echo $row->category_id;?>">
              <input type="hidden"  name="job_id" id = "job_id" value = "<?php echo $row->job_id;?>">
            </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label"
                           for="inputPassword3" >Completion Time</label>
            <div class="col-sm-10 ">
              <select class="form-control" id="completed_time" name = "completed_time">
                <option value="">Completion Time</option>
                <option value="1 Day">1 Day</option>
                <option value="2 Day">2 Day</option>
                <option value="3 to 6 Days">3 To 6 Days</option>
                <option value="1 to 2 weeks">1 To 2 weeks</option>
                <option value="2 weeks Plus">2 Weeks Plus</option>
                
              </select>
                                        
          </div>
             </div>
             
           <!--  <div class="form-group">
                        <label  class="col-sm-2 control-label"
                           for="inputEmail3">Description Of Work</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" name="project_description" placeholder="Description Of Work"  id="project_description"></textarea>
                        </div>
            </div> -->
             

            <div class="form-group"> 

              <label  class="col-sm-2 control-label"
                           for="inputEmail3">Description Of Work</label>
              <div class="col-sm-8 @if($errors->has('email')) has-error @endif">
                  <textarea id="customck" name="project_description" class="ckeditor form-control"  rows="6"></textarea>
                <p class="error"></p>
              </div>
            </div>
           
           <div class="form-group">
                        <label  class="col-sm-2 control-label"
                           for="inputEmail3">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                        </div>
          </div>

                     </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default"
               data-dismiss="modal">
              Close
              </button>             
              <button type="submit" class="btn btn-primary">
              Submit
              </button>

             </div>
                  </form>
            </div>
            </div>
         </div>
      </div>
      <div class="col-md-12 text-right">
      
      <!-- New  Ask Modal Here  -->
      <div class="modal fade" id="myModalHorizontal1" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <button type="button" class="close" 
                     data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title text-center" id="myModalLabel" >
                     Ask Your Question 
                  </h4>
               </div>
               <!-- Modal Body -->
               <div class="modal-body">
                  <form class="form-horizontal" role="form" id = "bidForm" action="<?php echo base_url();?>contractor/jobs/applyBid" method="POST">

            <div class="form-group"> 

              
              <div class="col-sm-8 @if($errors->has('email')) has-error @endif">
                  <textarea id="customck" name="project_description" class="ckeditor form-control"  rows="6"></textarea>
                  <input type="hidden"  name="owner_id" id = "owner_id" value = "<?php echo $row->owner_id;?>">
                  <input type="hidden"  name="category_id" id = "category_id" value = "<?php echo $row->category_id;?>">
                  <input type="hidden"  name="job_id" id = "job_id" value = "<?php echo $row->job_id;?>">
                <p class="error"></p>
              </div>
            </div>
           
           

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default"
               data-dismiss="modal">
              Close
              </button>             
              <button type="submit" class="btn btn-primary">
              Submit
              </button>

             </div>
                  </form>
            </div>
            </div>
         </div>
      </div>
   </div>
  
    <?php

         if($status){
         foreach($status as $row);

         //echo "<pre>";print_r( $row);die;
        // foreach($status_bid as $bid_status);
         if(isset($row) && count($row)>0){

           $job_id  =  $data->job_id;
           $contractor_id  =  $data->contractor_id;

    ?>    
<div class="row">  
      <div class="col-sm-7">
         <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 left">
            <div class="project_info">               
             <h4>My Bid</h4>
             <!-- <h5><b>Start time:</b><?php echo date('F d, Y', strtotime($row->start_time));?>
             <h5><b>Completed time:</b> <?php echo $row->completed_time; ?> </h5> -->
              <h5><b>Current Bid</b>$<?php echo $row->price; ?> </h5>

              <h5>
                <b>New Bid</b>
                   <input  id ="updateBid" name ="updateBid" type ="text" />
                   <input type="hidden" value="<?php echo $job_id;?>" id="job_id">
                   <input type="hidden" value="<?php echo $contractor_id;?>" id="contractor_id">
              </h5>
            </div>

    <?php

         foreach($status as $data);
         foreach($status_bid as $bid_status);
         if(isset($data) && count($data)>0){

           $job_id  =  $data->job_id;
           $contractor_id  =  $data->contractor_id;

    ?>      
     

      <a   onclick="return ConfirmDialog();"  href = "<?php echo base_url()?>contractor/jobs/deleteBid?job_id=<?php echo $job_id;?>&contractor_id=<?php echo $contractor_id;?>">           
        <button id="cancel" class="btn btn-primary btn-lg enabled_button" <?php if(isset($bid_status) && count($bid_status)){ ?>disabled="disabled" title="Your bid accepted so you can't withdraw" class ="btn btn-primary btn-lg disabled_button"<?php } ?>>
               CANCEL PROJECT
        </button>
      </a> 

    
        <button class="btn btn-primary btn-lg enabled_button"  id ="updateBid" <?php if(isset($bid_status) && count($bid_status)){ ?>disabled="disabled" title="Your bid accepted so you can't update" class ="btn btn-primary btn-lg disabled_button"<?php } ?>>
               UPDATE
        </button>
    
 <?php
  }

else  { ?>  
      
      
      <button id="cancel" class="btn btn-primary btn-lg" style = "display:none">
                CANCEL PROJECT
      </button> 
<?php } ?>


    










            <!-- <p class ="project_discription"><?php echo $row->detail; ?></p> -->
         </div> 

 <?php
  }
}
?>

<?php   if(isset($high_lowbid)) 
        {
        foreach ($high_lowbid as $budget);


          # code...
        



?>
          <div class="project_info col-lg-4 col-md-4 col-sm-4 col-xs-4 left left">               
           <h4>Bid Competition</h4>
           <!-- <h5><b>Start time:</b><?php echo date('F d, Y', strtotime($row->start_time));?>
           <h5><b>Completed time:</b> <?php echo $row->completed_time; ?> </h5> -->
            <h5><b>Highest Bid</b>$<?php echo $budget->minprice; ?> </h5>
            <h5><b>Lowest Bid</b>$<?php echo   $budget->maxprice; ?> </h5>
          </div>

<?php } ?>
   <!--bid info nd testimonial start -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bids_info left bids_das_margin">
     <h4 class="overview">Bids Overview</h4>
     <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in. </p>
     <div class="container-fluid" id="user_table">

      <table id="myTable" class="tablesorter table">
                <thead>
                  <tr>

                    <th>Name<i class="fa fa-fw fa-sort"></i></th>
                    <th>Price Quoted<i class="fa fa-fw fa-sort"></i></th>
                    <th>Date<i class="fa fa-fw fa-sort"></i></th>
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

                  <div class="bidder_property"><?php echo $row->contractor_name; ?></div>




                </td>
                <td>$<?php echo $row->price; ?></td> 
                <td> <?php echo  date('d/m/Y', strtotime($row->created_at)) ?></td>           
          </tr>
    

    <?php  }
     
        }
       
      ?>
  </tbody>

     </table>
        
    


     </div>
  </div>
</div>

<div class="col-sm-5">
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


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="message_box" style="padding-top:7px;">
            <textarea data-autoresize rows='1' class="text_message" id="message" type="text" name="message" placeholder="Send a Message"></textarea>
          </div>
        </div>
      <p class ="messagevalidation"><p>            
        <div class="col-lg-12 das_btn">
                <input type="submit" id="submit" value="send"class="dashboard_btn">
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
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

           $("button").click(function(){

           var updateBidPrice =    $("#updateBid").val();
           var job_id    =    $("#job_id").val();
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

        });
    })

</script>
<style>

.modal-body .form-horizontal .col-sm-2,
.modal-body .form-horizontal .col-sm-10 {
    width: 100%
}
/*.btn-primary {
    
    background-color: white !important;
    
}*/
.modal-body .form-horizontal .control-label {
    text-align: left;
}
.modal-body .form-horizontal .col-sm-offset-2 {
    marg#cancel{
background-color: white;
color: black;
font-size: 13px;
border: 1px solid black;
padding: 5px 10px !important;
height: 31px;
border-radius: 6px;
}in-left: 15px;
}
.col-lg-8.col-md-8.col-sm-6.col-xs-12.right {
    padding-left: 28px;
}

.btn-primary {
    color: #fff;
    background-color: #1ca3a6;
    border-color: #1ca3a6;
}

.btn-primary:hover {
    color: #fff;
    background-color: #1ca3a6;
    border-color: #1ca3a6;
}
#cancel{
background-color: white;
color: black;
font-size: 13px;
border: 1px solid black;
padding: 5px 10px !important;
height: 31px;
border-radius: 6px;
}

.overview{
margin-top:20px;
}

.btn-primary:focus{
    color: #fff;
    background-color: #1ca3a6;
    border-color: #1ca3a6;
}

.col-lg-5 {

}

.text_message{
  width: 100%;
margin-top: -8px;
margin-bottom: -6px;
min-height: 46px;
max-height: 113px;
margin-left: 0px;
margin-right: 0px;
}
.dashboard_btn{
  border:none !important;
}
.message_box #message {border: solid 1px #959595 }




.col-sm-8 {
    width: 100%;
}
textarea{  
  /* box-sizing: padding-box; */
   -moz-box-sizing: border-box;
    box-sizing: border-box;
    resize: none;
}
.col-sm-5, .col-sm-12 {
    padding-left: 0px !important;
    padding-right: 0px !important;
}
.col-sm-7 {
    padding-left: 0 !important;
}
p {
    margin: 0 0 10px;
    text-align: justify;
    font-size: 15px;
    /* FONT-WEIGHT: 700; */
}

div#myModalHorizontal {
    z-index: 99999;
}

div#myModalHorizontal1 {
    z-index: 99999;
}
</style>
