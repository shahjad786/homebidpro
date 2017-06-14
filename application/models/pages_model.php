<?php

Class Pages_model extends CI_Model {

	public function pages_get() {
		$this->db->select('*');
		$this->db->from('hbp_pages');
		$this->db->order_by('id','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query();die();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function pages_get_by_type($template_name) {

		$this->db->select('*');
		$this->db->from('hbp_pages');
		$this->db->where('type',$template_name);
		$this->db->order_by('id','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query();die();
		if($query){
			return $query->row_array();
		} else {
			return false;
		}
	}
	public function pages_for_editor() {
 		$id=$this->input->get('id');
		$this->db->select('*');
		$this->db->from('hbp_pages');
		$this->db->where('id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query){
			return $query->result();
		} else {
			return false;
		}
	}


    public function tools_tips()
	{
		/*if (function_exists('site_url') === true) {

		     echo "helper  loaded";
		}
        die;
          */
        //$this->load->helper('url_helper');

       /* $this->db->select('bhwp_posts.id,bhwp_posts.guid,bhwp_posts.post_title,bhwp_posts.post_content');
		$this->db->from('bhwp_posts');
		$this->db->join('state', 'hbp_contractors.state = state.code', 'left');
		$query = $this->db->get();
*/


		require_once('blog/wp-blog-header.php');
		require_once('blog/wp-includes/link-template.php');


		$catagory ='tool&tips';

		//echo $catagory;die;
	    if($catagory !='')
	    {

	        $args = array(  'posts_per_page' => 1, 'category_name' => $catagory );
	    }
	    else
	    {
	        
	        $args = array('posts_per_page' => 1);
	    }    
    
	        $mypostsMov = get_posts( $args);  
		    // echo "<pre>"; print_r($mypostsMov); die;
			$mypostsarrayMov = array();
			$i=0;
			foreach ($mypostsMov as $post ) : 
			$excerpt = preg_replace("/<img[^>]+\>/i", "", $post->post_content);	     
			$mypostsarrayMov[$i]['post_title'] = strip_tags($post->post_title);
			$mypostsarrayMov[$i]['content'] =    strip_tags($post->post_content);
			$mypostsarrayMov[$i]['permalink'] = get_permalink($post->ID);
			//$mypostsarrayMov[$i]['meta_discription'] = get_permalink($post->meta_discription);
			$mypostsarrayMov[$i]['thumbnail'] =get_the_post_thumbnail($post->ID,array( 300, 200));
			$i++;
			endforeach; 
		    wp_reset_postdata();
    
		    //echo "<pre>"; print_r($mypostsarrayMov); die;
		      
		    //return $this->render('MovePlusServiceBundle:Default:recentpostCombined.html.twig',array('mypostsMov'=>$mypostsarrayMov, ));

            return $mypostsarrayMov;

	}

























	public function page_get_by_title($template_name) {

		$this->db->select('*');

		$this->db->from('hbp_pages');

		$this->db->where('page_title',$template_name);

		$this->db->order_by('id','Asc');

		$query = $this->db->get();

		//echo $this->db->last_query();die();

		if($query){

			return $query->row_array();

		} else {

			return false;

		}

	}



public function page_get_meta_discription($template_name) {

		$this->db->select('*');

		$this->db->from('hbp_pages');

		$this->db->where('meta_discription',$template_name);

		$this->db->order_by('id','Asc');

		$query = $this->db->get();

		//echo $this->db->last_query();die();

		if($query){

			return $query->row_array();

		} else {

			return false;

		}

	}




	
}

