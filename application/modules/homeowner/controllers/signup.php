<?php 
ob_start();
class Signup extends MX_Controller 
{
	public function __construct() {
		parent::__construct();	
		 $this->output->nocache();
		 $this->load->library('session');
		 $this->load->model('jobs_model');
		 $this->load->model('contractor_model');
		 $this->load->model('category_model');
		 $this->load->model('question_model');
		 $this->load->model('email_model');
		 $this->load->model('login_model');
	}
   	public function index()
	{

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
			$data['Counties'] =$this->jobs_model->allCounties();
			$data['content']= $this->load->view('signup/signup',$data,TRUE);
		    $this->load->view('includes/main',$data);
	}

 }	
	public function check_email(){
	$email = $this->input->post('email');
		 $email_exists=$this->login_model->email_check($email);
		if($email_exists == 'false'){
			echo "a";
		}else{
			echo "b";
		}
}
	public function signupData()
	{
		
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

					//$category = $_POST['job_category'];
					$state    = $_POST['state'];
					$counties = $_POST['counties'];
					$password =   $this->input->post('password');
		            $password12 = crypt($password);	
					

					/*print_r($data_c["image_name"]);
					die();*/
					
				 $data = array(

					'name' => $this->input->post('name'),

					'email' => $this->input->post('email'),

					'profile_pic' => $data_c["image_name"],

					'password' => $password12,

					'country_id' => $this->input->post('country'),

					//'category_id' => $category,

					'address1' => $this->input->post('address1'),

					/*'address2' => $this->input->post('address2'),*/

					'city' => $this->input->post('city'),

					'state' => $state,

					'counties' => $counties,

					'phone_no' => $this->input->post('phone_no'),

					'status' => 1

					);

					$insertData = $this->db->insert('hbp_home_owners',$data);
					$owner_id  =  $this->db->insert_id();
					$adminEmail    = adminEmail;
		            $adminPhonenumber = adminPhoneNumber;
		            $adminAddress = adminAddress;

					if($insertData){

						if($this->session->userdata('jobData'))
						{

							 $alljobData = $this->session->userdata('jobData');
							 $alljobData['owner_id'] = $owner_id;
					  		 $category =	 $alljobData['category_id'];
					  		 $counties = $alljobData['counties'];


							// echo "<pre>"; print_r($alljobData);die;

							 $inserJobtData = $this->db->insert('jobs', $alljobData);

							 if($inserJobtData)
							 {

							 	$adminEmail = $adminEmail;
					            $template_name = "You received a new job, Now let’s get started";
					            $message      = $this->email_model->email_get_by_type($template_name);
					            $s =  $message['emails'];

          

					            $adminEmail1    = $adminEmail;
					            $template_name1 = "You received a new job, Now let’s get started";
					            $message1       = $this->email_model->email_get_by_type1($template_name1);
					            $s1             = $message1['emails'];

					            // echo"<pre>";echo  $s1 ;
					            // die;


					            $message1 = str_replace("(Phone number)", $phone_no, $s1);
					            $message1 = str_replace("(Email)", $email1, $message1);
					            $message1 = str_replace("(Address)", $address1, $message1);
					            $this->sendMail1($message1, $email1, $adminEmail1);


						            $counties12 = $this->contractor_model->contractor_get_by_id($counties,$category);

						            foreach ($counties12 as $counties) {
						                $email   = $counties->email;

						                $message = str_replace("(Phone number)", $phone_no, $s);
						                $message = str_replace("(Email)", $email1, $message);
						                $message = str_replace("(Address)", $address1, $message);

						                $this->sendMail($message, $adminEmail, $email);

						            }
		            
							 }
							
						}
						/*else{
								echo "session is not available";
						} 

						die;*/

					    $adminEmail = $adminEmail;			
						//Send mail to contractors
						$template_name = "Cogratulation For Homeowner Registration";

						$template_name1 = "Cogratulation For Homeowner Registration";
						

						$message1 = $this->email_model->email_get_by_type1($template_name1);

						$s = $message1["emails"];
						/*echo $s;die;*/

						$message1 = str_replace("(Phone number)", $data["phone_no"], $s);
						$message1 = str_replace("(Email)", $data["email"], $message1);
						$message1 = str_replace("(Address)", $data["address1"], $message1);
						//$message = str_replace("(Phone number)", 90909990, $message);
						//$this->sendMail($message1, $adminEmail, $data["email"]);

						//echo $message1;die;

						$message = $this->email_model->email_get_by_type($template_name);
						$emailMessage = $message["emails"];

						$message = str_replace("(Phone number)", $data["phone_no"], $emailMessage);
						$message = str_replace("(Email)", $data["email"], $message);
						$message = str_replace("(Address)", $data["address1"], $message);

						//echo $message;die;

						//$message = str_replace("(Phone number)", 90909990, $message);
						$this->sendMail($message, $adminEmail, $data["email"]);
						
						$this->sendMail1($message,$data["email"], $adminEmail);
						
						$this->session->set_flashdata('signup', 'You have successfully registered, please check your email for confirmation');						
						$this->session->unset_userdata("jobData");
		                $this->session->sess_destroy(); 
						redirect('homeowner/login');

						

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








	
	
	
}


