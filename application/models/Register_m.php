<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_m extends CI_Model {


          
	function __construct()
	{
		// loading database
		$this->load->database(); 

	}
 	function register()
	{
		// below code will get form values that is submited and will check the user already exists.
		$username = $this->input->post('firstname');		
 		$password = $this->input->post('password');
		$email = $this->input->post('email');	
   
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		   $query = $this->db->get();
      	 
        	if($query->num_rows() > 0)
        	{
      	 		return $query->num_rows();
        	}
        	else {

        		return false;
        	}
         
	
	}
	function insert(){

		 
		// below code will run query to insert new user
		$field = array(
		'id'=>time(),
		'username'=>$this->input->post('firstname'),
 		'email'=>$this->input->post('email'),
		'password'=>$this->input->post('password')
		);
		
		$this->db->insert('user',$field);
	    

	   
		if($this->db->affected_rows() > 0)
		{
 			 return true;
		}
		else
		{
			 return false;
		}

	}
}    