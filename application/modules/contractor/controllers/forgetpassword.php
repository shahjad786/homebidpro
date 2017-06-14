<?php 
ob_start();
class Forgetpassword extends MX_Controller 
{
	public function __construct() {

		parent::__construct();
		$this->output->nocache();
		$this->load->library('session');
		
	}
   	public function index()
	{
		
		$data['content'] = $this->load->view('forgetpassword/forgetpassword');
		$this->load->view('includes/main',$data);

	}

	function forget_password(){
		
		$query = $this->db->get_where('contractors', array('email'=>$this->input->post('email'))); 
		if(!$query->num_rows()>0){			
			$this->session->set_flashdata('message', 'The email does not exists in our database.');
			redirect("contractor/forgetpassword/forgetpasswd_form");
		}
		else{ 

			$this->load->library('email');

			$this->email->set_newline("\r\n");
			$this->email->from('shahjada@ocodewire.com');

			$this->email->to($this->input->post('email'));

			$this->email->subject('Hlo Homeowner');

			$message = "Please click this url to change your password ". base_url()."contractor/forgetpassword/reset_now?email=".$this->input->post('email');

			$message .="<br/>Thank you very much";

			$this->email->message($message);

			if($this->email->send()){

				redirect('contractor/login');

			}
			else{

				show_error($this->email->print_debugger());
			}

		} 
	}

	function forgetpasswd_form() {

				$data['content'] = $this->load->view('forgetpassword/forgetpassword');
				$this->load->view('includes/main',$data);
						
	}

	function reset_now() {
		
		$data['result']= $this->input->get('email');
		$data['content'] = $this->load->view('forgetpassword/reset_password',$data);
        $this->load->view('includes/main',$data);	
	 } 

	function update(){
		
	  $password = $this->input->post('password');
	  $this->db->where('email',$this->input->post('email'));
	  $query = $this->db->update('contractors',array(
		'password' => $password));
      if($query){
		redirect('contractor/login');
	  }

	}
}
