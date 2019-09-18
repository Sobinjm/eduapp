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
			$this->load->model('admin/Mstudent', 'mstudent_model');	
	}
	
	
	public function index()
	{
		$this->load->view('front/lesson');
	}
	
	public function view()
	{

		$student_id = $this->uri->segment('4');
		$student_id = $this->crc_encrypt->decode($student_id);
		$data['result']  	=	$this->mstudent_model->getProfileInformation($student_id);
		$mycourses			=	$this->mstudent_model->getAssignedCourse($student_id);
		$data['courses'] 	=	$mycourses;
		if(!empty($mycourses))
		{
			$mylessons 		 	=  	$this->mstudent_model->getallmylessons($mycourses['0']['id']);
		$data['mylessons'] 	=	$mylessons ? $mylessons : 0;
		$data['lessons'] 	=	$this->mstudent_model->getallcourse();
		}
		else{
			$mylessons 		 	=  	0;
		$data['mylessons'] 	=	$mylessons ? $mylessons : 0;
		$data['lessons'] 	=	$this->mstudent_model->getallcourse();
		}
		
		$this->load->view('front/lesson',$data);
	}

	public function assignment()
	{
		$lesson_id=$this->crc_encrypt->decode($this->uri->segment(3));
		$this->load->view('front/lesson_assignment');
	}
	
	
	
}
