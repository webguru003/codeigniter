<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// connecting and loading database
		$this->load->database(); 

		// loading model where all queries related to todolist exists.
		$this->load->model('register_m','m');
  
	}
	function index()
	{
		// this will load the registeration page
		$this->load->view('register');
	}
	function checkreg()
	{ 
		// this will run the function in type model. which will check either the user who is registering is already register or not 
 		$result = $this->m->register();

		// if the user is already register it will redirect to register page otherwise it will add the user in database
 		 if($result > 0)
 		{
 			$data['msg'] = "<strong>User!</strong> Already register";
			$this->load->view('register', $data);
 		}
 		else
 		{
 			$result = $this->m->insert();

 			$data['msg'] = "<strong>Account Created Successfully</strong> You can login";
 			$this->load->view('login',$data);
 		}
 }
}
