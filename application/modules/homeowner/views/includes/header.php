<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- <link rel="icon" href="<?php echo base_url(); ?>media/img//favicon.ico"> -->
      <title>Homeowner</title>
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>  
      <!-- Bootstrap core CSS -->
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>media/css/bootstrap.css" rel="stylesheet">
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
      <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700' rel='stylesheet' type='text/css'>
			
			<!--start css for datatables-->
			<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css"/>

			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>

			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>

			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
			<link href="<?php echo base_url(); ?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <link rel="stylesheet" href="/resources/demos/style.css">
			<!--End css for datatables-->

			<!--breadcrumb-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/breadcrumb/css/global.css" />
			<!--breadcrumb-->
			<style type="text/css">
			.btn-group.tabletools-dropdown-on-portlet {
				  display: none;
				}
				#breadcrumb, #breadcrumb2 {
          display: block;
          float: left;
          
          margin-top: -45px;
          top: 0 !important;

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
                         <?php if($this->session->userdata('logged_in')) { ?>
                
                <li class="dropdown" role="presentation">
                <a aria-expanded="false" aria-haspopup="true" role="button" href="#" data-toggle="dropdown" class="dropdown-toggle"> My Account <span class="caret"></span> </a>
                 <ul class="dropdown-menu"> 
        
                  <li class="divider" role="separator"></li> 

                          <li>
                              <a href="<?php echo base_url();?>homeowner/dashboard" title="Dashboard">Dashboard</a>
                            </li>


                           <li>
                              <a href="<?php echo base_url();?>homeowner/profile" title="My Profile">My Profile</a>
                            </li>

                            <li>
                                 <a href="<?php echo base_url(); ?>homeowner/payment/payments" title="Payments">Payments</a>
                             </li>  
                            
                             <li>
                                 <a href="<?php echo base_url(); ?>homeowner/dashboard/logout" title="Logout">Logout</a>
                             </li>     
                </ul>
                  </li>
                    <?php } else { ?>

                        <li><a href="<?php echo base_url(); ?>homeowner/login" class ="get_started1" title="Get Started">Get Started</a></li>
                        <li data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><a href="javascript:;" title="Login">Login</a></li>

                     <?php } ?>


                        <li><a href="<?php echo base_url(); ?>site/how_it_works" title="How It Works">How It Works</a></li>
                        <li><a href="<?php echo base_url(); ?>blog" title="Tools & Tips">Tools & Tips</a></li>
                        <!--<li><a href="<?php echo base_url();?>blog">Blog</a></li>-->
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
      </div>

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

<style>

  /*  #home_owner button {
        width: 44%;
    margin-left: 10px;
    margin-right: 10px;
    height: 51px;
}


.modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
    height: 150px;
    width: 457px;
    margin-top: 176px;
    margin-left: 100px;
}
*/





</style>
      <style>
         .homeowner_login .help-block {
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
         .panel-title {
           color: white;
          text-align: center; 
        }
      </style>