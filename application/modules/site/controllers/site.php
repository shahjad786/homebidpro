<?php 
class Site extends MX_Controller 
{

	public function __construct() {
		parent::__construct();

		//$this->session->keep_flashdata('message');
		$this->load->library('session');			 
		$this->load->model('category_model');
		$this->load->model('staticblock_model');
		$this->load->model('marketblock_model');
		$this->load->model('video_model');
		$this->load->model('pages_model');	
	}


	
   	public function index()
	{

		
		 //$c = $this->load->helper('url');
		$template_name = "Painting 101";

		$template_name1 = "Contractor  Detail";

	    $data['result'] = $this->staticblock_model->staticBlock_get();
	    $data['market_block'] = $this->marketblock_model->marketBlock_get();
		$data['job_category'] = $this->category_model->category_get();
		$data['home_video']   =  $this->video_model->homeVideo();
		$data['blog_post']    =  $this->video_model->blogData();

		//$data['tools_tips'] =  $this->pages_model->tools_tips();
		$data['tools_tips'] =  $this->pages_model->page_get_meta_discription($template_name);
		$data['contractor'] =  $this->pages_model->page_get_meta_discription($template_name1);

		//echo "<pre>";print_r($data['contractor']);die;


		//echo "<pre>";print_r($data['blog_post']);die;


		//echo "<pre>";print_r($data['home_video']);die;
		$data['content']=$this->load->view('home/home', $data,TRUE);
		$this->load->view('includes/main',$data);
		 
	}


	/*public function blogData()
	{

		require_once('blog/wp-blog-header.php');
        require_once('blog/wp-includes/link-template.php');

	    if($catagory !='')
	    {


	        $args = array(  'posts_per_page' => 3, 'category_name' => $catagory );
	    }
	    else
	    {
	        
	        $args = array('posts_per_page' => 3);
	    }    
    
          $mypostsMov = get_posts( $args );  
	    //echo "<pre>"; print_r($mypostsMov); die;
	    
	   $mypostsarrayMov = array();
	   $i=0;
	   foreach ($mypostsMov as $post ) : 
	     $excerpt = preg_replace("/<img[^>]+\>/i", "", $post->post_content);	     
	     $mypostsarrayMov[$i]['post_title'] = strip_tags($post->post_title);
	     $i++;
	   endforeach; 
	    wp_reset_postdata();
    
       //echo "<pre>"; print_r($mypostsarrayMov); die;
      
       //return $this->render('MovePlusServiceBundle:Default:recentpostCombined.html.twig',array('mypostsMov'=>$mypostsarrayMov, ));

       return $mypostsarrayMov;

	}
*/


	public function join_now()
	{

		$template_name = "Join Now";			
		$data['result'] = $this->pages_model->page_get_by_title($template_name);
		$data['content']=$this->load->view('home/join',$data,TRUE);
		$this->load->view('includes/main',$data);
		 
	}
	public function get_started()
	{
		$template_name = "Get Started";			
		$data['result'] = $this->pages_model->page_get_by_title($template_name);
	//	echo "<pre>";print_r($data['result']);die;
		$data['content']=$this->load->view('home/getstarted',$data,TRUE);
		$this->load->view('includes/main',$data);
		 
	}


	public function about_us()
	{
		$template_name = "About Us";			
		$data['result'] = $this->pages_model->page_get_by_title($template_name);
	//	echo "<pre>";print_r($data['result']);die;
		$data['content']=$this->load->view('home/aboutUs',$data,TRUE);
		$this->load->view('includes/main',$data);
		 
	}

	public function privacy_policy()
	{
		$template_name = "Terms and Conditions and Privacy Policy";			
		$data['result'] = $this->pages_model->page_get_by_title($template_name);
	//	echo "<pre>";print_r($data['result']);die;
		$data['content']=$this->load->view('home/privacyPolicy',$data,TRUE);
		$this->load->view('includes/main',$data);
		 
	}

	

	public function contact_us()
	{
		$template_name = "Contact Us";			
		$data['result'] = $this->pages_model->page_get_by_title($template_name);
	//	echo "<pre>";print_r($data['result']);die;
		$data['content']=$this->load->view('home/termsCondition',$data,TRUE);
		$this->load->view('includes/main',$data);
		 
	}



	public function tool_tips()
	{
		$template_name = "Tools & Tips";			
		$data['result'] = $this->pages_model->page_get_by_title($template_name);
		$data['content']=$this->load->view('home/tool&tips',$data,TRUE);
		$this->load->view('includes/main',$data);
		  
	}
	public function how_it_works()
	{

		$template_name = "How It Work";			
		$data['result'] = $this->pages_model->page_get_by_title($template_name);
		//echo "<pre>";print_r($data['result']);die;
		$data['content']=$this->load->view('home/howworks',$data,TRUE);
		$this->load->view('includes/main',$data);
		 
	}


	/*public function home_video()
	{
		
		$data['home_video'] =  $this->video_model->homeVideo();
	
		 
	}*/















   /* public function staticBlock()
	{
		
		   		$data['job_category'] = $this->category_model->category_get();
		   		$data['content']=$this->load->view('home/home', $data,TRUE);
				$this->load->view('includes/main',$data);
		 
	}*/

	
}
