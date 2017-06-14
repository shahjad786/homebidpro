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
			//echo 	$role_id;die();
			if($role_id==2){

				 $this->load->library('session');
				 $this->load->model('jobs_model');
				 $this->load->model('email_model');
				 $this->load->model('homeowner_model');
				 $this->load->model('category_model');
				 $this->load->model('contractor_model');
				 $this->load->model('login_model');
			 }else{
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
		
			$data['country'] = $this->jobs_model->allCountry();
			$data['job_category'] = $this->category_model->category_get();
		
			$data['state'] = $this->category_model->state_get();

           
			   $contractor = $this->contractor_model->contractor_profile_info();

			   $state_code  = $contractor[0]['code'];
			   	
			 $data['county'] = $this->category_model->county_get($state_code);


			//echo "<pre>";print_r($contractor);die;
			/*foreach($contractor as $key => $value) 
			{ 
				$categories = explode(',',$value->category_id);

				foreach($categories as $key1 => $val1) {
					$dataId[$key1] = $this->category_model->category_get_id($val1);
				}
				
				$contractor[$key]->categories = $dataId;
			}*/
			$data["result"] = $contractor;
			$data['content']= $this->load->view('profile/editProfile',$data,TRUE);
			$this->load->view('includes/main',$data);
		
	}
	public function update()
	{
		// echo "<pre>";
		//print_r($_REQUEST["image_data"])."<br>";
		// // print_r($_FILES);
		//  die;
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
        




		$category =   $_POST['job_category'];
		$counties =   $_POST['counties'];
		$data = array(

			'name' => $this->input->post('name'),

			'email' => $this->input->post('email'),

			//'password' => $password12,

			'profile_pic' => $data_c["image_name"],

			//'country_id' => $this->input->post('country'),
			
			'company_name' => $this->input->post('company_name'),
			
			'years_experience' => $this->input->post('experience'),

			//'category_id' => $category,

		   //	'address1' => $this->input->post('address1'),

			//'address2' => $this->input->post('address2'),

			'company_address' => $this->input->post('company_address'),

			'company_bio' => $this->input->post('company_bio'),

			'city' => $this->input->post('city'),

			'state_license_number' => $this->input->post('state_license_number'),

			'state' => $this->input->post('state'),
			
			//'counties' =>$counties,

			'phone_number' => $this->input->post('phone_no'),

			'status' => 1

			);


		//echo "<pre>";print_r($data);die;
		  $this->db->where('id',$id);
			$insertData = $this->db->update('contractors',$data);
						  

									                    $this->db->where('contractor_id',$id);
						          $delete_category  =   $this->db->delete('contractors_category');
					                					//echo $this->db->last_query();die;
					                

						  //	echo $this->db->last_query();die;
						                                 $this->db->where('contractor_id',$id);
                                $delete_counties  =      $this->db->delete('contractors_counties');
					                 
					                 


	     
	        foreach ($category as $key => $cat) {


	        	       $data1 =  array(
	        	       	 'category_id' => $cat,
	        	         'contractor_id' => $id
	        	        );

	        	
						 				//$this->db->where('id',$id);
						 				//$this->db->delete('*')
						 $this->db->insert('hbp_contractors_category',$data1);
						//echo $this->db->last_query();die;

         					
	        }

		      foreach ($counties as $key => $coun) {


					$data2 =  array(

						'counties_id' => $coun,
						'contractor_id' => $id
					);
		
					                //$this->db->where('id',$id);
					               // $this->db->delete('*')
					$insertData123 = $this->db->insert('hbp_contractors_counties', $data2);
					
							
			}

					if($insertData123)
					{


						redirect('contractor/profile');




					}


	}
	
	
	
	
	
}


