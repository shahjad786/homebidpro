<?php

Class Dashboard_model extends CI_Model {


	 public function allHomeowner() {
		
		
		$query = $this->db->query("SELECT count(*) as count FROM hbp_home_owners;");
		if($query){
			return $query->result();
		} else {
			return false;
		}
		
	 }
	 
	  public function allContractor() {
		
		
		$query = $this->db->query("SELECT count(*) as count FROM hbp_contractors;");
		if($query){
			return $query->result();
		} else {
			return false;
		}
		
	 }
	 
	 
	  public function allJobs() {
		                   
		$query = $this->db->query("SELECT count(*) as count FROM hbp_jobs;");
		if($query){
			return $query->result();
		} else {
			return false;
		}
		
	 }
	 
	 
	  public function allJobBid() {
		  
		$query = $this->db->query("SELECT count(*) as count FROM hbp_job_bids;");
		if($query){
			return $query->result();
		} else {
			return false;
		}
		
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 

}

/* echo $this->db->last_query();
		die();			
		$this->db->select('*');
		$this->db->from('home_owners');
		$query = $this->db->get();
		//echo $this->db->last_query();
		//die(); */
