<?php foreach($result as $row); ?>

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





      <div class="container">   
        <h1 class = "staticBlock">
          <?php echo $result['page_title']; ?> 
        </h1>       
        <div class="staticBlock">    
          <?php echo $result['page_content']; ?>                  
        </div>
        <div class="get_started_block"> 
         <div class="input-group">

                      

                          <input type="text" class="form-control category"  placeholder="What service do you need?" id = "category">



                          <span class="input-group-btn">

                            <button class="btn btn-default get_started" id ="get_started" type="button" title="GET STARTED">GET STARTED</button>
                            <p class="error"> </p>
                           <div id="genreSuggestion" class="autosuggestion genreSuggestion">

                            </div>
                          <input type="hidden" class = "category_id" name="category_id" value="" id="category_id">


                          </span>



                    </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>


 $(".get_started").click(function(){

         var category_id = $(".category_id").val();

         //alert(category_id);

         if(category_id == "")
         {

             alert("please select the category");
         }

        else{
               window.location.href = "<?php echo base_url();?>homeowner/createjob?id="+category_id;
        }
         //alert(category_id);

   
  });








 </script>