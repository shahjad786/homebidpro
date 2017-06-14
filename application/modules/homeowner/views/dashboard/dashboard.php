
<div class="container">
    <!-- dashboard heading

    ================================================== -->
   
   <div class="dashboard_heading">

      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Dashboard</h1>
          <a href="<?php echo base_url();?>homeowner/jobs/createjob" > 
          <button type="button" class="btn btn-default">CREATE A NEW PROJECT</button>
          </a>
         
        </div>
      </div>

      <p class ="homeownerFlashData"><?php echo $this->session->flashdata('homeownerFlash'); ?></p>

    <!-- </div>
    	 <div id="breadcrumb">
				<ul class="crumbs">
					<li class="first"><a href="<?php echo base_url();?>" style="z-index:9;"><span></span>Home</a></li>
				 	<li><a href="javaScript:;" style="z-index:8;">Dashboard</a></li>
				
				</ul>
	  </div> -->
</div>
<div class="container">   
<?php foreach($result as $row){







  ?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-centered text-center">
	 <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>" >
     <div class="projects_desc">
		  <img style="width: 49px;height: 49px;" src="<?php echo base_url(); ?>media/img/<?php echo $row->images_name; ?>">
		  <h3><?php echo ucfirst($row->name);?></h3></a>
		  <div class="project_info"> 
      <h5><b>Created:</b> <?php echo date('F d, Y', strtotime($row->started_time));?> </h5>
		  <h5><b>Expires:</b> <?php echo $row->expire_time;?> </h5>
		  </div>
		   
       <div role="presentation" class="product_bids">
       <div class="presentation-img"> 
       <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>media/img/circleok.png"></a>
       </div>
       <div class="presentation-text">
       <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><b>Bids </b> <span class="badge"><?php echo $row->count;?></span></a>
       </div>
       </div>
		  <div role="presentation" class="product_inbox">
      <div class="presentation-img"> 
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>media/img/circleinbox.png"></a>
      </div>
      <div class="presentation-text">
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><b>Inbox</b> <span class="badge"><?php echo $row->count_msg;?></span></a>
      </div>
      </div>
	 </div>
   </a>
	</div>
<?php } ?>
</div>
<div class="container">

<?php foreach($progress as $row){?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-centered text-center">
	 <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>" ><div style="background: #cccccc;" class="projects_desc">
		  <img style="width: 49px;height: 49px;" src="<?php echo base_url(); ?>media/img/<?php echo $row->images_name; ?>">
		  <h3><?php echo ucfirst($row->name);?></h3></a>
		 <div class="project_info"> <h5><b>Created:</b> <?php echo date('F d, Y', strtotime($row->started_time));?> </h5>
		  <h5><b>Accepted:</b> <?php echo date('F d, Y', strtotime($row->accepted_date));?> </h5>
      <h5><b>Expires:</b> <?php echo $row->expire_time;?> </h5>
     
		  </div>
		  
      <div role="presentation" class="product_bids">
      <div class="presentation-img"> 
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>media/img/circleokgray.png"></a>
      </div>
      <div class="presentation-text">
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><b>Bids </b> <span class="badge"><?php echo $row->count;?></span></a>
      </div>
      </div>
		  <div role="presentation" class="product_inbox">
      <div class="presentation-img"> 
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>media/img/circleinboxgray.png"></a>
      </div>
      <div class="presentation-text">
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><b>Inbox</b> <span class="badge"><?php echo $row->count_msg;?></span></a>
      </div>
      </div>
	 </div></a>
	</div>
<?php  } ?>
	
</div>






<?php if(isset($completed) && count($completed)>0) { ?>
<div class="container">
	
<?php foreach($completed as $row){?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-centered text-center">

	 <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>" >
     <div style="background:#cccccc;" class="projects_desc">
      <img class="completedbox" src="<?php echo base_url(); ?>media/img/circleok.png">
		  <img style="width: 49px;height: 49px;" src="<?php echo base_url(); ?>media/img/<?php echo $row->images_name; ?>">
		  <h3><?php echo ucfirst($row->name);?></h3></a>
		 <div class="project_info">
    
      <h5><b>Created:</b> <?php echo date('F d, Y', strtotime($row->started_time));?> </h5>
      <h5><b>Completed:</b> <?php echo date('F d, Y', strtotime($row->completed_date));?> </h5>
		  <h5><b>Expires:</b> <?php echo $row->expire_time;?> </h5>
      
		  </div>
		  
      <div role="presentation" class="product_bids">
      <div class="presentation-img"> 
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>media/img/circleokgray.png"></a>
      </div>
      <div class="presentation-text">
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>" ><b>Bids </b> <span class="badge"><?php echo $row->count;?></span></a>
      </div>
       </div>
		  <div role="presentation" class="product_inbox">
		  <div class="presentation-img"> 
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>media/img/circleinboxgray.png"></a>
      </div>
      <div class="presentation-text">
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><b>Inbox</b> <span class="badge"><?php echo $row->count_msg;?></span></a>
      </div>
      </div>
	 </div></a>
	</div>
<?php  } ?>
	
</div>


<?php } ?>

<div class="container">

<?php foreach($cancel as $row){?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-centered text-center">
   <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>" ><div class="projects_desc">
      <img style="width: 49px;height: 49px;" src="<?php echo base_url(); ?>media/img/<?php echo $row->images_name; ?>">
      <h3><?php echo ucfirst($row->name);?></h3></a>
     <div class="project_info"> <h5><b>Created:</b> <?php echo date('F d, Y', strtotime($row->started_time));?> </h5>
      <h5><b>canceled:</b> <?php if(isset($row->cancel_date)) { echo date('F d, Y', strtotime($row->cancel_date));}?> </h5>
      <h5><b>Expires:</b> <?php echo $row->expire_time;?> </h5>
     
      </div>
      
      <div role="presentation" class="product_bids">
      <div class="presentation-img"> 
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>media/img/circleok.png"></a>
      </div>
      <div class="presentation-text">
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><b>Bids </b> <span class="badge"><?php echo $row->count;?></span></a>
      </div>
      </div>
      <div role="presentation" class="product_inbox">
      <div class="presentation-img"> 
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>media/img/circleinbox.png"></a>
      </div>
      <div class="presentation-text">
      <a href="<?php echo base_url();?>homeowner/jobs?id=<?php echo $row->id;?>"><b>Inbox</b> <span class="badge"><?php echo $row->count_msg;?></span></a>
      </div>
      </div>
   </div></a>
  </div>
<?php  } ?>
  
</div>























</div>
