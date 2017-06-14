<?php 

ob_start();
class Businessprofile extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->output->nocache();
		if($this->session->userdata('logged_in'))
		   {

			$session_data = $this->session->userdata('logged_in');
			$role_id =  $session_data['role_id']; 	
			//echo 	$role_id;die();
			if($role_id==2){
				$this->load->library('session');
				$this->load->model('jobs_model');
				$this->load->model('email_model');
				$this->load->model('homeowner_model');
				$this->load->model('category_model');
				$this->load->model('contractor_model');
				$this->load->model('login_model');
		 }else{
			redirect('contractor/login', 'refresh');
		}
	}
	else{
			//echo "no session";die("fdefdse");
			 redirect('contractor/login', 'refresh');
		}
}


   	public function index()
	{
		
		$data["result"] = $this->contractor_model->contractor_businessProfile_info();

		//echo "<pre>";print_r($data['result']);
		//die;

		if($data["result"]&&count($data["result"])>0)
			{

		    $data['content']= $this->load->view('businessProfile/editBusinessProfile',$data,TRUE);
			$this->load->view('includes/main',$data);

		}

		else{

				$data['content']= $this->load->view('businessProfile/businessProfile',TRUE);
			    $this->load->view('includes/main',$data);


		}

		
	}


	 public function businessProfile(){


	 	//$session_data = $this->session->userdata('logged_in');
	   // $contractor_id = $session_data['id'];
	 	$data["result"] = $this->contractor_model->contractor_businessProfile_info();

		//echo "<pre>";print_r($data['result']);
		//die;

		if($data["result"]&&count($data["result"])>0)
			{

		    $data['content']= $this->load->view('businessProfile/editBusinessProfile',$data,TRUE);
			$this->load->view('includes/main',$data);

		}

		else{

				$data['content']= $this->load->view('businessProfile/businessProfile',TRUE);
			    $this->load->view('includes/main',$data);


		}

	 }


















 public function insertData()
	{


	        $session_data = $this->session->userdata('logged_in');
	        $contractor_id = $session_data['id'];

			$starting_weekdays = $this->input->post('starting_weekdays');
			$ending_weekdays =  $this->input->post('ending_weekdays');
			$day3  = '-';


			$starting_weekend = $this->input->post('starting_weekend');
			$end_weekend =  $this->input->post('end_weekend');

			$starting_weekdays_time =	$this->input->post('starting_weekdays_time');
			$ending_weekdays_time   =  $this->input->post('ending_weekdays_time');



			$starting_weekend_time    =  $this->input->post('starting_weekend_time');
			$end_weekend_time		 = $this->input->post('end_weekend_time');


               $weekdays  =   $starting_weekdays . " " .$day3." " . $ending_weekdays; 
               $weekend  =   $starting_weekend . " " .$day3." " . $end_weekend; 
               $weekdays_time = $starting_weekdays_time . " " .$day3." " . $ending_weekdays_time; 
               $weekend_time = $starting_weekend_time . " " .$day3." " . $end_weekend_time; 




		$data = array(
			'weekdays' => $weekdays,
			'weekend' =>  $weekend,
			'weekdays_time' =>$weekdays_time,
			'weekend_time' =>$weekend_time,
			'employee' => $this->input->post('employee'),
			'contractor_id' => $contractor_id
		);

		  $this->db->insert('hbp_contractors_company',$data);

/*		  if(isset($insertData)&& count($insertData)>0)
		  {

		  	$this->session->unset_userdata("logged_in");
	        $this->session->sess_destroy();   
	        $contractor_Business   =  $this->contractor_model->business_status($row->id);

            $role_id = 2;
            //foreach($contractor_Business as $data);

            //print_r( $contractor_Business);die("hello");
            if(isset($contractor_Business) && count($contractor_Business)>0){

                $business_status = 1;
            }
            else{

                   $business_status = 0;
            }
              
            $session_data = array(
                 'id' => $row->id,
                 'name' => $row->name,
                 'country_id' =>$row->country_id,
                 'category_id' =>$row->category_id,
                 'company_name' =>$row->company_name,
                 'email' =>$row->email,
                 'address1' =>$row->address1,
                 'counties' =>$row->counties,
                 'phone_number' =>$row->phone_number,
                 'business_status' =>$business_status,
                 'role_id' => $role_id
                 
            );


                $this->session->set_userdata('logged_in', $session_data);	

*/

                redirect('contractor/businessprofile');

		  







		
		
	}




















	public function update()
	{
		
			$session_data = $this->session->userdata('logged_in');
	        $id =  $session_data['id'];

			$starting_weekdays = $this->input->post('starting_weekdays');
			$ending_weekdays =  $this->input->post('ending_weekdays');
			$day3  = '-';


			$starting_weekend = $this->input->post('starting_weekend');
			$end_weekend =  $this->input->post('end_weekend');

			$starting_weekdays_time =	$this->input->post('starting_weekdays_time');
			$ending_weekdays_time   =  $this->input->post('ending_weekdays_time');



			$starting_weekend_time    =  $this->input->post('starting_weekend_time');
			$end_weekend_time		 = $this->input->post('end_weekend_time');


               $weekdays  =   $starting_weekdays . " " .$day3." " . $ending_weekdays; 
               $weekend  =   $starting_weekend . " " .$day3." " . $end_weekend; 
               $weekdays_time = $starting_weekdays_time . " " .$day3." " . $ending_weekdays_time; 
               $weekend_time = $starting_weekend_time . " " .$day3." " . $end_weekend_time; 

		      $data = array(
					'weekdays' => $weekdays,
					'weekend' =>  $weekend,
					'weekdays_time' =>$weekdays_time,
					'weekend_time' =>$weekend_time,
					'employee' => $this->input->post('employee')
					
				);

		    $this->db->where('contractor_id',$id);
			$updateData = $this->db->update('contractors_company',$data);

					if($updateData)
					{

						redirect('contractor/businessprofile');
					}


	}
	
	
	
	
	
}


