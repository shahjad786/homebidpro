<?php 
ob_start();

class Profile extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->output->nocache();
		if($this->session->userdata('logged_in'))
		   {
            $session_data = $this->session->userdata('logged_in');
            $role_id =  $session_data['role_id'];   
            //echo  $role_id;die();
            if($role_id==1){



			 $this->load->library('session');
			 $this->load->model('jobs_model');
			 $this->load->model('login_model');
			 $this->load->model('email_model');
			  $this->load->model('homeowner_model');
			 $this->load->model('category_model');
		 }else{
			redirect('homeowner/login', 'refresh');
		}
	}

		else{
			redirect('homeowner/login', 'refresh');
		}
	}
   	public function index()
	{
		
			$data['country'] = $this->jobs_model->allCountry();
			$data['job_category'] = $this->category_model->category_get();
			$data['state'] = $this->category_model->state_get();
			$homeowner = $this->homeowner_model->homeowner_profile_info();
				 $state_code  = $homeowner[0]->code;
				
			   	
			 $data['county'] = $this->category_model->county_get($state_code);
			foreach($homeowner as $key => $value) 
			{ 
				$categories = explode(',',$value->category_id);

				foreach($categories as $key1 => $val1) {
					$dataId[$key1] = $this->category_model->category_get_id($val1);
				}
				
				$homeowner[$key]->categories = $dataId;
			}
			$data["result"] = $homeowner;
			$data['content']= $this->load->view('profile/editProfile',$data,TRUE);
			$this->load->view('includes/main',$data);
		
	}
	public function update(){
		$session_data = $this->session->userdata('logged_in');
        $id =  $session_data['id'];
		$error_c = 0;
		if($_REQUEST["image_data"] == "0") {
			
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

			$data_c["image_name"] = $_REQUEST["image_data"];

				
		}

        
		//$category = $_POST['job_category'];
		$id=$this->input->post('id');
		$this->db->where('home_owners.id',$id);
		$this->db->update('home_owners',array('name'=>$this->input->post('name'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'counties'=>$this->input->post('county'),
			'profile_pic'=>$data_c["image_name"],
			//'category_id'=>$category,
			'address1'=>$this->input->post('address1'),
			'address2'=>$this->input->post('address2'),
			'phone_no'=>$this->input->post('phone_no'),
			'email'=>$this->input->post('email')));
	//echo $this->db->last_query();die();
		redirect('homeowner/profile', 'refresh');
	}
	
	
	
	
	
}


