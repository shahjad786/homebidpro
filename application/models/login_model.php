<?php



Class Login_model extends CI_Model {



// Read data using username and password

	function login($email, $password)
	 {

	   $this -> db -> select('*');

	   $this -> db -> from('hbp_adminstrators');

	   $this -> db -> where('email', $email);

	   //$this -> db -> where('password', $password);

	   $this -> db -> limit(1);

	   $query = $this -> db -> get();
	   $data = $query->result();

	   if(isset($data) && count($data)>0){

	     		//echo "vdfgdfhdf";die;
			foreach($data as $value);
			$hashed_password = $value->password;
           }

      else{

      			


			    return false;
		}

		if (crypt($password, $hashed_password) === $hashed_password)
		 {
		  		 return $query->result();
		}

		else{

			    return false;
		}

	 }

	 
	 
	function admin_email_get(){
		 $this -> db -> select('email');

	   $this -> db -> from('hbp_adminstrators');
	   $query = $this->db->get();
	if($query){
			return $query->result();
		} else {
			return false;
		}
	}

	function contractor_login($email, $password)

	 {

	   $this -> db -> select('*');

	   $this -> db -> from('hbp_contractors');

	   $this -> db -> where('email', $email);

	   //$this -> db -> where('password', $password);

	    $this -> db -> limit(1);

		$query = $this -> db -> get();

		$data =  $query->result();
		//$hashed_password = crypt($password);

	   if(isset($data) && count($data)>0){

	     		//echo "vdfgdfhdf";die;
			foreach($data as $value);
			$hashed_password = $value->password;
           }

      else{

      			


			    return false;
		}

		if (crypt($password, $hashed_password) === $hashed_password)
		 {
		  		 return $query->result();
		}

		else{

			    return false;
		}

	 }
	 public function email_check() {
	$email=$this->input->post('email');
	$this->db->select('email');
	$this->db->from('hbp_home_owners');
	$this->db->where('email',$email);
	$query = $this->db->get();
	//echo $this->db->last_query();
	if($query ->num_rows() > 0){
		return false;
	}else{
		return true;
	}

}
public function email_check_contractor() {
	$email=$this->input->post('email');
	$this->db->select('email');
	$this->db->from('hbp_contractors');
	$this->db->where('email',$email);
	$query = $this->db->get();
	//echo $this->db->last_query();
	if($query ->num_rows() > 0){
		return false;
	}else{
		return true;
	}

}

	function homeowner_login($email, $password)

	{


	   $this -> db -> select('*');

	   $this -> db -> from('hbp_home_owners');

	   $this -> db -> where('email', $email);

	  // $this -> db -> where('password', $password);

	   $this -> db -> limit(1);

	 

	     $query = $this -> db -> get();
	     $data   = $query->result();
	     	   //echo $this->db->last_query();die();


	    // echo"<pre>";print_r($data);die;
	     if(isset($data) && count($data)>0){

	     		//echo "vdfgdfhdf";die;
			foreach($data as $value);
			$hashed_password = $value->password;
           }

      else{

      			


			    return false;
		}

		if (crypt($password, $hashed_password) === $hashed_password)
		 {
		  		 return $query->result();
		}

		else{

			    return false;
		}

 }

	 function get_roles(){

		 $this -> db -> select('*');

		 $this -> db -> from('hbp_roles');

		 $query = $this -> db -> get();

		   if($query)

		   {

		     return $query->result();

		   }

		   else

		   {

		     return false;

		   }

	 }

function county_get_by_state($state)
	{



		//echo $state;die;
	   $this -> db -> select('*');

	   $this -> db -> from('hbp_county');

	   $this -> db -> where('state', $state);
	   $this->db->order_by('county', 'asc');
	   
	   
	   $query = $this -> db -> get();

	 // echo "<pre>"; print_r($query->result());die;

	    if($query)

	   {

	     return $query->result();

	   }

	   else

	   {

	     return false;

	   }




	}


	 function state_get_by_country($iso)
	{
	   $this -> db -> select('*');

	   $this -> db -> from('hbp_state');

	   $this -> db -> where('iso', $iso);
	   
	   
	   $query = $this -> db -> get();

      //echo $this->db->last_query();die;
	    if($query)

	   {

	     return $query->result();

	   }

	   else

	   {

	     return false;

	   }




	}















	function get_country(){

		 $this -> db -> select('*');

		 $this -> db -> from('hbp_countries');

		 $query = $this -> db -> get();

		   if($query)

		   {

		     return $query->result();

		   }

		   else

		   {

		     return false;

		   }

	 }



}



