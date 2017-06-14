<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
public $data 	= 	array();
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		{
			$this->load->model('pages_model');
			$this->load->library('ckfinder');		
		}else{
			redirect('admin/login', 'refresh');
		}	
	}
	
	public function index() {
		//echo $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] .''.dirname($_SERVER['PHP_SELF']);die;
		$this->data['result'] = $this->pages_model->pages_get();
		$data['content']=$this->load->view('pages/pages',$this->data,TRUE);
		$this->load->view('includes/main',$data);	
	}
	
	public function create() {
		$data = "";
		$data['content']=$this->load->view('pages/create',$this->data,TRUE);
		$this->load->view('includes/main',$data);	
	}
	
	public function insert() {	
		
		$data = array(
			'page_title' => $this->input->post('page_title'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_discription' => $this->input->post('meta_discription'),
			'page_content' => $this->input->post('page_content')			
		);
	
		$insertData = $this->db->insert('pages',$data);
        if($insertData){
        	$this->session->set_flashdata('message', 'New page added!');
			redirect('admin/pages');	
		}
	}


	function do_upload()
    {    
     // echo"<pre>";  print_r($_FILES);
	 // die;
	  //echo"<pre>"; print_r($_REQUEST);
	  //die;
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
 
				
            }
			
			
        }

			 $query =  $this->db->insert('hbp_pages', array(
			'page_title' => $this->input->post('page_title'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_discription' => $this->input->post('meta_discription'),
			'page_content' => $this->input->post('page_content'),			
			'image' => $data_c["image_name"]));

			 $this->session->set_flashdata('message', 'New page added!!');
			 redirect('admin/pages');
	
}
      
elseif($imageEdit) {

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

      
			$this->db->where('id',$id);
			$query =  $this->db->update('hbp_pages', array(

			'page_title' => $this->input->post('page_title'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'meta_discription' => $this->input->post('meta_discription'),
			'page_content' => $this->input->post('page_content'),			
			'image' => $data_c["image_name"]));

			$this->session->set_flashdata('message', 'New page updated!');
			redirect('admin/pages');
			 
				
				
		}
    }






























	public function edit_pages() {
		$this->data['result'] = $this->pages_model->pages_for_editor();
		$data['content']=$this->load->view('pages/edit_pages',$this->data,TRUE);
		$this->load->view('includes/main',$data);	
	}
	public function update_pages() {
		
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$query =  $this->db->update('pages', array(
		    'page_title' =>$this->input->post('page_title'),
			'meta_keyword' =>$this->input->post('meta_keyword'),
			'meta_discription'=>$this->input->post('meta_discription'),
			'page_content' =>$this->input->post('page_content')));
		$this->session->set_flashdata('message', 'Page update successfully!');
		redirect('admin/pages');
	}
}
