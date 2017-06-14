<?php

ob_start();
class Login extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->output->nocache();
        $this->load->library('session');

    }
    public function index()
    {  
        if($this->session->userdata('logged_in'))
        {
            //echo "hello";die("data is");
            $session_data = $this->session->userdata('logged_in');
            $role_id =  $session_data['role_id'];   
            // echo  $role_id;die();
            if($role_id==2)
            {

                redirect('contractor/dashboard', 'refresh');

            }
            elseif($role_id==1)
            {

                redirect('homeowner/dashboard', 'refresh');
            }
        }else{

                $data['content'] = $this->load->view('login/login', '', TRUE);
                $this->load->view('includes/main', $data);
            }
        }
 
}