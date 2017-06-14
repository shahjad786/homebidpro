<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		   {
			 $this->load->library('session');
			 $this->load->model('category_model');
		 }else{
			redirect('admin/login', 'refresh');
		 }
	}

	public function index() {	
			$data['result'] = $this->category_model->category_get();
			$data['content']=$this->load->view('category/category',$data,TRUE);
			$this->load->view('includes/main',$data);	
	}
	public function add_category() {

		$data['content']=$this->load->view('category/add_category','',TRUE);
		$this->load->view('includes/main',$data);
	}
	public function edit_category() {
		$id=$this->input->get('id');
		$data['result'] = $this->category_model->category_get_id($id);
		//echo "<pre>";print_r($data['result']);die;
		$data['content']=$this->load->view('category/edit_category',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	public function delete_category() {
		$id=$this->input->get('id');
		$this->db->where('id',$id);
		$this->db->delete('job_categories');
		$this->session->set_flashdata('message', 'Category deleted successfully!');
		redirect('admin/category');
	}
	public function update_category() {
		$id=$this->input->post('job_category_id');
		$this->db->where('id',$id);
		$query =  $this->db->update('job_categories', array(
		'job_category' => $this->input->post('job_category')));
		$this->session->set_flashdata('message', 'Category update successfully!');
		redirect('admin/category');
	}


	function get_random_name()
    {
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit(1);
		$query = $this->db->get('hbp_image_name');
		// echo   $this->db->last_query();die;
		$query->result();
		foreach ($query->result() as $row) {


		     echo "<input type='hidden' name='name' value ='".$row->name."' id ='name' class='form-control input-sm'>";



		}

    }


	public function insert_category() {






		 $query =  $this->db->insert('job_categories', array(
		     'job_category' => $this->input->post('job_category'),
		     'images_name'  => $this->input->post('name'),
		     'status'  => 1,	
		));
		 $this->session->set_flashdata('message', 'New category added!');
		   if($query)
		   {
			redirect('admin/category');
		   }
		   else
		   {
		     return false;
		   }
	}
	
	public function status(){
		
	    $id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$this->db->update("hbp_job_categories",array('status'=>$status));		
		//echo $this->db->last_query();die();
		if($status==1){
			echo "Category activated successfully!";
		}else{
			echo "Category deactivated successfully!";
		}
	}




	function do_upload()
    {   

     //echo"<pre>";  print_r($_FILES);
	 //die;
	 //echo"<pre>"; print_r($_REQUEST);
	// die;
		if(isset($_REQUEST['create'])){
			
			$imageCreate = $_REQUEST['create'];
		}
		if(isset($_REQUEST['edit'])){
			
			$imageEdit = $_REQUEST['edit'];
			$id = $_REQUEST['id'];
		}
		$error_c = 0;

		if(isset($imageCreate)) {
        foreach ($_FILES as $key => $value) {

            if (!empty($value['tmp_name'])) {


                if($key == "file1") {

                    $config['upload_path'] = 'media/img';
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
 
				
            }
			
			
        }

			 $query =  $this->db->insert('hbp_job_categories', array(
			'images_name' => $data_c["image_name"],
			'job_category' => $this->input->post('job_category'),
			'status'  => 1));

			 //echo $this->db->last_query();
			// die;

			 $this->session->set_flashdata('message', 'New category added!');
			 redirect('admin/category');
	
}
      
elseif($imageEdit) {

        if($_REQUEST["image_data"] == "0") {

        	//echo "hello";die("if");
			
			foreach ($_FILES as $key => $value) {

	        	if (!empty($value['tmp_name'])) {


	            if($key == "file1") {

	                $file_type = $_FILES['file1']['type'];

	                    $config['upload_path'] = 'media/img';
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


			//echo "hello";die("else data is coming");
			$data_c["image_name"] = $_REQUEST["image_data"];

				
		}

      
			$this->db->where('id',$id);
			$query =  $this->db->update('hbp_job_categories', array(
			'images_name' => $data_c["image_name"],
			'job_category' => $this->input->post('job_category'),
			'status'  => 1));
			//echo $this->db->last_query();die;

			$this->session->set_flashdata('message', 'New category  update successfully!');
			redirect('admin/category');
			 
				
				
		}
    }


















}
