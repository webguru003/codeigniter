<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class todolist_m extends CI_Model {


          
	function __construct()
	{
		// load database
		$this->load->database(); 

	}
 	function get_type_list()
	{
		// this will brng types from database for drop down shoing in the forms
		 
		$this->db->from("types");
		$this->db->where('uid',$_SESSION['id']);
		$this->db->order_by("title asc");
		$query = $this->db->get(); 		
		
 		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


 	function sort_td_list()
	{
		 
		 // this will bring todo list
		$orderbydd = $this->input->get('sortingthis');
		$this->db->from("todo");
		$this->db->where('uid',$_SESSION['id']);
		$this->db->order_by($orderbydd);
		$query = $this->db->get(); 		
		
 		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
 	function show_td_list()
	{
		 
		 // this will bring todo list
		$this->db->from("todo");
		$this->db->where('uid',$_SESSION['id']);
		$this->db->order_by("id desc");
		$query = $this->db->get(); 		
		
 		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
 	function search_td_list()
	{
		 
		 // this will bring todo list of specific records in search box
		 $titlesearch = $this->input->get('titlesearch');		
 		  $typesearch = $this->input->get('typesearch');		
		  $duedatesearch = $this->input->get('duedatesearch');		
		  $prioritysearch = $this->input->get('prioritysearch');		
 

		if($titlesearch != ''){
			$this->db->like('title',$titlesearch);
		}
	if($typesearch != ''){
			$this->db->like('type',$typesearch);
		}
		if($duedatesearch != ''){
			$this->db->like('duedate',$duedatesearch);
		}
 		if($prioritysearch != ''){
			$this->db->like('priority',$prioritysearch);
		}
		$this->db->where('uid',$_SESSION['id']);
		$query = $this->db->get('todo');
		 
		
 		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function add_td_list()
	{
		
		 
		 // this will add query to insert new todo list
		 
		$field = array(
		'id'=>time(),
		'uid'=>$_SESSION['id'],
		'type'=>$this->input->post('type'),
		'priority'=>$this->input->post('priority'),
		'title'=>$this->input->post('title'),
 		'description'=>$this->input->post('desc'),
		'duedate'=>$this->input->post('duedate')
		);
 		$this->db->insert('todo',$field);
		if($this->db->affected_rows() > 0)
		{
 			 return $this->input->post('type');
		}
		else
		{
			 return false;
		}
	}
	function update_td_list()
	{
		 
		 // this will run edit query to update todo list

		$idd = $this->input->post('id2');
		$field = array(
		'uid'=>$_SESSION['id'],
		'type'=>$this->input->post('type2'),
		'priority'=>$this->input->post('priority2'),
		'title'=>$this->input->post('title2'),
 		'description'=>$this->input->post('desc2'),
		'duedate'=>$this->input->post('duedate2')
		);
		
		$this->db->where('id',$idd);
		$this->db->update('todo',$field);
		if($this->db->affected_rows() > 0)
		{
 			 return true;
		}
		else
		{
			 return false;
		}
	}
	
	function delete_td_list()
	{
		 // this will delete todo list
		$idd = $this->input->get('id');		
 		
		$this->db->where('id',$idd);
		$this->db->delete('todo');
		if($this->db->affected_rows() > 0)
		{
 			 return true;
		}
		else
		{
			 return false;
		}
	}
	
	
	function edit_td_list()
	{
		 // this will get todo list of specific id
		$id = $this->input->get('id');		
		$this->db->where('id',$id);
		$query = $this->db->get('todo');
		 
		if($query->num_rows() > 0)
		{
 			 return $query->row();
		}
		else
		{
			 return false;
		}
	}
}
