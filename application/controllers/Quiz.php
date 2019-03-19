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
        $this->load->model('admin/Mlesson', 'mlesson_model');
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
		$this->load->view('front/test_quiz', $data);
    }
    public function next_quiz()
	{
        $data['quiz_id'] = $this->input->get('quiz_id');
        $lessonid = $this->input->get('lesson_no');
        $data['result']=$this->mquiz_model->getQuizForLesson($lessonid);
        $this->load->view('front/next_quiz', $data);
    }
    public function update_score()
    {
        $student_id	= $this->crc_encrypt->decode($this->session->userdata('userid'));
        $lesson_id=$_GET['lesson_id'];
        $assign_id=$_GET['assign_id'];
        $score=$_GET['score'];
        $score_value='~'.$lesson_id.'=>'.$score;
        $update_data=array(
			'score'=>$score_value
        );
        // $this->mquiz_model->update_score($assigned_id,$update_data);
        $data['result'] = $this->mquiz_model->update_score($assign_id,$update_data);
        $update_data2=array(
			'completed_lessons'=>$lesson_id
        );
        $data['result'] = $this->mlesson_model->update_completion($assign_id,$update_data2);
		// $data['sl_no']=$slider_number;
        $this->load->view('front/score',$data);

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
