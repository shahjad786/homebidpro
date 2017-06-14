<?php

class Video extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in'))
		{ 
			$this->load->helper(array('form', 'url'));
			$this->load->model('video_model');
		}
		else{
			redirect('admin/login', 'refresh');
		}
	}	
	function addVideo()
	{
		$data['data'] = "";
		$data['content']=$this->load->view('video/addVideo',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	function index()
	{
		$data['result'] =  $this->video_model->allVideo();
		$data['content']=$this->load->view('video/index',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	function edit()
	{
		$id = $_GET['id'];
		$data['result'] =  $this->video_model->editVideo($id);
		$data['content']=$this->load->view('video/editVideo',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	public function delete_video() {
		
		$id=$this->input->get('id');		
		$this->db->where('id',$id);	
		$this->db->delete('video');
		$this->session->set_flashdata('message', 'Video deleted successfully!');
		redirect('admin/video');
	
	
	}	
	public function status(){
	    $id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$sql=$this->db->update("hbp_video",array('status'=>$status));		
		//echo $this->db->last_query();die();
		if($status==1){
			echo "Video activated successfully!";
		}else{
			echo "Video deactivated successfully!";
		}
	}
	function do_Upload()
    {    
       //echo"<pre>";  print_r($_FILES);
	  // die;
	  //echo"<pre>"; print_r($_REQUEST);
	  //die;
	    if(isset($_REQUEST['create'])){
		
			$videoCreate = $_REQUEST['create'];
		}
		if(isset($_REQUEST['edit'])){
			
			$videoEdit = $_REQUEST['edit'];
			$id = $_REQUEST['id'];
		}
		$error_c = 0;

		if(isset($videoCreate))
		{

          foreach($_FILES as $key => $value) {

            if (!empty($value['tmp_name'])) {
				
                if($key == "file1"){
                    $config['upload_path'] = 'videos';
                    $config['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
                    $config['max_size']='';
                    $config['max_width']='200000000';
                    $config['max_height']='1000000000000';
                    $this->load->library('upload',$config);
					$this->upload->overwrite = true;
                    if (!$this->upload->do_upload($key)) {
						$error_c= 1;
						$error = array('error' => $this->upload->display_errors());
						echo $this->upload->display_errors();die;
						//failed display the errors
                    } else {

						$data = array('upload_data' => $this->upload->data());
						$data_c["video_name"] =  $data['upload_data']['file_name'];
						//print_r($data_c["video_name"]);die;
				
                    }
                }
 
				
            }
			
			
        }


			$query =  $this->db->insert('hbp_video', array(
			'video' => $data_c["video_name"]));
			$this->session->set_flashdata('message', 'New video added!');
			redirect('admin/video');




	}
			
	elseif($videoEdit)
	{
	     
		if($_REQUEST["image_data"] == "0") {
			
		 foreach($_FILES as $key => $value) {

            if (!empty($value['tmp_name'])) {
				
                if($key == "file1"){
                    $config['upload_path'] = 'videos';
                    $config['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
                    $config['max_size']='';
                    $config['max_width']='200000000';
                    $config['max_height']='1000000000000';
                    $this->load->library('upload',$config);
					$this->upload->overwrite = true;
                    if (!$this->upload->do_upload($key)) {
						$error_c= 1;
						$error = array('error' => $this->upload->display_errors());
						echo $this->upload->display_errors();die;
						//failed display the errors
                    } else {

						$data = array('upload_data' => $this->upload->data());
						$data_c["video_name"] =  $data['upload_data']['file_name'];
						//print_r($data_c["video_name"]);die;
				
                    }
                }
 
				
            }
			
			
       }


   }

    else{

			$data_c["video_name"] = $_REQUEST["image_data"];

				
		}



	     $this->db->where('id',$id);
		 $query =  $this->db->update('video', array(
		'video' => $data_c["video_name"]));
		 $this->session->set_flashdata('message', 'Video update successfully!');
		 redirect('admin/video');
	 
	}
			
			
					
    }
    
	

					
}

?>