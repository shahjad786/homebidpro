<?php

Class Jobs_model extends CI_Model {


	public function jobs_get() {
		$session_data = $this->session->userdata('logged_in');
        $id =  $session_data['id'];
		$this->db->select('jobs.id,county.county as counties,home_owners.name,home_owners.id as owner_id,jobs.project_discription,jobs.price,jobs.created_at,status.status_name');
		$this->db->from('jobs');
		//$this->db->where('jobs.owner_id',$id);
		$this->db->join('county', 'jobs.counties = county.id', 'left');
		$this->db->join('countries', 'jobs.country_id = countries.id', 'left');
		$this->db->join('home_owners', 'jobs.owner_id = home_owners.id', 'left');
		$this->db->join('status', 'jobs.status = status.id', 'left');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();

		//echo $this->db->last_query();
		//die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	public function check_bidder_status($id) {
		$this->db->select('*');
		$this->db->from('job_bids');
		$this->db->where(array('job_id'=>$id,'status'=>2));
		$query = $this->db->get();

		//echo $this->db->last_query();
		//die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}

public function completed_status($id){

		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where('id',$id);	
		$this->db->where('status',5);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		if($query){		
		return $query->result();
		} else {
		return false;
		}


}

















	public function cancel_project_status($job_id) {
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where(array('id'=>$job_id,'status'=>3));
		$query = $this->db->get();

		//echo $this->db->last_query();
		//die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
















	public function check_job_status($id) {
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where(array('id'=>$id,'status'=>5));
		$query = $this->db->get();

		//echo $this->db->last_query();
		//die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}

          public function  high_lowbid($job_id)
          {

		        $this->db->select('MIN(hbp_job_bids.price) as minprice,MAX(hbp_job_bids.price) as maxprice');
				$this->db->from('hbp_job_bids');
				$this->db->where(array('job_id'=>$job_id));
				$query = $this->db->get();

				//echo $this->db->last_query();
				//die;
				if($query){
					return $query->result();
				} else {
					return false;
				}

          }



    public function budget_get() {
		$this->db->select('*');
		$this->db->from('hbp_budget');
		$query = $this->db->get();

		//echo $this->db->last_query();
		//die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}







	public function job_info() {
        $id =  $_GET['id'];
		$this->db->select('jobs.name,jobs.id,jobs.price,jobs.project_discription,jobs.category_id,jobs.counties,jobs.video,state.code,countries.country,jobs.image,jobs.price,jobs.started_time,jobs.expire_time');
		$this->db->from('jobs');
		$this->db->where('jobs.id',$id);
		$this->db->join('state', 'jobs.state = state.code', 'left');
		$this->db->join('countries', 'jobs.country_id = countries.id', 'left');
		
		
		$query = $this->db->get();
		$jobs=$query->result();
		foreach($jobs as $key => $val);

		    $this->db->select('job_categories.id');
			$this->db->from('jobs_categories');
			$this->db->join('jobs', 'jobs.id = jobs_categories.job_id', 'left');
			$this->db->join('job_categories', 'jobs_categories.category_id = job_categories.id', 'left');
			$this->db->where('jobs_categories.job_id', $id);
			$query = $this->db->get();
			$categories = $query->result_array();
			$jobs[$key]->job_category_ids = $categories;
			

		if($jobs){


			//echo "<pre>";print_r($contractors);die;
			return $jobs;

		} else {

			return false;

		}


		echo $this->db->last_query();
		die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function contractor_getby_status($id){
		
		$this->db->select('contractor_id');
		$this->db->from('job_bids');
		$this->db->where(array('job_id'=>$id,'status'=>2));
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	


public function homeowner_getby_status($id){
		
		$this->db->select('owner_id');
		$this->db->from('job_bids');
		$this->db->where(array('job_id'=>$id,'status'=>2));
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}


public function homeowner_getby_id($id){
		
		
		$this->db->select('owner_id');
		$this->db->from('hbp_jobs');
		$this->db->where(array('id'=>$id));
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}


	public function varify_contractor_status($job_id,$status,$contractor_id){
		
		
		$this->db->select('*');
		$this->db->from('hbp_job_bids');
		$this->db->where(array('status' => $status,'job_id' => $job_id));	
		$query =  $this->db->get();
		$data1 = $query->result();
		if(isset($data1)&& count($data1)>0){

		$this->db->select('*');
		$this->db->from('hbp_job_bids');
		$this->db->where(array('job_id'=>$job_id,'contractor_id' =>$contractor_id,'status' =>$status));	
		$query =  $this->db->get();
		$data = $query->result();
		//echo $this->db->last_query();die;
		if(isset($data)&& count($data)>0){
			
			return 1;
		}
		else{
			
			
				return false;
		}
		
	}
		
	else{

			return 1;


	}


	}


	
	
	public function jobs_detail($id) {
		$this->db->select('hbp_job_categories.images_name,jobs.id as job_id,jobs.name,jobs.status,jobs.owner_id, jobs.category_id,jobs.created_at,jobs.category_id,job_bids.id as job_bid_id,job_bids.status,jobs.owner_id,jobs.image,jobs.video,jobs.created_at as started_time,jobs.expire_time,jobs.project_discription, job_bids.price,job_bids.price,job_bids.start_time,contractors.profile_pic,contractors.name as contractor_name,contractors.id as contractor_id,communication.message');
		$this->db->from('jobs');
		$this->db->join('job_bids', 'jobs.id = job_bids.job_id', 'left');
		$this->db->join('hbp_job_categories', 'jobs.category_id = hbp_job_categories.id', 'left');
		$this->db->join('contractors', 'job_bids.contractor_id = contractors.id', 'left');
		$this->db->join('communication', 'job_bids.conversion_id = communication.id', 'left');
		$this->db->where('jobs.id',$id);
		$this->db->limit(1);
		$this->db->order_by("jobs.id", "desc");
		$query = $this->db->get();

		//echo $this->db->last_query();
		//die;

		if($query){
			return $query->result();
		} else {
			return false;
		}
	}


	public function jobs_status($id,$contractor_id) {
		$this->db->select('*');
		$this->db->from('job_bids');
		$this->db->where('job_id',$id);
		$this->db->where('contractor_id',$contractor_id);
		$query = $this->db->get();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}


	public function homeownerEmail($owner_id) {
		$this->db->select('email');
		$this->db->from('home_owners');
		$this->db->where('id',$owner_id);
		$query = $this->db->get();
		if($query){
			return $query->row();
		} else {
			return false;
		}
	}


	public function contractorEmail($contractor_id) {
		$this->db->select('*');
		$this->db->from('contractors');
		$this->db->where('id',$contractor_id);
		$query = $this->db->get();
		if($query){
			return $query->row();
		} else {
			return false;
		}
	}












	public function	jobs_status_bid($id,$contractor_id)
	{
		$this->db->select('*');
		$this->db->from('job_bids');
		$this->db->where('job_id',$id);
		$this->db->where('contractor_id',$contractor_id);
		$this->db->where('status',2);
		$query = $this->db->get();

		//echo $this->db->last_query();die;
		if($query){
		return $query->result();
		} else {
		return false;
		}
	}



	public function recent_jobs($id) {
			$this->db->select('hbp_jobs.name,hbp_job_bids.updated_at as completed_date,hbp_contractor_job_reviews.id,hbp_contractor_job_reviews.rating');
			$this->db->from('hbp_job_bids');
			$this->db->join('hbp_jobs', 'hbp_job_bids.job_id = hbp_jobs.id', 'left');
			$this->db->join('hbp_contractor_job_reviews', 'hbp_job_bids.job_id = hbp_contractor_job_reviews.job_id', 'left');
			$this->db->where(array('hbp_job_bids.contractor_id'=>$id,'hbp_job_bids.status'=>'2','hbp_job_bids.completed_status'=>'1'));
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			if($query){
				return $query->result();
			} else {
				return false;
			}
		}


	public function view_contractor_detail($id){
		//$this->db->distinct('hbp_contractors.contractor_id');
		$this->db->select('hbp_contractors.name as contractor_name,hbp_job_bids.status,hbp_contractors_company.weekdays,hbp_contractors_company.weekend,hbp_contractors_company.weekdays_time,hbp_contractors_company.weekend_time,hbp_contractors_company.employee,hbp_contractors.profile_pic,hbp_contractors.company_bio,hbp_contractors.id as contractor_id,hbp_contractors.company_name,hbp_contractors.phone_number,hbp_contractors.years_experience,hbp_contractors.city, hbp_job_bids.id as job_bid_id');
		$this->db->from('hbp_job_bids'); 
		$this->db->join('hbp_contractors', 'hbp_job_bids.contractor_id = hbp_contractors.id', 'left'); 
		$this->db->join('hbp_contractors_company', 'hbp_job_bids.contractor_id = hbp_contractors_company.contractor_id', 'left'); 
		$this->db->where(array('hbp_job_bids.contractor_id'=>$id));
		$this->db->group_by('contractor_id'); 
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}









	public function contractor_detail($id,$job_id){
		//$this->db->distinct('hbp_contractors.contractor_id');
		$this->db->select('jobs_categories.category_id,hbp_contractors.name as contractor_name,hbp_job_bids.status,hbp_contractors_company.weekdays,hbp_contractors_company.weekend,hbp_contractors_company.weekdays_time,hbp_contractors_company.weekend_time,hbp_contractors_company.employee,hbp_contractors.profile_pic,hbp_contractors.company_bio,hbp_contractors.id as contractor_id,hbp_job_bids.detail,hbp_contractors.company_name,hbp_contractors.phone_number,hbp_contractors.years_experience,hbp_contractors.city,hbp_jobs.name ,hbp_job_bids.price, hbp_job_bids.start_time,hbp_job_bids.id as job_bid_id');
		$this->db->from('hbp_job_bids'); 
		$this->db->join('hbp_contractors', 'hbp_job_bids.contractor_id = hbp_contractors.id', 'left'); 
		$this->db->join('hbp_contractors_company', 'hbp_job_bids.contractor_id = hbp_contractors_company.contractor_id', 'left'); 
		$this->db->join('hbp_jobs', 'hbp_job_bids.job_id = hbp_jobs.id', 'left');
		//$this->db->join('hbp_contractor_job_reviews', 'hbp_job_bids.contractor_id = hbp_contractor_job_reviews.contractor_id', 'left');
		$this->db->join('jobs_categories', 'jobs.id = jobs_categories.job_id', 'left');
		$this->db->where(array('hbp_job_bids.contractor_id'=>$id,'hbp_job_bids.job_id'=>$job_id));
		 $this->db->group_by('contractor_id'); 
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}

	public function reviews_get($id){
		$this->db->select('hbp_home_owners.name as owner_name,hbp_jobs.name as job_name,hbp_home_owners.profile_pic as owner_profile,hbp_contractor_job_reviews.reviews,hbp_contractor_job_reviews.created_at,hbp_contractor_job_reviews.id,hbp_contractor_job_reviews.rating');
		$this->db->from('hbp_contractor_job_reviews');
		$this->db->join ('hbp_jobs','hbp_contractor_job_reviews.job_id = hbp_jobs.id');
		$this->db->join('hbp_home_owners','hbp_contractor_job_reviews.owner_id  = hbp_home_owners.id');
		$this->db->where('hbp_contractor_job_reviews.contractor_id',$id);
		$this->db->where('hbp_contractor_job_reviews.status',1);
		$query = $this->db->get();

		/*echo $this->db->last_query();
		die;*/

		
		if($query->num_rows() >0){
			return $query->result();
		} else {
			return "no-data";
		}
	}
	public function average_rating($id){
		$this->db->select('avg(rating) as average,hbp_contractor_job_reviews.id,count(reviews) as count_reviews');
		$this->db->from('hbp_contractor_job_reviews');
		$this->db->where(array('contractor_id'=>$id,'status'=>1));
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die;
		if($query->num_rows() > 0){
			return $query->result();
		} else {
			return "no-data";
		}
	}

	public function completed_job($id){
		$this->db->select('count("completed_status") as count_jobs');
		$this->db->from('hbp_job_bids'); 
		$this->db->where(array('contractor_id'=>$id,'status'=>'2','completed_status'=>'1'));
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	public function count_homeowner($id){
		$this->db->select('count(distinct owner_id) as count_owners');
		$this->db->from('hbp_job_bids'); 
		$this->db->where('contractor_id',$id);
		$query = $this->db->get();
		
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
		public function rating($id){
		$this->db->select('*');
		$this->db->from('hbp_rating');
		$this->db->where(array('contractor_id'=>$id));
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
			
	public function jobs_comment($id) {
		
		
		$this->db->select('job_comments.id,job_comments.job_id,job_comments.comment,home_owners.name,contractors.name as contractor_name');
		$this->db->from('job_comments');
		$this->db->where('jobs.id',$id);
		$this->db->join('jobs', 'job_comments.job_id = jobs.id', 'left');
		$this->db->join('contractors', 'job_comments.contractor_id = contractors.id', 'left');
		$this->db->join('home_owners', 'job_comments.owner_id = home_owners.id', 'left');
		//$this->db->join('status', 'jobs.status = status.id', 'left');
		/* $this->db->select('*');
		$this->db->from('jobs'); */
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function allCountry(){
		
		$this->db->select('*');
		$this->db-> from('hbp_countries');
		$query = $this->db->get();
		 
		 if($query)
		 {
			return $query->result();
		 }
		 else
		 {
			return false;
		 } 
	 }	 
	 public function allJobCategory(){
		
		 $this->db-> select('*');
		 $this->db-> from('hbp_job_categories');
		 $query = $this->db->get();
		 if($query)
		 {
			return $query->result();
		 }
		 else
		 {
			return false;
		 }	 
	 
 }
	
	public function findOwnerEmail($owner_id){
		
		 $this->db-> select('email');
		 $this->db-> from('hbp_home_owners');
		 $this->db->where('id',$owner_id);
		 $query = $this->db->get();
		  //echo $this->db->last_query();
		//die();
		 if($query)
		 {
			return $query->result();
		 }
		 else
		 {
			return false;
		 }	 
	 
 }
 public function findbidder($id){
		 $this->db-> select('hbp_contractors.email');
		 $this->db-> from('hbp_job_bids');
		 $this->db->where('hbp_job_bids.job_id',$id);
		 $this->db->join('hbp_contractors', 'job_bids.contractor_id = hbp_contractors.id', 'left');
		 $query = $this->db->get();
		// echo $this->db->last_query();
		// die();
		 if($query)
		 {
			return $query->result();
		 }
		 else
		 {
			return false;
		 }	 
	 
 }
	public function expired_jobs() {
		$this->db->select('jobs.name,jobs.expire_time,jobs.id,jobs.owner_id');
		$this ->db->from('jobs');
		$query = $this ->db->get();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	public function allState(){
		
		$this -> db ->select('*');
		$this -> db -> from('hbp_state');
		$this->db->order_by('name', 'asc');
		$query = $this->db->get();
		 
		 if($query)
		 {
			return $query->result();
		 }
		 else
		 {
			return false;
		 } 
	 }	 
	
	public function allCounties(){
		
		$this -> db ->select('*');
		$this -> db -> from('hbp_county');
		$this->db->order_by('county', 'asc');
		$query = $this->db->get();
		 
		 if($query)
		 {
			return $query->result();
		 }
		 else
		 {
			return false;
		 } 
	 }	 
	 
	
	

}

