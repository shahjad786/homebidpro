<?php
ob_start();
class Payment extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		{ 
			 $session_data = $this->session->userdata('logged_in');
             $role_id =  $session_data['role_id'];   
             $this->load->model('email_model');
            //echo  $role_id;die();
            if($role_id==1){

			 $this->load->library('session');
			 $this->load->model('payment_model');
		 }else{
			redirect('admin/login', 'refresh');
		}
	}
      else{
			redirect('admin/login', 'refresh');
		}
}

	function index()
	{
		//echo $this->uri->segment(3)."</br>"; // 1stsegment
		// if($this->uri->segment(2) == "payment" && isset($_GET["bid_id"]) && $_GET["bid_id"] != "" && $this->uri->segment(3) == "") {
			
		// } 
		//die("yes");
	$bid_id = $_GET["bid_id"];
	$this->db->select('*');
    $this->db->from('job_bids'); 
    $this->db->where('id', $bid_id);
    $query = $this->db->get();
    $result = $query->row();
    if(count($result) > 0) {

    	$ammount = $result->price;

			$remove_doller = str_replace( '$', '', $ammount );

			if( is_numeric( $remove_doller ) ) {
			   
			   
			   $ammount = $remove_doller;
			   //get 8% of total bid ammount
			   $percentToGet = 8;
				 $percent_ammount = $percentToGet / 100  * $ammount;
				 $data["amount"] = $percent_ammount;

			}
				
			$data['content']=$this->load->view('payment/payment_view',$data,TRUE);
			$this->load->view('includes/main',$data);

    }else{

    	die("no data available");

    }
    

	}

	/**
 * Replaces all but the last for digits with x's in the given credit card number
 * @param int|string $cc The credit card number to mask
 * @return string The masked credit card number
 */
