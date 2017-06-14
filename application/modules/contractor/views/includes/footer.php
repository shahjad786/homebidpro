<!-- FOOTER -->
	<footer>
		<div class="container">
			<div class="row">
				<a href="<?php echo base_url() ?>">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="<?php echo base_url();?>" titile="HomeBidPro"><img class="footerlogo" src="<?php echo base_url(); ?>media/img/footerlogo.png"></a>
					</div>
				</a>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footer_nav">
         
           <a href="<?php echo base_url(); ?>site/about_us" titile="About Us">About Us</a>
           <a href="<?php echo base_url(); ?>site/contact_us" titile="Contact Us">Contact Us</a>
           <a href="<?php echo base_url();?>site/privacy_policy" titile="Privacy Policy">Privacy Policy</a>
           
            <?php if($this->session->userdata('logged_in')) { ?>
               
                <a href="<?php echo base_url(); ?>homeowner/dashboard/logout" titile="Logout">Logout</a>
                                
               
          <?php } ?>
         
          
        </div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 footer_social">
					<a href="#"><img src="<?php echo base_url(); ?>media/img/twitter.jpg" titile="twitter"></a>
          <a href="#"><img src="<?php echo base_url(); ?>media/img/social.jpg" titile="social"></a>
          <a href="#"><img src="<?php echo base_url(); ?>media/img/instagram.jpg" titile="instagram"></a>
          <a href="#"><img src="<?php echo base_url(); ?>media/img/pinrest.jpg" titile="pinrest"></a>
				</div>
			</div>
		</div>
        
	</footer>
	<div class="container">
	<div class="copyright-left">
	&copy; <?php echo date('Y');?> HomeBidPro. All Rights Reserved
	</div>
	
	<div class="copyright-right">
	Designed By Blackstone
	</div>
	</div>
<style type="text/css">
     .sidebar-nav .activeSideBar {
     color: #1CA4A6 !important;
     text-decoration: none;
}
.btn.btn-sm.default.DTTT_button_print {
   display: none;
}
</style>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>media/js/vendor/jquery.min.js"><\/script>')</script>
    <!--<script src="<?php //echo base_url(); ?>media/js/bootstrap.min.js"></script>-->
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
   
 <script src="<?php echo base_url(); ?>media/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>media/js/jquery.bxslider.js"></script>
  <script type="text/javascript">
		var jq = $.noConflict();
		 jq(document).ready(function(){
  
		jq('.bxslider').bxSlider({
		  pagerCustom: '#bx-pager'
		});

				fetch_data();
		  });


	/*var textarea = document.querySelector('textarea');

	textarea.addEventListener('keydown', autosize);
	             
	function autosize(){
	  var el = this;
	  setTimeout(function(){
	    el.style.cssText = 'height:auto; padding:0';
	    // for box-sizing other than "content-box" use:
	    // el.style.cssText = '-moz-box-sizing:content-box';
	    el.style.cssText = 'height:' + el.scrollHeight + 'px';
	  },0);
	}*/


















		 
  	if($(".checkExist").text() == 0) {

  		$("#image_data").val("");	

  	}else{

  		$("#image_data").val($(".checkExist").text());	
  	}

	$("#file_1").change( function(){

	
		$("#image_data").val(0);
	    $("#image").remove();
	
	});  
	


function ConfirmDialog(){

  var x =confirm("Are you sure to cancel this record?")

  if(x) {

  	//alert("hello Friend");

    return true;

  } else {

    return false;

  }

}



