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
		$this->load->model('student/Mlesson', 'mlesson_model');
	}
	
	
	public function index()
	{
		$student_id					= $this->crc_encrypt->decode($this->session->userdata('userid'));
		$student_id=$this->session->userdata('student_no');
		// echo $this->crc_encrypt->decode($this->session->userdata('userid'));
		$student_info				= $this->mdashboard_model->studentinfo($student_id);
		$data['student_info'] 		= $student_info;
		$assigned_course 			= $this->mdashboard_model->getmycourses($student_id);
		$data['assigned_course'] 	= $assigned_course;
		// $data['getalllessons'] = $this->mdashboard_model->getalllessonsforstudent('14');
		
		$i=0;
		foreach($assigned_course as $history_course)
		{
			// print_r($history_course);
			// $data['lesson_details'][$i]=$this->mlesson_model->getlessondetails($history_course['lesson_code'],$history_course['language']);
			// $data['lesson_details'][$i]=$this->mlesson_model->getlessondetails($history_course['lesson_code']);
			$procedure_in=array(
				'StudentNo' => $this->session->userdata('student_no'),
				'TrafficNo' => $this->session->userdata('TrafficNo'),
				'fileNo' => $this->session->userdata('TryFileNo'),
				'BranchNo' => $this->session->userdata('BranchNo'),
				'CourseRef' =>$data['assigned_course'][$i]['course_code']);
			$data['assigned_course'][$i]['alllessons']=$this->mlesson_model->getcourselessons($procedure_in);
			// print_r($data['assigned_course'][$i]['alllessons']);
			$i++;
		}
		if( $data['assigned_course'][0]['alllessons'])
		{
		$data['getalllessons'] = $data['assigned_course'][0]['alllessons'];
		}
		
		$this->load->view('front/dashboard', $data);
	}
	

	
		
	
}