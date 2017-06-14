var FormValidation = function () {

    // basic validation
    var borderPostValidation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#addNewPost');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    border_post_name: {
                        minlength: 2,
                        required: true
                    },
                    post_id: {
                        required: true
                        
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
					form[0].submit();
                }
            });


    } // basic validation

	var suspectValidate = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#addNewSuspect');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    first_name: {
                        minlength: 2,
                        required: true
                    },
                    last_name: {
                        required: true
                        
                    },
                    dob: {
                        required: true
                        
                    },
                    identification_number: {
                        required: true
                        
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
					form[0].submit();
                }
            });


    } // basic validation
	
	var offenseValidate = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#addOffense');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                   offense_name: {
                        minlength: 2,
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
					form[0].submit();
                }
            });


    } // basic validation

	// basic validation
    var userCreate = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#userCreate');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);
			var href = window.location.href; 
			var lastSegment = href.substr(href.lastIndexOf('/') + 1);
            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					 
					/*role_id: {
                       
                        required: true
                    },
					service_id: {
                       
                        required: function(element) {
									
								if ( jQuery("#role_id :selected").val() == 1 ) {
									
									return true;
									
								} else if( jQuery("#role_id :selected").val() == "" ) {
									
									return true;
									
								} else {
									
									return false;
									
								} 
						}
						
                    },
                    location_id: {
						
						required: function(element) {
									
								if ( jQuery("#role_id :selected").val() != 5 && jQuery("#role_id :selected").val() != 6 ) {
									
									return true;
									
								} else if( jQuery("#role_id :selected").val() == "" ){
									
									return true;
									
								} else {
									
									return false;
									
								} 
							}
                    },
					store_id: {
                       
                        required: function(element) {
									
								if ( jQuery("#role_id :selected").val() == 1 || jQuery("#role_id :selected").val() == 2 ) {
									
									return true;
									
								} else if( jQuery("#role_id :selected").val() == "" ){
									
									return true;
									
								} else {
									
									return false;
									
								} 
							}
						
                    },
					posted_country: {
                       
                        required: function(element) {
									
								if ( jQuery("#role_id :selected").val() == 5 || jQuery("#role_id :selected").val() == 6 ) {
									
									return true;
									
								} else if( jQuery("#role_id :selected").val() == "" ){
									
									return true;
									
								} else {
									
									return false;
									
								} 
							}
						
                    },email: {
                       
                        required: true,
						email:true
                    },
					first_name: {
                       
                        required: true
					},
					last_name: {
                       
                        required: true
					},
					phone_number: {
                       
                        required: true,
						digits: true
					},
					street: {
                       
                        required: true
					},
					country_id: {
                       
                        required: true
						
					},
					state: {
                       
                        required: true
						
					},
					password: {
                       
                        required: function(element) {
									
								if ( jQuery("#role_id :selected").val() != 1 ) {
									
									return true;
									
								} else if( jQuery("#role_id :selected").val() == "" ){
									
									return true;
									
								} else {
									
									return false;
									
								} 
							}
						
					},
					status: {
                       
                        required: true
						
					}*/
                },
				 messages: {
					 
                    // visitor_picture: "Visitor/Traveller Picture is required",
                     //traveling_document_picture: "Traveller Document Picture is required"
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

              submitHandler: function (form) {
                    /*success1.show();
                    error1.hide();
						form[0].submit();*/
						
						
					var url = $("#link").val();
					var url1 = $("#editlink").val();	
                   // alert(url1);					
					var id = $("#id1").val();
				    var role_id = $("#role_id").val();
                	//var role_id= $("#role_id").val();
					var service_id =$("#service_id").val();
					var location_id =$("#location_id").val();
					var store_id =$("#store_id").val();
					var posted_id =$("#posted_id").val();
					var email =$("#email").val();
					var first_name =$("#first_name").val();
					var last_name =$("#last_name").val();
					var sex = $("input[name='sex']:checked").val();
					var phone_number =$("#phone_number").val();
					var street =$("#street").val();
					var state =$("#state").val();
					var country_id =$("#country_id").val();
					var password =$("#password").val();
					var status =$("#status").val();
					//alert(email);
					//alert(status);
					
					if(url){
						$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/employees/userCreate.php',
							data: {role_id:role_id,service_id:service_id,location_id:location_id,posted_id:posted_id,email:email,first_name:first_name,last_name:last_name,sex:sex,phone_number:phone_number,street:street,state:state,country_id:country_id,password:password,status:status,store_id:store_id},
							success: function(reponse){
									//alert(reponse);
									if(reponse=="done")
									{								
										window.location.href = "http://127.0.0.1:51915/employees/index.php";	

									}
									else{
										
										alert("wrong credencial")
									}
								
								},
									
									
						});
					}											
			 if(url1)
					{
						//alert("shazad");
					$.ajax({
						type: 'POST',
						
						url: 'http://127.0.0.1:51915/employees/userEdit.php',
						data: {id:id,role_id:role_id,location_id:location_id,store_id:store_id,posted_id:posted_id,email:email,
						     first_name:first_name,last_name:last_name,sex:sex,phone_number:phone_number,street:street,state:state,country_id:country_id,password:password,status:status},
						success: function(reponse){

							if(reponse=="done")
							{
							window.location.href = "http://127.0.0.1:51915/employees/index.php";


							}
							else{
								
								alert("wrong credencial");
							}

						},
						
						
					});
			    } 
			  
			  
			  
			  
			  
			  
			  
			  
			  
						//return false;
					}
            });


    } // basic validation
	
	// basic validation
    var createStore = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#createStore');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					store_name: {
                       
                        required: true
                    },
					street: {
                        
                        required: true
                    },
					location_id: {
                        
                        required: true,
						
                    },
					status: {
                       
                        required: true
                    }	
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    /* success1.show();
                    error1.hide();
					form[0].submit(); */
					
					
					
					var urlCreate = $("#link").val();
					var urlEdit = $("#editlink").val();
					var id = $("#id1").val();
					var store_name =$("#store_name").val();
					var location_id = $("#location_id").val();
					var status =$("#status").val();
					var street =$("#street").val();
					
					/* alert(store_name);
					alert(location_id);
					alert(status);
					alert(street);
					 */
					if(urlCreate){
					$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/stores/storeCreate.php',
							data: {store_name:store_name,location_id:location_id,status:status,street:street},
							success: function(reponse){
									//alert(reponse);
									if($.trim(reponse) == "done")
									{								
										window.location.href = "http://127.0.0.1:51915/stores/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
						
					}	
					
					if(urlEdit){
						$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/stores/storeEdit.php',
							data: {id:id,store_name:store_name,location_id:location_id,status:status,street:street},
							success: function(reponse){
									//alert(reponse);
									if(reponse=="done")
									{								
										window.location.href = "http://127.0.0.1:51915/stores/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
					}			
                }
            });


    } // basic validation
	
	
	var createLocation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert("shazad");
            var form1 = $('#createLocation');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					zip_code: {
                       
                        required: true,
                    },
					city: {
                        
                        required: true,
                    },
					state: {
                        
                        required: true,
						
                    },
					country_id: {
                       
                        required: true,
                    },
					status: {
                       
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    /* success1.show();
                    error1.hide();
					form[0].submit(); */
					
					
					
					var urlCreate = $("#link").val();
					var urlEdit = $("#editlink").val();
					var id = $("#id1").val();
					var zip_code =$("#zip_code").val();
					var city = $("#city").val();
					var state =$("#state").val();
					var country_id =$("#country_id").val();
					var status =$("#status").val();
					
				//	alert(country_id);

					/* alert(store_name);
					alert(location_id);
					alert(status);
					alert(street);
					 */
					if(urlCreate){
					$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/locations/locationCreate.php',
							data: {zip_code:zip_code,city:city,state:state,country_id:country_id,status:status},
							success: function(reponse){
									//alert(reponse);
									if($.trim(reponse) == "done")
									{								
										window.location.href = "http://127.0.0.1:51915/locations/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
						
					}	
					
					if(urlEdit){
						$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/locations/locationEdit.php',
							data: {id:id,zip_code:zip_code,city:city,state:state,country_id:country_id,status:status},
							success: function(reponse){
									//alert(reponse);
									if(reponse=="done")
									{								
										window.location.href = "http://127.0.0.1:51915/locations/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
					}			
                }
            });


    } // basic validation
	
	
	var createCustomers = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert("shazad");
            var form1 = $('#createCustomers');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					store_id: {
                       
                        required: true,
                    },
					first_name: {
                        
                        required: true,
                    },
					last_name: {
                        
                        required: true,
						
                    },
					phone_number: {
                       
                        required: true,
                    },
					email: {
                       
                        required: true,
                    },
					address:{
						
						required: true
						
					}
					
					
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    /* success1.show();
                    error1.hide();
					form[0].submit(); */
					
					
					
					var urlCreate = $("#link").val();
					var urlEdit = $("#editlink").val();
					var id = $("#id1").val();
					var store_id =$("#store_id").val();
					var first_name = $("#first_name").val();
					var last_name =$("#last_name").val();
					var phone_number =$("#phone_number").val();
					var email =$("#email").val();
					var address =$("#address").val();
					var status =$("#status").val();

					/* alert(store_name);
					alert(location_id);
					alert(status);
					alert(street);
					 */
					if(urlCreate){
					$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/customers/customerCreate.php',
							data: {store_id:store_id,first_name:first_name,last_name:last_name,phone_number:phone_number,email:email,address:address},
							success: function(reponse){
									//alert(reponse);
									if($.trim(reponse) == "done")
									{								
										window.location.href = "http://127.0.0.1:51915/customers/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
						
					}	
					
					if(urlEdit){
						$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/customers/customerEdit.php',
							data: {id:id,store_id:store_id,first_name:first_name,last_name:last_name,phone_number:phone_number,email:email,address:address},
							success: function(reponse){
									//alert(reponse);
									if(reponse=="done")
									{								
										window.location.href = "http://127.0.0.1:51915/customers/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
					}			
                }
            });


    } // basic validation
	
	
	var newCreatePayment = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert("shazad");
            var form1 = $('#newCreatePayment');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					store_id: {
                       
                        required: true,
                    },
					first_name: {
                        
                        required: true,
                    },
					last_name: {
                        
                        required: true,
						
                    },
					phone_number: {
                       
                        required: true,
                    },
					email: {
                       
                        required: true,
                    },
					payment: {
                       
                        required: true,
                    },
					service_id: {
                       
                        required: true,
                    },
					user_id: {
                       
                        required: true,
                    },
					address:{
						
						required: true
						
					}
					
					
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    /* success1.show();
                    error1.hide();
					form[0].submit(); */
					
					
					
					var urlCreate = $("#link").val();
					var urlEdit = $("#editlink").val();
					var id = $("#id1").val();
					var store_id =$("#store_id").val();
					var first_name = $("#first_name").val();
					var last_name =$("#last_name").val();
					var phone_number =$("#phone_number").val();
					var email =$("#email").val();
					var address =$("#address").val();
					var status =$("#status").val();
					var user_id =$("#user_id").val();
					var payment =$("#payment").val();
					var service_id =$("#service_id").val();

					/* alert(store_name);
					alert(location_id);
					alert(status);
					alert(street);
					 */
					if(urlCreate){
					$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/customers/newPaymentCreate.php',
							data: {store_id:store_id,first_name:first_name,last_name:last_name,phone_number:phone_number,email:email,user_id:user_id,payment:payment,service_id:service_id,address:address},
							success: function(reponse){
									//alert(reponse);
									if($.trim(reponse) == "done")
									{								
										window.location.href = "http://127.0.0.1:51915/customers/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
						
					}	
					
					if(urlEdit){
						$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/customers/customerEdit.php',
							data: {id:id,store_id:store_id,first_name:first_name,last_name:last_name,phone_number:phone_number,email:email,address:address},
							success: function(reponse){
									//alert(reponse);
									if(reponse=="done")
									{								
										window.location.href = "http://127.0.0.1:51915/customers/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
					}			
                }
            });


    } // basic validation
	

	var paymentCreate = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert("shazad");
            var form1 = $('#paymentCreate');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					customer_id: {
                       
                        required: true,
                    },
					service_id: {
                        
                        required: true,
                    },
					user_id: {
                        
                        required: true,
						
                    },
					payment: {
                       
                        required: true
                    }
					
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
					var urlCreate = $("#link").val();
					var urlEdit = $("#editlink").val();
					var id = $("#id1").val();
					var customer_id =$("#customer_id").val();
					var service_id = $("#service_id").val();
					var user_id =$("#user_id").val();
					var payment =$("#payment").val();
					if(urlCreate){
					$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/payments/paymentCreate.php',
							data: {customer_id:customer_id,service_id:service_id,user_id:user_id,payment:payment},
							success: function(reponse){
			
									if($.trim(reponse) == "done")
									{								
										window.location.href = "http://127.0.0.1:51915/payments/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
						
					}	
					
					if(urlEdit){
						$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/payments/paymentEdit.php',
							data: {id:id,customer_id:customer_id,service_id:service_id,user_id:user_id,payment:payment},
							success: function(reponse){
									//alert(reponse);
									if(reponse=="done")
									{								
										window.location.href = "http://127.0.0.1:51915/payments/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
					}			
                }
            });


    } // basic validation
	
	
	var serviceCreate = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert("shazad");
            var form1 = $('#serviceCreate');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					service_name: {
                       
                        required: true,
                    },
					service_code: {
                        
                        required: true,
                    },
					status: {
                        
                        required: true
						
                    }
					
					
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    /* success1.show();
                    error1.hide();
					form[0].submit(); */
					
					
					
					var urlCreate = $("#link").val();
					var urlEdit = $("#editlink").val();
					var id = $("#id1").val();
					var service_name =$("#service_name").val();
					var service_code = $("#service_code").val();
					var status =$("#status").val();
					//alert(service_code);
					/* 
					alert(location_id);
					alert(status);
					alert(street);
					 */
					if(urlCreate){
					$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/services/serviceCreate.php',
							data: {service_name:service_name,service_code:service_code,status:status},
							success: function(reponse){
									//alert(reponse);
									if($.trim(reponse) == "done")
									{								
										window.location.href = "http://127.0.0.1:51915/services/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
						
					}	
					
					if(urlEdit){
						$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/services/serviceEdit.php',
							data: {id:id,service_name:service_name,service_code:service_code,status:status},
							success: function(reponse){
									//alert(reponse);
									if(reponse=="done")
									{								
										window.location.href = "http://127.0.0.1:51915/services/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
					}			
                }
            });


    } // basic validation
	
	
	
		var assetCreate = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert("shazad");
            var form1 = $('#assetCreate');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					asset_name: {
                       
                        required: true,
                    },
					status: {
                        
                        required: true	
                    }
					
					
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    /* success1.show();
                    error1.hide();
					form[0].submit(); */
					
					
					
					var urlCreate = $("#link").val();
					var urlEdit = $("#editlink").val();
					var id = $("#id1").val();
					var asset_name =$("#asset_name").val();
					var status = $("#status").val();
					
					if(urlCreate){
					$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/assets/assetCreate.php',
							data: {asset_name:asset_name,status:status},
							success: function(reponse){
									//alert(reponse);
									if($.trim(reponse) == "done")
									{								
										window.location.href = "http://127.0.0.1:51915/assets/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}						
								
								},

						});
						
					}	
					
					if(urlEdit){
						$.ajax({
							type: 'POST',
							url: 'http://127.0.0.1:51915/assets/assetEdit.php',
							data: {id:id,asset_name:asset_name,status:status},
							success: function(reponse){
									//alert(reponse);
									if(reponse=="done")
									{								
										window.location.href = "http://127.0.0.1:51915/assets/index.php";
									}
									else {
										
											
											alert("wrong credencial");										
									}			

									
								
								},
									
									
						});
					}			
                }
            });


    } // basic validation
	
		var expensesCreate = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert("shazad");
            var form1 = $('#expensesCreate');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
					username: {
                       
                        required: true,
                    },
					password: {
                        
                        required: true,
                    },
					role_id: {
                        
                        required: true,
						
                    }
					
					
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    /* success1.show();
                    error1.hide();
					form[0].submit(); */
					
					
					
					
                }
            });


    } // basic validation
	


	// basic validation
    var officerPasswordValidation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#managePasswordofficer');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    password: {
                        minlength: 5,
                        required: true
                    },
                    c_password: {
						minlength: 5,
                        required: true,
						equalTo: "#password"
                        
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
					form[0].submit();
                }
            });


    } // basic validation
	
	// officer add page validation
    var officerFormValidation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#addNewOfficer');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    border_check_post_id: {
                     
                        required: true
                    },
					officer_badge_id: {
                        minlength: 4,
                        required: true
                    },
                    officer_first_name: {
						 minlength: 4,
                        required: true
                        
                    },
                    officer_last_name: {
						minlength: 4,
                        required: true
                        
                    },
                    officer_phone1: {
						
                        required: true,
						digits: true
                        
                    },
					officer_phone2: {
						
						digits: true
                        
                    },
                    officer_email: {
						
                        required: true,
						email: true
                        
                    },
                    officer_contact: {
						minlength: 10,
                        required: true
                        
                    },
                    role: {
					
                        required: true
                        
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
					form[0].submit();
                }
            });


    } // basic validation
    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    url: {
                        required: true,
                        url: true
                    },
                    number: {
                        required: true,
                        number: true
                    },
                    digits: {
                        required: true,
                        digits: true
                    },
                    creditcard: {
                        required: true,
                        creditcard: true
                    },
                    occupation: {
                        minlength: 5,
                    },
                    select: {
                        required: true
                    },
                    select_multi: {
                        required: true,
                        minlength: 1,
                        maxlength: 3
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
					$('#form_sample_1').submit();
                }
            });


    }

    // validation using icons
    var handleValidation2 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form2 = $('#form_sample_2');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    url: {
                        required: true,
                        url: true
                    },
                    number: {
                        required: true,
                        number: true
                    },
                    digits: {
                        required: true,
                        digits: true
                    },
                    creditcard: {
                        required: true,
                        creditcard: true
                    },
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success2.hide();
                    error2.show();
                    Metronic.scrollTo(error2, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
                },

                submitHandler: function (form) {
                    success2.show();
                    error2.hide();
                    form[0].submit(); // submit the form
                }
            });


    }

    // advance validation
    var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#form_sample_3');
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit
            form3.on('submit', function() {
                for(var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },  
                    options1: {
                        required: true
                    },
                    options2: {
                        required: true
                    },
                    select2tags: {
                        required: true
                    },
                    datepicker: {
                        required: true
                    },
                    occupation: {
                        minlength: 5,
                    },
                    membership: {
                        required: true
                    },
                    service: {
                        required: true,
                        minlength: 2
                    },
                    markdown: {
                        required: true
                    },
                    editor1: {
                        required: true
                    },
                    editor2: {
                        required: true
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    membership: {
                        required: "Please select a Membership type"
                    },
                    service: {
                        required: "Please select  at least 2 types of Service",
                        minlength: jQuery.validator.format("Please select  at least {0} types of Service")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
                    Metronic.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success3.show();
                    error3.hide();
                    form[0].submit(); // submit the form
                }

            });

             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('.select2me', form3).change(function () {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

            // initialize select2 tags
            $("#select2_tags").change(function() {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            }).select2({
                tags: ["red", "green", "blue", "yellow", "pink"]
            });

            //initialize datepicker
            /*$('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
            $('.date-picker .form-control').change(function() {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
            })*/
    }

    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
            
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["../../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }

    return {
        //main function to initiate the module
        init: function () {
			borderPostValidation();
			suspectValidate();
			offenseValidate();
			officerFormValidation();
            handleWysihtml5();
            handleValidation1();
            handleValidation2();
            handleValidation3();
			officerPasswordValidation();
			userCreate();
			createStore();
			createLocation();
			createCustomers();
			paymentCreate();
			serviceCreate();
			expensesCreate();
			assetCreate();
			newCreatePayment();

        }

    };

}();