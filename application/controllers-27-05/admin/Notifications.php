<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		$this->load->model('admin/Mnotification', 'mnotification_model');		
    }
    
    public function addnotification()
	{

    }
    public function getnotification()
	{
		$data['result']=$this->mnotification_model->getNotification();
		// return json_encode($data['result']);
		$this->load->view('front/return_quiz', $data);
		// echo $quiz_id;
	}

    
}