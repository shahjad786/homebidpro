<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Start controller: Site
 *
 */
class Reviews extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in')) {
            $this->load->library('session');
            $this->load->model('jobs_model');
            $this->load->model('email_model');
            $this->load->model('login_model');
            $this->load->model('category_model');
            $this->load->model('question_model');
            $this->load->model('conversion_model');
            $this->load->model('contractor_model');
        } else {
            redirect('homeowner/login', 'refresh');
        }
    }
    public function index()
    {
    		
        $this->db->select('hbp_home_owners.name as owner_name,hbp_contractor_job_reviews.id,hbp_contractors.name as contractor_name,hbp_home_owners.profile_pic as owner_profile,hbp_contractor_job_reviews.reviews,hbp_contractor_job_reviews.status,hbp_contractor_job_reviews.rating');
		$this->db->from('hbp_contractor_job_reviews');
		$this->db->join('hbp_home_owners','hbp_contractor_job_reviews.owner_id  = hbp_home_owners.id');
		$this->db->join('hbp_contractors','hbp_contractor_job_reviews.contractor_id  = hbp_contractors.id');
		//$this->db->where(array('contractor_id'=>$id));
		$query = $this->db->get();
		$data['result']=$query->result();
		$data['content']=$this->load->view('reviews/reviews',$data,TRUE);
			$this->load->view('includes/main',$data);	
        
    }
     public function review_detail()
    {
    		
        $this->db->select('hbp_home_owners.name as owner_name,hbp_contractor_job_reviews.status,hbp_contractor_job_reviews.id,hbp_contractors.name as contractor_name,hbp_home_owners.profile_pic as owner_profile,hbp_contractor_job_reviews.reviews,hbp_contractor_job_reviews.rating');
		$this->db->from('hbp_contractor_job_reviews');
		$this->db->join('hbp_home_owners','hbp_contractor_job_reviews.owner_id  = hbp_home_owners.id');
		$this->db->join('hbp_contractors','hbp_contractor_job_reviews.contractor_id  = hbp_contractors.id');
		//$this->db->where(array('contractor_id'=>$id));
		$query = $this->db->get();
		$data['result']=$query->result();
		$data['content']=$this->load->view('reviews/reviews_detail',$data,TRUE);
			$this->load->view('includes/main',$data);	
        
    }
    public function status(){
		
	    $id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$sql=$this->db->update("hbp_contractor_job_reviews",array('status'=>$status));		
		echo $this->db->last_query;die();
    }
public function status_approve(){
		
	    $id=$this->input->get('id');
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$sql=$this->db->update("hbp_contractor_job_reviews",array('status'=>1));	
		redirect('admin/reviews');	
	
    }
public function status_denied(){
		
	    $id=$this->input->get('id');
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$sql=$this->db->update("hbp_contractor_job_reviews",array('status'=>0));
		redirect('admin/reviews');
    }
    
    
    
}
