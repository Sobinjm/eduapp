<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		
		if (!$this->session->has_userdata('logged_in') || $this->session->userdata('logged_in') !== TRUE)
			{ 
				redirect('login');
			}
	}
	
	
	public function index()
	{
		$this->load->view('front/lesson');
	}
	
	public function view()
	{
		$this->load->view('front/lesson');
	}
	
	
}
