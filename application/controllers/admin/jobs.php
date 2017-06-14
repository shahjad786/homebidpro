<?php
/* $session_data = $this->session->userdata('logged_in');
$role_id =  $session_data['role_id'];  */
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		{
			 $this->load->library('session');
			 $this->load->model('jobs_model');
			 $this->load->model('homeowner_model');
			 $this->load->model('category_model');
		 }else{
			redirect('admin/login', 'refresh');
		}	 
	}

	public function index() {
			
			 $data['result'] = $this->jobs_model->jobs_get();
			 $data['content']=$this->load->view('jobs/jobs',$data,TRUE);
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
	           // $categories = explode(',',$value->cat_id);

				/*foreach($categories as $key1 => $val1) {
					$dataId[$key1] = $this->category_model->category_get_id($val1);
				}*/
				
				//$result[$key]->categories = $dataId;
        	}
        	$data["result"]     = $result;
        	//$data["ownerCategory"]=$homeowner;
		 $data['content']= $data['content']=$this->load->view('homeowner/job_detail',$data,TRUE);
		 $this->load->view('includes/main',$data);     
	}
	public function complete_information() {	
		 $id = $_GET['id'];
		 $job_id = $_GET['job_id'];
		 $this->db->select('hbp_contractors.name as contractor_name,hbp_home_owners.name as owner_name,hbp_job_bids.detail,hbp_job_bids.price,hbp_jobs.name,hbp_job_bids.start_time,hbp_job_bids.completed_time');
		$this->db->from('hbp_job_bids');
		$this->db->join('hbp_contractors', 'hbp_job_bids.contractor_id = hbp_contractors.id', 'left');
		$this->db->join('hbp_home_owners', 'hbp_job_bids.owner_id = hbp_home_owners.id', 'left');
		$this->db->join('hbp_jobs', 'hbp_job_bids.job_id = hbp_jobs.id', 'left');
	    $this->db->where(array('hbp_job_bids.contractor_id'=>$id,'hbp_job_bids.job_id' =>$job_id));
		$query = $this->db->get();
	
		 $data['result'] = $query->result();
		 $data['content']=$this->load->view('contractor/contractor_job_detail',$data,TRUE);
		 $this->load->view('includes/main',$data);     
	}
	
	public function job_comment() {	
		 $id = $_GET['id'];
		 $data['result'] = $this->jobs_model->jobs_comment($id);
		 $data['content']=$this->load->view('jobs/job_comment',$data,TRUE);
		 $this->load->view('includes/main',$data);
	}
	
	
	public function delete_comment() {
		$id=$this->input->get('id');
		

		$this->db->where('id',$id);
		$this->db->delete('job_comments');
		$this->session->set_flashdata('message', 'Comment printer_delete_dc(printer_handle) successfully!');
		redirect('admin/jobs');
	}
	
	
	public function create() {	
	
	
		/* $this->load->library('calendar');
		echo $this->calendar->generate(); */
	
		$data['country'] = $this->jobs_model->allCountry();
		$data['job_category'] =$this->jobs_model->allJobCategory();
		$data['content']=$this->load->view('jobs/create',$data,TRUE);
		$this->load->view('includes/main',$data);
	}


	
	public function delete_job() {
		$session_data = $this->session->userdata('logged_in');
        $email     = $session_data['email'];
		$id=$this->input->get('id');	
		$owner_id=$this->input->get('owner_id');
		$data = $this->jobs_model->findOwnerEmail($owner_id);
		$bidder = $this->jobs_model->findbidder($id);
		
		$merged_arr = array_merge($data,$bidder);
		//print_r($merged_arr);die();
		$this->db->where('id',$id);	
		$this->db->delete('jobs');
		$this->session->set_flashdata('message', 'Job deleted successfully!');
		$template_name = "Delete Job";
        $message = $this->email_model->email_get_by_type($template_name);
        $s =  $message['emails'];
        $message = str_replace("(Email)", $email, $s);
	    $this->email->set_newline("\r\n");
		foreach($merged_arr as $data){
			$this->email->set_mailtype("html");
			$this->email->from($email);
			$this->email->to($data->email);
			$this->email->subject('delete job');
			$this->email->message($message);
			$this->email->send();
		}
		redirect('admin/jobs');	
	}
	















	
	
	public function insert_job() {
		 
		$this->do_upload();
	}
	
	
	function do_upload()
    {    
     // echo"<pre>";  print_r($_FILES);die;
	  //echo"<pre>"; print_r($_REQUEST);
	  
	   $session_data = $this->session->userdata('logged_in');
	   $owner_id =  $session_data['id']; 
	 
	     /* $session_data = $this->session->userdata('logged_in');
         $role_id =  $session_data['role_id']; */
		 
	     
		$error_c = 0;
        foreach ($_FILES as $key => $value) {

            if (!empty($value['tmp_name'])) {


                if($key == "file1") {

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
						//failed display the errors
                    } else {

						$data = array('upload_data' => $this->upload->data());
						$data_c["image_name"] =  $data['upload_data']['file_name'];
				
                    }
                }
                if($key == "file2") {

                    $config11['upload_path'] = 'videos';
                    //$config11['upload_path'] = 'uploads';
                    $config11['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
                    $config11['max_size']='';
                    $config11['max_width']='200000000';
                    $config11['max_height']='1000000000000';
                    $this->upload->initialize($config11);
					$this->upload->overwrite = true;
					
                    if (! $this->upload->do_upload($key)) {
						$error_c= 1;
						$error = array('error' => $this->upload->display_errors());
						//failed display the errors
                    } else {
						$data = array('upload_data' => $this->upload->data());
						$data_c["video_name"] =  $data['upload_data']['file_name'];
					   
                    }
                } 
				
            }
			
			
        }
		
		if($error_c == 0)
		{
		    $query =  $this->db->insert('jobs', array(
			
			    'owner_id' => $role_id,
			    'image' => $data_c["image_name"],
			    'video' => $data_c["video_name"],
			    'name' =>  $this->input->post('name'),
				'price' => $this->input->post('price'),
				'country_id' => $this->input->post('country'),
				'category_id' => $this->input->post('job_category'),
				'project_discription' => $this->input->post('project_detail')));
			  
			  redirect('admin/jobs');
		}		
		
    }
	
	
	
	
}
