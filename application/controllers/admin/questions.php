<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		{ 
			 $this->load->library('session');
			 $this->load->model('question_model');
		}else{
			redirect('admin/login', 'refresh');
		}
	}

	public function index() {	
			$data['result'] = $this->question_model->question_get();
			$data['content']=$this->load->view('question/questions',$data,TRUE);
			$this->load->view('includes/main',$data);	
	}
	public function delete_options() {	
		$id=$_GET['id'];
		$quesid=$_GET['question_id'];
		$this->db->where('id',$id);
		$this->db->delete('hbp_question_options');
		//redirect('admin/questions/edit_question');
		$data['result'] = $this->question_model->edit_option($quesid);
		$data['content']=$this->load->view('question/add_edit_question',$data,TRUE);
		$this->load->view('includes/main',$data);
	}

	public function add_question() {	
		$data['content']=$this->load->view('question/add_edit_question','',TRUE);
		$this->load->view('includes/main',$data);
	}

	public function insert_question() {	
		 $data['table1_data']=$this->question_model->insert_question();
   		$latest_id = $this->question_model->get_latest_id();
   		$data['table1_data']=$this->question_model->insert_option($latest_id);
	}

	public function delete_question() {
		$id=$this->input->get('id');
		$this->db->where('question_id',$id);
		$this->db->delete('hbp_question_options');
		$this->db->where('id',$id);	
		$this->db->delete('hbp_questions');
		$this->session->set_flashdata('message', 'Question deleted successfully');
		redirect('admin/questions');
	}

	public function edit_question() {	
		$data['result'] = $this->question_model->edit_question();
		$data['content']=$this->load->view('question/add_edit_question',$data,TRUE);
		$this->load->view('includes/main',$data);
	}

	public function update_question() {
		$id=$this->input->post('id');
		/*print_r($_POST['option']);
		print_r($_POST['option_id']);
		die();*/
		$arr=array_combine($_POST['option'],$_POST['option_id']);
		//print_r($arr);
		foreach($arr as $key=>$val){
			//print_r($key);
			$data=array('option'=>$key);
			$this->db->where(array('id'=>$val,'question_id'=>$id));
			$this->db->update('hbp_question_options',$data);
			//echo $this->db->last_query().'<br>';
		
		}
		//die();
		$questions=array(
			'question'=>$this->input->post('question'),
			'question_type'=>$this->input->post('question_type'),
          	);
		$this->db->where('id',$id);
		$this->db->update('hbp_questions',$questions);
		if(isset($_REQUEST['option1'])){
		$field_values_array = $_REQUEST['option1'];
			foreach($field_values_array as $value){
				$data=array(
				       'option'=>$value,
				       'question_id'=>$id
		          	);
				$this->db->insert('hbp_question_options',$data);
			}
		}
		/*$this->session->set_flashdata('message', 'Question update successfully');
   		redirect('admin/questions');*/
   		$data['result'] = $this->question_model->edit_option($id);
		$data['content']=$this->load->view('question/add_edit_question',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
}
