<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homeowner extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		{
		
			$this->load->library('session');
			$this->load->model('homeowner_model');
			$this->load->model('contractor_model');
			$this->load->model('jobs_model');
			$this->load->model('email_model');
			$this->load->model('category_model');
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_port' => 25,
				'smtp_user' => 'prabhdeeps@ocodewire.com',// your mail name
				'smtp_pass' => 'PDPsin343#',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1',
				 'wordwrap' => TRUE
			);
			$this->load->library('email', $config);
		}else{
			redirect('admin/login', 'refresh');
		}
	}

	public function index() {
		
			$searchData = "";
		
			if($_POST) {
			
				$from = $this->input->post('from');
				$to =  $this->input->post('to');
				$searchData = $this->homeowner_model->rangepicker($from, $to); 
				$data["result"] = $searchData;
			
				if($data["result"] == "no-data"){
				
					$data['result'] = [];
					//$this->session->set_flashdata('message','No homeowner registered in this date');
					//redirect("admin/homeowner");
				}
			
			}else{
			
				$data['result'] = $this->homeowner_model->homeowner_get();
			
			}
		
		
			$data['count_data'] = $this->homeowner_model->homeowner_count();
			$data['content']=$this->load->view('homeowner/homeowners',$data,TRUE);
			$this->load->view('includes/main',$data);
		
	}
	

	
	public function complete_information() {	
		 $id = $_GET['id'];
		 $data['job_category'] = $this->category_model->category_get();
		 $result= $this->homeowner_model->homeowner_data($id);
		 foreach ($result as $key => $value) {
	            $categories = explode(',',$value->category_id);

				foreach($categories as $key1 => $val1) {
					$dataId[$key1] = $this->category_model->category_get_id($val1);
				}
				
				$result[$key]->categories = $dataId;
        	}	 
				$data["result"] = $result;
		 $data['content']=$this->load->view('homeowner/homeowner_detail',$data,TRUE);
		 $this->load->view('includes/main',$data);     
	}
	
	
	public function jobs() {	
		 $id = $_GET['id'];
		 $data['result'] = $this->homeowner_model->jobs_data($id);
		 $data['content']= $data['content']=$this->load->view('homeowner/jobs',$data,TRUE);
		 $this->load->view('includes/main',$data);     
	}

	public function job_detail() {	
		 $id = $_GET['id'];
		  $data['job_category'] = $this->category_model->category_get();
		 $result = $this->homeowner_model->job_detail($id);
		 $data['bidders'] = $this->homeowner_model->bidder_detail($id);
		 $data['selected_contractor'] = $this->homeowner_model->selected_contractor($id);
		 foreach ($result as $key => $value) {
	            $img                 = explode(',', $value->image);
	            $result[$key]->image = $img;
	            $categories = explode(',',$value->cat_id);

				foreach($categories as $key1 => $val1) {
					$dataId[$key1] = $this->category_model->category_get_id($val1);
				}
				
				$result[$key]->categories = $dataId;
        	}
        	$data["result"]     = $result;
        	//$data["ownerCategory"]=$homeowner;
		 $data['content']= $data['content']=$this->load->view('homeowner/job_detail',$data,TRUE);
		 $this->load->view('includes/main',$data);         
	}
	
	
	public function dashboard() {	
		$data['result'] = $this->homeowner_model->project_detail();
		//$data['bid'] = $this->homeowner_model->allBid();	
		$data['content']=$this->load->view('homeowner/project_detail',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	public function add_homeowner() {	
		//echo "hello Frnd";
		$data['country'] = $this->jobs_model->allCountry();
		$data['job_category'] =$this->jobs_model->allJobCategory();
		$data['content']=$this->load->view('homeowner/create',$data,TRUE);
		$this->load->view('includes/main',$data); 
	}
	
	
	public function dateFetch() {	
	
		 $from = $this->input->post('from');
		 $to =  $this->input->post('to');
		 $data['result'] = $this->homeowner_model->rangepicker($from, $to); 
		 $data['content']=$this->load->view('homeowner/homeowners',$data,TRUE);
		 $this->load->view('includes/main',$data);

	}

	public function insert() {	
		
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'country_id' => $this->input->post('country'),
			'category_id' => $this->input->post('job_category'),
			'address1' => $this->input->post('address1'),
			'address2' => $this->input->post('address2'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'phone_no' => $this->input->post('phone_no'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
	
		$insertData = $this->db->insert('hbp_home_owners',$data);
		
		if($insertData) {
			
			//$result = $this->contractor_model->contractor_get_category($data["category_id"]);
			
			$adminEmail = "prabhdeeps@ocodewire.com";
			
			
			//Send mail to contractors
			$template_name = "Thankyou Email";
			$message = $this->email_model->email_get_by_type($template_name);
			$message = str_replace("(Phone number)", $data["phone_no"], $message["emails"]);
			$message = str_replace("(Email)", $data["email"], $message);
			$message = str_replace("(Address)", $data["address1"], $message);
			//$message = str_replace("(Phone number)", 90909990, $message);
			$this->sendMail($message, $adminEmail, $data["email"]);
			$this->session->set_flashdata('message', 'New homeowner added !');
			redirect('admin/homeowner');
		}
		
		
	}
	
	/* Start function to send email i.e. contractor, homoowneer etc.
     * Param: Message, FromEmail, ToEmail 
	 */
	public function sendMail($message, $adminEmail,$email) {
		
		/*print_r($message);
		print_r($adminEmail);
		print_r ($email);die;*/
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($adminEmail);
		$this->email->to($email);
		$this->email->subject('New Homeowner Registration');
		$this->email->message($message);
		$this->email->send();
		/*if($this->email->send())
		{
			echo 'Email sent.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}*/
		
		
		    
	}
	
	
	public function status(){
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$sql=$this->db->update("hbp_home_owners",array('status'=>$status));		
		//echo $this->db->last_query();die();
		if($status==1){
			echo "Homeowner activated successfully!";
		}else{
			echo "Homeowner deactivated successfully!";
		}
    }
	
	
	public function delete_homeowner() {
		$id=$this->input->get('id');		
		$this->db->where('id',$id);	
		$this->db->delete('home_owners');
		$this->session->set_flashdata('message', 'Homeowner deleted successfully!');
		redirect('admin/homeowner');
	}
	
	
	
	
	

}
