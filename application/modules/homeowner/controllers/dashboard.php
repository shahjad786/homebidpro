<?php 

ob_start();
class Dashboard extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->output->nocache();
		//die;
		if($this->session->userdata('logged_in'))
		   {

			$session_data = $this->session->userdata('logged_in');
			$role_id =  $session_data['role_id']; 	
			//echo 	$role_id;die();
			if($role_id==1){
			 $this->load->library('session');
			 $this->load->model('homeowner_model');
			 $this->load->model('email_model');
			 $this->load->model('contractor_model');
		 }
			else{
				redirect('homeowner/login', 'refresh');
			}
		}

		 else{
			redirect('homeowner/login', 'refresh');
		}
	}
   	public function index()
	{
		
			$project_detail = $this->homeowner_model->project_detail();

			
			/*foreach ($project_detail as $key => $value) {

					
				$cat_id = $value->category_id;
				$img_name = $this->contractor_model->category_name($cat_id);
				
				 //echo "<pre>";

			 	if(isset($img_name[0]->images_name))
			 	{

		          	$value->cat_image =$img_name[0]->images_name;

                }else{

                	$value->cat_image ="dashpro.jpg";
                }
				
			}*/
			 /*echo "<pre>";
			 print_r($project_detail);
			 die;*/

			$data['result'] = $project_detail;
			
			$progress = $this->homeowner_model->project_detail_progressjob();

			/*foreach ($progress as $key => $value) {

					
				$cat_id = $value->category_id;
				$img_name = $this->contractor_model->category_name($cat_id);
				
				 //echo "<pre>";

			 	if(isset($img_name[0]->images_name))
			 	{

		          	$value->cat_image =$img_name[0]->images_name;

                }else{

                	$value->cat_image ="dashpro.jpg";
                }
				
			}*/
			
			
			$data["progress"] = $progress;

		//echo "<pre>";	print_r($data["progress"]);die;

			$completed = $this->homeowner_model->project_detail_completedjob();

			/*foreach ($completed as $key => $value) {

					
				$cat_id = $value->category_id;

				$img_name = $this->contractor_model->category_name($cat_id);
				
				
			 	if(isset($img_name[0]->images_name))
			 	{

		          	$value->cat_image =$img_name[0]->images_name;

                }else{

                	$value->cat_image ="dashpro.jpg";
                }
				
			}*/
			$data["completed"] = $completed;



			$cancel = $this->homeowner_model->project_detail_canceljob();

			/*foreach ($cancel as $key => $value) {

					
				$cat_id = $value->category_id;

				$img_name = $this->contractor_model->category_name($cat_id);
				
				
			 	if(isset($img_name[0]->images_name))
			 	{

		          	$value->cat_image =$img_name[0]->images_name;

                }else{

                	$value->cat_image ="dashpro.jpg";
                }
				
			}*/

			$data["cancel"] = $cancel;


		//echo "<pre>";	print_r($data["cancel"]);die;





			$data['content']= $this->load->view('dashboard/dashboard',$data,TRUE);
			$this->load->view('includes/main',$data);
		
	}
		
	 function logout()
	 {  

	    //die("hello india"); 	
	 	/*$session_data = $this->session->userdata('logged_in');
	 	echo $id =     $session_data['id'];die("fdsgdfg");*/ 
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();  
		//$this->cache->clean();     
		//redirect(base_url());
		redirect('/');
	 }
	
}

/* End of file welcome.php */
/* Location: ./application/modules/homeowner/controllers/Dashboard.php */
