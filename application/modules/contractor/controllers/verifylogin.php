<?php

ob_start();
class Verifylogin extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->output->nocache();
        $this->load->model('login_model');
        $this->load->model('contractor_model');

}
    function index()
    {
        $this->checkDataBase();
        if ($this->checkDataBase() == FALSE) {
            redirect('contractor/login', 'refresh');
        } else {
            redirect('contractor/dashboard', 'refresh');
        }
    }
    function checkDataBase()
    {
        $this->load->library('session');
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $result   = $this->login_model->contractor_login($email, $password);
        //    die;
        //  echo "<pre>";print_r($result);die;
        if ($result) {
            if (isset($_POST['remember'])) {
                $this->input->set_cookie('email', $_POST['email'], 3600);
                $this->input->set_cookie('password', $_POST['password'], 3600);
            }

            
            foreach ($result as $row);

            $role_id = 2;
           
            $session_data = array(
                 'id' => $row->id,
                 'name' => $row->name,
                 'country_id' =>$row->country_id,
                 'category_id' =>$row->category_id,
                 'company_name' =>$row->company_name,
                 'email' =>$row->email,
                 'company_address' =>$row->company_address,
                 'counties' =>$row->counties,
                 'phone_number' =>$row->phone_number,
                 //'business_status' =>$business_status,
                 'role_id' => $role_id
                 
            );
            $this->session->set_userdata('logged_in', $session_data);
            return TRUE;
        } else {
            $this->session->set_flashdata('message', 'Wrong Username or Password');
            redirect("contractor/login");
        }
    }
}
?>