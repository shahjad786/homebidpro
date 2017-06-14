<?php 
ob_start();
class Forgetpswd extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
     $this->output->nocache();
		 $this->load->library('session');
		 $this->load->model('jobs_model');
		 $this->load->model('contractor_model');
		 $this->load->model('category_model');
		 $this->load->model('question_model');
	}
   	function index() {

    //$this->load->view('forgetpassword/forgetpassword');
    $data['content']= $this->load->view('forgetpassword/forgetpassword','',TRUE);
			$this->load->view('includes/main',$data);
   }



  function forget_password(){

      $query = $this->db->get_where('hbp_home_owners', array('email'=>$this->input->post('email'))); 

      

          if(!$query->num_rows()>0){

        $this->session->set_flashdata('message', 'The email does not exists in our database.');

        redirect("homeowner/forgetpassword/forgetpasswd_form");

          }

          else{ 

        $this->load->library('email');

        $this->email->set_newline("\r\n");



        $this->email->from('preetynarula94@gmail.com');

        $this->email->to($this->input->post('email'));

        $this->email->subject('Hlo Homeowner');

        $message = "Please click this url to change your password ". base_url()."homeowner/forgetpswd/reset_now?email=".$this->input->post('email');

        $message .="<br/>Thank you very much";

        $this->email->message($message);



          if($this->email->send())

          {

           redirect('homeowner/login');

          }



          else

          {

              show_error($this->email->print_debugger());

          }

          }

  }



  function reset_now() {

    $data['result']= $this->input->get('email');

    //$this->load->view('forgetpassword/reset_password',$data); 
        $data['content']= $this->load->view('forgetpassword/reset_password',$data,TRUE);
			$this->load->view('includes/main',$data);
   } 

  function update() {

      $data = array(

         'password' => $this->input->post('password'),

        );

      $this->db->where('email',$this->input->post('email'));

      $query= $this->db->update('hbp_home_owners', $data);

       redirect('homeowner/login');

        }
	
	
	
	
}


