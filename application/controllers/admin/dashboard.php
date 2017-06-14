<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Dashboard extends CI_Controller {

	 function __construct()
	 {
	   	parent::__construct();
	   	if($this->session->userdata('logged_in'))
		   {
				$this->load->library('session');
				$this->load->model('dashboard_model');
			}else{
			redirect('admin/login', 'refresh');
		 }
	 }

	 function index()
	 {
			 $data['homeowner'] = $this->dashboard_model->allHomeowner();
		  	 $data['contractor'] =$this->dashboard_model->allContractor();
		  	 $data['jobs'] =      $this->dashboard_model->allJobs();
		  	 $data['jobbids'] =   $this->dashboard_model->allJobBid();
			//print_r($data['result'][0]->count);die; 
		    	$data['content']=$this->load->view('dashboard/dashboard',$data,TRUE);
			 $this->load->view('includes/main',$data);
		   
	}

	 function logout()
	 { 
	  	$this->session->unset_userdata("logged_in");
	  	$this->session->sess_destroy();
	   	redirect(base_url());
	 }

}

?>