function MaskCreditCard($cc){
	// Get the cc Length
	$cc_length = strlen($cc);
	// Replace all characters of credit card except the last four and dashes
	for($i=0; $i<$cc_length-4; $i++){
		if($cc[$i] == '-'){continue;}
		$cc[$i] = 'X';
	}
	// Return the masked Credit Card #
	return $cc;
}
/**
 * Add dashes to a credit card number.
 * @param int|string $cc The credit card number to format with dashes.
 * @return string The credit card with dashes.
 */

	function do_user_payment()
	{

		$bid_id = $_GET["bid_id"];
		//$job_id = $_GET["job_id"];
		$this->db->select('*');
	    $this->db->from('job_bids'); 
	    $this->db->where('id', $bid_id);
	    $query = $this->db->get();
	    $result = $query->row();
	 	$job_id = $result->job_id;

	    $owner_id = $result->owner_id;
	   
	    $start_date = $result->start_time;
	    $contractor_id = $result->contractor_id;


	    //get data of home owner
	    $this->db->select('*');
	    $this->db->from('home_owners'); 
	    $this->db->where('id', $owner_id);
	    $query_home_owner = $this->db->get();
	    $result_home_owner = $query_home_owner->row();
	    $home_owner_email = $result_home_owner->email;
	    $home_owner_name = $result_home_owner->name;
	    $home_owner_number = $result_home_owner->phone_no;

	    //get data of contractor
	    $this->db->select('*');
	    $this->db->from('contractors'); 
	    $this->db->where('id', $contractor_id);
	    $query_contractor = $this->db->get();
	    $result_contractor = $query_contractor->row();
	    $contractor_name = $result_contractor->name;


	  // echo "<pre>";   print_r($result_contractor);

	  //  die;



	    $contractor_email = $result_contractor->email;
	    $contractor_number = $result_contractor->phone_number;
	    $contractor_address = $result_contractor->company_address;
	    $contractor_company_name = $result_contractor->company_name;



	    //get data of jobs
	    $this->db->select('*');
	    $this->db->from('jobs'); 
	    $this->db->where('id', $job_id);
	    $query_contractor = $this->db->get();
	    $result_job = $query_contractor->row();
	    $job_name = $result_job->name;
	    
	    if(count($result) > 0) {

	    	$ammount = $result->price;

				$remove_doller = str_replace( '$', '', $ammount );

				if( is_numeric( $remove_doller ) ) {
				   
				   
				   $ammount = $remove_doller;
				   //get 8% of total bid ammount
				   $percentToGet = 8;
					 $percent_ammount = $percentToGet / 100  * $ammount;
					 $data["amount"] = $percent_ammount;
				}
				$payment = $percent_ammount;


		// echo "<pre>";
		// print_r($_POST);
		// die("yes");

		// $this->authorizenet->setFields(
		// array( 
		// 'amount' => '10.00',
		// 'card_num' => '6011000000000012',
		// 'exp_date' => '04/17',
		// 'first_name' => 'John',
		// 'last_name' => 'Doe',
		// 'address' => '123 Main Street',
		// 'city' => 'Boston',
		// 'state' => 'MA',
		// 'country' => 'USA',
		// 'zip' => '02142',
		// 'email' => 'some@email.com',
		// 'card_code' => '782',
		// )
		// );
		 //die("eys");
     //Ohhmygod@
     //API Login ID - 6u5MWZpmd6a
     //Transaction Key - 6Av8h6g64Q7djZd7
     //Secret Key - Simon
     $this->load->library('auth_payment');	
     $card_expiration = $_POST['crMonth'].$_POST['crYear'];
	   
     $x_login  	 = "6u5MWZpmd6a";
     $x_tran_key  = "6Av8h6g64Q7djZd7";
     $card_number = $_POST["card_num"]; 
     //$creditCard = '8699775919'; // Voyager
		 $changedCardNumber = $this->FormatCreditCard($this->MaskCreditCard(($card_number)));
		
   
     $invoice_num = '';
		   
     $x_card_code = $_POST["card_code"];
	   
     $post_values['x_invoice_num'] = $invoice_num;
     $post_values['x_login'] 		 = $x_login;
     $post_values['x_tran_key'] 	 = $x_tran_key;
		   
     $post_values['x_card_code'] 	 = $x_card_code;
			   
      $post_values['x_version'] 	= "3.1";
      $post_values['x_delim_data'] = "TRUE";
      $post_values['x_delim_char'] = "|";
      $post_values['x_relay_response'] = "FALSE";
			   
      $post_values['x_type'] 	= "AUTH_CAPTURE"; //Optional
      $post_values['x_method'] = "CC";
      $post_values['x_card_num'] = $card_number;
      $post_values['x_exp_date'] = $card_expiration;
     // $post_values['x_amount']   =  $_POST["amount"];
      $post_values['x_amount']   =  4;

			if(isset($_POST["first_name"]) && $_POST["first_name"] != "")  {
				$post_values['x_first_name'] = $_POST["first_name"]; //Optional (From Client)
			} else{
				$post_values['x_first_name'] = ""; //Optional (From Client)
			}

			if(isset($_POST["last_name"]) && $_POST["last_name"] != "")  {
      	$post_values['x_last_name'] = $_POST["last_name"]; //Optional (From Client)
    	}else{
				$post_values['x_last_name'] = ""; //Optional (From Client)
			}

			if(isset($_POST["address"]) && $_POST["address"] != "")  {
      	$post_values['x_address'] = $_POST["address"]; //Optional (From Client)
    	}else{
				$post_values['x_address'] = ""; //Optional (From Client)
			}

			if(isset($_POST["city"]) && $_POST["city"] != "")  {
      	$post_values['x_city'] = $_POST["city"]; //Optional (From Client)
    	}else{
				$post_values['x_city'] = ""; //Optional (From Client)
			}

			if(isset($_POST["state"]) && $_POST["state"] != "")  {
      	$post_values['x_state'] = $_POST["state"]; //Optional (From Client)
    	}else{
				$post_values['x_state'] = ""; //Optional (From Client)
			}

			if(isset($_POST["zip"]) && $_POST["zip"] != "")  {
      	$post_values['x_zip'] = $_POST["state"]; //Optional (From Client)
    	}else{
				$post_values['x_zip'] = ""; //Optional (From Client)
			}
      
     //Calling Payment function
			  
     $paymentResponse = $this->auth_payment->do_payment($post_values);
     // echo "<pre>";
     // print_r($paymentResponse[6]);
     if($paymentResponse[0]==1 && $paymentResponse[1]==1 && $paymentResponse[2]==1)
     {
       
     		if($paymentResponse[3] == "This transaction has been approved.")
     		{

     			//update status to accept in job bid table.
     		$id = $bid_id;
     		$accepted_date = date("Y-m-d");
       		$this->db->where('id', $id);
	        $sql = $this->db->update("hbp_job_bids", array(
	            'status' => 2,
	            'accepted_date' => $accepted_date

	        ));

	        $this->db->where('hbp_jobs.id', $job_id);
	        $sql = $this->db->update("hbp_jobs", array(
	            'status' => 2,
	            'accepted_date' => $accepted_date

	        ));
	       	//insert payment in payment table
	       	$date = date('Y-m-d H:i:s');
	       	$data_c  = array(
            
            'owner_id' => $owner_id,
            'job_id' => $job_id,
            'bid_id' => $id,
            'contractor_id' => $contractor_id,
            'payment' => '$'.$payment,
            'date' => $date,
            'card_number' => $changedCardNumber,
            'transaction_id' => $paymentResponse[6]

            
        );
	       	
    		 	$insertData = $this->db->insert('payments', $data_c);

				$adminEmail    = adminEmail;
	            $adminPhonenumber = adminPhoneNumber;
	            $adminAddress = adminAddress;

				$template_name = "You accepted a bid, Now let’s get started";			
				$message = $this->email_model->email_get_by_type($template_name);
				$s = $message["emails"];
 
								

				$message = str_replace("(Phone number)", $adminPhonenumber,$s);
				$message = str_replace("(Email)", $adminEmail, $message);				
				$message = str_replace("(Address)",$adminAddress, $message);
				$message = str_replace("(dollar amount)", $percent_ammount,$message);
				$message = str_replace("(Contractor Company Name)", $contractor_company_name,$message);
				$message = str_replace("(Contractor Name)", $contractor_name, $message);				
				$message = str_replace("(Phone Number)",    $contractor_number, $message);
				$message = str_replace("(Contractor Address)", $contractor_address,$message);
				$message = str_replace("(Contractor Email)", $contractor_email, $message);

				//echo $message;die;

				$this->sendMail($message, $adminEmail,$home_owner_email);




    		 	/*$message = '<h1>You have made a payment to accept a bid from a contractor.</h1>

									<p>Here is the detail of payment:-</p>
									<p>Job Name: '.$job_name.'</p>
									<p>Card Number: '.$changedCardNumber.'</p>
									<p>Payment: $'.$percent_ammount.' </p></br>
									<h4>Contractor Detail: </h4>
									<p>Contractor Name: '.$contractor_name.'</p>
									<p>Contractor Email: '.$contractor_email.'</p>
									<p>Contractor Number: '.$contractor_number.'</p>
									<p>Transaction Id: '.$paymentResponse[6].'</p>

									<p><br />
							&nbsp;</p>';

    		//send mail to homeowner after payment to notify.
    		$adminEmail1 = "homebidpro";
			//$homeowner_email = $owner_email;
    		$this->email->set_newline("\r\n");
	        $this->email->set_mailtype("html");
	        $this->email->from($adminEmail1);
	        $this->email->to($home_owner_email);
	        $this->email->subject('New Payment Successful');
	        $this->email->message($message);
	        $this->email->send();*/

    		 	//send mail to admin to notify the payment.

	            //$adminEmail1 = "homebidpro";
    		 	$message_admin = '<h1>You have got a payment from a home owner.</h1>

								
									<p>Here is the detail of payment:-</p>
									<p>Job Name: '.$job_name.'</p>
									<p>Card Number: '.$changedCardNumber.'</p>
									<p>Payment: $'.$percent_ammount.' </p></br>
									<h4>Contractor Detail: </h4>
									<p>Contractor Name: '.$contractor_name.'</p>
									<p>Contractor Email: '.$contractor_email.'</p>
									<p>Contractor Number: '.$contractor_number.'</p></br>
									<h4>Home Owner Detail: </h4>
									<p>Home-Owner Name: '.$home_owner_name.'</p>
									<p>Home-Owner Phone: '.$home_owner_number.'</p>
									<p>Home-Owner Email: '.$home_owner_email.'</p>
									<p>Transaction Id: '.$paymentResponse[6].'</p>
									

									<p><br />
							&nbsp;</p>';
				    		$this->email->set_newline("\r\n");
					        $this->email->set_mailtype("html");
					        $this->email->from($adminEmail);
					        $this->email->to($adminEmail);
					        $this->email->subject('Payment From Home Owner');
					        $this->email->message($message_admin);
					        $this->email->send();


					    $message_contractor = '<h1>Congratulation Your Bid Accepted</h1>

								
									<p>Here is the detail of homeowner give the payment to the Admin:-</p>
									<p>Job Name: '.$job_name.'</p>
									<p>Card Number: '.$changedCardNumber.'</p>
									<p>Payment: $'.$percent_ammount.' </p></br>
									
									<h4>Home Owner Detail: </h4>
									<p>Home-Owner Name: '.$home_owner_name.'</p>
									<p>Home-Owner Phone: '.$home_owner_number.'</p>
									<p>Home-Owner Email: '.$home_owner_email.'</p>
									<p>Transaction Id: '.$paymentResponse[6].'</p>
									

									<p><br />
							&nbsp;</p>';
				    		$this->email->set_newline("\r\n");
					        $this->email->set_mailtype("html");
					        $this->email->from($adminEmail);
					        $this->email->to($contractor_email);
					        $this->email->subject('Congratulation Your Bid Accepted');
					        $this->email->message($message_contractor);
					        $this->email->send();

     			//echo "<script> alert('Your transaction has been successfully approved.')</script>";
     			
     			
   				 $url = 'homeowner/jobs?id='.$job_id;
				    echo'
				    <script>
				    window.location.href = "'.base_url().$url.'";
				    </script>
				    '; 
     		}
     		
         // payment is successful. Do your action here
     }
     else
     {
     	
					$data["response_error"] = $paymentResponse[3];
					$this->load->view('payment_view',$data);
          // payment failed.
          
     		}
		}

	}
	//change format of credit number to X's
	function FormatCreditCard($cc)
	{
		// Clean out extra data that might be in the cc
		$cc = str_replace(array('-',' '),'',$cc);
		// Get the CC Length
		$cc_length = strlen($cc);
		// Initialize the new credit card to contian the last four digits
		$newCreditCard = substr($cc,-4);
		// Walk backwards through the credit card number and add a dash after every fourth digit
		for($i=$cc_length-5;$i>=0;$i--){
			// If on the fourth character add a dash
			if((($i+1)-$cc_length)%4 == 0){
				$newCreditCard = '-'.$newCreditCard;
			}
			// Add the current character to the new credit card
			$newCreditCard = $cc[$i].$newCreditCard;
		}
		// Return the formatted credit card number
		return $newCreditCard;
	}


	public function payments() 
	{	
			$data['result'] = $this->payment_model->homeowner_payment();
			$data['content']=$this->load->view('payment/payment',$data,TRUE);
			$this->load->view('includes/main',$data);
		
	}
	public function payment_details() 
	{
		$id=$this->input->get('id');	 
		//$data['result'] = $this->payment_model->payment_detail_description($id);

		$this->db->select('*');
	    $this->db->from('payments'); 
	    $this->db->where('id', $id);
	    $query = $this->db->get();
	    $result = $query->row();
	    $bid_id = $result->bid_id;
	    $card_number = $result->card_number;
	    $transaction_id = $result->transaction_id;
	    $amount = $result->payment;

    $data["payment_details"] = [
								"card_number" => $card_number, 
								"transaction_id" => $transaction_id,
								"amount" => $amount,
								
								];

  	$this->db->from('job_bids'); 
    $this->db->where('id', $bid_id);
    $query_job_bid = $this->db->get();
    $result_job_bid = $query_job_bid->row();

	$job_id = $result_job_bid->job_id;
	$owner_id = $result_job_bid->owner_id;
   	$start_date = $result_job_bid->start_time;
    $contractor_id = $result_job_bid->contractor_id;
			
    $data["bid_details"] = [
							"job_id" => $job_id, 
							"owner_id" => $owner_id,
							"start_date" => $start_date,
							"contractor_id" => $contractor_id
							];
	 	//get data of home owner
    $this->db->select('*');
    $this->db->from('home_owners'); 
    $this->db->where('id', $owner_id);
    $query_home_owner = $this->db->get();
    $result_home_owner = $query_home_owner->row();
    $home_owner_email = $result_home_owner->email;
    $home_owner_name = $result_home_owner->name;
    $home_owner_number = $result_home_owner->phone_no;

    $data["home_owner_details"] = [
									"home_owner_email" => $home_owner_email, 
									"home_owner_name" => $home_owner_name,
									"home_owner_number" => $home_owner_number,
									
									];

  	 //get data of contractor
    $this->db->select('*');
    $this->db->from('contractors'); 
    $this->db->where('id', $contractor_id);
    $query_contractor = $this->db->get();
    $result_contractor = $query_contractor->row();
    $contractor_name = $result_contractor->name;
    $contractor_email = $result_contractor->email;
    $contractor_number = $result_contractor->phone_number;
    
    $data["contractor_details"] = [
									"contractor_name" => $contractor_name, 
									"contractor_email" => $contractor_email,
									"contractor_number" => $contractor_number,
									
									];

    //get data of jobs
    $this->db->select('*');
    $this->db->from('jobs'); 
    $this->db->where('id', $job_id);
    $query_contractor = $this->db->get();
    $result_job = $query_contractor->row();
    $job_name = $result_job->name;
    $data["job_details"] = [
							"job_name" => $job_name, 
							];											

    	// echo "<pre>";
    	// print_r($data);
    	// die;


		$data['content']=$this->load->view('payment/payment_details',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	
	public function delete_payment() {
		$id=$this->input->get('id');		
		$this->db->where('id',$id);	
		$this->db->delete('payments');
		$this->session->set_flashdata('message', 'Payment deleted successfully');
		redirect('admin/payments');
	}
	
	public function sendMail($message,$adminEmail,$email) {
		
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($adminEmail);
		$this->email->to($email);
		$this->email->subject('You accepted a bid, Now let’s get started');
		$this->email->message($message);
		$this->email->send();
		
	}
	
	
}
