<?php

Class Video_model extends CI_Model {

	public function allVideo() {
	$this->db->select('*');
	$this->db->from('video');
	$query = $this->db->get();
	if($query){
		return $query->result();
	} else {
		return false;
	}
}

    public function editVideo($id) {
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->from('video');
		$query = $this->db->get();
		if($query){
			return $query->result();
		} else {
			return false;
		}
}

    public function blogData()
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


		$catagory ='HomeBidPro Tips';

		//echo $catagory;
	    if($catagory !='')
	    {

	        $args = array(  'posts_per_page' => 4, 'category_name' => $catagory );
	    }
	    else
	    {
	        
	        $args = array('posts_per_page' => 4);
	    }    
    
	        $mypostsMov = get_posts( $args );  
		    // echo "<pre>"; print_r($mypostsMov); die;
			$mypostsarrayMov = array();
			$i=0;
			foreach ($mypostsMov as $post ) : 
			$excerpt = preg_replace("/<img[^>]+\>/i", "", $post->post_content);	     
			$mypostsarrayMov[$i]['post_title'] = strip_tags($post->post_title);
			$mypostsarrayMov[$i]['content'] =    strip_tags($post->post_content);
			$mypostsarrayMov[$i]['permalink'] = get_permalink($post->ID);
			$mypostsarrayMov[$i]['thumbnail'] =get_the_post_thumbnail($post->ID,array( 300, 200));
			$i++;
			endforeach; 
		    wp_reset_postdata();
    
		    //echo "<pre>"; print_r($mypostsarrayMov); die;
		      
		    //return $this->render('MovePlusServiceBundle:Default:recentpostCombined.html.twig',array('mypostsMov'=>$mypostsarrayMov, ));

            return $mypostsarrayMov;

	}



 public function homeVideo() {
 	
	$this->db->select('*');
	$this->db->from('video');
	$query = $this->db->get();
	if($query){
	return $query->result();
	} else {
	return false;
	}
}





}