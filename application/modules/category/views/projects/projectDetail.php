<?php foreach($result as $row);

foreach($category_image as $data);

 ?>
<div class="container">
<!-- dashboard heading
   ================================================== -->
<div class="dashboard_heading">
<div class="row">
   <div class="col-md-12 text-center">
      <h1> <img src="<?php echo base_url();?>/media/img/<?php echo $data->images_name; ?>" alt="Responsive image"/> <?php echo $row->name;?> </h1>
     <!-- <a href="<?php //echo base_url();?>contractor/jobs/createBid?owner_id=<?php echo $row->owner_id;?>&category_id=<?php echo $row->category_id;?>&job_id=<?php echo $row->job_id;?>"> 
      <button type="button" class="btn btn-default">Apply the Bid
      </button>
      </a>-->
      <!-- Button trigger modal -->
    </div>
    <?php if($this->session->userdata('logged_in'))
          {
                   //echo "hello";die("data is");
             $session_data = $this->session->userdata('logged_in'); 
             $role_id =  $session_data['role_id'];
            
        }
    ?>
    <button <?php if(isset($role_id) && $role_id== 1) { ?>disabled = "disabled" class = "btn btn-primary btn-lg disabled_button" title="You are not authorised."<?php  } ?> class="btn btn-primary btn-lg enabled_button" data-toggle="modal" data-target="#myModalHorizontal">
            Submit A Bid
    </button>


 <div id="breadcrumb">
    <ul class="crumbs">
        <li class="first"><a href = "<?php echo base_url();?>" style="z-index:9;"><span></span>Home</a></li>
        <li class="first"><a href = "javaScript:;" style="z-index:9;"><span></span>Project Detail</a></li>

    </ul>
</div>
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
                     Alert
                  </h4>
               </div>
               <!-- Modal Body -->
               <div class="modal-body">
                  <form class="form-horizontal" role="form" id = "bidForm" action="<?php echo base_url();?>contractor/jobs/applyBid" method="POST">
                     
                    <p style="text-align:center;">login first then submit a bid </p>
             </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default"
               data-dismiss="modal">
              Close
              </button>             
             </div> -->
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
                          <?php } ?>
                    </div>
             </div>
             </div>
                 <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 right">
                    <div class="project_info">
                       <h5><b>Created:</b> <?php echo date('F d, Y', strtotime($row->started_time));?> </h5>
                       <h5><b>Expires:</b> <?php echo $row->expire_time; ?> </h5>
                    </div>
                    <p class ="project_discription"> <?php echo $row->project_discription; ?></p>
                 </div>
       </div>
   </div>








   <!--project description end -->
   <!--bid info nd testimonial start -->
   <!-- <div class="row">
     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
      <form action="" method="post" >
            <input type="hidden" value="<?php //$session_data = $this->session->userdata('logged_in');
                    // echo $session_data['id'];?>" id="contractor_id">
            <input type="hidden" value="<?php //echo $row->job_id;?>" id="job_id">
             <?php //foreach($homeowner as $owner_id); ?>
             <input type="hidden" value="<?php //echo $owner_id->owner_id;?>" id="owner_id">
             
          <div class="dashboard_msg">
            <div class="dashboard_innner" id="fillgrid">
              <h2 class="h2-heading">messages</h2>
                <?php// foreach($conversation as $con){ 
              //if($con->sen_rec =='owner_to_contractor'){?>
                  <div class="test-block1">
                    <figure class="testi-img pull-right rightmargin"><img src="<?php ///echo base_url();?>uploads/avatar5.jpg"></figure>
                    <p class="pull-right"> <?php //echo $con->message;?></p>
                  </div>
              <?php //}else{ ?>
                    <div class="test-block1">
                      <figure class="testi-img pull-left rightmargin"><img src="<?php //echo base_url();?>uploads/avatar4.jpg"></figure>
                      <p class="pull-right odd talk_bubble"> <?php //echo $con->message;?></p>
                    </div>

               <?//php  }
                //} ?>
           
            
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="message_box" style="padding:7px;">
    <input class="text_message" id="message" type="text" name="message" placeholder="Send a Message"></div></div>
       
      <div class="col-lg-12 das_btn">
    <input type="button" id="submit" value="send"class="dashboard_btn"></div>
   </form>
</div>
   </div> -->
   <!-- bid info nd testimonial ends -->
</div>
</div>
<style>

.modal-body .form-horizontal .col-sm-2,
.modal-body .form-horizontal .col-sm-10 {
    width: 100%
}

.modal-body .form-horizontal .control-label {
    text-align: left;
}
.modal-body .form-horizontal .col-sm-offset-2 {
    margin-left: 15px;
}

.btn-primary {
    color: #fff;
    background-color: #1ca3a6;
    border-color: #1ca3a6;
    margin-left: 978px;
}

.btn-primary:hover {
    color: #fff;
    background-color: #1ca3a6;
    border-color: #1ca3a6;
}
.btn-primary:focus{
    color: #fff;
    background-color: #1ca3a6;
    border-color: #1ca3a6;
}

.col-lg-5 {
    width: 41.66666667% !important;
    margin-left: 675px !important;
}

.text_message{
  width: 445px;
    height: 44px;
    margin-left: -22px;
    margin-top: -8px;
    margin-bottom: -6px;
}



.col-sm-8 {
    width: 100%;
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
