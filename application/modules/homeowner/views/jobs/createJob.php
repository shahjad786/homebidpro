 <style type="text/css">
.col-md-offset-3 {
   margin-left:6.333% !important;
}
.left-box-link li {
    list-style: outside none none;
     line-height: 25px;
}
.left-box-link ul {
    padding-left: 5px;

}.sidebar-nav a{
    color: hsl(240, 1%, 26%) !important;
    text-decoration: none;
}
.left-box-link li a:hover{
    color:#31708f !important;
    cursor:pointer;
}
</style>

 <div class="container"> 
     <div class="dashboard_heading">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Create A New Project</h1>
        </div>
      </div>

    </div>

  <?php  if($this->session->userdata('logged_in')) 

        {

            $session_data = $this->session->userdata('logged_in');
            $role_id =  $session_data['role_id'];   
            //echo  $role_id;die();
            if($role_id==1){ ?>

            <div class="col-md-2 col-sm-12 left-box-link" style="border-radius: 4px; padding-top: 9px; color: rgb(0, 0, 0); background: none repeat scroll 0px 0px rgb(249, 249, 249); border: 1px solid rgb(49, 112, 143);">
            <ul class="sidebar-nav">
                
            </ul> 
          </div>

   <?php } } ?>
        

        <div id="loginbox"  margin-top:50px class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Add New Project</div>
                        </div>  
                        <div class="panel-body" >
                           <form id ="newjob" name ="homeowner" class="form-horizontal" role="form" action="<?php echo base_url();?>homeowner/jobs/insert_job" enctype="multipart/form-data" method="POST">
                                
                                <!-- <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                     -->
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Project Name<span>*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Project Name">
                                    </div>
                                </div>
                                  
                                <!--  <div class="form-group">
                                        <label class="control-label col-md-3">Start Date</label>
                                        <div class="col-md-9">
                                              <input type="text" value="" name="start_time"    id = "start_time" size="16" class="form-control form-control-inline input-medium date-picker" placeholder="Selected Date">
                                        </div>
                                </div> -->
                                 <div class="form-group">
                                        <label for="icode" class="col-md-3 control-label">Expire Date<span>*</span></label>
                                        <div class="col-md-9">
                                                <input type="text" value="" name="completed_time"  class="form-control"  id ="datepicker" size="16"  placeholder="Selected Date">
                        
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Photo<span>*</span></label>
                                    <div class="col-md-9 field_wrapper addimge" >
                                      <input type="file" class="form-control file_2"  name="file1[]" id="file_1"  onchange="readURL(this);" />
                                    <div class="validation" style="display:none;color:red;"> Upload Minimum or Maximum 3 Files allowed </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label"></label>
                                <div class="col-md-9 " >
                                        <a href="javascript:void(0);" class="add_button" title="Add Photo"><img src="<?php echo base_url();?>media/img/add-icon.png"/></a>
                                </div>
                                </div>
                                <!--<div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>-->
                                <!-- <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Video</label>
                                    <div class="col-md-9">
                                       <input type="file" class="form-control" name="file2" id="file_2"/>
                                        <div class="error"><?php //echo $this->session->flashdata('message'); ?></div>
                                    </div>
                                </div>
                                   -->

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Budget<span>*</span></label>
                                    <div class="col-md-9">
                                         <select class="form-control input-sm" id = "price" name="price">
                                           
                                         <option value="">select your budget</option>

                                        <?php foreach($budget as $row)
                                            { 
                                            ?>
                                            <option value="<?php echo $row->amount;?>"><?php echo $row->amount;?></option>
                                          

                                        <?php } ?>




                                        </select>
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                     <label for="icode" class="col-md-3 control-label">Category<span>*</span></label>
                                     <div class="col-md-9">
                                            <select class="form-control input-sm" id = "job_category" name="job_category">
                                                                    
                                                <?php foreach($job_category as $row)
                                                { 
                                                ?>
                                                <option value="<?php echo $row->id;?>"><?php echo $row->job_category;?></option>
                                                                    
                                                <?php } ?>                                                                                              
                                            </select>
                                    </div>
                                </div>
                          <?php foreach ($result1 as $row){?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label "> Question</label>
                                     <div class="col-md-9">
                                          <?php echo $row->question;?>                          
                                               <input type="hidden"name="question_<?php echo $row->id;?>" value="<?php echo $row->id;?>">                                                       </div>
                                    </div>
            
                            
                                        <?php  $options = $row->options;
                                         $sepOptions = explode(',',$options);
                                         $options_id = $row->question_options_id;
                                         $sepOptions_id = explode(',',$options_id);
                                     ?>
                                <div class="form-group">
                                        <label class="col-md-3 control-label "> Options</label>
                                        <div class="col-md-9">
                                                 <?php foreach($sepOptions as $optn){?>                                             
                                                 <label><input type="radio" name="<?php echo $row->question_type;?>" value="<?php echo $optn;?>" checked> <?php echo $optn;?></label><br>                                                                                                                                   
                                                 <?php } ?>
                                        </div>
                                </div>
                         <?php } ?>
                                <div class="form-group">
                                         <label class="col-md-3 control-label ">Question </label>
                                         <div class="col-md-9"> 
                                            Is there anything the contractor needs to know before they bid your project?
                                            <textarea name="3" class="form-control"></textarea>                                 
                                        </div>
                                </div>
                                   
                                <div class="form-group">
                                        <label for="icode" class="col-md-3 control-label">Project Description<span>*</span></label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" placeholder="Project Description" name="description"></textarea>
                                        </div>
                                </div>  
                                
                                
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Country<span>*</span></label>
                                        <div class="col-md-9">
                                        <select class="form-control" id = "country" name = "country">
                                            
                                                
                                                    <?php foreach($country as $row)
                                                    { 
                                                    ?>
                                            <option value="<?php echo $row->iso;?>"><?php echo $row->country;?></option>
                                                
                                                     <?php } ?>
                                            
                                        </select>
                                            
                                        </div>
                                </div>


                             <div class="state form-group" id ="state1" >
                                    <label for="icode" class="col-md-3 control-label">State<span>*</span></label>
                                    <div class="col-md-9">
                                    <select class="form-control" id="state" name="state">
                                        <option value="">Select State</option>
                                            
                                        <?php foreach($state as $row)
                                        { 
                                        ?>
                                        <option value="<?php echo $row->code;?>"><?php echo $row->name;?></option>
                                            
                                        <?php } ?>
                                        
                                    </select>
                                        
                                    </div>
                            </div>



                                <div class= "counties form-group" id = "counties12" style = "display:none">
                                    <label for="icode" class="col-md-3 control-label">Counties<span>*</span></label>
                                    <div class="col-md-9">
                                    <select class="form-control" id="counties" name = "counties">
                                   
                                        
                                    </select>
                                        
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-2 col-md-9 text-center">
                                            
                                        <input id="btn-signup" type="submit" class="btn btn-default" value="Submit">
                                        <!--<span style="margin-left:8px;">or</span>-->  
                                    </div>
                                </div>
                            </form>
                            
                         </div>
                    </div>
         </div> 
</div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 6; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="file" class="form-control file_2"  name="file1[]" id="file_1"  onchange="readURL(this);" /><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url();?>media/img/remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
    $(".remove_question").click(function(){
        if($('input[id$="opt_1"]')){
            alert("hlo");
        }
    });


$(function() {
    $("#datepicker").datepicker({
        format: 'yyyy-mm-d',
        autoclose: true,
        startDate: 'd'

    });

});









    /*$(function() {

       $( "#datepicker" ).datepicker();

        //minDate: 0;


    $("input.DateFrom").datepicker({
    changeMonth: true, 
    changeYear: true, 
    dateFormat: 'yy-mm-dd',
    maxDate: 'today',
    onSelect: function(dateText) {
        $sD = new Date(dateText);
        $("input#DateTo").datepicker('option', 'minDate', min);
    }
})

   
  });*/
</script>