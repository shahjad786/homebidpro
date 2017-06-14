<?php

class Cmscontent extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in'))
		   {
			$this->load->helper(array('form', 'url'));
			$this->load->model('cmscontent_model');
		 }else{
			redirect('admin/login', 'refresh');
		 }
	}

	
	public function index()
	{
			
		$data['result'] =  $this->cmscontent_model->manageCms();
		$data['content']=$this->load->view('cmscontent/index',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	function create()
	{
		$data['data'] = "";
		$data['content']=$this->load->view('cmscontent/create',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	
	
	function addVideo()
	{
		$data['data'] = "";
		$data['content']=$this->load->view('cmscontent/addvideo',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	function video()
	{
		$data['result'] =  $this->cmscontent_model->allvideo();
		$data['content']=$this->load->view('cmscontent/video',$data,TRUE);
		$this->load->view('includes/main',$data);
	}

	
	function edit()
	{
		$id = $_GET['id'];
		$data['result'] =  $this->cmscontent_model->editCms($id);
		$data['content']=$this->load->view('cmscontent/edit',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	
	public function delete_cmsContent() {
		
		$id=$this->input->get('id');		
		$this->db->where('id',$id);	
		$this->db->delete('cmscontent');
		$this->session->set_flashdata('message', 'Cmscontent deleted successfully!');
		redirect('admin/cmscontent');
	
	
	}

	public function status(){
	    $id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$sql=$this->db->update("hbp_cmscontent",array('status'=>$status));		
		//echo $this->db->last_query();die();
		if($status==1){
			echo "Cmscontent activated successfully!";
		}else{
			echo "Cmscontent deactivated successfully!";
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

			 $query =  $this->db->insert('cmscontent', array(
			 'image' => $data_c["image_name"]));
			 $this->session->set_flashdata('message', 'New image added!');
			 redirect('admin/cmscontent');
	
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
			$query =  $this->db->update('cmscontent', array(
			'image' => $data_c["image_name"]));
			$this->session->set_flashdata('message', 'Cmscontent update successfully!');
			redirect('admin/cmscontent');
			 
				
				
		}
    }

	

					
}

?>