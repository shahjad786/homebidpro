<?php
 ob_start();
class Verifylogin extends MX_Controller  {
 
 function __construct()
 {

  
   parent::__construct(); 
   $this->output->nocache();
   $this->load->model('login_model');
   $this->load->model('email_model');
	 $this->load->library('session');
 }
 
 function index()
 {

   $this->checkDataBase();	
   if($this->checkDataBase() == FALSE)
   {
	   redirect('homeowner/login', 'refresh');
   }
   else
   {











	   redirect('homeowner/dashboard', 'refresh');
   }
 
 }
 
 function checkDataBase()
 {
	 
   $this->load->library('session');
   $email = $this->input->post('email');
   $password = $this->input->post('password');
   $result = $this->login_model->homeowner_login($email, $password); 
   //print_r($result);
   //die();

    if( $result){

            if($this->session->userdata('jobData'))
            {
                 
                foreach($result as $row);

                 $owner_id  = $row->id; 

                 $alljobData = $this->session->userdata('jobData'); 
                 $alljobData['owner_id'] = $owner_id;             
                 $category =   $alljobData['category_id'];
                 $counties = $alljobData['counties'];


                 // echo "<pre>"; print_r($alljobData);die;

                $inserJobtData = $this->db->insert('jobs', $alljobData);
                $this->session->unset_userdata("jobData");
                $this->session->sess_destroy(); 

               if($inserJobtData)
               {

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
                
               }
              
            }




   }

   if($result)
   {
	 
       if(isset($_POST['remember'])) { 
        
        $this->input->set_cookie('email', $_POST['email'], 3600);
        $this->input->set_cookie('password', $_POST['password'], 3600);  
		
      }

       
     foreach($result as $row);
     $role_id = 1;
		  $session_data = array(
  			'id' => $row->id,
  			'name' => $row->name,
        'phone_no' => $row->phone_no,
        'email' => $row->email,
        'address1' => $row->address1,
        'role_id' => $role_id

			);
			  $this->session->set_userdata('logged_in', $session_data);

       /* if($this->session->userdata('logged_in'))
        {

             $sessionData = $this->session->userdata('logged_in');
             $owner_id =  $sessionData['id'];

           if($this->session->userdata('jobData'))
            {

                echo "here is seedion";die;

               $alljobData = $this->session->userdata('jobData');
               $alljobData['owner_id'] = $owner_id;
               $category =   $alljobData['category_id'];
               $counties = $alljobData['counties'];

               $inserJobtData = $this->db->insert('jobs', $alljobData);

              
            }



        }*/

   			return TRUE;
   }
   else
   {
    $this->session->set_flashdata('message', 'Wrong Username or Password
.');
				redirect("homeowner/login");
   }
 }
}
?>
