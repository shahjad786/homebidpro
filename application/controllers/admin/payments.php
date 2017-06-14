<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		{ 
			 $this->load->library('session');
			 $this->load->model('payment_model');
		 }else{
			redirect('admin/login', 'refresh');
		}
	}

	public function index() {	
			$data['result'] = $this->payment_model->payment_get();
			$data['content']=$this->load->view('payment/payment',$data,TRUE);
			$this->load->view('includes/main',$data);
		
	}
	public function payment_details() 
	{
		$id=$this->input->get('id');	 
		//$data['result'] = $this->payment_model->payment_detail_description($id);

		$this->db->select('*');
    $this->db->from('payments'); 
    $this->db->where('id', $id);
    $query = $this->db->get();
    $result = $query->row();
    $bid_id = $result->bid_id;
    $card_number = $result->card_number;
    $transaction_id = $result->transaction_id;
    $amount = $result->payment;

    $data["payment_details"] = [
    												"card_number" => $card_number, 
    												"transaction_id" => $transaction_id,
    												"amount" => $amount,
    												
    												];

  	$this->db->from('job_bids'); 
    $this->db->where('id', $bid_id);
    $query_job_bid = $this->db->get();
    $result_job_bid = $query_job_bid->row();

 		$job_id = $result_job_bid->job_id;
		$owner_id = $result_job_bid->owner_id;
   	$start_date = $result_job_bid->start_time;
    $contractor_id = $result_job_bid->contractor_id;
			
    $data["bid_details"] = [
    												"job_id" => $job_id, 
    												"owner_id" => $owner_id,
    												"start_date" => $start_date,
    												"contractor_id" => $contractor_id
    												];
	 	//get data of home owner
    $this->db->select('*');
    $this->db->from('home_owners'); 
    $this->db->where('id', $owner_id);
    $query_home_owner = $this->db->get();
    $result_home_owner = $query_home_owner->row();
    $home_owner_email = $result_home_owner->email;
    $home_owner_name = $result_home_owner->name;
    $home_owner_number = $result_home_owner->phone_no;

    $data["home_owner_details"] = [
  												"home_owner_email" => $home_owner_email, 
  												"home_owner_name" => $home_owner_name,
  												"home_owner_number" => $home_owner_number,
  												
  												];

  	 //get data of contractor
    $this->db->select('*');
    $this->db->from('contractors'); 
    $this->db->where('id', $contractor_id);
    $query_contractor = $this->db->get();
    $result_contractor = $query_contractor->row();
    $contractor_name = $result_contractor->name;
    $contractor_email = $result_contractor->email;
    $contractor_number = $result_contractor->phone_number;
    
    $data["contractor_details"] = [
  												"contractor_name" => $contractor_name, 
  												"contractor_email" => $contractor_email,
  												"contractor_number" => $contractor_number,
  												
  												];

    //get data of jobs
    $this->db->select('*');
    $this->db->from('jobs'); 
    $this->db->where('id', $job_id);
    $query_contractor = $this->db->get();
    $result_job = $query_contractor->row();
    $job_name = $result_job->name;
    $data["job_details"] = [
  												"job_name" => $job_name, 
  												];											

    	// echo "<pre>";
    	// print_r($data);
    	// die;


		$data['content']=$this->load->view('payment/payment_details',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	
	public function delete_payment() {
		$id=$this->input->get('id');		
		$this->db->where('id',$id);	
		$this->db->delete('payments');
		$this->session->set_flashdata('message', 'Payment deleted successfully');
		redirect('admin/payments');
	}
	
	
	
	
}
