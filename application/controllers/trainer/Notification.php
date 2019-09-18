<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
			$this->load->model('admin/Mnotification', 'mnotification_model');
	}
	
	
	public function index()
	{
		$data['result']=$this->mnotification_model->getTrainerNotifications();
		
        $this->load->view('trainer/notification', $data);
		
	}
}
