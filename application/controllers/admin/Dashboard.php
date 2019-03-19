<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
	}
	
	
	public function index()
	{
		if($this->session->userdata('role') == 1){
			redirect('admin/course');
		}
		else{
			$this->load->view('admin/dashboard');
		}
	}
}
