<?php
Class Homeowner_model extends CI_Model {

	public function homeowner_get() {
		$this->db->select('home_owners.id,home_owners.status,home_owners.name,home_owners.email,home_owners.address1,home_owners.address2,home_owners.state,home_owners.phone_no,county.county,home_owners.country_id,state.name as state_name');
		$this->db->from('home_owners');
		$this->db->join('state', 'home_owners.state = state.code', 'left');
		$this->db->join('county', 'home_owners.counties = county.id', 'left');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		if($query){
			return $query->result();
			return false;
		}
	}
	public function homeowner_profile_info() {
		$session_data = $this->session->userdata('logged_in');
                 $id =  $session_data['id']; 
		$this->db->select('home_owners.id,home_owners.counties,state.code,home_owners.profile_pic,home_owners.status,home_owners.name,home_owners.email,home_owners.address1,home_owners.address2,home_owners.city,home_owners.category_id,home_owners.country_id,home_owners.phone_no,countries.country');
		$this->db->from('home_owners');
		$this->db->where('home_owners.id',$id);
		$this->db->join('state', 'hbp_home_owners.state = state.code', 'left');
		$this->db->join('countries', 'home_owners.country_id = countries.id', 'left');
		$query = $this->db->get();
		//echo $this->db->last_query();die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function homeowner_count() {
		$query = $this->db->query("SELECT count(*) as count FROM hbp_home_owners;");
		if($query){
			return $query->result();
		} else {
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
	
 function rangepicker($from, $to)
 {
	$from = date('Y-m-d', strtotime($from));
	$to = date('Y-m-d', strtotime($to));
	$this->db->select('home_owners.id,county.county,home_owners.status,home_owners.name,home_owners.email,home_owners.address1,home_owners.address2,home_owners.city,state.name as state_name,home_owners.phone_no');
	$this ->db->from('home_owners');
	
	$this->db->join('state', 'home_owners.state = state.code', 'left');
	$this->db->join('county', 'home_owners.counties = county.id', 'left');
	$this->db->where("home_owners.created_at BETWEEN '$from 00:00:00.00' AND '$to 23:59:59.999'");
	$query = $this ->db->get();
	//echo $this->db->last_query();
		//die();
	if($query ->num_rows() > 0)

	{
			
		return $query->result();
	
	}
	else
	{
		//die("yes11");
		return "no-data";
	}
 }
	

	public function homeowner_data($id) {
	
	
		$this->db->select('home_owners.id,home_owners.profile_pic,home_owners.category_id,home_owners.name,home_owners.email,home_owners.address1,home_owners.address2,home_owners.city,home_owners.state,home_owners.phone_no,home_owners.password,countries.country,county.county,home_owners.country_id,state.name as state_name');
		$this->db->from('home_owners');
		$this->db->where('home_owners.id',$id);
		$this->db->join('countries', 'home_owners.country_id = countries.id', 'left');
		$this->db->join('state', 'home_owners.state = state.code', 'left');
		$this->db->join('county', 'home_owners.counties = county.id', 'left');
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();
		if($query){
			return $query->result();
		} else {
			return false;
		}		
	
    }
	
	public function jobs_data($id) {
	
	    $this->db->select('jobs.id,jobs.price,county.county,home_owners.name,countries.country,jobs.project_discription,hbp_status.status_name');
		$this->db->from('jobs');
		$this->db->where('home_owners.id',$id);
		$this->db->join('county', 'jobs.counties = county.id', 'left');
		$this->db->join('countries', 'jobs.country_id = countries.id', 'left');
		$this->db->join('home_owners', 'jobs.owner_id = home_owners.id', 'left');
		$this->db->join('hbp_status', 'jobs.status = hbp_status.id', 'left');
		$query = $this->db->get();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}	
	public function job_detail($id) {
	
	    $this->db->select('jobs.id,state.name as state_name,county.county,job_categories.job_category,jobs.image,jobs.video,jobs.name as job_title,jobs.created_at as started_time,jobs.expire_time,home_owners.name,countries.country,COUNT(jb.job_id) as count,jobs.project_discription,hbp_status.status_name');
		$this->db->from('jobs');
		$this->db->where('jobs.id',$id);
		$this->db->join('state', 'jobs.state = state.code', 'left');
		$this->db->join('county', 'jobs.counties = county.id', 'left');
		$this->db->join('countries', 'jobs.country_id = countries.id', 'left');
		$this->db->join('home_owners', 'jobs.owner_id = home_owners.id', 'left');
		$this->db->join('job_categories', 'jobs.category_id = job_categories.id', 'left');
		$this->db->join('hbp_status', 'jobs.status = hbp_status.id', 'left');
		$this->db->join('hbp_contractors', 'hbp_jobs.contractor_id = hbp_contractors.id', 'left');
		$this->db->join('job_bids jb', 'jobs.id = jb.job_id', 'left');
		$this->db->group_by('jobs.id'); 
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();	
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	public function selected_contractor($id) {
		$this->db->select('contractors.id as selected_contractor');
		$this->db->from('job_bids');
		$this->db->where(array('job_bids.job_id'=>$id,'job_bids.status'=>'2'));
		$this->db->join('hbp_contractors', 'hbp_job_bids.contractor_id = hbp_contractors.id', 'left');
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();	
		if($query){
			return $query->result_array();
		} else {
			return false;
		}
	}
	public function bidder_detail($id) {
	
	    $this->db->select('GROUP_CONCAT(hbp_job_bids.contractor_id) as id,GROUP_CONCAT(hbp_job_bids.price) as price,GROUP_CONCAT(hbp_contractors.name) as contractor_name');
		$this->db->from('hbp_job_bids');
		$this->db->join('hbp_contractors', 'hbp_job_bids.contractor_id = hbp_contractors.id', 'left');
		$this->db->where('hbp_job_bids.job_id',$id);
		$this->db->group_by('hbp_job_bids.job_id'); 
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die();	
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function project_detail() {
		
		$session_data = $this->session->userdata('logged_in');
        $id =  $session_data['id']; 	
		$this->db->select('hbp_job_categories.images_name,jobs.id,jobs.name,jobs.status,jobs.created_at as started_time,jobs.expire_time, COUNT(distinct jb.id) as count,COUNT(distinct hbp_communication.id) as count_msg');
		$this->db->from('jobs');
		$this->db->where(array('jobs.owner_id'=>$id,'jobs.status'=>'1'));
		$this->db->where('jobs.completed_status', null, false);
		$this->db->join('hbp_job_categories', 'jobs.category_id = hbp_job_categories.id', 'left');
		
		$this->db->join('job_bids jb', 'jobs.id = jb.job_id', 'left');
		$this->db->join('communication', 'jobs.id = communication.job_id', 'left');
		$this->db->group_by('jobs.id');	
		$this->db->order_by('jobs.id', 'DESC');
		$query =  $this->db->get();
		//echo $this->db->last_query();
		//die();	
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function project_detail_completedjob() {
		$session_data = $this->session->userdata('logged_in');
        $id =  $session_data['id']; 	
		$this->db->select('hbp_job_categories.images_name,jobs.id,jobs.name,jobs.completed_date,jobs.status,jobs.completed_date,jobs.status,jobs.created_at as started_time,jobs.expire_time, COUNT(distinct jb.id) as count,COUNT(distinct hbp_communication.id) as count_msg');
		$this->db->from('jobs');
		$this->db->where(array('jobs.owner_id'=>$id,'jobs.status'=>'5'));
		$this->db->join('hbp_job_categories', 'jobs.category_id = hbp_job_categories.id', 'left');
		$this->db->join('job_bids jb', 'jobs.id = jb.job_id', 'left');
		$this->db->join('communication', 'jobs.id = communication.job_id', 'left');
		$this->db->group_by('jobs.id');	
		$this->db->order_by('jobs.completed_date', 'DESC');
		$query =  $this->db->get();
		//echo $this->db->last_query();
		//die();	
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}


	public function project_detail_canceljob() {
		$session_data = $this->session->userdata('logged_in');
        $id =  $session_data['id']; 	
		$this->db->select('hbp_job_categories.images_name,jobs.id,jobs.name,jobs.cancel_date,jobs.completed_date,jobs.status,jobs.created_at as started_time,jobs.expire_time, COUNT(distinct jb.id) as count,COUNT(distinct hbp_communication.id) as count_msg');
		$this->db->from('jobs');
		$this->db->where(array('jobs.owner_id'=>$id,'jobs.status'=>'3'));
		$this->db->join('hbp_job_categories', 'jobs.category_id = hbp_job_categories.id', 'left');
		$this->db->join('job_bids jb', 'jobs.id = jb.job_id', 'left');
		$this->db->join('communication', 'jobs.id = communication.job_id', 'left');
		$this->db->group_by('jobs.id');	
		$this->db->order_by('jobs.completed_date', 'DESC');
		$query =  $this->db->get();
		//echo $this->db->last_query();
		//die();	
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}



	public function project_detail_progressjob() {
		$session_data = $this->session->userdata('logged_in');
        $id =  $session_data['id']; 	
		$this->db->select('hbp_job_categories.images_name,jobs.id,jobs.name,jobs.accepted_date,jobs.status,jobs.created_at as started_time,jobs.expire_time, COUNT(distinct jb.id) as count,COUNT(distinct hbp_communication.id) as count_msg');
		$this->db->from('jobs');
		$this->db->where(array('jobs.owner_id'=>$id,'jobs.status'=>'2'));
		$this->db->join('hbp_job_categories', 'jobs.category_id = hbp_job_categories.id', 'left');
		$this->db->join('job_bids jb', 'jobs.id = jb.job_id', 'left');
		$this->db->join('communication', 'jobs.id = communication.job_id', 'left');
		$this->db->group_by('jobs.id');	
		$this->db->order_by('jobs.accepted_date', 'DESC');
		$query =  $this->db->get();
		//echo $this->db->last_query();
		//die();	
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}









	public function homeowner_get_by_id($owner_id) {
		
		
		$this->db->select('*');
		$this->db->from('home_owners');
		
		$this->db->where('id', $owner_id);
		$query = $this->db->get();		
		if($query){

			return $query->result();

		} else {

			return false;

		}

	}




























}

