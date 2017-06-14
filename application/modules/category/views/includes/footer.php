<!-- FOOTER -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
         <a href="<?php echo base_url();?>" titile="HomeBidPro"> <img class="footerlogo" src="<?php echo base_url(); ?>media/img/footerlogo.png">
        </a></div>
   
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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>media/js/vendor/jquery.min.js"><\/script>')</script>
    
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
   
 <script src="<?php echo base_url(); ?>media/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>media/js/jquery.bxslider.js"></script>
  <script type="text/javascript">
    var jq = $.noConflict();
     jq(document).ready(function(){
        
    jq('.bxslider').bxSlider({
      pagerCustom: '#bx-pager'
    });
      });
     if($(".checkExist").text() == 0) {

      $("#image_data").val(""); 

    }else{

      $("#image_data").val($(".checkExist").text());  
    }
if($(".checkExist1").text() == 0) {

      //$(".photo_box").val(""); 

    }else{

      $("#image_data1").val($(".checkExist1").text());  
    }

  /*$("#file_1").change( function(this){


    this

  
   // $("#image_data").val(0);
      $("#image").remove();
  
  });  
*/


 
   $(".file_1").change( function(){  

     $("#"+this.name+"").remove();
    // this.id
     //alert("Changed: " + this.name);
     /*$("#image1").remove(); 
      $("#image2").remove();
      $("#image3").remove();*/
  
  });  




</script>

   <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>








<script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<!-- END PAGE LEVEL PLUGINS -->




<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>/assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>/assets/admin/pages/scripts/components-pickers.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-advanced.js"></script>


 <script>
$(document).ready(function(){
  fetch_data();
  /*
  $('#file_1').change(function(){
   //get the input and the file list
    var input = document.getElementById('file_1');
      if(input.files.length>3){
          $('.validation').css('display','block');
          $('input[type="submit"]').attr('disabled','disabled');
      }else if(input.files.length<3){
          $('.validation').css('display','block');
          $('input[type="submit"]').attr('disabled','disabled');
      }
      else{
          $('.validation').css('display','none');
          $('input[type="submit"]').removeAttr('disabled');
      }
   });*/
});
$( document ).ready(function(){
        $("#conversation").submit(function(){

          /*if($('.btn').hasClass('active')){
            //alert("a");  
          }else{
            $(".error").html("Please select atleast one contractor");
            return false;
          }*/
          var url = "<?php echo base_url();?>homeowner/jobs/add_communication";
          var job_id=$("#job_id").val();
          var owner_id=$("#owner_id").val();
          var message=$("#message").val();
          var contractor_id=$("#contractor_id").val();
         // event.preventDefault();
         if(message!=""){
          $.ajax({

          type:"POST",  
          url: url,
          data: {job_id:job_id,owner_id:owner_id,message:message,contractor_id:contractor_id},

          success: function(data)
          {
            fetch_data();

          }
        });
          }else{
        alert("please write something");
      }
           return false;
        });

      });
     function fetch_data(){
     var job_id=$("#job_id").val();
     var owner_id=$("#owner_id").val();
    //  var contractor_id=$("#contractor_id").val();
   var url = "<?php echo base_url();?>homeowner/jobs/fetch";
   $.ajax({
           type:"POST",
          url: url,
          data: {job_id:job_id,owner_id:owner_id},
           success: function(data)
          {
            $("#fillgrid").html(data);
            $("#message").val('');
            $('#fillgrid').animate({
  					scrollTop: $('#fillgrid').get(0).scrollHeight}, 100);
          }
      });
}

// Here we are using the Sate and countrry concept.

 
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

              } */

              
            
            }
            
            
          }
          
        })
        
      }
        
        
        
    });
      
</script>
<script src="http://tutsme-webdesign.info/tutorials/tablesorter/jquery.tablesorter.min.js"></script>
<script src="http://tutsme-webdesign.info/tutorials/tablesorter/jquery.tablesorter.widgets.min.js"></script>
<script>
$(document).ready(function(){
$("#myTable").tablesorter(
{
  theme : 'blue',
  
  sortList : [[1,0],[2,0],[3,0]],

    // header layout template; {icon} needed for some themes
    headerTemplate : '{content}{icon}',

  // initialize column styling of the table
    widgets : ["columns"],
  widgetOptions : {
      // change the default column class names
      // primary is the first column sorted, secondary is the second, etc
      columns : [ "primary", "secondary", "tertiary" ]
  }
});
});
jQuery(document).ready(function() {   
   ComponentsPickers.init();
});

</script>
<style type="text/css">
	.sidebar-nav .activeSideBar {
    color: #1CA4A6 !important;
    text-decoration: none;
}
.btn.btn-sm.default.DTTT_button_print {
    display: none;
}
.projects_desc {
    border-radius: 5px !important;
}
.btn-default {
    color: white;
    background-color: #18A3A5;
    /* border-color: #ccc; */
    border-radius: 6px !important;
}
.btn-default:hover{
  color: white;
    background-color: #18A3A5;
    /* border-color: #ccc; */
    border-radius: 6px !important;
}
</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
<script> $.validate(); $(".sidebar-nav").html($(".dropdown-menu").html()); 
//to display select sidbar navigation
var currentUrl = window.location.href;
$("ul").find("[href='"+currentUrl+"']").addClass("activeSideBar");
</script>
 

<script>
jQuery(document).ready(function() {       

           // initiate layout and plugins

          // Metronic.init(); // init metronic core components

Layout.init(); // init current layout

Demo.init(); // init demo features

           ComponentsPickers.init();

		   TableAdvanced.init();

		   FormValidation.init();

        });   

 var RecaptchaOptions = {

           theme : 'custom',

           custom_theme_widget: 'recaptcha_widget'

        };	



$("#file_2").change( function(){

    $("#video").remove();

	

});
</script>







<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://cdn.ckeditor.com/4.5.6/standard-all/ckeditor.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/form-validation.js"></script>
<!-- END PAGE LEVEL STYLES -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->




<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/components-pickers.js"></script>

 <script src="<?php echo base_url(); ?>assets/jquery.creditCardValidator.js"></script>
<script>
   $(function() {
       $('#card_num').validateCreditCard(function(result) {
       		 //console.log(result.valid);
       		 // if(result.valid == false) {
 							
       		 // 		$('.card-error').html("Card number is not valid.");

       		 // }else{

       		 // 		$('.card-error').html("");
       		 // }
       		 // if(result.length_valid == false) {

       		 // 		$('.card-error').html("Not a valid Length.");

       			// }else{

       			// 	$('.card-error').html("");
       			// }

           $('.log').html(
           					'Card type: ' + (result.card_type == null ? '-' : result.card_type.name)
                    + '<br>Valid: ' + result.valid
                    + '<br>Length valid: ' + result.length_valid
                    //+ '<br>Luhn valid: ' + result.luhn_valid
            );
     		});
   });
</script>
 

  </body>
</html>
