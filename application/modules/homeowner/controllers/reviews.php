<?php
ob_start();
class Reviews extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->output->nocache();
        if($this->session->userdata('logged_in'))
           {

            $session_data = $this->session->userdata('logged_in');
            $role_id =  $session_data['role_id'];   
            //echo  $role_id;die();
            if($role_id==1){


             $this->load->library('session');
             $this->load->model('jobs_model');
             $this->load->model('email_model');
             $this->load->model('category_model');
             $this->load->model('question_model');
             $this->load->model('conversion_model');
              $this->load->model('contractor_model');
         }

     else{
            redirect('homeowner/login', 'refresh');
        }
   }

     else{
            redirect('homeowner/login', 'refresh');
        }
    
    }

    function index()
    {
		/*echo "<pre>";
		print_r($_POST);
		die("yes");*/
		$job_id=$this->input->post('job_id');
		$contractor_id=$this->input->post('contractor_id');
		$owner_id=$this->input->post('owner_id');
		$reviews=$this->input->post('reviews');
		$rating=$this->input->post('rating');


		$this->db->insert('hbp_contractor_job_reviews',array('owner_id'=>$owner_id,
								'job_id'=>$job_id,
								'contractor_id'=>$contractor_id,
								'rating'=>$rating,
								'reviews'=>$reviews,
                                'status' =>2));
		$adminEmail    = "prabhleenk@ocodewire.com";
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from("prabhleenk@ocodewire.com");
		$this->email->to($adminEmail);
		$this->email->subject('New Review Comes');
		$this->email->message($message);
		$this->email->send();
		// echo $this->db->last_query();
         //die();

    }

    
} 

?>