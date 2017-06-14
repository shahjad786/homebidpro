<?php 

class Managejobs extends MX_Controller 
{
	public function __construct() {
		parent::__construct();
        $this->output->nocache();
		if($this->session->userdata('logged_in'))
		   {
			 $this->load->library('session');
			 $this->load->model('jobs_model');
			 $this->load->model('login_model');
			 $this->load->model('email_model');
			 $this->load->model('homeowner_model');
			 $this->load->model('category_model');
             $this->load->model('contractor_model');
		 }else{
			redirect('homeowner/login', 'refresh');
		}
	}
   	public function index()
	{
		    $data['job_category'] = $this->category_model->category_get();
            $data['state'] = $this->category_model->state_get();
            $result = $this->jobs_model->job_info();

           // echo "<pre>";print_r($result);
            $data['budget'] =    $this->jobs_model->budget_get();

            // echo "<pre>";print_r($data['budget']);die;
            $state_code  = $result[0]->code;   
            $data['county'] = $this->category_model->county_get($state_code);
			
			 foreach ($result as $key => $value) {
	            $img  = explode(',', $value->image);
	            $result[$key]->image = $img;
                $categories = explode(',',$value->category_id);

                foreach($categories as $key1 => $val1) {
                    $dataId[$key1] = $this->category_model->category_get_id($val1);
                }
                
                $result[$key]->categories = $dataId;
        	}
        	$data["result"]     = $result;
			
			$data['content']= $this->load->view('managejobs/editJobs',$data,TRUE);
			$this->load->view('includes/main',$data);
		
	}
	public function update(){



        // echo "<pre>";print_r($_POST);
         
         //    foreach ($_FILES as $key => $value) {
                    
                
         //        // if (in_array($value["name"],$_POST["old_image"]))
         //        // {
         //        //    echo $value["size"];
         //        // }
                
         //        echo "<pre>";
         //        print_r($value);
         //    }

         // die;

        $session_data = $this->session->userdata('logged_in');
        $owner_id     = $session_data['id'];
        $phone_no     = $session_data['phone_no'];  
        $email1       = $session_data['email'];
        $address1     = $session_data['address1'];

        $name_array = array();
   
        
        $error_c = 0;

        $filesData= $_FILES;

        $name = array();
        
        for($i=1;$i <= $_POST['counimages'];$i++)
        {
            $file1 = $_FILES["data".$i];

            if($file1['name']!='')
            {
                $_FILES['file1']['name']     = $file1['name'];
                $_FILES['file1']['type']     = $file1['type'];
                $_FILES['file1']['tmp_name'] = $file1['tmp_name'];
                $_FILES['file1']['error']    = $file1['error'];
                $_FILES['file1']['size']     = $file1['size'];
                
                $config['upload_path']   = 'uploads';
                $config['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
                $config['max_size']      = '';
                $config['max_width']     = '200000000';
                $config['max_height']    = '1000000000000';
                $this->load->library('upload', $config);
                $this->upload->overwrite = true;
                if (!$this->upload->do_upload('data'.$i)) {
                    $error_c = 1;
                    $error   = array(
                        'error' => $this->upload->display_errors()
                    );
                } else {
                    $data                 = array(
                        'upload_data' => $this->upload->data()
                    );
                    $data_c["image_name"] = $data['upload_data']['file_name'];
                }
                
                $name[] = $data_c["image_name"];
                                
            }
            else
            {
                $name[] = $_POST['old_image'.$i];
            }
        }
    
        
        $category =   $_POST['job_category'];
        $counties = $_POST['counties'];

        /*$start_date        = date('F m, Y', strtotime($this->input->post('start_time')));*/
        $completed_time    = date('F d, Y', strtotime($this->input->post('completed_time')));
        $data            = array(
                'name' => $this->input->post('name'),
                'state' => $this->input->post('state'),
                'counties' => $this->input->post('counties'),
                'category_id' => $category,
                'expire_time' => $completed_time,
    			'project_discription' => $this->input->post('description')
        );

        if(!empty($name))
        {
            $img = implode(',', $name);
            $data['image'] = $img;
        }
        //print_r($data['image']);
        
        
        
        
               $id=$_GET['id'];
               $this->db->where('jobs.id',$id);
                 $insertData = $this->db->update('jobs', $data);

                   /* $this->db->where('job_id',$id);
                    $delete_category  =   $this->db->delete('jobs_categories');
                                                       
                foreach ($category as $key => $cat) {
                       $data1 =  array(
                         'category_id' => $cat,
                         'job_id' => $id
                        );
                        $allDataInsert =  $this->db->insert('jobs_categories',$data1);
                        
                 }*/

            if($insertData){

            $adminEmail    = "HomeBidPro";
            $template_name = "You received a new job, Now let’s get started";
            $message      = $this->email_model->email_get_by_type($template_name);

            $s =  $message['emails'];

          

            $adminEmail1    = "HomeBidPro";
            $template_name1 = "You received a new job, Now let’s get started";
            $message1       = $this->email_model->email_get_by_type1($template_name1);
            $s1             = $message1['emails'];

           // echo"<pre>";echo  $s1 ;
           // die;


            $message1 = str_replace("(Phone number)", $phone_no, $s1);
            $message1 = str_replace("(Email)", $email1, $message1);
            $message1 = str_replace("(Address)", $address1, $message1);
            $this->sendMail1($message1, $email1, $adminEmail1);


            $counties12 = $this->contractor_model->contractor_get_by_id($counties,$category);

            foreach ($counties12 as $counties) {
                $email   = $counties->email;

                $message = str_replace("(Phone number)", $phone_no, $s);
                $message = str_replace("(Email)", $email1, $message);
                $message = str_replace("(Address)", $address1, $message);

                $this->sendMail($message, $adminEmail, $email);

            }
                $this->session->set_flashdata('homeownerFlash', 'You have successfully edit a job');                       
                redirect('homeowner/dashboard');
            
        }

    }
	 public function sendMail($message, $adminEmail, $email)
     {
        
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
    
    public function sendMail1($message1, $email1, $adminEmail1)
    {
        
        
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from($email1);
        $this->email->to($adminEmail1);
        $this->email->subject('New Job Created here');
        $this->email->message($message1);
        $this->email->send();
       
    }

}


