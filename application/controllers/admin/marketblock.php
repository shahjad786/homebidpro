<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketblock extends CI_Controller {
public $data 	= 	array();
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		{
		$this->load->model('marketblock_model');
		$this->load->helper('url'); //You should autoload this one ;)
		$this->load->helper('ckeditor');
		$this->load->library('ckfinder');
		
/*Ckeditor's configuration
		$this->data['ckeditor'] = array(
		
			//ID of the textarea that will be replaced
			'id' 	=> 	'content',
			'path'	=>	'assets/js/ckeditor',
		
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
					
			),
		
			//Replacing styles from the "Styles tool"
			'styles' => array(
			
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Blue',
						'font-weight' 		=> 	'bold'
					)
				),
				
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 		=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
		
		*/
}
		else{
			redirect('admin/login', 'refresh');
		}
	}
	
	public function index() {
		
	//	echo "hlo";die;
		//echo $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] .''.dirname($_SERVER['PHP_SELF']);die;
		$this->data['result'] = $this->marketblock_model->marketBlock_get();
		$data['content']=$this->load->view('marketBlock/marketBlock',$this->data,TRUE);
		$this->load->view('includes/main',$data);	
	}
	public function edit_marketBlock() {
		$this->data['result'] = $this->marketblock_model->marketBlock_for_editor();
		$data['content']=$this->load->view('marketBlock/edit_market_block',$this->data,TRUE);
		$this->load->view('includes/main',$data);	
	}
	public function update_marketBlock() {
		$id=$this->input->get('id');
		$this->db->where('id',$id);
		$query =  $this->db->update('market_block', array(
		'name' => $this->input->post('data')));
		redirect('admin/marketblock');
	}


function do_upload()
    {    
     //echo"<pre>";  print_r($_FILES);
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

			 $query =  $this->db->insert('market_block', array(
			'image' => $data_c["image_name"]));
			 $this->session->set_flashdata('message', 'New image added!');
			 redirect('admin/marketblock');
	
}
      
elseif($imageEdit) {

        if($_REQUEST["image_data"] == "0") {
			

        	$_REQUEST["image_data"];
			//echo "hello friend how r u";die;
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

      		$content = $_POST['content'];
      		$title = $_POST['title'];
      		$back_content = $_POST['back_content'];
      		$back_title = $_POST['back_title'];
			$this->db->where('id',$id);
			$query =  $this->db->update('market_block', array(
			'image' => $data_c["image_name"],
			'content' => $content,
			'title' => $title,
			'back_title' => $back_title,
			'back_content' => $back_content
			));
			$this->session->set_flashdata('message', 'marketblock update successfully!');
			redirect('admin/marketblock');
			 
				
				
		}
    }
}
