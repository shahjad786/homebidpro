<?php
 ob_start();
class Jobs extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $role_id =  $session_data['role_id'];   
            //echo  $role_id;die();
            if($role_id==1){


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
       
       else {
            redirect('homeowner/login', 'refresh');
        } 
    }
    public function index()
    {
    		
        $session_data = $this->session->userdata('logged_in');
        $owner_id     = $session_data['id'];
        $id           = $_GET['id'];
        //$contractor_id = $this->input->post('contractor_id');
        $data['check_bidder_status'] = $this->jobs_model->check_bidder_status($id);
        $data['cancel_project_status'] =      $this->jobs_model->cancel_project_status($id);

       //echo "<pre>"; print_r($data['cancel_project_status']);die;
        $result       = $this->jobs_model->jobs_detail($id);
       
        foreach ($result as $key => $value) {
            $img                 = explode(',', $value->image);

            //$cat_id = $value->cat_id;

            //$img_name = $this->contractor_model->category_name($cat_id);
            
            
            /*if(isset($img_name[0]->images_name))
            {

                $value->cat_image =$img_name[0]->images_name;

            }else{

                $value->cat_image ="dashpro.jpg";
            }*/
            $result[$key]->image = $img;
        }
         //echo "<pre>";
         //print_r($result);
        // die;
        $data["result"]     = $result;
        $data['contractor'] = $this->jobs_model->contractor_getby_status($id);
        //$data['conversation'] = $this->conversion_model->conversion_get($id,$owner_id);
        //$data['conversation1'] = $this->conversion_model->contractor_conversion($id);
        $data['content']    = $this->load->view('jobs/projectDetail', $data, TRUE);
        $this->load->view('includes/main', $data);
        
    }
    public function check_reviews(){
        $job_id        = $this->input->post('job_id');
        $owner_id      = $this->input->post('owner_id');
        $contractor_id      = $this->input->post('contractor_id');
         $this->db->select('*');
        $this->db->from('hbp_contractor_job_reviews');
        $this->db->where(array(
            'job_id' => $job_id,
            'owner_id' => $owner_id,
            'contractor_id' => $contractor_id
        ));
        $query = $this->db->get();
        //echo  $this->db->last_query();die();
        $data = $query->result();
        if(count($data)>0){
            echo "a";
        }else{
            echo "b";
        }
    }

  public function   updateCancelJobs()
  {

        $session_data = $this->session->userdata('logged_in');
        $owner_id     = $session_data['id'];


        $phone_no     = $session_data['phone_no'];  
        $email1       = $session_data['email'];
        $address1     = $session_data['address1'];   

        $today = date("Y-m-d");
        $job_id  =  $_GET['id'];
        $this->db->where('id', $job_id);
        $updateData =    $this->db->update('hbp_jobs', array(
        'status' => '1',
        'created_at' => $today
        ));

        /*echo $this->db->last_query();
        die;*/

        /*
            if($updateData)
            {
                redirect('homeowner/dashboard');

            }
        */
    if ($updateData) {


            $adminEmail    = adminEmail;
            $adminPhoneNumber = adminPhoneNumber;
            $adminAddress = adminAddress;

            $template = "Thank you for submitting you request for a quote";
            $messageData = $this->email_model->email_get_by_type1($template);

            $data     = $messageData['emails'];
            // echo "<pre>";print_r($data);die;
            $messageData = str_replace("(Phone number)",$adminPhoneNumber, $data);
            $messageData = str_replace("(Email)", $adminEmail, $messageData);
            $messageData = str_replace("(Address)", $adminAddress, $messageData);
            $this->sendMailHomeowner($messageData, $email1 , $adminEmail);



            $template_name = "You received a new job, Now let’s get started";
            $message      = $this->email_model->email_get_by_type($template_name);
            $s =  $message['emails'];
      
            $adminEmail    = adminEmail;
            $template_name = "You received a new job, Now let’s get started";
            $message      = $this->email_model->email_get_by_type($template_name);
            $s =  $message['emails'];


            $adminEmail1    = adminEmail;
            $template_name1 = "You received a new job, Now let’s get started";
            $message1       = $this->email_model->email_get_by_type1($template_name1);
            $s1             = $message1['emails'];

           // echo"<pre>";echo  $s1 ;
           // die;


            $message1 = str_replace("(Phone number)", $phone_no, $s1);
            $message1 = str_replace("(Email)", $email1, $message1);
            $message1 = str_replace("(Address)", $address1, $message1);
            $this->sendMail1($message1, $email1, $adminEmail1);


            $counties12 = $this->contractor_model->contractor_get_by_id($countiesForSearch,$categoryForSearch);

            foreach ($counties12 as $counties) {
                $email   = $counties->email;

                $message = str_replace("(Phone number)", $phone_no, $s);
                $message = str_replace("(Email)", $email1, $message);
                $message = str_replace("(Address)", $address1, $message);

                $this->sendMail($message, $adminEmail, $email);

            }
                $this->session->set_flashdata('homeownerFlash', 'You have successfully resubmit a job');                       
                redirect('homeowner/dashboard');
            
        }


  }



    public function fetch()
    {
        $job_id        = $this->input->post('job_id');
        $owner_id      = $this->input->post('owner_id');
        //$contractor_id = $this->input->post('contractor_id');
        $this->db->select('*,hbp_home_owners.profile_pic as owner_profile,hbp_contractors.profile_pic as contractor_profile');
        $this->db->from('hbp_communication');
        $this->db->join('hbp_contractors', 'hbp_communication.contractor_id = hbp_contractors.id', 'left');
        $this->db->join('hbp_home_owners', 'hbp_communication.owner_id = hbp_home_owners.id', 'left');
        $this->db->where(array(
            'job_id' => $job_id,
            'owner_id' => $owner_id
            //'contractor_id' => $contractor_id
        ));
        $data = $this->db->get();
        //echo $this->db->last_query();
        //die();
        
        foreach ($data->result() as $row) {
            if ($row->sen_rec == 'owner_to_contractor') {
                echo " <div class='test-block1'>";
                echo " <figure class='testi-img pull-right rightmargin'><img class='img-circle' id='circle' src='" . base_url() . "uploads/" . $row->owner_profile . "'></figure>";
                
                echo "<div class='pull-left even talk_bubble col-lg-9 col-xs-8'> <div class='bubble_talk_content'>" . $row->message . "</div></div>";
                echo " </div>";
            } else {
                echo " <div class='test-block1'>";
                echo " <figure class='testi-img pull-left rightmargin'><img class='img-circle' id='circle' src='" . base_url() . "uploads/" . $row->contractor_profile . "'></figure>";
                echo "<div class='pull-right odd talk_bubble col-lg-9 col-xs-8'> <div class='bubble_talk_content'>" . $row->message . "</div></div>";
                echo " </div>";
            }
            
        }
        exit;
    }
    public function cancel_job() {
/*
        $adminEmail    = HomeBidPro;
        $adminPhoneNumber = adminPhoneNumber;
        $adminAddress = adminAddress;
*/

        $cancel_date = date("Y-m-d");

        $session_data = $this->session->userdata('logged_in');
        //$email     = 'HomeBidPro';
        $id=$this->input->get('job_id');    
        $bidder = $this->jobs_model->findbidder($id);
        $admin = $this->login_model->admin_email_get();
        $merged_arr = array_merge($admin,$bidder);
        $this->db->where('id',$id); 
        $this->db->update("hbp_jobs",array("status"=>"3","cancel_date"=>$cancel_date));
        $template_name = "Cancel Project";
        $message = $this->email_model->email_get_by_type($template_name);
        $s =  $message['emails'];
        $message = str_replace("(Email)",adminEmail,$s);
        $message = str_replace("(Phone number)", adminPhoneNumber,$message);             
        $message = str_replace("(Address)",adminAddress, $message);

        //echo  $message;die;

        $this->email->set_newline("\r\n");
        foreach($merged_arr as $data){
            
            $this->email->set_mailtype("html");
            $this->email->from(adminEmail);
            $this->email->to($data->email);
            $this->email->subject('Cancel Job');
            $this->email->message($message);
            $this->email->send();

        }

        $this->session->set_flashdata('homeownerFlash', 'You have successfully cancel a job. you can resubmit a job from dashboard below ');                       
        redirect('homeowner/dashboard'); 
    }
    
    public function add_communication()
    {
        $job_id        = $this->input->post('job_id');
        $owner_id      = $this->input->post('owner_id');
        $contractor_id = $this->input->post('contractor_id');
        $message       = $this->input->post('message');
        $data = array();

          $this->db->select('hbp_communication.contractor_id');
          $this->db->from('hbp_communication');
          $this->db->distinct();
          $this->db->where('hbp_communication.job_id',$job_id);
          $this->db->where('hbp_communication.contractor_id !=','NULL');
          $query = $this->db->get();
          $contractors = $query->result_array();
          foreach($contractors as $key => $val){

                    $contractor_id = $val["contractor_id"];
                    $this->db->select('hbp_contractors.email');
                    $this->db->from('hbp_contractors');
                  // $this->db->distinct();
                    $this->db->where('hbp_contractors.id',$contractor_id);
                    $query = $this->db->get();
                   // echo  $this->db->last_query();

            if($query){

                $data[]=  $query->row();


              //echo "<pre>";print_r($data);die;

            } else {

                return false;

            } 




}


    $insertData =   $this->db->insert('hbp_communication', array(
            'message' => $message,
            'job_id' => $job_id,
            //'contractor_id' => $contractor_id,
            'owner_id' => $owner_id,
            'sen_rec' => 'owner_to_contractor'
        ));

    if($insertData)
    {
    if($data){

         // echo "<pre>";print_r($data);die;


         foreach ($data as $key => $value) {


            $contractor_email =   $value->email;


             // echo  $contractor_email;die;
              $session_data = $this->session->userdata('logged_in');
             // $company_name =  $session_data['company_name']; 
              $name         =  $session_data['name']; 
               $phone_number =  $session_data['phone_no'];
              //$address1 =  $session_data['address1'];
               $email12 =  $session_data['email'];


           // echo   $name;die;
           // $owner_id = $_POST['owner_id'];
            $adminEmail = adminEmail;
            $adminAddress = adminAddress;
            $adminPhonenumber = adminPhoneNumber;

            $template_name = "You received a new message, Now let’s get started";           
            $message = $this->email_model->email_get_by_type($template_name);
            $s = $message["emails"];
            //print_r($s);die;

            $message = str_replace("(Phone number)", $adminPhonenumber,$s);
            $message = str_replace("(Email)", $adminEmail, $message);               
            $message = str_replace("(Address)",$adminAddress, $message);


            // $message = str_replace("(Contractor Company Name)", $company_name, $message);
            // $message = str_replace("(Contractor Name)", $name, $message);
            $message = str_replace("(Phone Number Homeowner)", $phone_number, $message);
            $message = str_replace("(Homeowner Name)", $name, $message);
            $message = str_replace("(Homeowner Email)", $email12, $message);


            $this->sendMail12($message, $adminEmail,$contractor_email);

             
         }

    }
      

        }

    }
    
    public function contractor_detail()
    {
        $id                 = $_GET['id'];
        $job_id             = $_GET['job_id'];
        $data['homeowners'] = $this->jobs_model->count_homeowner($id);
        $data['jobs']       = $this->jobs_model->completed_job($id);
        $data['result']     = $this->jobs_model->contractor_detail($id, $job_id);
        
        //echo "<pre>";print_r($data['result']);die;


        foreach ($data['result'] as $key => $value) {

                
            $cat_id = $value->category_id;
            $img_name = $this->contractor_model->category_name($cat_id);
            
             //echo "<pre>";

            if(isset($img_name[0]->images_name))
            {

                $value->cat_image =$img_name[0]->images_name;

            }else{

                $value->cat_image ="dashpro.jpg";
            }
                
        }
        // echo "<pre>";
        // print_r($data['result'] );
        // die;
        $data['recent']     = $this->contractor_model->recent_jobs($id);
/* 		echo "<pre>";
		print_r($data['recent']);
		die; */
        $contractor_reviews = $this->jobs_model->reviews_get($id);
        $data['average'] = $this->jobs_model->average_rating($id);
        $data['reviews']    = $contractor_reviews;


         //echo "<pre>";  print_r($data['reviews']);die;

        if ($data['reviews'] == "no-data") {
            
            $data['reviews'] = 0;
        }
        
        else {
            
            $data['reviews'] = $this->jobs_model->reviews_get($id);
            
        }


        //echo "<pre>";print_r($data['reviews']);die;
        $data['rating']  = $this->jobs_model->rating($id);
        $data['check_bidder_status']=$this->jobs_model->check_bidder_status($job_id);
        $data['check_job_status']=$this->jobs_model->check_job_status($job_id);
        $data['content'] = $this->load->view('jobs/contractorDetail', $data, TRUE);
        $this->load->view('includes/main', $data);
    }
    public function createjob()
    {
        $data['result1']      = $this->question_model->questionare();
        $data['country']      = $this->jobs_model->allCountry();
        $data['state']        = $this->jobs_model->allState();
        $data['Counties']     = $this->jobs_model->allCounties();
        $data['job_category'] = $this->category_model->category_get();
        $data['budget'] =    $this->jobs_model->budget_get();
        $data['content']      = $this->load->view('jobs/createJob', $data, TRUE);
        $this->load->view('includes/main', $data);
    }
    
    public function insert_job()
    {
        
        //$session_data = $this->session->userdata('logged_in');
        //echo $session_data['username']; 
        $this->do_upload();
    }
   /* public function update()
    {
        die("yes");
        $id = $this->input->post('id');
        $job_id = $this->input->post('job_id');
        echo $id;
        //die();
        $status = $this->input->post('status');
        $this->db->where('id', $id);
        $sql = $this->db->update("hbp_job_bids", array(
            'status' => $status
        ));
        $this->db->where('hbp_jobs.id', $job_id);
        $sql = $this->db->update("hbp_jobs", array(
            'status' => '2'
        ));
        //echo $this->db->last_query();
        //die();
       // echo 1;
    }*/
    public function fetch_table()
    {
        
        $id = $this->input->post('id');
        $this->db->select('jobs.id as job_id,contractors.profile_pic,jobs.name,jobs.owner_id, jobs.category_id, jobs.category_id,job_bids.id as job_bid_id,job_bids.status,job_bids.created_at,jobs.owner_id,jobs.image,jobs.video,jobs.started_time,jobs.expire_time,jobs.project_discription, job_bids.price,job_bids.start_time,contractors.name as contractor_name,contractors.id as contractor_id,communication.message');
        $this->db->from('hbp_job_bids');
        $this->db->join('jobs', 'job_bids.job_id = jobs.id', 'left');
         //$this->db->join('home_owners', 'jobs.owner_id = home_owners.id', 'left');
        $this->db->join('contractors', 'job_bids.contractor_id = contractors.id', 'left');
        $this->db->join('communication', 'job_bids.conversion_id = communication.id', 'left');
        $this->db->where('job_bids.job_id', $id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $data = $query->result();

      //echo  count($data);
      //die();
        
           $tbl = '';
        $tbl .= ' <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                  <tr>

                    <th>Name</th>
                    <th>Price Quoted</th>
                    <th>Date</th>
                    <th>Accept</th>
                  </tr>
            </thead>
            <tbody class="status">';

        if(count($data)>0){
        

        foreach ($data as $row) {
            $payment_url = base_url()."homeowner/payment/";
            $tbl .= '<tr>
               <td><div><img class="img-circle" id="circle" src="' . base_url() . 'uploads/' . $row->profile_pic . '"></div><div class="bidder_property"><a href="' . base_url() . 'homeowner/jobs/contractor_detail?id=' . $row->contractor_id . '&job_id=' . $row->job_id . '">' . $row->contractor_name . '</a></div></th>
                 <td>$' . $row->price . '</td> 
                 <td>' .  date('F d, Y H:i:s', strtotime($row->created_at)) . '</td>
                <td><a href= "'.$payment_url.'?bid_id='.$row->job_bid_id.'&'.'job_id='.$id.'" style="padding:0px;" data="' . $row->job_bid_id . '" class="status_checks btn ' . (($row->status) ? 'a' : 'b') . '">' . (($row->status) ? '<button class="bid-accepted" type="button">Accepted </button> ' : '<button class="bid-not-accepted"  type="button">Accept </button>') . '</a>
                </td>
                <!--td><a style="padding:0px;" data="' . $row->job_bid_id . '" class="status_checks btn ' . (($row->status) ? 'a' : 'b') . '">' . (($row->status) ? '<button class="btn btn-default btn-xs button active" type="button">Accept </button> ' : '<button class="btn btn-default btn-xs button "  type="button">Accept </button>') . '</a>
                </td-->
                </tr>';
        }
     
        }
        else{
        //$tbl .= '<tr>  <td></td><td></td><td></td><td></td></tr>'  ;
     // echo '<h3 style = "color:red;text-align:center"> Sorry No Results</h3>';
           
     }
       echo $tbl;
        $tbl .= '</tbody>
                           </table>';
        
    }
    public function update_rating()
    {
        $rating = $_POST["rating"];
        $id     = $_POST["id"];
        $this->db->where('id', $id);
        $this->db->update('hbp_contractor_job_reviews', array(
            'rating' => $rating
        ));
        
    }
    public function update_complete_status(){
die("a");
         $job_bid_id=$_GET["job_bid_id"];
         $job_id= $_GET["job_id"];
         $completed_date = date("Y-m-d");

        $this->db->where('id', $job_bid_id);
        $this->db->update('hbp_job_bids', array(
            'completed_status' => '1'
        ));
        $this->db->where('id', $job_id);
        $this->db->update('hbp_jobs', array(
            'status' => '5',
            'completed_date' => $completed_date
        ));
        echo $this->db->last_query();
       die();
         //redirect('homeowner/dashboard'); 
        
    }
    
    function do_upload()
    {
        // echo"<pre>";  print_r($_FILES);die;
        //echo"<pre>"; print_r($_REQUEST);
        $session_data = $this->session->userdata('logged_in');
        $owner_id     = $session_data['id'];


        $phone_no     = $session_data['phone_no'];  
        $email1       = $session_data['email'];
        $address1     = $session_data['address1'];   
        //print_r($_FILES);
        
        $name_array = array();
        $count      = count($_FILES['file1']['size']);
        
        $error_c = 0;
        foreach ($_FILES as $key => $value) {
            
            if (!empty($value['tmp_name'])) {
                
                
                if ($key == "file1") {
                    
                    for ($s = 0; $s <= $count - 1; $s++) {
                        $_FILES['file1']['name']     = $value['name'][$s];
                        $_FILES['file1']['type']     = $value['type'][$s];
                        $_FILES['file1']['tmp_name'] = $value['tmp_name'][$s];
                        $_FILES['file1']['error']    = $value['error'][$s];
                        $_FILES['file1']['size']     = $value['size'][$s];
                        
                        $config['upload_path']   = 'uploads';
                        $config['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
                        $config['max_size']      = '';
                        $config['max_width']     = '200000000';
                        $config['max_height']    = '1000000000000';
                        $this->load->library('upload', $config);
                        $this->upload->overwrite = true;
                        if (!$this->upload->do_upload($key)) {
                            $error_c = 1;
                            $error   = array(
                                'error' => $this->upload->display_errors()
                            );
                        } else {
                            $data                 = array(
                                'upload_data' => $this->upload->data()
                            );
                            $data_c["cat_image"] = $data['upload_data']['file_name'];
                        }
                        $name[] = $data_c["cat_image"];
                    }
                    
                }
                
            }
            
            
        }
        
        $img = implode(',', $name);
        
        $result1 = $this->question_model->questionare();
        foreach ($result1 as $row) {
            $ques      = $this->input->post("question_" . $row->id);
            $opt       = $this->input->post($row->question_type);
            $quesopt[] = $ques . ":" . $opt;
            
            
        }

         $question = implode(',', $quesopt);
         $countiesForSearch = $_POST['counties'];
         $categoryForSearch = $_POST['job_category'];
         $categoryForSearch12 = implode(',', $categoryForSearch);


        /*$start_date        = date('F m, Y', strtotime($this->input->post('start_time')));*/
        $completed_time    = date('F d, Y', strtotime($this->input->post('completed_time')));
        $data              = array(
            'status' => 1,
            'owner_id' => $owner_id,
            'image' => $img,
            /*'video' => $data_c["video_name"],*/
            'name' => $this->input->post('name'),
            'question_option_job_id' => $question,
            'price' => $this->input->post('price'),
            'country_id' => $this->input->post('country'),
            /*'started_time' => $start_date,*/
            'expire_time' => $completed_time,
            'category_id' => $categoryForSearch,
            'state' => $this->input->post('state'),
            'counties' => $this->input->post('counties'),
            'project_discription' => $this->input->post('description')
        );
            
        
          $insertData = $this->db->insert('jobs', $data);
         

    
        if ($insertData) {

            $adminEmail    = adminEmail;
            $adminPhoneNumber = adminPhoneNumber;
            $adminAddress = adminAddress;

            $template = "Thank you for submitting you request for a quote";
            $messageData = $this->email_model->email_get_by_type1($template);


            $data     = $messageData['emails'];

           // echo "<pre>";print_r($data);die;

            $messageData = str_replace("(Phone number)",$adminPhoneNumber, $data);
            $messageData = str_replace("(Email)", $adminEmail, $messageData);
            $messageData = str_replace("(Address)", $adminAddress, $messageData);
            $this->sendMailHomeowner($messageData, $email1 , $adminEmail);



            $template_name = "You received a new job, Now let’s get started";
            $message      = $this->email_model->email_get_by_type($template_name);
            $s =  $message['emails'];
      
            $adminEmail    = $adminEmail;
            $template_name = "You received a new job, Now let’s get started";
            $message      = $this->email_model->email_get_by_type($template_name);
            $s =  $message['emails'];


            $adminEmail1    =$adminEmail;
            $template_name1 = "You received a new job, Now let’s get started";
            $message1       = $this->email_model->email_get_by_type1($template_name1);
            $s1             = $message1['emails'];

           // echo"<pre>";echo  $s1 ;
           // die;


            $message1 = str_replace("(Phone number)", $phone_no, $s1);
            $message1 = str_replace("(Email)", $email1, $message1);
            $message1 = str_replace("(Address)", $address1, $message1);
            $this->sendMail1($message1, $email1, $adminEmail1);


            $counties12 = $this->contractor_model->contractor_get_by_id($countiesForSearch,$categoryForSearch);

            foreach ($counties12 as $counties) {
                $email   = $counties->email;

                $message = str_replace("(Phone number)", $phone_no, $s);
                $message = str_replace("(Email)", $email1, $message);
                $message = str_replace("(Address)", $address1, $message);

                $this->sendMail($message, $adminEmail, $email);

            }
                

                $this->session->set_flashdata('homeownerFlash', 'You have successfully created a new job');                      
                redirect('homeowner/dashboard');
            
        }
        
        
    }
    
    public function sendMail($message, $adminEmail, $email)
    {
        
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from($adminEmail);
        $this->email->to($email);
        $this->email->subject('Congratulations you received a new job ,Now let’s get started');
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
        $this->email->subject('Congratulations a new job created on HomeBidPro');
        $this->email->message($message1);
        $this->email->send();
       
    }

    public function sendMail12($message, $adminEmail,$contractor_email)
    {
        
        // die("hello friend121323");
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from($adminEmail);
        $this->email->to($contractor_email);
        $this->email->subject('New message come From the Homeowner');
        $this->email->message($message);
        $this->email->send();
       
    }

    public function sendMailHomeowner($messageData, $homeowner_email,$adminEmail)
    {
        
        //die("hello friend121323");
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        /* echo    $adminEmail;
        echo $homeowner_email;die;*/
        $this->email->from($adminEmail);
        $this->email->to($homeowner_email);
        $this->email->subject('Thank you for submitting you request for a quote');
        $this->email->message($messageData);
        $this->email->send();
       
    }



    public function  expired_jobs(){
       $result= $this->jobs_model->expired_jobs();
       $today=date("F d, Y");
       foreach ($result as $row){
            if(($row->expire_time)==$today){
                $bidder = $this->jobs_model->findbidder($row->id);
                $owner = $this->jobs_model->findOwnerEmail($row->owner_id);
                $admin = $this->login_model->admin_email_get();
                $merged_arr = array_merge($admin,$bidder,$owner);
                $this->db->where('job_id',$row->id); 
                $this->db->update("hbp_job_bids",array("expire_status"=>"expired"));
                $this->db->where('hbp_jobs.id',$row->id); 
                 $this->db->update("hbp_jobs",array("status"=>"4"));
                $this->email->set_newline("\r\n");
                    foreach($merged_arr as $data){  
                        $this->email->set_mailtype("html");
                        $this->email->from(adminEmail);
                        $this->email->to($data->email);
                        $this->email->subject($row->name ."job Expired");
                        $this->email->message('expire job');
                        $this->email->send();
                    }
                   // redirect('homeowner/dashboard'); 
            }
       }
    }
    
}
