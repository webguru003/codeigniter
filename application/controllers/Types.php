<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Types extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// connecting and loading database
		$this->load->database(); 
		session_start();
 
		// loading model where all queries related to todolist exists.
		$this->load->model('types_m','m');
		
		// checking if the user is login or not to stop users from accessing the script directly
		if(isset($_SESSION['username']))
		{} else  {
			$data['msg'] = "<strong>You</strong> must login to access this page";
			$this->load->view('login',$data);
		}

	}
	function index()
	{
		// this will load the types list page
		$this->load->view('types');
	}
	function show_types()
	{
		
		// this will show the types 
		$result = $this->m->show_types();
		echo json_encode($result);
	}
	function add_types()
	{
		// this will run the type model. in which the query will run that will add the type in database 
		$result = $this->m->add_types();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		//echo json_encode($result);
	}
	function update_types()
	{
		 
		// this will run the function in type model. in which the query will run that will edit the type in database 
		$result = $this->m->update_types();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		//echo json_encode($result);
	}
	
	function delete_types()
	{
		 
		// this will run the function in type model. in which the query will run that will delete the type in database 
		$result = $this->m->delete_types();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		 echo json_encode($result);
	}
	
	
	
	function edit_types()
	{
		 
		// this will run the function in type model. in which the query will run that will bring the data that will need to update
		$result = $this->m->edit_types();
		
		echo json_encode($result);
	}
}
