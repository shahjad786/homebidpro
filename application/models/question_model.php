<?php

Class Question_model extends CI_Model {


	public function question_get() {
		$this->db->select('*');
    		$this->db->from('hbp_questions');			
		$query = $this->db->get();
		$results = $query->result();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	function insert_question(){
	    	$data=array(
		        'question'=>$this->input->post('question'),
		        'question_type'=>$this->input->post('question_type')

		  );
    		$this->db->insert('hbp_questions',$data);
	}

	public function get_latest_id(){
    		$sql=$this->db->query("SELECT MAX(id) as id FROM hbp_questions");
    		return $sql->row_array();
	} 

	function insert_option($table1_id){
			$field_values_array = $_REQUEST['option1'];
			foreach($field_values_array as $value){
				$data=array(
				       'option'=>$value,
				       'question_id'=>$table1_id['id']
		          	);
				$this->db->insert('hbp_question_options',$data);
			}
			$this->session->set_flashdata('message', 'New question added!');
			redirect('admin/questions');
	}		
	public function edit_question() {
		$id=$this->input->get('id');
		$this->db->select('*, GROUP_CONCAT(hbp_question_options.option) as options,GROUP_CONCAT(hbp_question_options.id) as question_options_id');
		$this->db->from('hbp_question_options');
		$this->db->join('hbp_questions', 'hbp_questions.id = hbp_question_options.question_id');
		$this->db->group_by('hbp_question_options.question_id'); 
		$this->db->where('hbp_questions.id',$id);			
		$query = $this->db->get();
		$results = $query->result();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	public function edit_option($id) {
		
		$this->db->select('*, GROUP_CONCAT(hbp_question_options.option) as options,GROUP_CONCAT(hbp_question_options.id) as question_options_id');
		$this->db->from('hbp_question_options');
		$this->db->join('hbp_questions', 'hbp_questions.id = hbp_question_options.question_id');
		$this->db->group_by('hbp_question_options.question_id'); 
		$this->db->where('hbp_questions.id',$id);			
		$query = $this->db->get();
		$results = $query->result();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
		
	public function questionare() {
			$this->db->select('*, GROUP_CONCAT(hbp_question_options.option) as options,GROUP_CONCAT(hbp_question_options.id) as question_options_id');
			$this->db->from('hbp_question_options');
			$this->db->join('hbp_questions', 'hbp_questions.id = hbp_question_options.question_id');
			$this->db->group_by('hbp_question_options.question_id'); 		
			$query = $this->db->get();
		//echo $this->db->last_query();
			//die();
			$results = $query->result();
			if($query){
				return $query->result();
			} else {
				return false;
			}
	}

}