function Confirmclose(){

  var x =confirm("Are you sure to close this project?")

  if(x) {

  	//alert("hello Friend");

    return true;

  } else {

    return false;

  }

}












 $(function() {
    $("#start_time").datepicker({
        format: 'yyyy-mm-d',
        autoclose: true,
        startDate: 'd'

    });

});








	function add_admin(){	  
	

        	//alert("hlo");
         var url = "<?php echo base_url();?>contractor/jobs/add_communication";
		 var url1 = "<?php echo base_url();?>contractor/jobs/varify_contractor";
         var job_id=$("#job_id").val();
         var contractor_id=$("#contractor_id").val();
         var message = $("#message").val();
         var owner_id = $("#owner_id").val();
		 var status = 2;
		 //alert(message);	
		//alert(job_id);
		/*  alert(job_id);
		alert(owner_id);
		
		alert(contractor_id);  */
		//var message		 
		// event.preventDefault();

		if(message != ""){
		 $.ajax({
			 
		  type:"POST",	
          url: url1,
          data: {job_id:job_id,contractor_id:contractor_id,status:status},
         success: function(data)
          {
			  //alert(data);
			  if(data == 1){

				$.ajax({			
						type:"POST",	
						url: url,
						data: {job_id:job_id,owner_id:owner_id,message:message,contractor_id:contractor_id},
						success: function(data)
						{
							fetch_data();
						}
				});
				
			  }
			  
			  else{
				  
				    alert(" Sorry This Job is already Accepted So You can't send any message Now");	  
			  }  
          }
			 
			 
		 });
		 
	}else{

		   $(".messagevalidation").html("Please write something");



	}

  }
	    function fetch_data(){
			 var job_id=$("#job_id").val();
			 var contractor_id=$("#contractor_id").val();
			 var url = "<?php echo base_url();?>contractor/jobs/fetch";
				$.ajax({
					type:"POST",
					url: url,
					data: {job_id:job_id,contractor_id:contractor_id},
					success: function(data)
					{
						$("#fillgrid").html(data);
						$("#message").val('');
						$('#fillgrid').animate({
						scrollTop: $('#fillgrid').get(0).scrollHeight}, 100);
						//alert("now you are allwed");
					}
				});
		}	  
		    


// Here we are using the Sate and countrry concept.

 //jQuery('body').on('change','#state',function(e) {

 		//alert("heelo");
 		//alert(jQuery("#country :selected").val());

		/*if(jQuery("#country :selected").val()) {



				var iso = jQuery("#country :selected").val();
				
				if(iso == "CA")
				{

					$("#counties option").each(function() { $(this).remove(); });							
					$("#counties").append("");
					$(".counties.form-group").hide();

				}
				

				$.ajax({
					url:'<?php echo base_url();?>contractor/signup/state',
					type: "POST",
					data: {iso: iso},
					success: function(response) {
						if(response) {

							$("#state option").each(function() { $(this).remove(); });
														
							$("#state").append(response);
						
							$(".state.form-group").show();
						}
						
						
					}
					
				})
*/
		      // alert(iso);
			
			//$(".state.form-group").show();
			//$("#counties").show();
			//$(".state1.form-group").remove();
			//$("#counties1").hide();
			
			jQuery("#state").change(function(e){
				

				
				var state_code = jQuery("#state :selected").val();
				/*var iso = jQuery("#country :selected").val();
				
				if(iso == "CA")
				{

					$("#counties option").each(function() { $(this).remove(); });							
					$("#counties").append("");
					$(".counties.form-group").hide();

				}*/

				if(state_code != "")
				{
					
					$(".counties.form-group").hide();

				
					$.ajax({
					url:'<?php echo base_url();?>contractor/signup/county',
					type: "POST",
					data: {state_code: state_code},
					success: function(response) {

						if(response) {
								
							//var iso = jQuery("#country :selected").val();
							//if(iso == "US")
							//{

								$("#counties option").each(function() { $(this).remove(); });							
								$("#counties").append(response);
								$(".counties.form-group").show();

							//}
							/*else
							{	
								$("#counties option").each(function() { $(this).remove(); });							
								$("#counties").append("");
								$(".counties.form-group").hide();

							}	*/

							
						
						}
						
						
					}
					
				})
				
			}
				
				
				
		});
			
			
			
			
		//}
		/*else{
			
			//$(".state1.form-group").show();
			//$("#counties1").show();
			//$(".state.form-group").remove();
			$(".counties.form-group").remove();
		}*/

	//});


// Here is the Left Navigation 

$(".sidebar-nav").html($(".dropdown-menu").html());
var currentUrl = window.location.href;
$(".sidebar-nav").find("[href='"+currentUrl+"']").addClass("activeSideBar");




















		  
</script>



<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://cdn.ckeditor.com/4.5.6/standard-all/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

<!--<script src="<?php// echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->

<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->


<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>


<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/form-validation.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/components-pickers.js"></script>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script>


<!-- END PAGE LEVEL STYLES -->
<script>
jQuery(document).ready(function() { 
  
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
	 ComponentsPickers.init();
	  //TableAdvanced.init();
   FormValidation.init();
});
</script>  
  </body>
</html>
