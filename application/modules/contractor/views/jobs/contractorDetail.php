<?php foreach($result as $row){
//print_r($row); die();?>
<div class="container">
    <!-- dashboard heading
    ================================================== -->
   <div class="dashboard_heading">
      <div class="row">
        <div class="col-md-12 text-center">
         <h1> Bid Details</h1>
        </div>
      </div>

    </div>
    <!--   <div id="breadcrumb">
        <ul class="crumbs">
          <li class="first"><a href="<?php echo base_url();?>" style="z-index:9;"><span></span>Home</a></li>
          <li><a href="<?php echo base_url();?>homeowner/dashboard" style="z-index:8;">Dashboard</a></li>
          <li><a href="http://dev.homebidpro.com/homeowner/jobs?id=<?php $job_id=$_GET['job_id']; echo $job_id;?>" style="z-index:7;"><?php echo $row->name;?> </a></li>
        
        </ul>
      </div> -->


<div class="row">

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 contractor_image">
      <img src="<?php echo base_url();?>uploads/<?php echo $row->profile_pic?>" alt="" class="img-circle">
</div>

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 contractor_desc">
      <h3><?php echo $row->contractor_name;?></h3>  
      
  <fieldset class="rating">
    <?php foreach($average as $avg){ ?>

  <table class="demo-table">
<tbody>
<tr>

</tr>    
<?php $i=0;?>

<tr>
<td valign="top">

<div id="tutorial-<?php echo $avg->id; ?>">
<input type="hidden" name="rating" id="rating" value="<?php echo $avg->average; ?>" />
<ul >
  <?php
  for($i=1;$i<=5;$i++) {
  $selected = "";
  if(!empty($avg->average) && $i<=$avg->average) {
  $selected = "selected";
  }
  ?>
  <li class='<?php echo $selected; ?>'  onClick="addRating(this,<?php echo $avg->id; ?>);">&#9733;</li>  
  <?php }  ?>
<ul>

</tr>
</tbody>
</table>

</fieldset>
&nbsp&nbsp&nbsp <span><?php echo $avg->count_reviews;?> Reviews</span>
<?php } ?>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 contractor_desc">
  <img src="<?php echo base_url();?>media/img/location.png" class="edit_img"><?php echo $row->city;?>
  &nbsp&nbsp&nbsp<img src="<?php echo base_url();?>media/img/mobile_icon.png" class="edit_img"><?php echo $row->phone_number;?>
</div>

</div>



<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 bids_details">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 buisness_details_info">
<h4>Buisness Info</h4>
<p>
<?php echo $row->company_name;?> <br />
<?php echo $row->weekdays;?> <?php echo $row->weekdays_time;?> <br />
<?php echo $row->weekend;?> <?php echo $row->weekend_time;?> <br />
(Please call to confirm)
</p>
<p><img src="<?php echo base_url();?>media/img/buisinfoa.jpg" /><?php echo $row->years_experience;?> Years in Business </p>
<?php foreach($homeowners as $owner){ ?>
<p><img src="<?php echo base_url();?>media/img/buisinfob.jpg" /><?php echo $row->employee;?> Employees   </p>
<?php } 
 foreach($jobs as $count){ 
  $check=$count->count_jobs;
  ?>
<img src="<?php echo base_url();?>media/img/buisinfoc.jpg" /><?php echo $count->count_jobs;?> Jobs Completed
<?php } ?>
</div>
  
</div>

</div>

<hr class="border_line"> </hr>
    <!--bid details end -->

    <!--bid info nd testimonial start -->

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bids_details_about">
<h3>About</h3>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

<img src="<?php echo base_url();?>uploads/<?php echo $row->profile_pic;?>">
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

<p>
<?php echo $row->company_bio;?>
<td> 

    </td>
</p>

</div>
</div>

</div>

<?php //$contractor_id=$_GET['id'];
  //$job_id=$_GET['job_id'];
    // $session_data = $this->session->userdata('logged_in');
                  //  $owner_id= $session_data['id'];
?>

<hr class="border_line"> </hr>


    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 bids_details_reviews">
             <div class="dashboard_msg">
                <div class="dashboard_innner">
                   <h3>Reviews</h3>
                  <?php if($reviews == 0) {  ?>
                  <div class="test-block1">
                       <div class="bids_reviews_info"> 
                                 No reviews
                              </div>
                         </div>
                    
                  <?php   }else{
  if($check!="0"){
                    foreach($reviews as $rev){ 
                      ?>
                        <div class="dashboard_reviews_block">
                            <div class="bids_reviews_img">
                                <img class="img-circle" id="circle" src="<?php echo base_url();?>uploads/<?php echo $rev->owner_profile?>">
                            </div>
                             <div class="bids_reviews_info">
                                  <fieldset class="rating">
  <table class="demo-table">
<tbody>
<tr>

</tr>    
<?php $i=0;?>
<tr>
<td valign="top" style="width:110px;">

<div >
<ul >
<?php
for($i=1;$i<=5;$i++) {
$selected = "";
if(!empty($rev->rating) && $i<=$rev->rating) {
$selected = "selected";
}
?>
<li class='<?php echo $selected; ?>'>&#9733;</li>  
<?php }  ?>
</ul>
</div>
</td>
<td class="review-owner"><?php echo $rev->job_name." <span>".date('F d, Y', strtotime($rev->created_at))."</span>";?></td>
</tr>



</tbody>
</table>
</fieldset>

<div class="dashboard_reviews_info_inner"><?php echo $rev->reviews;?></div>
<div class="dashboard_reviews_info_inner"><span><?php echo $rev->owner_name;?></span></div>

 
                              </div>
                         </div>

                 <?php } }else{  ?>
                            <div class="test-block1">
                       <div class="bids_reviews_info"> 
                                 No reviews
                              </div>
                         </div>
             <?php     }  
                 }
                  ?>


 
  </div>
  
    </div>
 
</div>


  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 bids_verified_reviews">

  <div class="verified_reviews panel panel-default text-center">
 <h3> Verified Reviews </h3>
 <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna  </h5>
 
    <button type="button" class="btn btn-primary btn-lg enabled_button" data-toggle="modal" title ="You are not authorise" data-target="#myModalHorizontal"  disabled>WRITE A REVIEW</button>
</div>


<div class="verified_reviews_img panel panel-default text-center">
<img src="<?php echo base_url();?>media/img/review_bids.jpg">
</div>
<div class="test-block1">
 <h4> Recent Jobs </h4>


<?php 


if($recent)
{
foreach($recent as $recent_job){
 // echo $recent_job->name;
//print_r($recent_job);die();

  ?>
 
   
<div class="bids_review_recent">
<?php if($recent_job['rating'] && $recent_job['status']==1) { ?>
<fieldset class="rating">
<table class="demo-table">
<tbody>
<tr>

</tr>    
<?php $i=0;?>

<tr>
<td valign="top" style="width:110px;">

<div >
<ul >
<?php
for($i=1;$i<=5;$i++) {
$selected = "";
if(!empty($recent_job['rating']) && $i<=$recent_job['rating']) {
$selected = "selected";
}
?>
<li class='<?php echo $selected; ?>'>&#9733;</li>  
<?php }  ?>
</ul>
</div>
</td>
</tr>
</tbody>
</table>
</fieldset>
<?php } ?> 

<br /> <h5><b><?php echo $recent_job['name']; ?>  </b> <?php echo date('F d,Y', strtotime($recent_job['updated_at'])); ?> <img src="<?php echo base_url();?>media/img/review_img.jpg"></h5>
        </div>

        
       
        <?php } ?>

    

  

<!-- bid info nd testimonial ends -->

</div>



<?php } 
?>
</div>
</div>
<?php

} ?>

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
                      Write A Review
                  </h4>
               </div>
               <!-- Modal Body -->
               <div class="modal-body">
                <form class="form-horizontal" role="form" id ="reviews" action="" method="post" >
                   <div class="form-group"> 
                        
                      <div id="txt" class="col-sm-8 @if($errors->has('email')) has-error @endif">
                          <textarea  id="review" class="ckeditor form-control"  rows="6"></textarea>
                         <p class="error"></p>
                      </div>
                   </div>
                    <fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
