<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		if (!$this->session->has_userdata('logged_in') || $this->session->userdata('logged_in') !== TRUE)
			{ 
				redirect('login');
			}
		$this->load->model('student/Mdashboard', 'mdashboard_model');
		
		$this->load->model('admin/Mcourse', 'mcourse_model');
	}
	
	
	public function index()
	{
		$student_id					= $this->crc_encrypt->decode($this->session->userdata('userid'));
		$student_info				= $this->mdashboard_model->studentinfo($student_id);
		$data['student_info'] 		= $student_info;
		$assigned_course 			= $this->mdashboard_model->getmycourses($student_id);
		$data['assigned_course'] 	= $assigned_course;
	/*	if(!empty($assigned_course))
		{
		$course_info 				= $this->mdashboard_model->course_info_code($assigned_course['0']['course_code']);
		
		// $getalllessons	 			= $this->mdashboard_model->getalllessons($assigned_course['0']['course_id']);
		$getalllessons	 			= $this->mdashboard_model->getalllessons_code($assigned_course['0']['course_code']);
		// $getalllessons 				= $this->mdashboard_model->getalllessonsbylang_code($assigned_course['0']['course_code'],$assigned_course['0']['language']);
		// $getslidesforlesson			= $this->mslide_model->getslidesforlesson($a);
		$data['course_info'] 		= $course_info;
		$data['query']="SELECT * FROM ad_lessons WHERE course_id = '".$assigned_course['0']['course_code']."' AND publish_status = 2 AND language='".$assigned_course['0']['language']."' ORDER BY lesson_order ASC";
		$data['getalllessons'] 		= $getalllessons;
		}
		
		else 
		{
			$data['course_info'] 		= '';
			$data['getalllessons'] 		= '';
		}*/

		$data['getalllessons'] = $this->mdashboard_model->getalllessonsforstudent('14');
		
		// echo '<pre>';
		// print_r($assigned_course);
		// print_r($course_info);
		// print_r($getalllessons);
		// echo '</pre>';
		
		$this->load->view('front/dashboard', $data);
	}
	
	
		
	
}