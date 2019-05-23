<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_m extends CI_Model {


          
	function __construct()
	{
		$this->load->database(); 

	}
 	function login()
	{
		
		// below code in this function will check if the user trying to login exist or not
		$username = $this->input->post('username');		
		$password = $this->input->post('password');		
 
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->limit(1);
		$query = $this->db->get(); 		
		 
		return $query->result();
	}
	function update_profile()
	{
		// below code will run update query to change the user password 
		$idd = $this->input->post('id3');
		$field = array(
 		'password'=>$this->input->post('password3')
		);
		
		$this->db->where('id',$idd);
		$this->db->update('user',$field);
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