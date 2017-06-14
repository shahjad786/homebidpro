<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//header("Access-Control-Allow-Origin: *");
	//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	class Api extends CI_Controller {
		
		public function login()
		{
			
			$postdata = file_get_contents("php://input");
			$request = json_decode($postdata);
			$username = $request->username;
			
			
			$pass = $request->password;
			$this -> db -> select('*');
			$this -> db -> from('hbp_adminstrators');
			$this -> db -> where('username', $username);
			$this -> db -> where('pass', $pass);
			$this -> db -> limit(1);
			$query = $this -> db -> get();
			$data = $query->result();
			
			$jsonData = json_encode($data);
			
			if($jsonData)
			echo $jsonData;
		}
		
		public function signup()
		{
			
			$postdata = file_get_contents("php://input");
			$request = json_decode($postdata);
			$username = $request->username;
			$pass = $request->password;
			
			$data = array(
			
			'username' => $username,
			
			'pass' => $pass
			
			);
			
			$insertData = $this->db->insert('hbp_adminstrators',$data);
			if($insertData){
				
				echo 1;
			}
			else{
				
				echo 0;
			}
			
		}
		
	}
	
?>
