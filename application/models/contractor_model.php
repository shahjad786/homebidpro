<?php

Class Contractor_model extends CI_Model {
	
	public function contractor_get() {

		$data = array();
		$this->db->select('hbp_contractors.name,hbp_contractors.id,hbp_contractors.status,state.name as state_name,hbp_contractors.years_experience');
		$this->db->from('hbp_contractors');
		$this->db->join('state', 'hbp_contractors.state = state.code', 'left');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$contractors = $query->result_array();
		foreach($contractors as $key => $val) 
		{

			$this->db->select('job_categories.job_category');
			$this->db->from('contractors_category');
			$this->db->join('contractors', 'contractors.id = contractors_category.contractor_id', 'left');
			$this->db->join('job_categories', 'contractors_category.category_id = job_categories.id', 'left');
			$this->db->where('contractors_category.contractor_id', $val["id"]);
			$query = $this->db->get();
			$categories = $query->result_array();
			$contractors[$key]["contractor_category_ids"] = $categories;
			
			
			$this->db->select('county.county');
			$this->db->from('hbp_contractors_counties');
			$this->db->join('contractors', 'contractors.id = hbp_contractors_counties.contractor_id', 'left');
			$this->db->join('county', 'contractors_counties.counties_id = county.id', 'left');
			$this->db->where('contractors_counties.contractor_id', $val["id"]);
			$query = $this->db->get();
			$counties = $query->result_array();
			$contractors[$key]["contractor_counties_ids"] = $counties;



			// $this->db->select('counties_id');
			// $this->db->from('hbp_contractors_counties');
			// $this->db->where('contractor_id', $val["id"]);
			// $query = $this->db->get();
			// $counties = $query->result_array();
			// $contractors[$key]["contractor_counties_ids"] = $counties;

		}
		
		   // echo "<pre>";
			//print_r($contractors);
/*

		//echo "<pre>";
		//print_r($contractors);
		die;

		foreach($contractors as $key => $val) 
		{

			$contractor_id = $val["id"];
			$this->db->select("hbp_contractors_category.contractor_id,hbp_contractors_category.category_id,hbp_contractors_counties.counties_id, state.name as state_name,contractors.id,contractors.status,contractors.state,contractors.city,contractors.address2,contractors.address1,contractors.name,contractors.years_experience,contractors.country_id,job_categories.job_category, GROUP_CONCAT(hbp_contractors_category.category_id SEPARATOR ', ' ) AS category_id", false);
			$this->db->from('contractors');
			$this->db->where('contractors.id',$contractor_id);
			$this->db->join('state', 'contractors.state = state.code', 'left');
			$this->db->join('contractors_category', 'contractors.id = contractors_category.contractor_id', 'left');
			$this->db->join('hbp_contractors_counties', 'contractors.id = hbp_contractors_counties.contractor_id', 'left');
			$this->db->join('job_categories', 'contractors_category.category_id = job_categories.id', 'left');
		    $query = $this->db->get();
		     echo  $this->db->last_query();die;

		  if($query){
			$data[]=  $query->row();


		   //echo "<pre>";print_r($data);

		} else {

			return false;

		} 
 
}
*/


		if($contractors){

				return $contractors;


		}else {

			return false;

		} 

	}

/*public function contractor_counties() {

		$data1 = array();
		$this->db->select('*');
		$this->db->from('hbp_contractors');
		$query = $this->db->get();
		$contractors = $query->result_array();
		foreach($contractors as $key => $val) 
		{

			$contractor_id = $val["id"];
			$this->db->select("contractor_counties.contractor_id,contractor_counties.counties_id,GROUP_CONCAT(contractor_counties.counties_id SEPARATOR ', ' ) AS counties_id", false);
			$this->db->from('contractors');
			$this->db->where('contractors.id',$contractor_id);
			$this->db->join('hbp_contractors_counties', 'contractors.id = hbp_contractors_counties.contractor_id', 'left');
		    $query = $this->db->get();
		     // echo  $this->db->last_query();die;

		  if($query){
			$data1[]=  $query->row();


		   //echo "<pre>";print_r($data);

		} else {

			return false;

		} 
 
}
		if($data1){

				return $data1;


		}else {

			return false;

		} 

	}
*/
		public function contractor_profile_info() {
			$session_data = $this->session->userdata('logged_in');
	        $id =  $session_data['id']; 
			$this->db->select('contractors.id,contractors.email,contractors.city,contractors.profile_pic,contractors.country_id,contractors.company_address,contractors.password,contractors.name,state.code,contractors.company_name,contractors.company_bio,contractors.phone_number,contractors.years_experience,contractors.state_license_number');

			$this->db->from('contractors');
			$this->db->join('state', 'hbp_contractors.state = state.code', 'left');
			$this->db->where('contractors.id',$id);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$contractors = $query->result_array();
		foreach($contractors as $key => $val);

		    $this->db->select('job_categories.id');
			$this->db->from('contractors_category');
			$this->db->join('contractors', 'contractors.id = contractors_category.contractor_id', 'left');
			$this->db->join('job_categories', 'contractors_category.category_id = job_categories.id', 'left');
			$this->db->where('contractors_category.contractor_id', $id);
			$query = $this->db->get();
			$categories = $query->result_array();
			$contractors[$key]["contractor_category_ids"] = $categories;
			
			
			$this->db->select('county.id');
			$this->db->from('hbp_contractors_counties');
			$this->db->join('contractors', 'contractors.id = hbp_contractors_counties.contractor_id', 'left');
			$this->db->join('county', 'contractors_counties.counties_id = county.id', 'left');
			$this->db->where('contractors_counties.contractor_id', $id);
			$query = $this->db->get();
			$counties = $query->result_array();
			$contractors[$key]["contractor_counties_ids"] = $counties;

		if($contractors){


			//echo "<pre>";print_r($contractors);die;
			return $contractors;

		} else {

			return false;

		}

	}

	public function contractor_businessProfile_info()
	{


		$session_data = $this->session->userdata('logged_in');
	    $id =  $session_data['id'];
		$this->db->select('*');
		$this->db->from('contractors_company');
		$this->db->where('contractors_company.contractor_id',$id);
		$query = $this->db->get();


		if($query){

			return $query->row();

		} else {

			return false;

		}


	}

	public function contractor_businessProfile_infoadmin($id)
	{


		//$session_data = $this->session->userdata('logged_in');
	    //$id =  $session_data['id'];
		$this->db->select('*');
		$this->db->from('contractors_company');
		$this->db->where('contractors_company.contractor_id',$id);
		$query = $this->db->get();


		if($query){

			return $query->row();

		} else {

			return false;

		}


	}

	public function business_status($id) {
		$this->db->select('*');
		$this->db->from('contractors_company');
		$this->db->where('contractor_id',$id);
		$query = $this->db->get();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}








	public function contractor_data($id) {

	

		$this->db->select('contractors.id,contractors.profile_pic,contractors.email,contractors.country_id,contractors.company_address,contractors.password,contractors.name,state.code,state.name as state_name,contractors.company_name,contractors.phone_number,contractors.years_experience,contractors.state_license_number');

		$this->db->from('contractors');
		$this->db->join('state', 'hbp_contractors.state = state.code', 'left');
		$this->db->where('contractors.id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$contractors = $query->result_array();
		foreach($contractors as $key => $val);

		    $this->db->select('job_categories.id');
			$this->db->from('contractors_category');
			$this->db->join('contractors', 'contractors.id = contractors_category.contractor_id', 'left');
			$this->db->join('job_categories', 'contractors_category.category_id = job_categories.id', 'left');
			$this->db->where('contractors_category.contractor_id', $id);
			$query = $this->db->get();
			$categories = $query->result_array();
			$contractors[$key]["contractor_category_ids"] = $categories;
			
			
			$this->db->select('county.id');
			$this->db->from('hbp_contractors_counties');
			$this->db->join('contractors', 'contractors.id = hbp_contractors_counties.contractor_id', 'left');
			$this->db->join('county', 'contractors_counties.counties_id = county.id', 'left');
			$this->db->where('contractors_counties.contractor_id', $id);
			$query = $this->db->get();
			$counties = $query->result_array();
			$contractors[$key]["contractor_counties_ids"] = $counties;

		//echo "<pre>";print_r($contractors);die;
		//$this->db->join('countries', 'contractors.country_id = countries.id', 'left');

		//$this->db->join('job_categories', 'contractors.category_id = job_categories.id', 'left');

		//$query = $this->db->get();		

		/* $this->db->select('hbp_home_owners.id,hbp_home_owners.name,hbp_home_owners.email,hbp_home_owners.property_address,hbp_home_owners.phone_no,hbp_home_owners.username,hbp_home_owners.password,countries.country');

		$this->db->from('hbp_home_owners');

		$this->db->where('hbp_home_owners.id',$id);

		$this->db->join('countries', 'hbp_home_owners.country_id = countries.id', 'left');

		$query = $this->db->get(); */

		if($contractors){


			//echo "<pre>";print_r($contractors);die;
			return $contractors;

		} else {

			return false;

		}

			

}

	

	public function contractor_history1($id){

	

		$this->db->select('job_bids.id,job_bids.start_time,jobs.name as job_name,job_bids.completed_time,job_bids.detail,job_bids.price,contractors.name as username,home_owners.name as owner_name');

		$this->db->from('job_bids');

		$this->db->where('contractors.id',$id);

		$this->db->join('contractors', 'job_bids.contractor_id = contractors.id', 'left');

		$this->db->join('jobs', 'job_bids.job_id = jobs.id', 'left');

		$this->db->join('home_owners', 'job_bids.owner_id = home_owners.id', 'left');

		$query = $this->db->get();	
		//echo $this->db->last_query();die;			 

		if($query){

			return $query->result();

		} else {

			return false;

		}

		

	}	 

	

	public function contractor_history($id,$cat) {



			$this->db->select('jobs.project_discription,job_bids.status,job_bids.id');

			$this->db->from('job_bids');

			$this->db->where(array('job_bids.status'=>0,'job_bids.category_id'=>$cat,'job_bids.contractor_id'=>$id));

			$this->db->join('hbp_jobs', 'hbp_job_bids.job_id = hbp_jobs.id', 'left');

			$query = $this->db->get();

			if($query){

				return $query->result();

			} else {

				return false;

			}

	}



	public function complete_job_history() {

 			$id=$this->input->get('id');

			$this->db->select('hbp_home_owners.name,hbp_contractors.name,hbp_jobs.project_discription,hbp_payments.payment,hbp_payments.id,hbp_payments.location,hbp_job_bids.start_time,hbp_job_bids.completed_time');

			$this->db->from('hbp_job_bids');

			$this->db->where('hbp_job_bids.id',$id);

			$this->db->join('hbp_home_owners', 'hbp_job_bids.owner_id = hbp_home_owners.id', 'left'); 

			$this->db->join('hbp_contractors', 'hbp_job_bids.contractor_id = hbp_contractors.id', 'left');

			$this->db->join('hbp_jobs', 'hbp_job_bids.job_id = hbp_jobs.id', 'left');

    		$this->db->join('hbp_payments', 'hbp_job_bids.job_id = hbp_payments.id', 'left');

			$query = $this->db->get();

			//echo $this->db->last_query();die();



			if($query){

				return $query->result();

			} else {

				return false;

			}

	}



	/* public function new_jobs($category_id,$country_id) {
		
			$this->db->select('jobs.id,jobs.name,jobs.owner_id,jobs.category_id,jobs.status,jobs.started_time,jobs.expire_time,COUNT(jb.job_id) as count');
			$this->db->from('hbp_jobs');
			$this->db->where(array('jobs.category_id'=>$category_id,'hbp_jobs.country_id'=>$country_id,'jobs.status'=>'1'));
			$this->db->join('job_bids jb', 'jobs.id = jb.job_id', 'left');
		    $this->db->group_by('jobs.id');	
			//$this->db->order_by('created_at','Desc');		

			$query = $this->db->get();
			//echo $this->db->last_query();
			//die;

			if($query){

				return $query->result();

			} else {

				return false;

			}

	} */

	
	public function new_jobs($data_c) {

		
		$category_id = $data_c['category'];

		

		$counties_id = $data_c['counties'];

		/*echo "<pre>";print_r($category_id);

        echo "<pre>";print_r($counties_id);

		die;
*/
		foreach ($category_id as $key => $value) {

			$category_ids[] = $value->category_id;

		}
		foreach ($counties_id as $key => $value) {

			$counties_ids[] = $value->counties_id;

		}

		if(isset($category_ids) && isset($category_id)){

			$contractor_category_ids = $category_ids;
		    $contractor_counties_id = $counties_ids;

		}
		$session_data = $this->session->userdata('logged_in');
	    $contractor_id =  $session_data['id']; 	
		$this->db->select('*');
		$this->db->from('job_bids');
		$this->db->where(array('job_bids.contractor_id'=>$contractor_id));
		$query1 =  $this->db->get();
		$all_data_here = $query1->result();
	 // echo "<pre>";print_r($all_data_here);die;
		foreach($all_data_here as $data){
			

			$sa[] = $data->job_id;
		}
         
       // echo "<pre>";print_r($sa);die;
        $this->db->distinct();
		$this->db->select('jobs.id,jobs.price,jobs.country_id,jobs.project_discription,county.county,state.name as state_name,home_owners.name as owner_name , job_categories.job_category,jobs.name,jobs.owner_id,jobs.category_id,jobs.status,jobs.created_at as started_time,jobs.expire_time,COUNT(distinct jb.id) as bids,COUNT(distinct hbp_communication.id) as count_msg,MIN(jb.price) as minbid');
		
    //$this->db->select('hbp_jobs.id');
	    $this->db->from('hbp_jobs');
	    //if(isset($contractor_category_ids) && isset($contractor_counties_id)){

		$this->db->where_in("jobs.counties",$contractor_counties_id);
		$this->db->where_in("jobs.category_id",$contractor_category_ids);
		//}
		$this->db->where("jobs.status",1);
		//$this->db->join('hbp_jobs', 'jobs.id = hbp_jobs_categories.job_id', 'LEFT');
		

		$this->db->join('county', 'jobs.counties = county.id', 'left');
		$this->db->join('state', 'jobs.state = state.code', 'left');
		$this->db->join('job_categories', 'jobs.category_id = job_categories.id', 'left');
		$this->db->join('hbp_home_owners', 'jobs.owner_id = hbp_home_owners.id', 'left');
		$this->db->join('job_bids jb', 'jobs.id = jb.job_id', 'left');
		$this->db->join('communication', 'jobs.id = communication.job_id', 'left');
		$this->db->group_by('hbp_jobs.id');
		$this->db->order_by('jobs.id', 'DESC');
		//$this->db->distinct();

		/*if(isset($sa)){

			$this->db->where_not_in('jobs.id',$sa);
	    }*/

		$query2 =  $this->db->get();

	   //echo $this->db->last_query();die;
		$jobs = $query2->result_array();
		
	
		foreach($jobs as $key => $val) 
		{

			$this->db->select('job_categories.job_category');
			$this->db->from('jobs_categories');
			$this->db->join('jobs', 'jobs.id = jobs_categories.job_id', 'left');
			$this->db->join('job_categories', 'jobs_categories.category_id = job_categories.id', 'left');
			$this->db->where('jobs_categories.job_id', $val["id"]);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$categories = $query->result_array();
			$jobs[$key]["jobs_category_ids"] = $categories;
			
   }
   
  		/*$this->db->select('*');
		$this->db->from('job_bids');
		$this->db->where_in("job_bids.job_id",$sa);
		$query1 =  $this->db->get();
		$all_data_here = $query1->result();
	    echo "<pre>";print_r($all_data_here);die;*/


	    //echo "<pre>";print_r($jobs);die;
        foreach($jobs as $key => $val) 
		{
         //print_r($val);
			$this->db->select('price');
			$this->db->from('job_bids');
			$this->db->where("job_bids.contractor_id",$contractor_id);
			$this->db->where("job_bids.job_id",$val['id']);
		    $query22 =  $this->db->get();
		    $biddes = $query22->row();
		    if($biddes)
		    {
		    	$jobs[$key]["mybid"] = $biddes->price;
		    }
		    
			
			
       }

		
		//	echo $this->db->last_query();die;
			return $jobs;
		
		
		

	} 
	
	
	
	public function bidProject() {

	
	    $session_data = $this->session->userdata('logged_in');
	    $contractor_id =  $session_data['id']; 	
	    $this->db->select('*');
		$this->db->from('job_bids');
		$this->db->where(array('job_bids.contractor_id'=>$contractor_id,'job_bids.status'=>2));
		$query1 =  $this->db->get();
		$all_data_here = $query1->result();
		//echo "<pre>";print_r($all_data_here);die;
		foreach($all_data_here as $data){
			

			$accepted_job_id[] = $data->job_id;
		}


		$this->db->select('job_bids.applied_date,job_bids.completed_time,job_bids.start_time,job_bids.price,job_bids.detail,job_bids.job_id,jobs.id,jobs.name,jobs.project_discription,state.name as state_name,home_owners.name as owner_name,county.county,jobs.status,jobs.created_at as started_time,jobs.expire_time');
		$this->db->from('job_bids');
		$this->db->where(array('job_bids.contractor_id'=>$contractor_id));
		$this->db->join('jobs', 'job_bids.job_id = jobs.id', 'left');
		//$this->db->join('hbp_jobs_categories', 'jobs.id = hbp_jobs_categories.job_id', 'LEFT');
		$this->db->join('county', 'jobs.counties = county.id', 'left');
		$this->db->join('state', 'jobs.state = state.code', 'left');
		$this->db->join('hbp_home_owners', 'jobs.owner_id = hbp_home_owners.id', 'left');
		

		if(isset($accepted_job_id)){

			$this->db->where_not_in('jobs.id',$accepted_job_id);
	    }

		 $query     =  $this->db->get();
		//echo  $this->db->last_query();
		// die;
		 $jobs_bid  = $query->result_array();

		 foreach($jobs_bid as $key => $val) 
		 {

			$this->db->select('job_categories.job_category');
			$this->db->from('jobs_categories');
			$this->db->join('jobs', 'jobs.id = jobs_categories.job_id', 'left');
			$this->db->join('job_categories', 'jobs_categories.category_id = job_categories.id', 'left');
			$this->db->where('jobs_categories.job_id', $val["id"]);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$categories = $query->result_array();
			$jobs_bid[$key]["jobs_category_ids"] = $categories;
			
        }

		
			
			return $jobs_bid;

		/*if($query){
			
			return $query->result();
		}		
		else {
			return false;
		}*/
	}

	public function acceptedProject() {


	    $session_data = $this->session->userdata('logged_in');
	    $contractor_id =  $session_data['id']; 	

	    $this->db->select('*');
		$this->db->from('job_bids');
		$this->db->where(array('job_bids.contractor_id'=>$contractor_id,'job_bids.status'=>2,'completed_status' =>1));
		$query1 =  $this->db->get();
		$all_data_here = $query1->result();
		//echo "<pre>";print_r($all_data_here);die;
		foreach($all_data_here as $data){
			

			$completed_job_id[] = $data->job_id;
		}

		$this->db->select('job_bids.accepted_date,job_bids.completed_time,job_bids.start_time,job_bids.price,job_bids.detail,job_bids.job_id,job_bids.id as job_bid_id,jobs.id,jobs.name,jobs.project_discription,state.name as state_name,home_owners.name as owner_name,county.county,jobs.status,jobs.created_at as started_time,jobs.expire_time');
		$this->db->from('job_bids');
		$this->db->where(array('job_bids.contractor_id'=>$contractor_id,'job_bids.status'=>2));
		$this->db->join('jobs', 'job_bids.job_id = jobs.id', 'left');
		//$this->db->join('hbp_jobs_categories', 'jobs.id = hbp_jobs_categories.job_id', 'LEFT');
		$this->db->join('county', 'jobs.counties = county.id', 'left');
		$this->db->join('state', 'jobs.state = state.code', 'left');
		$this->db->join('hbp_home_owners', 'jobs.owner_id = hbp_home_owners.id', 'left');
	
		if(isset($completed_job_id)){

			$this->db->where_not_in('jobs.id',$completed_job_id);
	    }


		$query =  $this->db->get();

		$jobs_accepted  = $query->result_array();

		 foreach($jobs_accepted as $key => $val) 
		 {

			$this->db->select('job_categories.job_category');
			$this->db->from('jobs_categories');
			$this->db->join('jobs', 'jobs.id = jobs_categories.job_id', 'left');
			$this->db->join('job_categories', 'jobs_categories.category_id = job_categories.id', 'left');
			$this->db->where('jobs_categories.job_id', $val["id"]);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$categories = $query->result_array();
			$jobs_accepted[$key]["jobs_category_ids"] = $categories;
			
        }
			
			return $jobs_accepted;
}



public function completedProject() {

		//echo "hello";die;
	    $session_data = $this->session->userdata('logged_in');
	    $contractor_id =  $session_data['id']; 	
		$this->db->select('job_bids.job_id,job_bids.completed_time,job_bids.start_time,job_bids.price,job_bids.detail,job_bids.updated_at,jobs.id,jobs.name,jobs.project_discription,state.name as state_name,home_owners.name as owner_name,county.county,jobs.status,jobs.created_at as started_time,jobs.expire_time');
		$this->db->from('job_bids');

		$this->db->where(array('job_bids.contractor_id'=>$contractor_id,'job_bids.status'=>2));
		$this->db->where('hbp_job_bids.completed_status',1);
		$this->db->join('jobs', 'job_bids.job_id = jobs.id', 'left');
		//$this->db->join('hbp_jobs_categories', 'jobs.id = hbp_jobs_categories.job_id', 'LEFT');
		$this->db->join('county', 'jobs.counties = county.id', 'left');
		$this->db->join('state', 'jobs.state = state.code', 'left');
		$this->db->join('hbp_home_owners', 'jobs.owner_id = hbp_home_owners.id', 'left');
		

		$query =  $this->db->get();
		 //echo $this->db->last_query();die;
		$jobs_completed  = $query->result_array();

		 foreach($jobs_completed as $key => $val) 
		 {

			$this->db->select('job_categories.job_category');
			$this->db->from('jobs_categories');
			$this->db->join('jobs', 'jobs.id = jobs_categories.job_id', 'left');
			$this->db->join('job_categories', 'jobs_categories.category_id = job_categories.id', 'left');
			$this->db->where('jobs_categories.job_id', $val["id"]);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$categories = $query->result_array();
			$jobs_completed[$key]["jobs_category_ids"] = $categories;
			
        }
			
			return $jobs_completed;
}


       public function myresentProject() {

		//echo "hello";die;
	    $session_data = $this->session->userdata('logged_in');
	    $contractor_id =  $session_data['id']; 	
		$this->db->select('job_bids.job_id,job_bids.updated_at,jobs.id,jobs.name,contractor_job_reviews.rating, contractor_job_reviews.status,contractor_job_reviews.created_at');
		$this->db->from('job_bids');

		$this->db->where(array('job_bids.contractor_id'=>$contractor_id));
		$this->db->where('job_bids.completed_status',1);
		$this->db->join('jobs', 'job_bids.job_id = jobs.id', 'left');
		//$this->db->join('hbp_jobs_categories', 'jobs.id = hbp_jobs_categories.job_id', 'LEFT');
		$this->db->join('contractor_job_reviews', 'jobs.id = contractor_job_reviews.job_id', 'left');
		

		$query =  $this->db->get();
		 //echo $this->db->last_query();die;
		$jobs_completed  = $query->result_array();
 
			
			return $jobs_completed;
}


  public function recent_jobs($contractor_id) {

		//echo "hello";die;
	   // $session_data = $this->session->userdata('logged_in');
	    $contractor_id =  $contractor_id; 	
		$this->db->select('job_bids.job_id,job_bids.updated_at,jobs.id,jobs.name,contractor_job_reviews.rating,contractor_job_reviews.status,contractor_job_reviews.created_at');
		$this->db->from('job_bids');
		$this->db->where(array('job_bids.contractor_id'=>$contractor_id));
		$this->db->where('job_bids.completed_status',1);
		$this->db->join('jobs', 'job_bids.job_id = jobs.id', 'left');
		//$this->db->join('hbp_jobs_categories', 'jobs.id = hbp_jobs_categories.job_id', 'LEFT');
		$this->db->join('contractor_job_reviews', 'jobs.id = contractor_job_reviews.job_id', 'left');
		

		$query =  $this->db->get();
		 //echo $this->db->last_query();die;
		$jobs_completed  = $query->result_array();
 
			
			return $jobs_completed;
}






















public function myreviewProject() {

		//echo "hello";die;
	    $session_data = $this->session->userdata('logged_in');
	    $contractor_id =  $session_data['id']; 	
		$this->db->select('contractor_job_reviews.rating,contractor_job_reviews.status,contractor_job_reviews.reviews,contractor_job_reviews.created_at,jobs.name,home_owners.name as h_o_name,home_owners.profile_pic as p_pic');
		$this->db->from('contractor_job_reviews');

		$this->db->where(array('contractor_job_reviews.contractor_id'=>$contractor_id));
		$this->db->join('jobs', 'contractor_job_reviews.job_id = jobs.id', 'left');
		$this->db->join('home_owners', 'home_owners.id = contractor_job_reviews.owner_id', 'left');
		

		$query =  $this->db->get();
		 //echo $this->db->last_query();die;
		$reviews  = $query->result_array();
 
			
			return $reviews;
}


	
	public function new_job_history() {

 			$id=$this->input->get('id');

			$this->db->select('home_owners.name,jobs.price,jobs.id,jobs.category_id,jobs.owner_id,job_categories.job_category,jobs.project_discription');

			$this->db->from('hbp_jobs');

			$this->db->where('hbp_jobs.id',$id);

			$this->db->join('hbp_home_owners', 'hbp_jobs.owner_id = hbp_home_owners.id', 'left');

			//$this->db->join('hbp_jobs', 'hbp_job_bids.job_id = hbp_jobs.id', 'left');

			$this->db->join('hbp_job_categories', 'hbp_jobs.category_id = hbp_job_categories.id', 'left');

			$query = $this->db->get();

			if($query){

				return $query->result();

			} else {

				return false;

			}

	}



	public function get_countries(){

		$this->db->select('*');

		$this->db->from('hbp_countries');

		$query = $this->db->get();

		//echo $this->db->last_query();

		//die();

		if($query){

			return $query->result();

		} else {

			return false;

		}

	}
	
	public function contractor_get_by_id($countiesForSearch,$categoryForSearch) {
		

		/* echo $countiesForSearch;
		 echo "<pre>"; print_r($categoryForSearch);

		die;*/


		//echo "shahzad";die;
		//echo $countiesForSearch;die;
		//print_r($categoryForSearch);die;
		$this->db->select ('contractors.id as contractor_id,contractors.email');
		$this->db->from('hbp_contractors_counties');
		$this->db->where_in('hbp_contractors_counties.counties_id', $countiesForSearch);
		$this->db->where_in('hbp_contractors_category.category_id', $categoryForSearch);
		$this->db->join('hbp_contractors_category', 'hbp_contractors_counties.contractor_id = hbp_contractors_category.contractor_id', 'left');
		$this->db->join('hbp_contractors', 'hbp_contractors_category.contractor_id = hbp_contractors.id', 'left');
		$this->db->group_by('contractors.id');
		$query = $this->db->get();

		//echo $this->db->last_query();

		 //die;

		//$ss = $query->result();






		



		//$query1 = $this->db->get();
		//$ss1 = $query->result();
		//echo "<pre>";print_r($ss1);die;
		//echo $this->db->last_query();die;
		if($query){

			return $query->result();

		} else {

			return false;

		}

	}
	
	
	
	public function category($id){


			$this->db->select('*');
			$this->db->from('hbp_contractors_category');
            $this->db->where('contractor_id', $id);
			$query = $this->db->get();

			//echo $this->db->last_query();die;
       if($query){

			return $query->result();

		} else {

			return false;

		}




	}
	
	
 public function new_projects($category_id) {


 		$data = array();
	
		$this->db->select('*');
	    $this->db->from('hbp_jobs');		
		$this->db->where("jobs_categories.category_id",$category_id);
		$this->db->join('hbp_jobs_categories', 'jobs.id = hbp_jobs_categories.job_id', 'LEFT');
		$query2 =  $this->db->get();

		//echo $this->db->last_query();die;	
		$jobs = $query2->result_array();

        //echo "<pre>";print_r($jobs);die;

	    foreach($jobs as $key => $val) 
		{

			$job_id = $val['job_id'];	
			$this->db->select('*');
			$this->db->from('job_bids');
			$this->db->where(array('job_bids.job_id' => $job_id));
			$this->db->where(array('job_bids.Status' => 2));
			$query1 =  $this->db->get();

			//echo $this->db->last_query();die;
			$all_data_here[] = $query1->row();
			//echo "<pre>";print_r($all_data_here);die;
			


}

			//echo "<pre>";print_r($all_data_here);die;


		if(isset($all_data_here) && count($all_data_here)>0){
	      foreach($all_data_here as $value){
				
	      		if(isset($value->job_id) && count($value->job_id) >0){
				    $sa[] = $value->job_id;

				}
			}
}
				


		foreach($jobs as $key12 => $val12) 
		{

			$job_id = $val12['job_id'];

			$this->db->select('jobs_categories.id,jobs.id,jobs.country_id,jobs.project_discription,county.county,state.name as state_name,home_owners.name as owner_name , job_categories.job_category,jobs.name,jobs.owner_id,jobs.category_id,jobs.status,jobs.created_at as started_time,jobs.expire_time');
			$this->db->from('hbp_jobs');
			$this->db->where("hbp_jobs.id",$job_id);
			$this->db->join('hbp_jobs_categories', 'jobs.id = hbp_jobs_categories.job_id', 'LEFT');
			$this->db->join('county', 'jobs.counties = county.id', 'left');
			$this->db->join('state', 'jobs.state = state.code', 'left');
			$this->db->join('job_categories', 'jobs.category_id = job_categories.id', 'left');
			$this->db->join('hbp_home_owners', 'jobs.owner_id = hbp_home_owners.id', 'left');
			
			 if(isset($sa)){

					$this->db->where_not_in('jobs.id',$sa);
			    }

			$query = $this->db->get();
			$data[] = $query->row();

			
}					

					//echo "<pre>";print_r($data);die;

						return $data;	

	} 
	
	public function counties($id){

			
			$this->db->select('*');
			$this->db->from('hbp_contractors_counties');
            $this->db->where('contractor_id',$id);
			$query = $this->db->get();

			//echo $this->db->last_query();die;
       if($query){

			return $query->result();

		} else {

			return false;

		}




	}
	


    function category_get_by_key($category)
	{

	   $this -> db -> select('*');

	   $this -> db -> from('job_categories');
	   $this->db->like('job_category', $category,'both');
	   $query = $this -> db -> get();
      // echo $this->db->last_query();die;
	    if($query)

	   {

	     return $query->result();

	   }

	   else

	   {

	     return false;

	   }




	}
	
	
	function category_name($category_id)
	{

	   $this -> db -> select('*');
	   $this -> db -> from('job_categories');
	   $this->db->where('id',$category_id);
	   $query = $this->db->get();
      // echo $this->db->last_query();die;
	    if($query)

	   {


	   	//echo "<pre>";print_r($query->row());
	   	//die;
	     return $query->result();

	   }

	   else

	   {

	     return false;

	   }




	}
	
	
	
	



}



