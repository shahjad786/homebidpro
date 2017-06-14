<!-- FOOTER -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a href="<?php echo base_url();?>" titile="HomeBidPro"><img class="footerlogo" src="<?php echo base_url(); ?>media/img/footerlogo.png"></a>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footer_nav">
         
          <a href="<?php echo base_url(); ?>site/join_now " titile="Join Now ">Join Now </a>
          <?php if($this->session->userdata('logged_in')) { ?>
               
                <a href="<?php echo base_url(); ?>homeowner/dashboard/logout" titile="Logout">Logout</a>
                                
               
          <?php }else{ ?>

              <a href="javascript:;" title="Login" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Login</a>

           <?php } ?>

            <a href="<?php echo base_url(); ?>site/how_it_works" titile="How It Works">How It Works</a>
            <a href="<?php echo base_url(); ?>blog" titile="Tools & Tips">Tools & Tips</a>
            <a href="<?php echo base_url();?>blog" target = "_blank">Blog</a>
           
        
         
          
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
     <script src="<?php echo base_url(); ?>media/js/animation.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>media/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>media/js/bootstrap.min.js"></script>
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

$(".category").bind('keyup', function(e) {

    var cat     = $(this);
    //alert(cat);
    var category = $(this).val();
    //var category = $(this).('.category').val();

    //alert(category);
    if($(this).val() != "")
     {
        //alert(category);
      $.ajax({
          url:'<?php echo base_url();?>category/jobs/category',
          type: "POST",
          dataType: "json",
          data: {category: category},
          success: function(response) {

            console.log(response["no-found"]);  
          
          var result = response; 

          //console.log(result);
          //typeof(variable) != "undefined" && variable !== null
          var genr = cat.parent().find('.genreSuggestion');

          genr.html('');

          $(".category_id").val("");
          $.each(result, function(index, r)
          {
               //console.log(index);
            if(index == "no-found") {

              //alert("hello friend");

              $(genr).append('<div tabindex="103" class="" style="cursor: pointer;  padding: 2px 6px; font-size:15px;color:rgb(88,88,90);background-color: white; border-left:1px solid #c2c2c2; border-bottom:1px solid #c2c2c2; border-right:1px solid #c2c2c2" id="'+index+'">No category found.</div>');
            }else{

              $(genr).append('<div tabindex="103" class="add_option" style="cursor: pointer; padding: 2px 6px; font-size:15px;color:rgb(88,88,90);background-color: white; border-left:1px solid #c2c2c2; border-bottom:1px solid #c2c2c2; border-right:1px solid #c2c2c2" id="'+index+'">'+ r.job_category +'</div>');
            }
            
          });
          $(genr).show();
        }
      })

    }
    else{

      $('.genreSuggestion').hide();
    }
  });

 $(document).on('click', '.add_option', function() {
                
             //$('#btnSearchHide').click();
             var texts = $(this).attr('id').split('-');

             var id = texts[0];
             var name = $(this).context.innerHTML;
            // alert(id);
             var array = name.split(",");
             var category = array[0];
             //var phonNumber = array[1];
             $(".category_id").val(id);
             $(".category").val(category);
            // $("#phone_number").val(phonNumber);
                  
              $('.genreSuggestion').html('');
                   $('.genreSuggestion').hide();
                   // $('#genreSuggestionPhone').html('');
                   //$('#genreSuggestionPhone').hide();            
         });
</script>


  </body>
</html>
