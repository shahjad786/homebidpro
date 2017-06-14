 <?php
if(isset($result) && count($result)>0)
{

//echo print_r($result);die;


$weekdays = $result->weekdays;
$weekend =  $result->weekend;
$weekdays_time = $result->weekdays_time;
$weekend_time= $result->weekend_time;

$weekend = explode("-",$weekend);
$weekdays = explode("-",$weekdays);
$weekdays_time = explode("-",$weekdays_time);
$weekend_time = explode("-",$weekend_time);

//echo $weekdays[0];
$startDayweekdays = str_replace(" ","",$weekdays[0]);
$endDayweekdays   = str_replace(" ","",$weekdays[1]);

$startDayweekend = str_replace(" ","",$weekend[0]);
$endDayweekend   = str_replace(" ","",$weekend[1]);


$startweekdays_time = str_replace(" ","",$weekdays_time[0]);
$endweekdays_time   = str_replace(" ","",$weekdays_time[1]);

$startweekend_time = str_replace(" ","",$weekend_time[0]);
$endweekend_time   = str_replace(" ","",$weekend_time[1]);



?>


<div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href= "<?php echo base_url();?>admin/dashboard">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo base_url();?>admin/contractor">Manage Contractors</a>
                    
                </li>
            </ul>
 <div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Contractor Business Detail
                </div>
            </div>
            <div class="portlet-body form">
                        
                            <form id ="contractor_business_profile" name = "contractor_business_profile" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url();?>contractor/businessprofile/update" method="POST">
                                
                             
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label"> Starting Weekdays</label>
                                    <div class="col-sm-4">
                                        <select class="form-control input-sm" id = "starting_weekdays" name="starting_weekdays" disabled="disabled">
                                         
                                                
                                                <option value="Monday"    <?php if(isset($startDayweekdays) && $startDayweekdays == 'Monday') echo 'selected';?>>Monday</option>
                                                <option value="Tuesday"   <?php if(isset($startDayweekdays) && $startDayweekdays == 'Tuesday') echo 'selected';?>>Tuesday</option>
                                                <option value="Wednesday" <?php if(isset($startDayweekdays) && $startDayweekdays == 'Wednesday') echo 'selected';?>>Wednesday</option>
                                                <option value="Thursday"  <?php if(isset($startDayweekdays) && $startDayweekdays == 'Thursday') echo 'selected';?>>Thursday</option>
                                                <option value="Friday"    <?php if(isset($startDayweekdays) && $startDayweekdays == 'Friday') echo 'selected';?>>Friday</option>
                                               
                                                                                                                                       
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label"> Ending Weekdays</label>
                                    <div class="col-sm-4">
                                        <select class="form-control input-sm" id = "ending_weekdays" name="ending_weekdays" disabled="disabled">
                                           
                                           <option value="Monday"     <?php if(isset($endDayweekdays) && $endDayweekdays == 'Monday') echo 'selected';?>>Monday</option>
                                            <option value="Tuesday"   <?php if(isset($endDayweekdays) && $endDayweekdays == 'Tuesday') echo 'selected';?>>Tuesday</option>
                                            <option value="Wednesday" <?php if(isset($endDayweekdays) && $endDayweekdays == 'Wednesday') echo 'selected';?>>Wednesday</option>
                                            <option value="Thursday"  <?php if(isset($endDayweekdays) && $endDayweekdays == 'Thursday') echo 'selected';?>>Thursday</option>
                                            <option value="Friday"    <?php if(isset($endDayweekdays) && $endDayweekdays == 'Friday') echo 'selected';?>>Friday</option>                                                                                                                                  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label"> Starting Weekdays Time</label>
                                    <div class="col-sm-4">
                                       <select class="form-control input-sm" id = "starting_weekdays_time" name="starting_weekdays_time" disabled="disabled">
                                         
                                            <option value="00:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '00:00am') echo 'selected';?>>00:00am</option>
                                            <option value="01:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '01:00am') echo 'selected';?>>01:00am</option>
                                            <option value="02:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '02:00am') echo 'selected';?>>02:00am</option>
                                            <option value="03:00am" <?php if(isset($startweekdays_time)  && $startweekdays_time == '03:00am') echo 'selected';?>>03:00am</option>
                                            <option value="04:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '04:00am') echo 'selected';?>>04:00am</option>
                                            <option value="05:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '05:00am') echo 'selected';?>>05:00am</option>
                                            <option value="06:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '06:00am') echo 'selected';?>>06:00am</option>
                                            <option value="07:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '07:00am') echo 'selected';?>>07:00am</option>
                                            <option value="08:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '08:00am') echo 'selected';?>>08:00am</option>
                                            <option value="09:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '09:00am') echo 'selected';?>>09:00am</option>
                                            <option value="10:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '10:00am') echo 'selected';?>>10:00am</option>
                                            <option value="11:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '11:00am') echo 'selected';?>>11:00am</option>
                                            <option value="12:00pm" <?php if(isset($startweekdays_time) && $startweekdays_time == '12:00pm') echo 'selected';?>>12:00pm</option>
                                            <option value="01:00pm" <?php if(isset($startweekdays_time) && $startweekdays_time == '01:00pm') echo 'selected';?>>01:00pm</option>
                                            <option value="02:00pm" <?php if(isset($startweekdays_time) && $startweekdays_time == '02:00pm') echo 'selected';?>>02:00pm</option>
                                            <option value="03:00m"  <?php if(isset($startweekdays_time) && $startweekdays_time == '03:00pm') echo 'selected';?>>03:00pm</option>
                                            <option value="04:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '04:00pm') echo 'selected';?>>04:00pm</option>
                                            <option value="05:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '05:00pm') echo 'selected';?>>05:00pm</option>
                                            <option value="06:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '06:00pm') echo 'selected';?>>06:00pm</option>
                                            <option value="07:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '07:00pm') echo 'selected';?>>07:00pm</option>
                                            <option value="08:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '08:00pm') echo 'selected';?>>08:00pm</option>
                                            <option value="09:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '09:00pm') echo 'selected';?>>09:00pm</option>
                                            <option value="10:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '10:00pm') echo 'selected';?>>10:00pm</option>
                                            <option value="11:00am" <?php if(isset($startweekdays_time) && $startweekdays_time == '11:00pm') echo 'selected';?>>11:00pm</option>

                                        </select>
                                    </div>
                                </div>


                               
                                
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label"> Ending Weekdays Time</label>
                                    <div class="col-sm-4">
                                       <select class="form-control input-sm" id = "ending_weekdays_time" name="ending_weekdays_time" disabled="disabled">
                                            <option value="00:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '00:00am') echo 'selected';?>>00:00am</option>
                                            <option value="01:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '01:00am') echo 'selected';?>>01:00am</option>
                                            <option value="02:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '02:00am') echo 'selected';?>>02:00am</option>
                                            <option value="03:00am" <?php if(isset($endweekdays_time)  && $endweekdays_time == '03:00am') echo 'selected';?>>03:00am</option>
                                            <option value="04:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '04:00am') echo 'selected';?>>04:00am</option>
                                            <option value="05:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '05:00am') echo 'selected';?>>05:00am</option>
                                            <option value="06:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '06:00am') echo 'selected';?>>06:00am</option>
                                            <option value="07:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '07:00am') echo 'selected';?>>07:00am</option>
                                            <option value="08:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '08:00am') echo 'selected';?>>08:00am</option>
                                            <option value="09:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '09:00am') echo 'selected';?>>09:00am</option>
                                            <option value="10:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '10:00am') echo 'selected';?>>10:00am</option>
                                            <option value="11:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '11:00am') echo 'selected';?>>11:00am</option>
                                            <option value="12:00pm" <?php if(isset($endweekdays_time) && $endweekdays_time == '12:00pm') echo 'selected';?>>12:00pm</option>
                                            <option value="01:00pm" <?php if(isset($endweekdays_time) && $endweekdays_time == '01:00pm') echo 'selected';?>>01:00pm</option>
                                            <option value="02:00pm" <?php if(isset($endweekdays_time) && $endweekdays_time == '02:00pm') echo 'selected';?>>02:00pm</option>
                                            <option value="03:00m"  <?php if(isset($endweekdays_time) && $endweekdays_time == '03:00pm') echo 'selected';?>>03:00pm</option>
                                            <option value="04:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '04:00pm') echo 'selected';?>>04:00pm</option>
                                            <option value="05:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '05:00pm') echo 'selected';?>>05:00pm</option>
                                            <option value="06:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '06:00pm') echo 'selected';?>>06:00pm</option>
                                            <option value="07:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '07:00pm') echo 'selected';?>>07:00pm</option>
                                            <option value="08:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '08:00pm') echo 'selected';?>>08:00pm</option>
                                            <option value="09:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '09:00pm') echo 'selected';?>>09:00pm</option>
                                            <option value="10:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '10:00pm') echo 'selected';?>>10:00pm</option>
                                            <option value="11:00am" <?php if(isset($endweekdays_time) && $endweekdays_time == '11:00pm') echo 'selected';?>>11:00pm</option>
                                       </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label"> Starting Weekend</label>
                                    <div class="col-sm-4">
                                        <select class="form-control input-sm" id = "starting_weekend" name="starting_weekend" disabled="disabled">
                                                  
                                                  <option value="Saturday" <?php if(isset($startDayweekend) && $startDayweekend == 'Saturday') echo 'selected';?>>Saturday</option>
                                                  <option value="Sunday" <?php if(isset($startDayweekend) && $startDayweekend == 'Sunday') echo 'selected';?>>Sunday</option>                                                                                          
                                        </select>
                                    
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label"> End Weekend</label>
                                    <div class="col-sm-4">
                                        <select class="form-control input-sm" id = "end_weekend" name="end_weekend" disabled="disabled">
                                                 
                                                  <option value="Saturday" <?php if(isset($endDayweekend) && $endDayweekend == 'Saturday') echo 'selected';?>>Saturday</option>
                                                  <option value="Sunday" <?php if(isset($endDayweekend) && $endDayweekend == 'Sunday') echo 'selected';?>>Sunday</option>                                                                                          
                                        </select>
                                    
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Starting Weekend Time</label>
                                    <div class="col-sm-4">
                                         <select class="form-control input-sm" id = "starting_weekend_time" name="starting_weekend_time" disabled="disabled">
                                            <option value="00:00am" <?php if(isset($startweekend_time) && $startweekend_time == '00:00am') echo 'selected';?>>00:00am</option>
                                            <option value="01:00am" <?php if(isset($startweekend_time) && $startweekend_time == '01:00am') echo 'selected';?>>01:00am</option>
                                            <option value="02:00am" <?php if(isset($startweekend_time) && $startweekend_time == '02:00am') echo 'selected';?>>02:00am</option>
                                            <option value="03:00am" <?php if(isset($startweekend_time)  && $startweekend_time == '03:00am') echo 'selected';?>>03:00am</option>
                                            <option value="04:00am" <?php if(isset($startweekend_time) && $startweekend_time == '04:00am') echo 'selected';?>>04:00am</option>
                                            <option value="05:00am" <?php if(isset($startweekend_time) && $startweekend_time == '05:00am') echo 'selected';?>>05:00am</option>
                                            <option value="06:00am" <?php if(isset($startweekend_time) && $startweekend_time == '06:00am') echo 'selected';?>>06:00am</option>
                                            <option value="07:00am" <?php if(isset($startweekend_time) && $startweekend_time == '07:00am') echo 'selected';?>>07:00am</option>
                                            <option value="08:00am" <?php if(isset($startweekend_time) && $startweekend_time == '08:00am') echo 'selected';?>>08:00am</option>
                                            <option value="09:00am" <?php if(isset($startweekend_time) && $startweekend_time == '09:00am') echo 'selected';?>>09:00am</option>
                                            <option value="10:00am" <?php if(isset($startweekend_time) && $startweekend_time == '10:00am') echo 'selected';?>>10:00am</option>
                                            <option value="11:00am" <?php if(isset($startweekend_time) && $startweekend_time == '11:00am') echo 'selected';?>>11:00am</option>
                                            <option value="12:00pm" <?php if(isset($startweekend_time) && $startweekend_time == '12:00pm') echo 'selected';?>>12:00pm</option>
                                            <option value="01:00pm" <?php if(isset($startweekend_time) && $startweekend_time == '01:00pm') echo 'selected';?>>01:00pm</option>
                                            <option value="02:00pm" <?php if(isset($startweekend_time) && $startweekend_time == '02:00pm') echo 'selected';?>>02:00pm</option>
                                            <option value="03:00m"  <?php if(isset($startweekend_time) && $startweekend_time == '03:00pm') echo 'selected';?>>03:00pm</option>
                                            <option value="04:00am" <?php if(isset($startweekend_time) && $startweekend_time == '04:00pm') echo 'selected';?>>04:00pm</option>
                                            <option value="05:00am" <?php if(isset($startweekend_time) && $startweekend_time == '05:00pm') echo 'selected';?>>05:00pm</option>
                                            <option value="06:00am" <?php if(isset($startweekend_time) && $startweekend_time == '06:00pm') echo 'selected';?>>06:00pm</option>
                                            <option value="07:00am" <?php if(isset($startweekend_time) && $startweekend_time == '07:00pm') echo 'selected';?>>07:00pm</option>
                                            <option value="08:00am" <?php if(isset($startweekend_time) && $startweekend_time == '08:00pm') echo 'selected';?>>08:00pm</option>
                                            <option value="09:00am" <?php if(isset($startweekend_time) && $startweekend_time == '09:00pm') echo 'selected';?>>09:00pm</option>
                                            <option value="10:00am" <?php if(isset($startweekend_time) && $startweekend_time == '10:00pm') echo 'selected';?>>10:00pm</option>
                                            <option value="11:00am" <?php if(isset($startweekend_time) && $startweekend_time == '11:00pm') echo 'selected';?>>11:00pm</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                

                                   
                                 <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">End Weekend Time</label>
                                    <div class="col-sm-4">
                                         <select class="form-control input-sm" id = "end_weekend_time" name="end_weekend_time" disabled="disabled">
                                            <option value="00:00am" <?php if(isset($endweekend_time) && $endweekend_time == '00:00am') echo 'selected';?>>00:00am</option>
                                            <option value="01:00am" <?php if(isset($endweekend_time) && $endweekend_time == '01:00am') echo 'selected';?>>01:00am</option>
                                            <option value="02:00am" <?php if(isset($endweekend_time) && $endweekend_time == '02:00am') echo 'selected';?>>02:00am</option>
                                            <option value="03:00am" <?php if(isset($endweekend_time)  && $endweekend_time == '03:00am') echo 'selected';?>>03:00am</option>
                                            <option value="04:00am" <?php if(isset($endweekend_time) && $endweekend_time == '04:00am') echo 'selected';?>>04:00am</option>
                                            <option value="05:00am" <?php if(isset($endweekend_time) && $endweekend_time == '05:00am') echo 'selected';?>>05:00am</option>
                                            <option value="06:00am" <?php if(isset($endweekend_time) && $endweekend_time == '06:00am') echo 'selected';?>>06:00am</option>
                                            <option value="07:00am" <?php if(isset($endweekend_time) && $endweekend_time == '07:00am') echo 'selected';?>>07:00am</option>
                                            <option value="08:00am" <?php if(isset($endweekend_time) && $endweekend_time == '08:00am') echo 'selected';?>>08:00am</option>
                                            <option value="09:00am" <?php if(isset($endweekend_time) && $endweekend_time == '09:00am') echo 'selected';?>>09:00am</option>
                                            <option value="10:00am" <?php if(isset($endweekend_time) && $endweekend_time == '10:00am') echo 'selected';?>>10:00am</option>
                                            <option value="11:00am" <?php if(isset($endweekend_time) && $endweekend_time == '11:00am') echo 'selected';?>>11:00am</option>
                                            <option value="12:00pm" <?php if(isset($endweekend_time) && $endweekend_time == '12:00pm') echo 'selected';?>>12:00pm</option>
                                            <option value="01:00pm" <?php if(isset($endweekend_time) && $endweekend_time == '01:00pm') echo 'selected';?>>01:00pm</option>
                                            <option value="02:00pm" <?php if(isset($endweekend_time) && $endweekend_time == '02:00pm') echo 'selected';?>>02:00pm</option>
                                            <option value="03:00m"  <?php if(isset($endweekend_time) && $endweekend_time == '03:00pm') echo 'selected';?>>03:00pm</option>
                                            <option value="04:00am" <?php if(isset($endweekend_time) && $endweekend_time == '04:00pm') echo 'selected';?>>04:00pm</option>
                                            <option value="05:00am" <?php if(isset($endweekend_time) && $endweekend_time == '05:00pm') echo 'selected';?>>05:00pm</option>
                                            <option value="06:00am" <?php if(isset($endweekend_time) && $endweekend_time == '06:00pm') echo 'selected';?>>06:00pm</option>
                                            <option value="07:00am" <?php if(isset($endweekend_time) && $endweekend_time == '07:00pm') echo 'selected';?>>07:00pm</option>
                                            <option value="08:00am" <?php if(isset($endweekend_time) && $endweekend_time == '08:00pm') echo 'selected';?>>08:00pm</option>
                                            <option value="09:00am" <?php if(isset($endweekend_time) && $endweekend_time == '09:00pm') echo 'selected';?>>09:00pm</option>
                                            <option value="10:00am" <?php if(isset($endweekend_time) && $endweekend_time == '10:00pm') echo 'selected';?>>10:00pm</option>
                                            <option value="11:00am" <?php if(isset($endweekend_time) && $endweekend_time == '11:00pm') echo 'selected';?>>11:00pm</option>

                                          </select>
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Total Employee</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="employee" id="employee" value ="<?php echo $result->employee;?>" placeholder="Total Employee" disabled="disabled">
                                    </div>
                                </div> 

                            </form>
                         </div>
                    </div>
         </div> 
    </div>

<?php } else{


            echo "No Business Detail Available";




   } ?>
<style>

#loginbox #signIn a{


   color: white !important;


}




    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    $( document ).ready(function(){
        //alert("hlo");
    $("#password").keyup(function(){
       // alert("hlo");
        var email=$("#email").val();
        //alert(email);
        var url = "<?php echo base_url();?>contractor/signup/check_email";
         $.ajax({

          type:"POST",  
          url: url,
          data: {email:email},

          success: function(data)
          {
            //alert(data);
            if(data == 'b') {

               // alert(data);

               $("#error").html('Email already exists'); 
                $('input[type="submit"]').attr('disabled','disabled');
            }   else{
                 $("#error").html(''); 
                 $('input[type="submit"]').removeAttr('disabled');
            }   
          }
        });

    });
});
    </script>
 
    
    
