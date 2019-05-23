<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class types_m extends CI_Model {


          
	function __construct()
	{
		// load database
		$this->load->database(); 

	}
 	function show_types()
	{
		 // this will select types from database 
		$this->db->from("types");
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
	function add_types()
	{
		
		 
		
		 // this will add types in  database 
		 
		$field = array(
		'id'=>time(),
		'uid'=>$_SESSION['id'],
		'title'=>$this->input->post('title')
		);
		
		$this->db->insert('types',$field);
		if($this->db->affected_rows() > 0)
		{
 			 return true;
		}
		else
		{
			 return false;
		}
	}
	function update_types()
	{
		 
		 // this will update types where id is in  database 
		$idd = $this->input->post('id2');
		$field = array(
 		'title'=>$this->input->post('title2')
		);
		
		$this->db->where('id',$idd);
		$this->db->update('types',$field);
		if($this->db->affected_rows() > 0)
		{
 			 return true;
		}
		else
		{
			 return false;
		}
	}
	
	function delete_types()
	{
		 // this code will delete the types
		$idd = $this->input->get('id');		
 		
/*		$this->db->where('id',$idd);
		$this->db->delete('types');


		$this->db->where('type',$idd);
		$this->db->delete('todo');
*/
 		
		$row = $this->db->get_where('types', array('id' => $idd))->row();
		
		 
		
		$this->db->delete('types', array('id' => $idd)); 
	    $this->db->delete('todo', array('type' => $row->title));

		if($this->db->affected_rows() > 0)
		{
 			 return true;
		}
		else
		{
			 return false;
		}
	}
	
	
	function edit_types()
	{
		
		// this will bring data of that specific record
		$id = $this->input->get('id');		
		$this->db->where('id',$id);
		$query = $this->db->get('types');
		 
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
