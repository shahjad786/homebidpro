<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/components-form-tools.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/form-validation.js"></script>
<script>
jQuery(document).ready(function() {       
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
TableAdvanced.init();
FormValidation.init();
ComponentsFormTools.init();

});

 var RecaptchaOptions = {
           theme : 'custom',
           custom_theme_widget: 'recaptcha_widget'
        };	

$("#file_2").change( function(){
    $("#video").remove();
	
});

$(document).on('click','.status_checks',function(){
	var role = $("#role").val();
      var status = ($(this).hasClass("a")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
 
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
       if(role== "contractor")
	{
		url = "<?php echo base_url();?>admin/contractor/status";
	}else if(role== "homeowner"){
		 url = "<?php echo base_url();?>admin/homeowner/status";
	}else{
		 url = "<?php echo base_url();?>admin/category/status";
	}
        $.ajax({
          type:"POST",
          url: url,
          data: {id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });



		
/* $('#conversion').on('keypress', function(e) {
  
var key = e.which;

if(key == 13)  // the enter key code
{
	//alert("shahjad ahmed");
	e.preventDefault();
    e.stopPropagation();
	var conversion = $("#conversion").val();
	//alert(conversion);
	  $.ajax({
		url: 'http://localhost/home_owner12/conversion/conversion/insert',
		type: "POST",
		data: {conversion: conversion,data : 1},
		success: function(response) {
			//alert(response);	
			if(response == 1) {
				$.ajax({
	    	    url: 'http://localhost/home_owner12/conversion/conversion/select',
					success: function(response) {
						
						if(response == 0){
							
							alert("data is not here");
							
						}
						else{
							   //alert("hello frnd");
							    //document.getElementById("result").innerHTML = response[1];
								 // var result = $("#result").html(response);
								//document.getElementById("name").innerHTML = response[0];
											
						}
						
						
						
					}
				
				});	
				
			} else {
				
				alert("data  not submited successfully");
			}
			
		}
		
	});
	
}
  
}); */

	
</script>
</body>
<!-- END BODY -->
</html>