<!DOCTYPE html>

<html lang="en">

<!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

<meta charset="utf-8"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<title>HomeBidPro</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta content="width=device-width, initial-scale=1.0" name="viewport"/>

<meta http-equiv="Content-type" content="text/html; charset=utf-8">

<meta content="" name="description"/>

<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->

<link href="<?php echo base_url();?>assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>

<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME STYLES -->

<link href="<?php echo base_url(); ?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>

<link href="<?php echo base_url(); ?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

<!-- END THEME STYLES -->

<link rel="shortcut icon" href="favicon.ico"/>



</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login">

<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

<div class="menu-toggler sidebar-toggler">

</div>

<!-- END SIDEBAR TOGGLER BUTTON -->

<!-- BEGIN LOGO -->

<div class="logo">

	<a href="#" style="color:white;font-size:33px;text-decoration: none !important">HomeBidPro

	<!--<img src="<?php //echo base_url(); ?>assets/admin/layout2/img/logo-homebid.png" alt=""/>-->

	<!--<a href="" style = "color:white;font-size:33px;text-decoration: none !important">HomeBidPro</a>-->

	</a>

</div>

<!-- END LOGO -->

<!-- BEGIN LOGIN -->

<div class="content">

	

	<form class="forget-form" style ="display:block;" action="<?php echo base_url(); ?>admin/login/forget_password" method="POST" id="loginForm">

		<h3>Forget Password ?</h3>

		<p>

			 Enter your e-mail address below to reset your password.

		</p>

		<div class="form-group">

			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="emails" id ="emails"/>

		<div class="error"><?php echo $this->session->flashdata('message'); ?></div>

		</div>

		<div class="form-actions">

			<button type="button" id="back-btn"  onclick= "window.location.href ='<?php echo base_url();?>admin/login';" class="btn btn-default">Back</button>

			<button type="submit" id="submit" class="btn btn-success uppercase pull-right">Submit</button>

		</div>

	</form>

	<!-- END REGISTRATION FORM -->

</div>

<div class="copyright">

	 2016 ©HomeBidPro.

</div>

<!-- END LOGIN -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<!-- BEGIN CORE PLUGINS -->

<!--[if lt IE 9]>

<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script> 

<![endif]-->

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>

<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/form-validation.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>

jQuery("#emails").bind("keyup change", function(e) {



	var email = $(this).val();

    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

    





 /*   if(pattern.test(email) == false) {

    	

    	$(".error").text("Incorrect email Id.");

    	return false;



    }*/



})



jQuery("#submit").bind("click", function(e) {



	var email = $("#emails").val();

	if(email == "") {

    	

    	$(".error").text("Please enter email id.");

    	return false;



    }

})

</script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>

jQuery(document).ready(function() {     

Metronic.init(); // init metronic core components

Layout.init(); // init current layout

Login.init();

Demo.init();

FormValidation.init();

});

</script>

<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>

