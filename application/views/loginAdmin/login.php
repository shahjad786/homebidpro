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

	<!-- BEGIN LOGIN FORM -->

	<form class="form-horizontal" action="<?php echo base_url();?>admin/verifylogin" method="post" id="loginForm">

		<h3 class="form-title">Sign In</h3>

		<div class="form-group">

			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

			<label class="control-label visible-ie8 visible-ie9">Email</label>

			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" value="<?php if($this->input->cookie('email',true)){echo $this->input->cookie('email',true); }?>" name="email" id="email"/>

		</div>

		<div class="form-group">

			<label class="control-label visible-ie8 visible-ie9">Password</label>

			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password" value = "<?php if($this->input->cookie('password',true)){echo $this->input->cookie('password',true);}?>"/>

<div class="error"><?php echo $this->session->flashdata('message'); ?></div>

		</div>

		<div class="form-actions">

			<button type="submit" class="btn btn-success uppercase">Login</button>

			<label class="rememberme check">

			<input type="checkbox" name="remember" value="1"/>Remember </label>

			<a href="<?php echo base_url();?>index.php/admin/login/forgetpasswd_form" id="forget-password" class="forget-password">Forgot Password?</a>

		</div>

		<div class="login-options">

		</div>

	</form>



  

	<!-- END LOGIN FORM -->

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

