<?php 

ob_start();
class Dashboard extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->output->nocache();
		//$this->is_logged_in();
       // $this->clear_cache();
		$this->session->keep_flashdata('message');
		if($this->session->userdata('logged_in')){


		$session_data = $this->session->userdata('logged_in');
		$role_id =  $session_data['role_id']; 	
		//echo 	$role_id;die();
		if($role_id==2){

			$this->load->library('session');
			$this->load->model('contractor_model');
			$this->load->model('email_model');
			$this->load->model('homeowner_model');

		}

		else{
				redirect('contractor/login', 'refresh');
		}
   }
		else{
				//echo "no session";die("fdefdse");
				redirect('contractor/login', 'refresh');
		}
	}
	
	


    /* function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }*/


	public function index()
	{
		
		$session_data = $this->session->userdata('logged_in');
		$id =     $session_data['id'];
		//echo $id;
		//$data['business_status'] = $this->contractor_model->business_status($id);
		$data_c['category'] = $this->contractor_model->category($id);
		$data_c['counties'] = $this->contractor_model->counties($id);
		$data['result'] = $this->contractor_model->new_jobs($data_c);
		// echo "<pre>";print_r($data['result']);die("here is");

		$data['result1'] = $this->contractor_model->bidProject();
		//echo"<pre>";print_r($data['result1']);die;
		$data['accepted_project'] = $this->contractor_model->acceptedProject();
		$data['completed_project'] = $this->contractor_model->completedProject();
		$data['myresent'] = $this->contractor_model->myresentProject();
		$data['myreview'] = $this->contractor_model->myreviewProject();
		$data['content']= $this->load->view('dashboard/dashboard',$data,TRUE);
		$this->load->view('includes/main',$data);
	}

	 function logout()
	 {  

	 	  /*$session_data = $this->session->userdata('logged_in');
	 	  echo $id =     $session_data['id'];die("fdsgdfg");*/
		  $this->session->unset_userdata("logged_in");	  
		  $this->session->sess_destroy();
		  //$this->cache->clean();       
		  redirect('/');
	 }

}

