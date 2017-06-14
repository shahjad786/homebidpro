<?php

Class Staticblock_model extends CI_Model {


	public function staticBlock_get() {

		$this->db->select('*');
		$this->db->from('static_block');
		$this->db->order_by('id','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query();die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function staticBlock_get_by_type($template_name) {

		$this->db->select('*');
		$this->db->from('static_block');
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
	public function staticBlock_for_editor() {
 		$id=$this->input->get('id');
		$this->db->select('*');
		$this->db->from('static_block');
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

