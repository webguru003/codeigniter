<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todolist extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// connecting and loading database
		$this->load->database(); 
		session_start();

		// loading model where all queries related to todolist exists.
 		$this->load->model('todolist_m','m');
		
		// checking if the user is login or not to stop users from accessing the script directly
		if(isset($_SESSION['username']))
		{} else  {
			$data['msg'] = "<strong>You</strong> must login to access this page";
			$this->load->view('login',$data);
		}

	}
	function index()
	{
		// get todo type list 
		$result = $this->m->get_type_list();
		
		$typelist['typelist']=$result;      
		
		// load todo listing page
		$this->load->view('todolist',$typelist);
	}
	function show_td_list()
	{
		//run model to show records
		$result = $this->m->show_td_list();
		echo json_encode($result);
	}
	function sort_td_list()
	{
		//run model to show records
		$result = $this->m->sort_td_list();
		echo json_encode($result);
	}
	function search_td_list()
	{
		//run model to search new record
		$result = $this->m->search_td_list();
		echo json_encode($result);
	}
	function add_td_list()
	{
		
		 //run model to add new record
		$type_list =  $this->m->add_td_list();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		 //echo json_encode($result);
	}
	function update_td_list()
	{
		// update current record	 
		$result = $this->m->update_td_list();
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		//echo json_encode($result);
	}
	
	function delete_td_list()
	{
		
		//run model to delete the current record
		 
		$result = $this->m->delete_td_list();
		echo $result;
		
		$msg['success'] = false;
		if($result)
		{
			$msg['success'] = true;
		}
		 echo json_encode($result);
	}
	
	
	
	function edit_td_list()
	{
		
		// get todo list data for specific record 
		$result = $this->m->edit_td_list();
		
		echo json_encode($result);
	}
}
