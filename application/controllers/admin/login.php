<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
  
	  function __construct()
	 {
	   parent::__construct();
	   $this->load->model('login_model');
	   $this->load->library('form_validation');
	 }
 
	public function index()
	 {
	   	$this->load->helper(array('form'));
		$data['result'] = $this->login_model->get_roles();
		$this->load->view('loginAdmin/login',$data);
	 }

	 function reset_now() {
		$data['result']= $this->input->get('email');
		$this->load->view('loginAdmin/passwordreset',$data);	
	 } 
	 function forgetpasswd_form() {
		
		$this->load->view('loginAdmin/forgetpassword');
	 } 
		
	 public function get_roles()
	 {
	   	$role_id=$this->input->post('role');
		   if($role_id==1)
		   {
			$data['country'] = $this->login_model->get_country();
			$data['result'] = $this->category_model->category_get();
			$this->load->view('contractor',$data);
		   }
		   else
		   {
			$data['country'] = $this->login_model->get_country();
			$data['result'] = $this->category_model->category_get();
			$this->load->view('homeowner',$data);
		   }
	 }


 	function forget_password(){
		 $this->load->library('form_validation');
		   $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		 
		   $this->form_validation->set_rules('emails','emails','required');
		   if($this->form_validation->run() == FALSE)
		   {
				$this->load->view('loginAdmin/forgetpassword');
		   }else{
			$query = $this->db->get_where('hbp_adminstrators', array('email'=>$this->input->post('emails')));
			
			    if(!$query->num_rows()>0){
				$this->session->set_flashdata('message', 'The email does not exists in our database.');

				redirect("admin/login/forget_password");
			    }else{ 
				$this->load->library('email');
				$this->email->set_newline("\r\n");

				$this->email->from('preetynarula94@gmail.com');
				$this->email->to($this->input->post('emails'));
				$this->email->subject('Hlo');
				$message = "Please click this url to change your password ". base_url()."admin/login/reset_now?email=".$this->input->post('emails');
				$message .="<br/>Thank you very much";
				$this->email->message($message);

				if($this->email->send())
					{
					 redirect('admin/login');
					}

					else
					{
					    show_error($this->email->print_debugger());
					}
			}
		}

	}


	//email check for forget password
	
	function update() {

		  $data = array(
			   'password' => $this->input->post('password'),
			  );
		  $this->db->where('email',$this->input->post('email'));
		  $query= $this->db->update('hbp_adminstrators', $data);
		  $this->load->view('loginAdmin/login',$data);
        }
 
}
 
?>
