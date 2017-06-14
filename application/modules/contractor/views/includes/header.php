<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>media/img/favicon.ico">

    <title>Contractor</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>  
    <!-- Bootstrap core CSS -->
     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>media/css/bootstrap.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>media/css/carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>media/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/jquery.bxslider.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/clockface/css/clockface.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/breadcrumb/css/global.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>

			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>

			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<style type="text/css">

#breadcrumb, #breadcrumb2 {
          display: block;
          float: left;         
          margin-top: -45px;
          top: 0 !important;
}
.crumbs {
  
  display: block;
  margin-left: 0;
  padding-left: 0px;
}

</style>

  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="logo" href="<?php echo base_url();?>" title="HomeBidPro"><img src="<?php echo base_url(); ?>media/img/logo.png"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url();?>" title="HomeBidPro"><span aria-hidden="true" class="glyphicon glyphicon-home"></span></a></li>
                <?php if($this->session->userdata('logged_in')) {

                        $session_data = $this->session->userdata('logged_in');
                      //  $business_status =     $session_data['business_status'];

                 ?>
                <!--<li><a href="<?php //echo base_url();?>"><span aria-hidden="true" class="glyphicon glyphicon-home"></span></a></li>-->
               <li class="dropdown" role="presentation">
                 <a aria-expanded="false" aria-haspopup="true" role="button" href="#" data-toggle="dropdown" class="dropdown-toggle"> My Account <span class="caret"></span> </a>
                 <ul class="dropdown-menu"> 
        
                  <li class="divider" role="separator"></li> 
                          
                          <li>
                             <a href="<?php echo base_url(); ?>contractor/dashboard" title="Dashboard">Dashboard</a>
                         </li> 


                          <li>
                              <a href="<?php echo base_url();?>contractor/profile" title="My Profile">My Profile</a>
                          </li>
 			                     <!-- <li>
                              <a href="<?php echo base_url();?>contractor/jobs/view_busness" title="My Profile">View Business</a>
                          </li> -->
                                                 
                         <li>
                              <a href="<?php echo base_url();?>contractor/businessprofile" title="Business Profile">Business Profile</a>
                        </li>

                              
                         <li>
                             <a href="<?php echo base_url(); ?>contractor/dashboard/logout" title="Logout">Logout</a>
                         </li>     
                
                  
                </ul>
                  </li>
                  <?php } ?>

                 <li><a href="<?php echo base_url(); ?>site/how_it_works" title="How It Works">How It Works</a></li>
                 <li><a href="<?php echo base_url(); ?>blog" title="Tools &amp; Tips">Tools &amp; Tips</a></li>
                <!-- <li><a href="<?php echo base_url();?>/blog">Blog</a></li>-->
                
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

<style>
.contractor_login .help-block {
  color: hsl(0, 100%, 50%);
  font-size: 12px  !important;;
  margin-bottom: 10px  !important;;
  margin-top: 34px !important;
  position: absolute !important;
}
#loginform .error {
  color: hsl(0, 100%, 50%);
  font-size: 12px  !important;
  position: absolute;
  margin-top: 32px;
}
</style>
