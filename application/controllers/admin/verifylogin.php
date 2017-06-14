<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Verifylogin extends CI_Controller {
 
	 function __construct()
	 {
	   parent::__construct(); 
	    $this->load->model('login_model');
	    $this->load->library('session');
	 }
 
	 function index()
	 {

		
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
	   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	 
	   $this->form_validation->set_rules('email','email','required');
	   $this->form_validation->set_rules('password','password','required|callback_check_database');
	  // $this->form_validation->set_rules('role_id','role_id','required');
	 
		   if($this->form_validation->run() == FALSE)
		   {
			    //die("b");
				//$data['result'] = $this->login_model->get_roles();
				$this->load->view('loginAdmin/login');
		   }
		   else
		   {
			   redirect('admin', 'refresh');
		   }
		 
	 }
 
	 function check_database($password)
	 {
	   $this->load->library('session');
	   $email = $this->input->post('email');
	   //$role_id = $this->input->post('role_id');
	   $result = $this->login_model->login($email, $password);
	   
	

		   if($result)
			   {
				 if(isset($_POST['remember'])) {
	
					$this->input->set_cookie('email', $_POST['email'], 3600);
					$this->input->set_cookie('password', $_POST['password'], 3600); 
		
	 			 }
				foreach($result as $row);
			     
					 $session_data = array(
						'id' => $row->id,
						'email' => $row->email
						//'cat_id' => $row->category_id,
						);
						// Add user data in session
					
						$this->session->set_userdata('logged_in', $session_data);
			    			return TRUE;
			   }
		  /* elseif($result){
			if(isset($_POST['remember'])) {
		       		setcookie('name', $_POST['name'], time()+60*60*24*365);
				setcookie('password', $_POST['password'], time()+60*60*24*365);
			}
			else {
				setcookie('name', $_POST['name'], false);
				setcookie('password', $_POST['password'], false);
			}
			foreach($result as $row);
		     
				 $session_data = array(
					'id' => $row->id,
					'name' => $row->name,
					'cat_id' => $row->category_id,
					'role_id' => $row->role_id,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
		    				 return TRUE;   
		    }*/
		    else
			   {
			    $this->session->set_flashdata('message','Wrong Credentials Enter.');

				redirect("admin/login");
			   }
 	}
}
?>
