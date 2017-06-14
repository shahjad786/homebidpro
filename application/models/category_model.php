<?php



Class Category_model extends CI_Model {





	public function category_get() {

		$this->db->select('*');

		$this->db->from('job_categories');
		$this->db->order_by('job_category', 'asc');

		$query = $this->db->get();

		if($query){

			return $query->result();

		} else {

			return false;

		}

	}


	public function state_get() {

		$this->db->select('*');

		$this->db->from('state');

		$query = $this->db->get();

		if($query){

			return $query->result();

		} else {

			return false;

		}

	}














	public function county_get($state_code) {

		

		//echo $state_code;die;
		$data['county_data'] = $this->login_model->county_get_by_state($state_code);


		if($data['county_data']){

				return $data['county_data'];


		}
		
	}




public function county_get12() {


		$this->db->select('*');

		$this->db->from('county');

		$query = $this->db->get();

		if($query){

			return $query->result();

		} else {

			return false;

		}
		
	}










	public function category_get_id($id) {

		

		$this->db->select('*');

		$this->db->where('id',$id);

		$this->db->from('job_categories');

		$query = $this->db->get();

		$data = $query->result();

	    //echo "<pre>";print_r($data);

		if($query){

			return $query->result();

		} else {

			return false;

		}

	}



	public function counties_get_id($id) {

		

		$this->db->select('*');

		$this->db->where('id',$id);

		$this->db->from('county');

		$query = $this->db->get();

		 //echo $this->db->last_query();

		if($query){

			return $query->result();

		} else {

			return false;

		}

	}















}



