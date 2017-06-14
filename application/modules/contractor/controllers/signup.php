<?php 

ob_start();
class Signup extends MX_Controller {

	public function __construct() {

		parent::__construct();

		 $this->output->nocache();
		 $this->load->library('session');
		 $this->load->model('contractor_model');
		 $this->load->model('category_model');
		 $this->load->model('jobs_model');
		 $this->load->model('email_model');
		 $this->load->model('login_model');

	}
   	public function index(){

   		if($this->session->userdata('logged_in')) {
   		$session_data = $this->session->userdata('logged_in');
		$role_id =  $session_data['role_id']; 	
		//echo 	$role_id;die();
		if($role_id==2){

         redirect('contractor/profile');
        }

	    elseif($role_id==1)
	    {

	        redirect('homeowner/profile', 'refresh');
	    }

}
	  else{
		$data['country'] = $this->jobs_model->allCountry();
		$data['job_category'] =$this->category_model->category_get();
		$data['state'] =  $this->jobs_model->allState();
		//$data['Counties'] =$this->jobs_model->allCounties();
		$data['content']= $this->load->view('signup/signup',$data,TRUE);
		$this->load->view('includes/main',$data);

	}

}

	public function signupData(){
		
		if(!empty($_FILES['file1']['name']))
        {
			$error_c = 0;
	        foreach ($_FILES as $key => $value) {

            	if (!empty($value['tmp_name'])) {


                if($key == "file1") {

	                $file_type = $_FILES['file1']['type'];

	                    $config['upload_path'] = 'uploads';
	                    $config['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
	                    $config['max_size']='';
	                    $config['max_width']='200000000';
	                    $config['max_height']='1000000000000';
	                    $this->load->library('upload',$config);
						$this->upload->overwrite = true;
		                    if ( ! $this->upload->do_upload($key)) {	        
									$error_c= 1;
									$error = array('error' => $this->upload->display_errors());
		                    } else {
		                    	
									$data = array('upload_data' => $this->upload->data());
									$data_c["image_name"] =  $data['upload_data']['file_name'];
						 	}

					}
				}
			}
		}else{
				$data_c["image_name"]="avatar.jpg";
			}




		//$category = implode(',', $_POST['job_category']);
		//$counties="";


		$category =   $_POST['job_category'];
		$counties =   $_POST['counties'];
		$password =   $this->input->post('password');
		$password12 = crypt($password);


		//$password = bmgadmin;
	   //echo  $password12 = crypt($password);die;
		//echo $password12;die;

		//echo "<pre>";print_r($category);
		//echo "<pre>";print_r($counties);die;
		//$counties =  implode(',', $_POST['counties']);
		/*if(isset($_POST['counties'])){
			
			//echo "dddd";die;
			
			$counties = implode(',', $_POST['counties']);	
			$state = $_POST['state'];
		
		}
		else{
			
			   // $counties = $_POST['counties_single'];
			   $state    = $_POST['state'];
			
		}*/
		
		
		$data = array(

			'name' => $this->input->post('name'),

			'email' => $this->input->post('email'),

			'password' => $password12,

			'profile_pic' => $data_c["image_name"],

			'country_id' => $this->input->post('country'),
			
			'company_name' => $this->input->post('company_name'),
			
			'years_experience' => $this->input->post('experience'),

			//'category_id' => $category,

			'address1' => $this->input->post('address1'),

			'address2' => $this->input->post('address2'),

			'company_address' => $this->input->post('company_address'),

			'company_bio' => $this->input->post('company_bio'),

			'city' => $this->input->post('city'),

			'state_license_number' => $this->input->post('state_license_number'),

			'state' => $this->input->post('state'),
			
			//'counties' =>$counties,

			'phone_number' => $this->input->post('phone_no'),

			'status' => 1

			);

			$insertData = $this->db->insert('hbp_contractors',$data);
	        $insert_id  =  $this->db->insert_id();

	        $adminEmail    = adminEmail;
            $adminPhonenumber = adminPhoneNumber;
            $adminAddress = adminAddress;

	        foreach ($category as $key => $cat) {


	        	       $data1 =  array(
	        	       	 'category_id' => $cat,
	        	         'contractor_id' => $insert_id
	        	        );

	        	
						$insertData12 = $this->db->insert('hbp_contractors_category',$data1);
         					
	        }

		      foreach ($counties as $key => $coun) {


					$data2 =  array(

						'counties_id' => $coun,
						'contractor_id' => $insert_id
					);
		
					$insertData123 = $this->db->insert('hbp_contractors_counties', $data2);
							
			}

	   
		if($insertData){
		    $adminEmail = $adminEmail;
		   // $emailData = "shahjad.ahmadtimt@gmail.com";	
		    $emailData = $data["email"];
		    //echo $emailData;die;
			//Send mail to contractors
			$template_name = "Cogratulation For Contractor Registration";
			$template_name1 = "Cogratulation For Contractor Registration";
			$message1 = $this->email_model->email_get_by_type1($template_name1);
			$message = $this->email_model->email_get_by_type($template_name);



			$message1 = str_replace("(name)", $data["name"], $message1["name"]);
			$message1 = str_replace("(Phone number)", $data["phone_number"], $message1["emails"]);
			$message1 = str_replace("(Email)", $data["email"], $message1);
			$message1 = str_replace("(Address)", $data["company_address"], $message1);
			
			//$message = str_replace("(Phone number)", 90909990, $message);
			//$this->sendMail($message1, $adminEmail, $data["email"]);



			$message1 = str_replace("(name)", $data["name"], $message1["name"]);
			$message = str_replace("(Phone number)", $data["phone_number"], $message["emails"]);
			$message = str_replace("(Email)", $data["email"], $message);
			$message = str_replace("(Address)", $data["company_address"], $message);
			
			//$message = str_replace("(Phone number)", 90909990, $message);
			$this->sendMail($message, $adminEmail, $emailData);
			$this->sendMail1($message,$emailData, $adminEmail);
			$this->session->set_flashdata('signup', 'You have successfully registered, please check your email for confirmation. ');
			redirect('contractor/login');
		}

	}
	public function check_email(){

		$email = $this->input->post('email');
		$email_exists=$this->login_model->email_check_contractor($email);
		if($email_exists == 'false'){
		echo "a";
		}else{
		echo "b";
		}
  }
	
	public function sendMail($message, $adminEmail,$email) {
		
		/*print_r($message);
		print_r($adminEmail);
		print_r ($email);die;*/
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($adminEmail);
		$this->email->to($email);
		$this->email->subject('Conguratulation for registration');
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
	
	public function sendMail1($message,$email,$adminEmail) {
		
	  /*print_r($message);
		print_r($adminEmail);
		print_r ($email);die;*/
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($email);
		$this->email->to($adminEmail);
		$this->email->subject('New Contractor Registration');
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

















		public function county(){
		
		$state = $_POST['state_code'];
		
		$data['county'] = $this->login_model->county_get_by_state($state);
		
		//echo "<pre>";print_r($data['county']);die;
		
		if($data['county'])
		
		{
			
			foreach($data['county'] as $row)
			
			{
				$id = $row->id;
				$county = $row->county;
				
				echo "<option value = '$id'>$county</option>";
				
				
			}

			//print_r($data['county']);

		}
		
		else{
			
			
				echo  0;
			
			
			
			
		} 
		
		
	}
	
	
	public function state(){
		
		$iso = $_POST['iso'];
		
		//echo "hello";die;
		$data['state'] = $this->login_model->state_get_by_country($iso);
		
	      //echo "<pre>";print_r($data['state']);die;
		
		if($data['state'])
		
		{
			
			foreach($data['state'] as $row)
			
			{
				$code = $row->code;
				$name = $row->name;
				
				echo "<option value = '$code'>$name</option>";
				
				
			}

			//print_r($data['county']);

		}
		
		else{
			
			
				echo  0;
			
			
			
			
		} 
		
		
	}
	
	
	
	
	
	
	
	
	
}

