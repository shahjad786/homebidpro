 <?php

//foreach ($result as $row); 
 
//echo "<pre>";print_r($result);

if(isset($result) && count($result)>0){
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
}

//var_dump('startDay');die;
/*echo $weekend[0];
echo $weekend[1];


echo $weekdays[0];
echo $weekdays[1];

echo $weekdays_time[0];
echo $weekdays_time[1];

echo $weekend_time[0];
echo $weekend_time[1];*/




//die;
  

 ?>
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
<?php foreach($result as $key => $value);?>
 <div class="container"> 
     <div class="dashboard_heading">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Business Profile</h1>
        </div>
      </div>

    </div>
        <div class="col-md-2 col-sm-12 left-box-link" style="border-radius: 4px; padding-top: 9px; color: rgb(0, 0, 0); background: none repeat scroll 0px 0px rgb(249, 249, 249); border: 1px solid rgb(49, 112, 143);">
                                    <ul class="sidebar-nav">
                                        
                                     </ul> 
             </div>
        <div id="loginbox"  margin-top:50px class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Edit Business Working Hours</div>
                        </div>  
                        <div class="panel-body" >
                           <form id ="contractor_business_profile" name = "contractor_business_profile" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url();?>contractor/businessprofile/update" method="POST">
                                
                             
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="firstname" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Starting Weekday</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control input-sm" id = "starting_weekdays" name="starting_weekdays">
                                         
                                                
                                                <option value="Monday" <?php if(isset($startDayweekdays) && $startDayweekdays == 'Monday') echo 'selected';?>>Monday</option>
                                                <option value="Tuesday" <?php if(isset($startDayweekdays) && $startDayweekdays == 'Tuesday') echo 'selected';?>>Tuesday</option>
                                                <option value="Wednesday" <?php if(isset($startDayweekdays) && $startDayweekdays == 'Wednesday') echo 'selected';?>>Wednesday</option>
                                                <option value="Thursday" <?php if(isset($startDayweekdays) && $startDayweekdays == 'Thursday') echo 'selected';?>>Thursday</option>
                                                <option value="Friday" <?php if(isset($startDayweekdays) && $startDayweekdays == 'Friday') echo 'selected';?>>Friday</option>
                                               
                                                                                                                                       
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="firstname" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Ending Weekday</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control input-sm" id = "ending_weekdays" name="ending_weekdays">
                                               
                                               <option value="Monday" <?php if(isset($endDayweekdays) && $endDayweekdays == 'Monday') echo 'selected';?>>Monday</option>
                                                <option value="Tuesday" <?php if(isset($endDayweekdays) && $endDayweekdays == 'Tuesday') echo 'selected';?>>Tuesday</option>
                                                <option value="Wednesday" <?php if(isset($endDayweekdays) && $endDayweekdays == 'Wednesday') echo 'selected';?>>Wednesday</option>
                                                <option value="Thursday" <?php if(isset($endDayweekdays) && $endDayweekdays == 'Thursday') echo 'selected';?>>Thursday</option>
                                                <option value="Friday" <?php if(isset($endDayweekdays) && $endDayweekdays == 'Friday') echo 'selected';?>>Friday</option>                                                                                                                                  
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="password" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Starting Weekday Time</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                       <select class="form-control input-sm" id = "starting_weekdays_time" name="starting_weekdays_time">
                                         
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


                               
                                
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="password" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Ending Weekday Time</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                       <select class="form-control input-sm" id = "ending_weekdays_time" name="ending_weekdays_time">
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


                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="email" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Starting Weekend</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control input-sm" id = "starting_weekend" name="starting_weekend">
                                                  
                                                  <option value="Saturday" <?php if(isset($startDayweekend) && $startDayweekend == 'Saturday') echo 'selected';?>>Saturday</option>
                                                  <option value="Sunday" <?php if(isset($startDayweekend) && $startDayweekend == 'Sunday') echo 'selected';?>>Sunday</option>                                                                                          
                                        </select>
                                    
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="email" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> End Weekend</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control input-sm" id = "end_weekend" name="end_weekend">
                                                 
                                                  <option value="Saturday" <?php if(isset($endDayweekend) && $endDayweekend == 'Saturday') echo 'selected';?>>Saturday</option>
                                                  <option value="Sunday" <?php if(isset($endDayweekend) && $endDayweekend == 'Sunday') echo 'selected';?>>Sunday</option>                                                                                          
                                        </select>
                                    
                                    </div>
                                </div>
                                 <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="icode" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label">Starting Weekend Time</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                         <select class="form-control input-sm" id = "starting_weekend_time" name="starting_weekend_time">
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
                                

                                   
                                 <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="icode" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label">End Weekend Time</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                         <select class="form-control input-sm" id = "end_weekend_time" name="end_weekend_time">
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
 
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="password" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label">Total Employee</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        
                                        <input type="text" class="form-control" name="employee" id="employee" value ="<?php if(isset($result->employee) && count($result->employee)>0) { echo $result->employee; }?>" placeholder="Total Employee">
                                    
                                    </div>
                                </div> 

                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        
                                    </div>
                                </div>








                                 <div class="buttonrow">
                                    <!-- Button -->                                        
                                    
                                          <input id="btn-signup" id="submit" type="submit" value = "Submit" class="btn btn-info">
                                        <!--<span style="margin-left:8px;">or</span>-->  
                                    
                                </div>





                            </form>
                         </div>
                    </div>
         </div> 
</div>
</div> 
    <style>
    /*
    .form-group{
        width:50%;
        float:left;
    }
    label.col-md-3.control-label {
    width: 50%;
    }
    .col-md-9 {
        width: 30%;
    }
    .form-horizontal .form-group {
    margin-right: 0 !important;
    margin-left: 0 !important;
    } */
    .help-block {
  color: hsl(0, 0%, 45%);
  display: block;
  margin-bottom: 0 !important;
  margin-top: 0 !important;
}
    </style>
