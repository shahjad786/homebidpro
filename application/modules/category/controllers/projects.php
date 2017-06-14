<?php 

class Projects extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		
			 $this->load->library('session');
			 $this->load->model('jobs_model');
			 $this->load->model('email_model');
			 $this->load->model('category_model');
			 $this->load->model('question_model');
			 $this->load->model('conversion_model');
			 $this->load->model('contractor_model');
		
	}
   	public function index()
	{
			 
			 $category_id = $_GET['id'];
			 $data['category_name'] = $this->contractor_model->category_name($category_id);
			 $data['result'] = $this->contractor_model->new_projects($category_id);

			// echo "<pre>"; print_r($data['category_name']);die;	
			 $data['content']= $this->load->view('projects/projects',$data,TRUE);
			 $this->load->view('includes/main',$data);
		
	}

	

	public function contractor_detail()
	{
			$id = $_GET['id'];
			$job_id = $_GET['job_id'];
			$data['homeowners']=$this->jobs_model->count_homeowner($id);
			$data['jobs']=$this->jobs_model->completed_job($id);
			$data['result'] = $this->jobs_model->contractor_detail($id,$job_id);
			$contractor_reviews= $this->jobs_model->reviews_get($id,$job_id);
			$data['reviews']=$contractor_reviews;
			if($data['reviews'] == "no-data"){
				
					$data['reviews'] = 0;
				}
			
			else{
			
				$data['reviews'] = $this->jobs_model->reviews_get($id,$job_id);
			
			}
		
			
			$data['content']= $this->load->view('jobs/contractorDetail',$data,TRUE);
			$this->load->view('includes/main',$data);
	}
	public function createjob()
	{
			$data['result1'] = $this->question_model->questionare();
			$data['country'] = $this->jobs_model->allCountry();
			$data['job_category'] = $this->category_model->category_get();
			$data['content']= $this->load->view('jobs/createJob',$data,TRUE);
			$this->load->view('includes/main',$data);
	}

	public function insert_job() {

		//$session_data = $this->session->userdata('logged_in');
		//echo $session_data['username']; 
		$this->do_upload();
	}
	public function update(){
		
	    $id=$this->input->post('id');
	   echo $id;
	    //die();
		$status=$this->input->post('status');
		$this->db->where('id',$id);
		$sql=$this->db->update("hbp_job_bids",array('status'=>$status));
		echo $this->db->last_query();
		echo 1;
	}
	public function fetch_status(){
		
	    $id=$this->input->post('id');
		$this->db->select('jobs.id as job_id,jobs.name,jobs.owner_id, jobs.category_id, jobs.category_id,job_bids.id as job_bid_id,job_bids.status,jobs.owner_id,jobs.image,jobs.video,jobs.started_time,jobs.expire_time,jobs.project_discription, job_bids.price,job_bids.start_time,contractors.name as contractor_name,contractors.id as contractor_id,communication.message');
		$this->db->from('jobs');
		$this->db->join('job_bids', 'jobs.id = job_bids.job_id', 'left');
		$this->db->join('contractors', 'job_bids.contractor_id = contractors.id', 'left');
		$this->db->join('communication', 'job_bids.conversion_id = communication.id', 'left');
		$this->db->where('jobs.id',$id);
		$data = $this->db->get();

 			$tbl    = '';
            $tbl .= ' <table id="myTable" class="tablesorter table">
       		 <thead>
		          <tr>
		            <th>Name</th>
		            <th>Price Quoted</th>
		            <th>Date</th>
		            <th>Accept</th>
		          </tr>
        	</thead>
        	<tbody class="status">';
 		foreach ($data->result() as $row){
 				
   			$tbl .= '<tr>
			   <td><div id="circle" ></div><div class="bidder_property"><a href="'. base_url().'/homeowner/jobs/contractor_detail?id='. $row->contractor_id.'&job_id='. $row->job_id .'">'. $row->contractor_name.'</a></div></th>
			     <td>'. $row->price.'</td> 
			     <td>09/24/2015</td>
                    <td><a style="padding:0px;" data="'.$row->job_bid_id.'" class="status_checks btn '. (($row->status)?'a': 'b').'">'.(($row->status)? '<button class="btn btn-default btn-xs button active" type="button">Accept </button> ': '<button class="btn btn-default btn-xs button"  type="button">Accept </button>').'</a></td></tr>';
			       }		 
                              
               $tbl .= '</tbody>
                           </table>';

                 echo $tbl;
	}
	
	
	function do_upload()
    {    
     // echo"<pre>";  print_r($_FILES);die;
	  //echo"<pre>"; print_r($_REQUEST);
	  
	  $session_data = $this->session->userdata('logged_in');
	  $owner_id =  $session_data['id']; 
	  	$name_array = array();
        $count = count($_FILES['file1']['size']);
	  
		$error_c = 0;
        foreach ($_FILES as $key => $value) {

            if (!empty($value['tmp_name'])) {


                if($key == "file1") {

	                for($s=0; $s<=$count-1; $s++) {
						$_FILES['file1']['name']=$value['name'][$s];
						$_FILES['file1']['type']    = $value['type'][$s];
						$_FILES['file1']['tmp_name'] = $value['tmp_name'][$s];
						$_FILES['file1']['error']       = $value['error'][$s];
						$_FILES['file1']['size']    = $value['size'][$s];

	                    $config['upload_path'] = 'uploads';
	                    $config['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
	                    $config['max_size']='';
	                    $config['max_width']='200000000';
	                    $config['max_height']='1000000000000';
	                    $this->load->library('upload',$config);
						$this->upload->overwrite = true;
		                    if ( ! $this->upload->do_upload($key)) {
									$error_c= 1;
									$error = array('error' => $this->upload->display_errors());
		                    } else {
									$data = array('upload_data' => $this->upload->data());
									$data_c["image_name"] =  $data['upload_data']['file_name'];	
						 	}
						$name[]=$data_c["image_name"];
					}

                }
                if($key == "file2") {
                	$file_type = $_FILES['file2']['type'];
                    $config11['upload_path'] = 'videos';
                    //$config11['upload_path'] = 'uploads';
                    $config11['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
                    $config11['max_size']='';
                    $config11['max_width']='200000000';
                    $config11['max_height']='1000000000000';
                    $this->upload->initialize($config11);
					$this->upload->overwrite = true;
					if (($file_type == "video/webm") || ($file_type == "video/mp4") || ($file_type == "video/ogv"))
			    	{
		                    if (! $this->upload->do_upload($key)) {
								$error_c= 1;
								$error = array('error' => $this->upload->display_errors());
								//failed display the errors
		                    } else {
								$data = array('upload_data' => $this->upload->data());
								$data_c["video_name"] =  $data['upload_data']['file_name'];
							   
		                    }
                  	}else{
							$this->session->set_flashdata('message', 'wrong format.');
							redirect("homeowner/jobs/createJob");
					}
                } 
				
            }
			
			
        }

    	$img = implode(',', $name);

		$result1 = $this->question_model->questionare();
    	 foreach ($result1 as $row){
    	 	$ques=$this->input->post("question_".$row->id);
    	 	$opt=$this->input->post($row->question_type);
    	 	$quesopt[]=$ques.":".$opt;
    	 	

    	 }
    	 $question = implode(',', $quesopt);
  
		//$question=$ques1.":".$ans1.";".$ques2.":".$ans2.";".'3'.":".$ans3;
		$countryForSearch = $_POST['country'];

		$start_date= date('F m, Y', strtotime($this->input->post('start_time')));
		$completed_time= date('F m, Y', strtotime($this->input->post('completed_time')));
		$data = array('status' =>1,
			    'owner_id' => $owner_id,
			    'image' => $img,
				'video' => $data_c["video_name"],
			    'name' =>  $this->input->post('name'),
				'question_option_job_id' => $question,
				'price' => $this->input->post('price'),
				'country_id' => $this->input->post('country'),
				'started_time'=>$start_date,
				'expire_time'=>$completed_time,
				'category_id' => $this->input->post('job_category'),
				'project_discription' => $this->input->post('description'));




		$insertData =  $this->db->insert('jobs', $data);
			  //echo $this->db->last_query();die();
		if($insertData){
				  
			
			$adminEmail = "shahjada@ocodewire.com";
			$template_name = "You accepted a bid, Now let’s get started";			
			$message = $this->email_model->email_get_by_type($template_name);
			//echo "<pre>";print_r($message);die;
				 $s = $message["emails"];

			$country12 = $this->contractor_model->contractor_get_by_id($countryForSearch);
			

			//echo "<pre>";print_r($country12);
			foreach($country12 as $country){
				$email= $country->email;
				//echo $email;
				$message = str_replace("(Phone number)", $data["owner_id"],$s);
				$message = str_replace("(Email)", $data["owner_id"], $message);
				$message = str_replace("(Address)", $data["owner_id"], $message);
				//$message = str_replace("(Phone number)", 90909990, $message);
				$this->sendMail($message, $adminEmail,$email);
				//redirect('homeowner/dashboard');
				}
			
			redirect('homeowner/dashboard');
		  
		}
				
		
    }

    public function sendMail($message, $adminEmail,$email) {
		
		/*print_r($message);
		print_r($adminEmail);
		print_r ($email);die;*/
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($adminEmail);
		$this->email->to($email);
		$this->email->subject('New Job Created here');
		$this->email->message($message);
		$this->email->send();
		/*if($this->email->send())
		{
			echo 'Email sent.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}*/
		
		
		    
	}
	
	
	
	
}


