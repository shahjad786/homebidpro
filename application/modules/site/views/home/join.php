<?php foreach($result as $row);

//echo "<pre>";print_r($result);die;
 ?>

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
   

        <h1 class="staticBlock"><?php echo $result['page_title']; ?> </h1>

        <div class="staticBlock">                    
            <?php echo $result['page_content']; ?>               
        </div>
 </div>