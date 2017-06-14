<?php

Class Marketblock_model extends CI_Model {


	public function marketBlock_get() {

		$this->db->select('*');
		$this->db->from('market_block');
		$this->db->order_by('id','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query();die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function marketBlock_get_by_type($template_name) {

		$this->db->select('*');
		$this->db->from('market_block');
		$this->db->where('type',$template_name);
		$this->db->order_by('id','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query();die();
		if($query){
			return $query->row_array();
		} else {
			return false;
		}
	}
	public function marketBlock_for_editor() {
 		$id=$this->input->get('id');
		$this->db->select('*');
		$this->db->from('market_block');
		$this->db->where('id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
}

