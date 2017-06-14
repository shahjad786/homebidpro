<?php

ob_start();
class Jobs extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->output->nocache();

		if($this->session->userdata('logged_in')){
		$session_data = $this->session->userdata('logged_in');
		$role_id =  $session_data['role_id']; 	
		//echo 	$role_id;die();
		if($role_id==2){

			 $this->load->library('session');
			 $this->load->library('ckfinder');
			 $this->load->model('jobs_model');
			 $this->load->model('email_model');
			 $this->load->model('contractor_model');
			 $this->load->model('question_model');
			 $this->load->model('category_model');
			 $this->load->model('homeowner_model');
			 $this->load->model('conversion_model');
		}
      else{
	        	 //echo "no session";die("fdefdse");
				 redirect('contractor/login', 'refresh');
		}
}
	else{
				//echo "no session";die("fdefdse");
				redirect('contractor/login', 'refresh');
		}
	}
   	public function index()
	{
		$session_data = $this->session->userdata('logged_in');
		$contractor_id =  $session_data['id']; 					
		$id = $_GET['id'];

		//echo $id;die;

		//$status = 2;

		   $data['fetchAllBider'] = $this->fetch_table($id);
		   $data['high_lowbid'] = $this->jobs_model->high_lowbid($id);
		  //echo "<pre>"; print_r($data['fetchAllBider']);die;
		  $data['status'] = $this->jobs_model->jobs_status($id,$contractor_id);
		  $data['status_bid'] = $this->jobs_model->jobs_status_bid($id,$contractor_id);
		  $data['completed_status'] = $this->jobs_model->completed_status($id);

		  $result = $this->jobs_model->jobs_detail($id);
		  //print_r(expression)




		  foreach ($result as $key => $value) {
            $img        = explode(',', $value->image);

            /*$cat_id = $value->cat_id;

            $img_name = $this->contractor_model->category_name($cat_id);
            
            
            if(isset($img_name[0]->images_name))
            {

                $value->cat_image =$img_name[0]->images_name;

            }else{

                $value->cat_image ="dashpro.jpg";
            }*/
            $result[$key]->image = $img;
        }



		$data["result"] = $result;
		//$data['homeowner']=$this->jobs_model->homeowner_getby_status($id);
		//print_r($data['homeowner']);die;
		$data['homeowner']=$this->jobs_model->homeowner_getby_id($id);
		foreach($data['homeowner'] as $owner);
		$owner_id =  $owner->owner_id;
		//$data['conversation'] = $this->conversion_model->conversion_get1($id,$contractor_id);
		$data['conversation'] = $this->conversion_model->conversion_get($id,$owner_id,$contractor_id);
		$data['content']= $this->load->view('jobs/projectDetail',$data,TRUE);
		$this->load->view('includes/main',$data);		
		//redirect('homeowner/login', 'refresh');

	}

    public function varify_contractor(){
		 
			$job_id = $this->input->post('job_id');
			$status = $this->input->post('status');
			$contractor_id = $this->input->post('contractor_id');
			$data['result'] = $this->jobs_model->varify_contractor_status($job_id,$status,$contractor_id);
			if($data['result'] == 1)
			{
				
				echo 1;
			}
		 
		    else{
				
				echo 0;
			} 	 
	 }

	 public function deleteBid(){


	 		    //echo "hello";
	 			//die;

	 	      $job_id        =     $this->input->get('job_id');
		 	  $contractor_id = $this->input->get('contractor_id');
			  $homeowner_id = $this->jobs_model->homeowner_getby_id($job_id);
			  $owner_id   =   $homeowner_id[0]->owner_id;
			  $homeownerEmail = $this->jobs_model->homeownerEmail($owner_id);
			  $contractorEmail = $this->jobs_model->contractorEmail($contractor_id);
			  $email = 	$homeownerEmail->email;
			  $Contractor_email = 	$contractorEmail->email;


		 	  $this->db->where('job_id', $job_id);
		 	  $this->db->where('contractor_id', $contractor_id);
              $deleted_Data =   $this->db->delete('job_bids');

           if($deleted_Data){

           			$adminEmail = "HomeBidPro";
					$adminAddress = "Browsewire Consulting Mohali Phase 8 Punjab";
		            $adminPhonenumber = +91-9958784587;

           			$template_name = "Remove a bid from the project";			
					$message = $this->email_model->email_get_by_type($template_name);
					$s = $message["emails"];

					$this->sendMail12($s, $adminEmail,$email);
					$this->sendMail13($s, $Contractor_email,$adminEmail);

					$this->session->set_flashdata('jobDetailFlash', 'Your bid successfully canceled');
           			redirect('contractor/jobs?id='.$job_id);



           }

			
	 }















	public function fetch(){
		//echo "hello";die;
		$job_id = $this->input->post('job_id');
		//$contractor_id = $this->input->post('contractor_id');
		//$owner_id = $this->input->post('owner_id');
		$this->db->select('*,hbp_home_owners.profile_pic as owner_profile,hbp_contractors.profile_pic as contractor_profile');
		$this->db->from('hbp_communication');
		$this->db->join('hbp_contractors', 'hbp_communication.contractor_id = hbp_contractors.id', 'left');
        $this->db->join('hbp_home_owners', 'hbp_communication.owner_id = hbp_home_owners.id', 'left');	
		$this->db->where(array('job_id'=>$job_id));
		//$this->db->where(array('job_id'=>$job_id,'owner_id'=>$owner_id));
		$data = $this->db->get();
		//echo "<h2 class='h2-heading'>messages</h2>";
		
		 foreach ($data->result() as $row) {
            if ($row->sen_rec == 'owner_to_contractor') {
                echo " <div class='test-block1'>";
                echo " <figure class='testi-img pull-right rightmargin'><img class='img-circle' id='circle' src='" . base_url() . "uploads/" . $row->owner_profile . "'></figure>";
                
                echo "<div class='pull-left even talk_bubble col-lg-9 col-xs-8'> <div class='bubble_talk_content'>" . $row->message . "</div></div>";
                echo " </div>";
            } else {
                echo " <div class='test-block1'>";
                echo " <figure class='testi-img pull-left rightmargin'><img class='img-circle' id='circle' src='" . base_url() . "uploads/" . $row->contractor_profile . "'></figure>";
                echo "<div class='pull-right odd talk_bubble col-lg-9 col-xs-8'> <div class='bubble_talk_content'>" . $row->message . "</div></div>";
                echo " </div>";
            }
            
        }
        exit;
	}

	public function add_communication(){
		
		  $job_id = $this->input->post('job_id');
	      $owner_id = $this->input->post('owner_id');
		  $contractor_id = $this->input->post('contractor_id');
		  $message=$this->input->post('message');

		  $this->db->select('*');
		  $this->db->from('hbp_home_owners');
		  $this->db->where('hbp_home_owners.id',$owner_id);
		  $query = $this->db->get();

		  $homeowner = $query->result_array();
		  foreach($homeowner as $key => $val); 
		  $email12 = $val["email"];

		  $insertData =  $this->db->insert('hbp_communication',array('message'=>$message,'job_id'=>$job_id,'contractor_id'=>$contractor_id,'owner_id'=>$owner_id,'sen_rec'=>'contractor_to_owner'));
     
		  if($insertData)
		  {
		  	$session_data = $this->session->userdata('logged_in');
			$company_name =  $session_data['company_name'];	
			$name =  $session_data['name']; 
			$phone_number =  $session_data['phone_number'];
			$company_address =  $session_data['company_address'];
			$email =  $session_data['email'];
			$owner_id = $_POST['owner_id'];

			$adminEmail =   adminEmail;
			$adminAddress = adminAddress;
            $adminPhonenumber = adminPhoneNumber;

			$template_name = "You received a new message  bid, Now let’s get started";			
			$message = $this->email_model->email_get_by_type($template_name);
			$s = $message["emails"];
			
				$message = str_replace("(Phone number)", $adminPhonenumber,$s);
				$message = str_replace("(Email)", $adminEmail, $message);				
				$message = str_replace("(Address)",$adminAddress, $message);
				$message = str_replace("(Contractor Company Name)", $company_name, $message);
				$message = str_replace("(Contractor Name)", $name, $message);
				$message = str_replace("(Phone Number)", $phone_number, $message);
				$message = str_replace("(Contractor Address)", $company_address, $message);
				$message = str_replace("(Contractor Email)", $email, $message);

				//echo $message;die;
				$this->sendMail1($message, $adminEmail,$email12);

			/*	$session_data = $this->session->userdata('logged_in');				
				$adminEmail =  $session_data['email'];
				$template_name = "You accepted a bid, Now let’s get started";			
				$message = $this->email_model->email_get_by_type($template_name);
				$s = $message["emails"];

				$message = str_replace("(Address)",$message, $message);
				$this->sendMail1($message, $adminEmail,$email);*/



		  }






     }

	public function view_busness()
    {
	    //$session_data = $this->session->userdata('logged_in');
		//$id =  $session_data['id'];

    	$contractor_id = $_GET['contractor_id'];

    	//echo $contractor_id;die;
        $data['homeowners'] = $this->jobs_model->count_homeowner($contractor_id);
        $data['jobs']       = $this->jobs_model->completed_job($contractor_id);
        $data['result']     = $this->jobs_model->view_contractor_detail($contractor_id);       
        //echo "<pre>";print_r($data['result']);die;
		$data['recent']     = $this->contractor_model->recent_jobs($contractor_id);
/* 		echo "<pre>";
		print_r($data['recent']);
		die; */
        $contractor_reviews = $this->jobs_model->reviews_get($contractor_id);
        $data['average'] = $this->jobs_model->average_rating($contractor_id);
        $data['reviews']    = $contractor_reviews;
        if ($data['reviews'] == "no-data") {
            
            $data['reviews'] = 0;
        }
        
        else {
            
            $data['reviews'] = $this->jobs_model->reviews_get($contractor_id);
            
        }


        //echo "<pre>";print_r($data['reviews']);die;
        $data['rating']  = $this->jobs_model->rating($contractor_id);
        //$data['check_bidder_status']=$this->jobs_model->check_bidder_status($job_id);
        //$data['check_job_status']=$this->jobs_model->check_job_status($job_id);
        $data['content'] = $this->load->view('jobs/contractorDetail', $data, TRUE);
        $this->load->view('includes/main', $data);
}
	public function update_complete_status(){

         $job_bid_id=$_GET["job_bid_id"];
         $job_id= $_GET["job_id"];
         $completed_date = date("Y-m-d");

        $this->db->where('id', $job_bid_id);
        $this->db->update('hbp_job_bids', array(
            'completed_status' => '1'
        ));
        $this->db->where('id', $job_id);
        $this->db->update('hbp_jobs', array(
            'status' => '5',
            'completed_date' => $completed_date
        ));
        
        $this->session->set_flashdata('jobDetailFlash', 'You have successfully close the project');
         redirect('contractor/dashboard'); 
        
    }
    
     public function fetch_table($job_id)
     {
        
        $id = $job_id;
        $this->db->select('jobs.id as job_id,contractors.profile_pic,jobs.name,jobs.owner_id, jobs.category_id, jobs.category_id,job_bids.id as job_bid_id,job_bids.status,job_bids.created_at,jobs.owner_id,jobs.image,jobs.video,jobs.started_time,jobs.expire_time,jobs.project_discription, job_bids.price,job_bids.start_time,contractors.name as contractor_name,contractors.id as contractor_id,communication.message');
        $this->db->from('hbp_job_bids');
        $this->db->join('jobs', 'job_bids.job_id = jobs.id', 'left');
         //$this->db->join('home_owners', 'jobs.owner_id = home_owners.id', 'left');
        $this->db->join('contractors', 'job_bids.contractor_id = contractors.id', 'left');
        $this->db->join('communication', 'job_bids.conversion_id = communication.id', 'left');
        $this->db->where('job_bids.job_id', $id);
        $query = $this->db->get();
        
        if($query){

             return  $query->result();

          }
        
    }
		
	public function contractor_detail()
	{
		echo $id = $_GET['id'];
		$job_id = $_GET['job_id'];
		$data['result'] = $this->jobs_model->contractor_detail($id,$job_id);
		$data['content']= $this->load->view('jobs/contractorDetail',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	

	function updateBidAmount(){

		$job_id = $_POST['job_id'];
		$updateBidPrice = $_POST['updateBidPrice'];
        $contractor_id = $_POST['contractor_id'];

    /*    echo $contractor_id;
         echo $updateBidPrice;
          echo $job_id;
die;*/
        $updaetData =   $this->db->where('job_id', $job_id);
				        $this->db->where('contractor_id', $contractor_id);				        
				        $this->db->update('hbp_job_bids', array(
				        'price' => $updateBidPrice
				        ));

           if($updaetData){


           		//echo "hello";die;

           		echo  1;
           	    $this->session->set_flashdata('jobDetailFlash', 'You have successfully updated  amount');




           }
           else{


           			echo 0;


           }


	}














	public function createBid()
	{
		//$data['result1'] = $this->jobs_model->questionBid();
		$data['content']= $this->load->view('jobs/applyBid','',TRUE);
		$this->load->view('includes/main',$data);
	}
	
	public function applyBid(){
		
		$session_data = $this->session->userdata('logged_in');
		$id =  $session_data['id']; 
		// echo "<pre>";
		// print_r($POST);
		// die;
		//echo $id;die;
		$owner_d = $_POST['owner_id'];
		$created_at = date("Y-m-d H:i:s");
	 	$job_id = $this->input->post('job_id');

		$applied_date = date("Y-m-d");

		$data = array(

		'created_at' => $created_at,	
		'contractor_id' => $id,
		'start_time' => $this->input->post('start_time'),
		'completed_time' => $this->input->post('completed_time'),
		'price' => $this->input->post('price'),
		'owner_id' => $this->input->post('owner_id'),
		'job_id' => $this->input->post('job_id'),
		'category_id' => $this->input->post('category_id'),
		'detail' => $this->input->post('project_description'),
		'applied_date' =>$applied_date
		);
	                   
	    //echo "<pre>";print_r($data);die;
	    $insertData  = $this->db->insert('job_bids',$data);

	    if($insertData){


			$session_data = $this->session->userdata('logged_in');
			$company_name =  $session_data['company_name'];	
			$name =  $session_data['name']; 
			$phone_number =  $session_data['phone_number'];
			$address1 =  $session_data['address1'];
			$email =  $session_data['email'];
			$owner_id = $_POST['owner_id'];

			$adminEmail    = HomeBidPro;
            $adminPhonenumber = adminPhoneNumber;
            $adminAddress = adminAddress;

			$template_name = "You have received a new quote";			
			$message = $this->email_model->email_get_by_type($template_name);
			$s = $message["emails"];
              
			$owner_id = $this->homeowner_model->homeowner_get_by_id($owner_id);
			
				//echo $owner_id;die;
			    //echo "<pre>";print_r($owner_id);die;
			    foreach($owner_id as $owner_id1);
				$email= $owner_id1->email;
				$homeownerName= $owner_id1->name;
				//echo $email;die;

				$message = str_replace("(Phone number)", $adminPhonenumber,$s);
				$message = str_replace("(name)",$homeownerName, $message);
				$message = str_replace("(Email)", $adminEmail, $message);				
				$message = str_replace("(Address)",$adminAddress, $message);
				$this->sendMail($message, $adminEmail,$email);
				$this->session->set_flashdata('jobDetailFlash', 'You successfully applied a bid ');
			    // redirect('contractor/jobs?id='.$job_id);  
				redirect('contractor/dashboard');  
			
		  
		}
		
	}
		
	public function sendMail($message,$adminEmail,$email) {
		
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($adminEmail);
		$this->email->to($email);
		$this->email->subject('You have received a new quote');
		$this->email->message($message);
		$this->email->send();
		
	}



	public function sendMail1($message,$adminEmail,$email12) {
		
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($adminEmail);
		$this->email->to($email12);
		$this->email->subject('New Message send From Contractor on Your Project');
		$this->email->message($message);
		$this->email->send();
		
	}



	public function sendMail12($message,$adminEmail,$email) {
		
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($adminEmail);
		$this->email->to($email);
		$this->email->subject('Remove bid Your Project');
		$this->email->message($message);
		$this->email->send();
		
	}

	public function  sendMail13($message, $Contractor_email,$adminEmail){


		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($Contractor_email);
		$this->email->to($adminEmail);
		$this->email->subject('Remove bid From the Project');
		$this->email->message($message);
		$this->email->send();





	}











}


