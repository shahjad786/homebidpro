<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
public $data 	= 	array();
	public function __construct() {
		parent::__construct();
			if($this->session->userdata('logged_in'))
		   {
				$this->load->model('email_model');
				$this->load->helper('url'); //You should autoload this one ;)
				$this->load->helper('ckeditor');
				
				//Ckeditor's configuration
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
			}else{
			redirect('admin/login', 'refresh');
		 	}
		
	}
	
	public function index() {
		
			$this->data['result'] = $this->email_model->email_get();
			$data['content']=$this->load->view('email/emails',$this->data,TRUE);
			$this->load->view('includes/main',$data);
	}
	public function edit_email() {
		$this->data['result'] = $this->email_model->email_for_editor();
		$data['content']=$this->load->view('email/edit_emails',$this->data,TRUE);
		$this->load->view('includes/main',$data);	
	}
	public function update_email() {
		$id=$this->input->get('id');
		$this->db->where('id',$id);
		$query =  $this->db->update('hbp_email', array(
		'emails' => $this->input->post('data')));
		$this->session->set_flashdata('message', 'Email update successfully!');
		redirect('admin/email');
	}
}
