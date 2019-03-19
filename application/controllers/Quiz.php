<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		
		if (!$this->session->has_userdata('logged_in') || $this->session->userdata('logged_in') !== TRUE)
			{ 
				redirect('login');
			}
        $this->load->model('student/Mdashboard', 'mdashboard_model');
        $this->load->model('admin/Mquiz', 'mquiz_model');	
	}
	
	
	public function index()
	{
		$student_id					= $this->crc_encrypt->decode($this->session->userdata('userid'));
		$student_info				= $this->mdashboard_model->studentinfo($student_id);
		$data['student_info'] 		= $student_info;
		$assigned_course 			= $this->mdashboard_model->getmycourses($student_id);
		$data['assigned_course'] 	= $assigned_course;
		if(!empty($assigned_course))
		{
		$course_info 				= $this->mdashboard_model->course_info($assigned_course['0']['course']);
		$getalllessons	 			= $this->mdashboard_model->getalllessons($assigned_course['0']['course']);
		$data['course_info'] 		= $course_info;
		$data['getalllessons'] 		= $getalllessons;
		}
		else 
		{
			$data['course_info'] 		= '';
			$data['getalllessons'] 		= '';
		}
		/*
		echo '<pre>';
		print_r($assigned_course);
		print_r($course_info);
		print_r($getalllessons);
		echo '</pre>';
		*/
		$this->load->view('front/lesson_six', $data);
    }
    public function next_quiz()
	{
        $data['quiz_id'] = $this->input->get('quiz_id');
        $lessonid = $this->input->get('lesson_no');
        $data['result']=$this->mquiz_model->getQuizForLesson($lessonid);
        $this->load->view('front/next_quiz', $data);
    }
    public function getlesson()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'empty_id';	
			}
			else 
			{
				$data = $this->crc_encrypt->decode($id);
				$query = $this->mlesson_model->getlessonid($data);
				if($query)
				{		
					echo json_encode($query);
				}
				else 
				{
					echo 'error';
				}
			}
			
		}	
	
	
		
	
}
