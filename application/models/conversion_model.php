<?php

Class Conversion_model extends CI_Model {


		public function conversion_get($id,$owner_id,$contractor_id) {
	    $this->db->select('*');
		$this->db->from('hbp_communication');	
		$this->db->where(array('job_id'=>$id,'owner_id' =>$owner_id));
		$this->db->where(array('job_id'=>$id,'contractor_id' =>$contractor_id));
		$query = $this->db->get();
		$this->db->order_by('created_at');
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	 
}