</fieldset>
                  
                       <input type="hidden" value="<?php echo $job_id;?>" id="job_id">
                        <input type="hidden" value="<?php echo $contractor_id;?>" id="contractor_id">
                         <input type="hidden" value="<?php echo $owner_id;?>" id="owner_id">
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
             



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$( document ).ready(function(){
        $("#reviews").submit(function(){
          var rating=$('input[name="rating"]:checked').val(); 
          var review=CKEDITOR.instances['review'].getData();
          if((review)==""){
            $(".error").html("This field is required");
            return false;
          }
          var url = "<?php echo base_url();?>homeowner/reviews";
         var job_id=$("#job_id").val();
          var owner_id=$("#owner_id").val();
           var contractor_id=$("#contractor_id").val();
         // event.preventDefault();
          $.ajax({

          type:"POST",  
          url: url,
          data: {job_id:job_id,owner_id:owner_id,reviews:review,rating:rating,contractor_id:contractor_id},

          success: function(data)
          {
            //alert(data);
           location.reload();
          }
        });
           return false;
        });
      });
</script>

<script>function highlightStar(obj,id) {
  removeHighlight(id);    
  $('.demo-table #tutorial-'+id+' li').each(function(index) {
    $(this).addClass('highlight');
    if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
      return false; 
    }
  });
}

function removeHighlight(id) {
  $('.demo-table #tutorial-'+id+' li').removeClass('selected');
  $('.demo-table #tutorial-'+id+' li').removeClass('highlight');
}

/*function addRating(obj,id) {
 // alert("add");
  $('.demo-table #tutorial-'+id+' li').each(function(index) {
$url= "<?php echo base_url();?>homeowner/jobs/update_rating";
    $(this).addClass('selected');
    $('#tutorial-'+id+' #rating').val((index+1));
    if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
      return false; 
    }
  });
  $.ajax({
  url: $url,
  data:'id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
  type: "POST",
 
  });
}*/

function resetRating(id) {
  //alert("edit");
  if($('#tutorial-'+id+' #rating').val() != 0) {
    $('.demo-table #tutorial-'+id+' li').each(function(index) {
      $(this).addClass('selected');
      if((index+1) == $('#tutorial-'+id+' #rating').val()) {
        return false; 
      }
    });
  }
} </script>
<script>
$( document ).ready(function(){
  //$(".error").hide();
    var url = "<?php echo base_url();?>homeowner/jobs/check_reviews";
         var job_id=$("#job_id").val();
          var owner_id=$("#owner_id").val();
           var contractor_id=$("#contractor_id").val();
           
         // event.preventDefault();
          $.ajax({

          type:"POST",  
          url: url,
          data: {job_id:job_id,owner_id:owner_id,contractor_id:contractor_id},
           success: function(data)
          {
            
            if(data=="a"){
              $(".revew").hide();
            $(".error").html("You are already give review to this contractor");
                
            }else{
            $(".revew").show();
                $(".error").hide();
          }
          }
        });
   });
</script>
