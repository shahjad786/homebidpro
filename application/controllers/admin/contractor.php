<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contractor extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in'))
		   {
			 $this->load->library('session');
			 $this->load->model('contractor_model');
			 $this->load->model('homeowner_model');
			 $this->load->model('category_model');
			  $this->load->model('login_model');
		  }else{
			redirect('admin/login', 'refresh');
		 }
	}

	public function index() {	
	
			$data['result']   = $this->contractor_model->contractor_get();

		  // echo "<pre>";print_r($result);die;

			//$result1 = $this->contractor_model->contractor_counties();

			//$category = $this->contractor_model->contractor_category();
			//echo "<pre>";print_r($result);
			/*foreach($result as $key => $value) 
			{

				//echo $value['email'];die;
				//echo "<pre>";print_r($value);die;

				//echo "<pre>";print_r($value->contractor_category_ids);die;
				//$categories = explode(',',$value->category_id);
				foreach($value['contractor_category_ids'] as $key1 => $val1 ) {

				    echo $val1['job_category'];die;
					echo "<pre>";print_r($val1);die;
				
					$dataId[$key1] =$val1->job_category;
				
				}
				$result[$key]->category_id = $dataId;
				
			
			
			}*/

			/*foreach($result1 as $key => $value) 
			{
				$counties = explode(',',$value->counties_id);
			
				foreach($counties as $key1 => $val1) {
				
					$dataId[$key1] = $this->category_model->counties_get_id($val1);
				
				}
				$result1[$key]->counties = $dataId;
				
			
			
			}
*/
			//echo "<pre>";print_r($result);die;
			//$data["result"] = $result;
			//$data["result"] = $result1;
		
			$data['content']=$this->load->view('contractor/contractors',$data,TRUE);
			$this->load->view('includes/main',$data);
	}
	
	
	public function complete_information() {	
		$id = $_GET['id'];
		$data['result'] = $this->contractor_model->contractor_data($id);
		$state_code  =  $data['result'][0]['code'];
		//echo "<pre>"; print_r($data['result']);die;	
		$data['job_category'] = $this->category_model->category_get();
		$data['county'] = $this->category_model->county_get($state_code);		 
		//print_r($data['result']);die;
		$data['content']=$this->load->view('contractor/contractor_detail',$data,TRUE);
		$this->load->view('includes/main',$data);     
	}
	
	
	public function contractor_history() {	
		 $id = $_GET['id'];
		 $data['result'] = $this->contractor_model->contractor_history1($id);	

		// print_r($data['result']);die;
		 $data['content']=$this->load->view('contractor/jobs',$data,TRUE);
		 $this->load->view('includes/main',$data);     
	}
	
	
	public function add_contractor() {
		$data['result1'] = $this->contractor_model->get_countries();
		$data['category'] = $this->category_model->category_get();	
		$data['content']=$this->load->view('contractor/add_contractor',$data,TRUE);
		$this->load->view('includes/main',$data);
	}
	

	public function business_information() {

		$id = $_GET['id'];

		//echo $id;die;
		$data["result"] = $this->contractor_model->contractor_businessProfile_infoadmin($id );
		$data['content']=$this->load->view('contractor/Business_information',$data,TRUE);
		$this->load->view('includes/main',$data);
	}













	public function insert() {
		
         $category = implode(', ', $_POST['category']);
		 $data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'country_id' => $this->input->post('country'),
			'category_id' =>$category,
			'address1' => $this->input->post('address1'),
			'address2' => $this->input->post('address2'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'company_name' => $this->input->post('company_name'),
			'phone_number' => $this->input->post('phone_number'),
			'years_experience' => $this->input->post('experience')
		);
		$this->db->insert('hbp_contractors',$data);
		$this->session->set_flashdata('message', 'New contractor added!');
		redirect('admin/contractor');
		
		/* $data['result'] = $this->contractor_model->contractor_get();
		$data['content']=$this->load->view('contractor/contractors',$data,TRUE);
		$this->load->view('includes/main',$data);
		 */

	}
	public function status(){
		
	    $id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$sql=$this->db->update("hbp_contractors",array('status'=>$status));		
		//echo $this->db->last_query();die();
		if($status==1){
			echo "Contractor activated successfully!";
		}else{
			echo "Contractor deactivated successfully!";
		}
    }
	
	
	public function delete_contractor() {
		$id=$this->input->get('id');		
		$this->db->where('id',$id);	
		$this->db->delete('contractors');
		$this->session->set_flashdata('message', 'Contractor deleted successfully');
		redirect('admin/contractor');
	}
	

}
