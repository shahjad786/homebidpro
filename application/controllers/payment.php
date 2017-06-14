<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
class Payment extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
	}

	function index()
	{
		
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
				
			$this->load->view('payment/payment_view',$data);	

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
	    $contractor_email = $result_contractor->email;
	    $contractor_number = $result_contractor->phone_number;

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
       		$this->db->where('id', $id);
	        $sql = $this->db->update("hbp_job_bids", array(
	            'status' => 2
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

    		 	$message = '<h1>You have made a payment to accept a bid from a contractor.</h1>

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
    		 	$adminEmail1 = "prabhdeeps@ocodewire.com";
					//$homeowner_email = $owner_email;
    		 	$this->email->set_newline("\r\n");
	        $this->email->set_mailtype("html");
	        $this->email->from($adminEmail1);
	        $this->email->to($home_owner_email);
	        $this->email->subject('New Payment Successful');
	        $this->email->message($message);
	        $this->email->send();

    		 	//send mail to admin to notify the payment.
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
	        $this->email->from($adminEmail1);
	        $this->email->to($adminEmail1);
	        $this->email->subject('Payment From Home Owner');
	        $this->email->message($message_admin);
	        $this->email->send();



     			echo "<script> alert('Your transaction has been successfully approved.')</script>";
     			
     			
   				 $url = 'homeowner/jobs?id=3';
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

}