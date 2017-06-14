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
<div class="dashboard-top-nav">
<a href="#open-bides" title="OPEN BIDS">OPEN BIDS</a>
<a href="#active-bids" title="ACTIVE BIDS">ACTIVE BIDS</a>
<a href="#closed-bids" title="CLOSED BIDS">CLOSED BIDS</a>
<a href="#review" title="REVIEWS">REVIEWS</a>
</div>



<h3 class="dashboard-heading" id="open-bides">Open Bids <span>Matches for you</span></h3>
<div class="dashboard-table">
<table class="tablesorter table" id="myTable1">
<thead>
<tr>

<th class="header">Name<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Date Created<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Exporation<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Bids<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">My Bids<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Lowest Bids<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Messages<i class="fa fa-fw fa-sort"></i></th>
</tr>
</thead>
<tbody class="status">
<?php
if($result){
//echo "<pre>";
//print_r($result);
foreach($result as $key => $value){

?>
<tr>
  <td>
  <a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"><?php echo  $value['name'];?></a>
  </td>
  
  <td>
  <?php echo date('F d, Y', strtotime($value['started_time']));?>
  
  </td> 
  
  <td>
  <?php echo $value['expire_time'];?>
  
  </td>
  
  <td>
  <?php echo  $value['bids'];?>
   </td>
  
  <td>
  <?php if(isset($value['mybid'])) { 
  echo "$".$value['mybid'];
  }else {?>
  <button data-target="#myModalHorizontal"  id = "<?php echo $value['id']; ?>&<?php echo $value['owner_id']; ?>"  onclick ="fetchdata(this.id)" data-toggle="modal" class="btn-small btn-green enabled_button">BID NOW</button>
  <?php } ?>
  </td>
   <td>
  <?php echo  "$".$value['minbid'];?>
   </td>
  <td>
  <span class="badge"><?php echo  $value['count_msg'];?></span>
  
  </td>
</tr>

<?php 
}
?>
</tbody>

</table>
<?php } ?>
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
            
              <input type="hidden"  name="owner_id" id = "owner_id" value = "">
              <!-- <input type="hidden"  name="category_id" id = "category_id" value = "<?php echo $value['category_id'];?>"> -->
              <input type="hidden"  name="job_id" id = "job_id" value = "">

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

<div class="dashboard-table-outer">
<div class="dashboard-table-left">
<h3 class="dashboard-heading" id="active-bids">Active Bids <span>Awarded, not closed</span></h3>
<div class="dashboard-table-inner">
<table class="tablesorter table" id="myTable2">
<thead>
<tr>

<th class="header">Name<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Award Date<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Bid Amount<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Close<i class="fa fa-fw fa-sort"></i></th>
</tr>
</thead>
<tbody class="status">
<?php
if($accepted_project){
foreach($accepted_project as $key => $value){
?>
<tr>
  <td>
  <a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"><?php echo  $value['name'];?></a>
  </td>
  
  <td>
  <?php echo date('F d, Y', strtotime($value['accepted_date']));?>
  
  </td> 
  
  <td>
  <?php echo "$".$value['price'];?>
  
  </td>
  
  <td>
  <a href="<?php echo base_url();?>contractor/jobs/update_complete_status?job_bid_id=<?php echo $value['job_bid_id']; ?>&job_id=<?php echo $value['id'];?>"><button class="btn-small btn-white enabled_button">CLOSE</button></a>
  
  </td>
</tr>

<?php 
}
} ?>
</tbody>

</table>
</div>
</div>


<div class="dashboard-table-right">
<h3 class="dashboard-heading" id="closed-bids">Closed Bids <span>Awarded and closed</span></h3>
<div class="dashboard-table-inner">
<table class="tablesorter table" id="myTable">
<thead>
<tr>

<th class="header">Name<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Close Date<i class="fa fa-fw fa-sort"></i></th>
<th class="header ">Bid Amount<i class="fa fa-fw fa-sort"></i></th>
</tr>
</thead>
<tbody class="status">
<?php
if($completed_project){
foreach($completed_project as $key => $value){
?>
<tr>
  <td>
  <a href="<?php echo base_url();?>contractor/jobs?id=<?php echo $value['id'];?>"><?php echo  $value['name'];?></a>
  </td>
  
  <td>
  <?php echo date('F d, Y', strtotime($value['updated_at']));?>
  
  </td> 
  
  <td>
  <?php echo "$".$value['price'];?>
  
  </td>
  
 
</tr>

<?php 
}
} ?>
</tbody>

</table>
</div>
</div>
</div>

<div class="dashboard-review" id="review">
<div class="dashboard-review-left" >
<h3>Recent Reviews</h3>

<?php if($myreview) {
foreach($myreview as $review){
?>
<div class="dashboard_reviews_block">
<div class="dashboard_reviews_img">
<img class="img-circle" id="circle" src="<?php echo base_url();?>uploads/<?php echo $review['p_pic']?>">
</div>


<div class="dashboard_reviews_info">
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
if(!empty($review['rating']) && $i<=$review['rating']) {
$selected = "selected";
}
?>
<li class='<?php echo $selected; ?>'>&#9733;</li>  
<?php }  ?>
</ul>
</div>
</td>
<td class="review-owner"><?php echo $review['name']." <span>".date('F d, Y', strtotime($review['created_at']))."</span>";?></td>
</tr>
</tbody>
</table>
</fieldset> 
<div class="dashboard_reviews_info_inner"><?php echo $review['reviews'];?></div>
<div class="dashboard_reviews_info_inner"><span><?php echo $review['h_o_name'];?></span></div>
</div>
</div>


<?php
//echo $review['rating']." - ". date('F d, Y', strtotime($review['created_at']))."<br />";
}
}?>

</div>


<div class="dashboard-review-right" >
<h3>Recent Jobs</h3>
<?php if($myresent) {
foreach($myresent as $review){ ?>
<div class="recent_job_list">
<?php if($review['rating']) { ?>
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
if(!empty($review['rating']) && $i<=$review['rating']) {
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
<div class="recent-job-owner"><?php echo $review['name']." <span> ". date('F d, Y', strtotime($review['updated_at'])).'</span>'; ?></div>
</div>
<?php } } ?>
</div>

</div>

</div>
 

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
    margin-left: 15px;
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
    width: 446px;
    /*height: 44px;*/
    margin-left: -22px;
    margin-top: -8px;
    margin-bottom: -6px;
    min-height: 46px;
    max-height:113px;
    
   /*// word-wrap: break-word;*/

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script type="text/javascript">

 function fetchdata(id){


       var datahere = id;
       var res = datahere.split("&");
       var job_id =  res[0];
       var owner_id =  res[1];

      document.getElementById('job_id').value = job_id;
      document.getElementById('owner_id').value = owner_id;



 }

</script>