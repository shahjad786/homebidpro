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
<?php //foreach($result as $key => $value);?>
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
                            <div class="panel-title">Create Business Working Hours</div>
                        </div>  
                        <div class="panel-body" >
                          <form id ="contractor_business_profile" name = "contractor_business_profile" class="form-horizontal" role="form" action="<?php echo base_url();?>contractor/businessprofile/insertdata" method="POST">
                                
                             
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="firstname" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Starting Weekdays</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control input-sm" id = "starting_weekdays" name="starting_weekdays">
                                         
                                                <option value="">Select Starting Weekday</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                               
                                                                                                                                       
                                        </select>
                                    </div>
                                </div>
                                
                              <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="firstname" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Ending Weekdays</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control input-sm" id = "ending_weekdays" name="ending_weekdays">
                                               <option value="">Select Ending Weekdays day</option>
                                               <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>                                                                                                                                  
                                        </select>
                                    </div>
                                </div>

                               <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="password" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Starting Weekdays Time</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                       <select class="form-control input-sm" id = "starting_weekdays_time" name="starting_weekdays_time">
                                            <option value="">Select Starting Weekday Time</option>
                                           
                                            <option value="00:00am">00:00am</option>
                                            <option value="01:00am">01:00am</option>
                                            <option value="02:00am">02:00am</option>
                                            <option value="03:00m">03:00am</option>
                                            <option value="04:00am">04:00am</option>
                                            <option value="05:00am">05:00am</option>
                                            <option value="06:00am">06:00am</option>
                                            <option value="07:00am">07:00am</option>
                                            <option value="08:00am">08:00am</option>
                                            <option value="09:00am">09:00am</option>
                                            <option value="10:00am">10:00am</option>
                                            <option value="11:00am">11:00am</option>
                                            <option value="12:00pm">12:00pm</option>
                                            <option value="01:00pm">01:00pm</option>
                                            <option value="02:00pm">02:00pm</option>
                                            <option value="03:00m">03:00pm</option>
                                            <option value="04:00am">04:00pm</option>
                                            <option value="05:00am">05:00pm</option>
                                            <option value="06:00am">06:00pm</option>
                                            <option value="07:00am">07:00pm</option>
                                            <option value="08:00am">08:00pm</option>
                                            <option value="09:00am">09:00pm</option>
                                            <option value="10:00am">10:00pm</option>
                                            <option value="11:00am">11:00pm</option>

                                        </select>
                                    </div>
                                </div>


                                
                                
                               <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="password" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Ending Weekdays Time</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                       <select class="form-control input-sm" id = "ending_weekdays_time" name="ending_weekdays_time">
                                       <option value="">Select Ending Weekday Time</option>
                                           
                                            <option value="00:00am">00:00am</option>
                                            <option value="01:00am">01:00am</option>
                                            <option value="02:00am">02:00am</option>
                                            <option value="03:00m">03:00am</option>
                                            <option value="04:00am">04:00am</option>
                                            <option value="05:00am">05:00am</option>
                                            <option value="06:00am">06:00am</option>
                                            <option value="07:00am">07:00am</option>
                                            <option value="08:00am">08:00am</option>
                                            <option value="09:00am">09:00am</option>
                                            <option value="10:00am">10:00am</option>
                                            <option value="11:00am">11:00am</option>
                                            <option value="12:00pm">12:00pm</option>
                                            <option value="01:00pm">01:00pm</option>
                                            <option value="02:00pm">02:00pm</option>
                                            <option value="03:00m">03:00pm</option>
                                            <option value="04:00am">04:00pm</option>
                                            <option value="05:00am">05:00pm</option>
                                            <option value="06:00am">06:00pm</option>
                                            <option value="07:00am">07:00pm</option>
                                            <option value="08:00am">08:00pm</option>
                                            <option value="09:00am">09:00pm</option>
                                            <option value="10:00am">10:00pm</option>
                                            <option value="11:00am">11:00pm</option>

                                        </select>
                                    </div>
                                </div>


                               <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="email" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> Starting Weekend</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control input-sm" id = "starting_weekend" name="starting_weekend">
                                                  <option value="">Select Starting Weekend days</option>
                                                  <option value="Saturday">Saturday</option>
                                                  <option value="Sunday">Sunday</option>                                                                                          
                                        </select>
                                    
                                    </div>
                                </div>

                                 <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="email" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label"> End Weekend</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control input-sm" id = "end_weekend" name="end_weekend">
                                                 <option value="">Select End Weekend days</option>
                                                  <option value="Saturday">Saturday</option>
                                                  <option value="Sunday">Sunday</option>                                                                                          
                                        </select>
                                    
                                    </div>
                                </div>
                                
                                  <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="icode" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label">Starting Weekend Time</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                         <select class="form-control input-sm" id = "starting_weekend_time" name="starting_weekend_time">
                                          <option value="">Select Starting Weekend Time</option>
                                           
                                            <option value="00:00am">00:00am</option>
                                            <option value="01:00am">01:00am</option>
                                            <option value="02:00am">02:00am</option>
                                            <option value="03:00m">03:00am</option>
                                            <option value="04:00am">04:00am</option>
                                            <option value="05:00am">05:00am</option>
                                            <option value="06:00am">06:00am</option>
                                            <option value="07:00am">07:00am</option>
                                            <option value="08:00am">08:00am</option>
                                            <option value="09:00am">09:00am</option>
                                            <option value="10:00am">10:00am</option>
                                            <option value="11:00am">11:00am</option>
                                            <option value="12:00pm">12:00pm</option>
                                            <option value="01:00pm">01:00pm</option>
                                            <option value="02:00pm">02:00pm</option>
                                            <option value="03:00m">03:00pm</option>
                                            <option value="04:00am">04:00pm</option>
                                            <option value="05:00am">05:00pm</option>
                                            <option value="06:00am">06:00pm</option>
                                            <option value="07:00am">07:00pm</option>
                                            <option value="08:00am">08:00pm</option>
                                            <option value="09:00am">09:00pm</option>
                                            <option value="10:00am">10:00pm</option>
                                            <option value="11:00am">11:00pm</option>
                                                                                       
                                        </select>
                                    </div>
                                </div>
                                

                                   
                                   <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="icode" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label">End Weekend Time</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                         <select class="form-control input-sm" id = "end_weekend_time" name="end_weekend_time">
                                           <option value="">Select End Weekend Time</option>
                                            
                                            <option value="00:00am">00:00am</option>
                                            <option value="01:00am">01:00am</option>
                                            <option value="02:00am">02:00am</option>
                                            <option value="03:00m">03:00am</option>
                                            <option value="04:00am">04:00am</option>
                                            <option value="05:00am">05:00am</option>
                                            <option value="06:00am">06:00am</option>
                                            <option value="07:00am">07:00am</option>
                                            <option value="08:00am">08:00am</option>
                                            <option value="09:00am">09:00am</option>
                                            <option value="10:00am">10:00am</option>
                                            <option value="11:00am">11:00am</option>
                                            <option value="12:00pm">12:00pm</option>
                                            <option value="01:00pm">01:00pm</option>
                                            <option value="02:00pm">02:00pm</option>
                                            <option value="03:00m">03:00pm</option>
                                            <option value="04:00am">04:00pm</option>
                                            <option value="05:00am">05:00pm</option>
                                            <option value="06:00am">06:00pm</option>
                                            <option value="07:00am">07:00pm</option>
                                            <option value="08:00am">08:00pm</option>
                                            <option value="09:00am">09:00pm</option>
                                            <option value="10:00am">10:00pm</option>
                                            <option value="11:00am">11:00pm</option>
                                                                                       
                                        </select>
                                    </div>
                                </div>
 
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label for="password" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label">Total Employee</label>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="employee" id="employee" placeholder="Total Employee">
                                    </div>
                                </div> 


                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        
                                    </div>
                                </div>







                              <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                          <input id="btn-signup" id="submit" type="submit" value = "Submit" class="btn btn-info">
                                        <!--<span style="margin-left:8px;">or</span>-->  
                                    </div>
                            </div>

                            </form>

                         </div>
                    </div>
         </div> 
</div>
</div> 
 <style>
   
   /* .form-group{
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