<?php

Class Cmscontent_model extends CI_Model {


	public function manageCms() {
		$this->db->select('*');
		$this->db->from('cmscontent');
		$query = $this->db->get();
		//echo "<pre>";print_r($query);die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
}





    public function editCms($id) {
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->from('cmscontent');
		$query = $this->db->get();
		//echo "<pre>";print_r($query);die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
}

	public function allvideo() {
	$this->db->select('*');
	$this->db->from('video');
	$query = $this->db->get();
	//echo "<pre>";print_r($query);die;
	if($query){
		return $query->result();
	} else {
		return false;
	}
}

    public function editVideo($id) {
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->from('video');
		$query = $this->db->get();
		//echo "<pre>";print_r($query);die;
		if($query){
			return $query->result();
		} else {
			return false;
		}
}














}