<?php

class Upload extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in'))
        {
            $this->load->helper(array('form', 'url'));
        }
        else{
            redirect('admin/login', 'refresh');
        }
    }

    function index()
    {
        $data['data'] = "";
        $data['content']=$this->load->view('cmsblock/cmsblock',$data,TRUE);
        $this->load->view('includes/main',$data);
    }

    function do_upload()
    {    


        foreach ($_FILES as $key => $value) {

            if (!empty($value['tmp_name'])) {


                if($key == "file1") {

                    $config['upload_path'] = 'uploads';
                    $config['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
                    $config['max_size']='';
                    $config['max_width']='200000000';
                    $config['max_height']='1000000000000';
                    $this->load->library('upload',$config);
                    if ( ! $this->upload->do_upload($key)) {
                    $error = array('error' => $this->upload->display_errors());
                    //failed display the errors
                    } else {

                        $data = array('upload_data' => $this->upload->data());
                        $this->load->view('cmsblock/success', $data);

                    }
                }
                if($key == "file2") {

                    $config11['upload_path'] = 'videos';
                    //$config11['upload_path'] = 'uploads';
                    $config11['allowed_types'] = 'mp4|3gp|gif|jpg|png|jpeg|pdf';
                    $config11['max_size']='';
                    $config11['max_width']='200000000';
                    $config11['max_height']='1000000000000';
                    $this->upload->initialize($config11);
					
                    if ( ! $this->upload->do_upload($key)) {
                    $error = array('error' => $this->upload->display_errors());
                    //failed display the errors
                    } else {

                        $data = array('upload_data' => $this->upload->data());
                        $this->load->view('cmsblock/success', $data);

                    }
                }               



            }
        }
    }
} 

?>