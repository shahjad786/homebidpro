<?php



Class Payment_model extends CI_Model {

	public function payment_get() {

	

	$this->db->select('hbp_home_owners.name as owner_name, hbp_contractors.name,hbp_jobs.project_discription,hbp_payments.payment,hbp_payments.id');

		$this->db->from('hbp_payments');

		$this->db->join('hbp_home_owners', 'hbp_payments.owner_id = hbp_home_owners.id', 'left');

		$this->db->join('hbp_contractors', 'hbp_payments.contractor_id = hbp_contractors.id', 'left');

		$this->db->join('hbp_jobs', 'hbp_payments.job_id = hbp_jobs.id', 'left');

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

	public function homeowner_payment() {

		  $session_data = $this->session->userdata('logged_in');

		 $owner_id = $session_data['id'];



	    $this->db->select('hbp_home_owners.name, hbp_contractors.name,hbp_contractors.email, jobs.name as job_name,hbp_jobs.project_discription,hbp_payments.payment,hbp_payments.id');
		$this->db->from('hbp_payments');
		$this->db->where('hbp_payments.owner_id',$owner_id);
		$this->db->join('hbp_home_owners', 'hbp_payments.owner_id = hbp_home_owners.id', 'left');

		$this->db->join('hbp_contractors', 'hbp_payments.contractor_id = hbp_contractors.id', 'left');

		$this->db->join('hbp_jobs', 'hbp_payments.job_id = hbp_jobs.id', 'left');

		/* $this->db->select('*');

		$this->db->from('jobs'); */

		$query = $this->db->get();

		//echo $this->db->last_query();die;

		//die();

		if($query){

			return $query->result();

		} else {

			return false;

		}

	

		

	

	}
























	public function payment_detail_description($id) {

	

		$this->db->select('hbp_home_owners.name,hbp_contractors.name,hbp_jobs.project_discription,hbp_payments.payment,hbp_payments.id,hbp_payments.location,hbp_payments.start_date,hbp_payments.end_date');

			$this->db->from('hbp_payments');

			$this->db->where('hbp_payments.id',$id);

			$this->db->join('hbp_home_owners', 'hbp_payments.owner_id = hbp_home_owners.id', 'left');

			$this->db->join('hbp_contractors', 'hbp_payments.contractor_id = hbp_contractors.id', 'left');

			$this->db->join('hbp_jobs', 'hbp_payments.job_id = hbp_jobs.id', 'left');

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

}



