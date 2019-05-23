<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database(); 
 
	}
	function index()
	{
		$this->load->view('register');
	}
 }
