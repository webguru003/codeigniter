<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// connecting and loading database
		$this->load->database(); 

		// loading model where all queries related to todolist exists.
		$this->load->model('Login_m','m');
		session_start();
   
	}
	function index()
	{
		// this will load the login page
		$this->load->view('login');
	}
	function sessiondestroy()
	{
		
		// this will destroy session to logout
		session_destroy();

		
		$data['msg'] = "<strong>Logout!</strong> Successfully";
		
		// this will redirect to login page after logout
		$this->load->view('login', $data);
	}
	function checkauth()
	{
 		// this will load login model where queries will run to check weather the user trying to login exist or not
		$result = $this->m->login();
		
		
		// if the username and password entered is valid then he will redirect to dashboard of application
		if(count($result) > 0)
		{
			$_SESSION['username'] = $result[0]->username;
			$_SESSION['email'] = $result[0]->email;
			$_SESSION['id'] = $result[0]->id;
			
			$this->load->view('todolist');
		}
		else
		{
 			$data['msg'] = "<strong>Invalid!</strong> Username / Password";
			$this->load->view('login', $data);
		}
	}

	function update_profile()
	{
		
		// this will update the new password 
		$result = $this->m->update_profile();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		 echo json_encode($result);
	}
	
 }
