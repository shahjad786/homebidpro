<?php

class Jobs extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
		
		 $this->load->library('session');
		 $this->load->library('ckfinder');
		 $this->load->model('jobs_model');
		 $this->load->model('email_model');
		 $this->load->model('contractor_model');
		 $this->load->model('question_model');
		 $this->load->model('category_model');
		 $this->load->model('homeowner_model');
		 $this->load->model('conversion_model');
		
	}
   	public function index()
	{
							
		  $id = $_GET['id'];
		  $category_id = $_GET['category_id'];
		  //$data["category_image"] = $result;
		  $data['category_image'] = $this->contractor_model->category_name($category_id);



		  $result = $this->jobs_model->jobs_detail($id);

			foreach($result as $key => $value) 
			{ 
				$img = explode(',',$value->image);
				$result[$key]->image = $img;
			}

		$data["result"] = $result;		
		$data['content']= $this->load->view('projects/projectDetail',$data,TRUE);
		$this->load->view('includes/main',$data);		
		//redirect('homeowner/login', 'refresh');

	}


	public function category()
	{

		  $category = $_POST['category'];
		  $data['category'] = $this->contractor_model->category_get_by_key($category);

		 //print_r($data['category']);die;

		  $categoryDetail = $data['category'];
		
		if(isset($categoryDetail) && count($categoryDetail)>0)
		{
				foreach($categoryDetail as $key => $value)  {

                            
                          //  $data[$value->id]["id"] = $value->id;
                            $data1[$value->id]["job_category"] = $value->job_category;
                            //$data[$val->id]["phone_number"] = $val->phone_number;


                        }
                            
                         // echo "<pre>"; print_r($data1);die;
                            echo  json_encode($data1);

		}
		
		else{
			
				$data1 = array (
                
                'no-found' => 1,
                
                );

 				echo  json_encode($data1);

				
		} 
		
	
	}
   
	public function allServices()
	{
	    
		$data['job_category'] = $this->category_model->category_get();

		//echo "<pre>";print_r($data['job_category']);die;
		$data['content']=$this->load->view('projects/allServices', $data,TRUE);
		$this->load->view('includes/main',$data);
		 
	}
















}


