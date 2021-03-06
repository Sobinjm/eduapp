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
			
		$this->load->model('admin/Mstudent', 'mstudent_model');
		$this->load->model('admin/Mnotification', 'mnotification_model');
		$this->load->model('student/Mapi', 'mapi_model');
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
		$student_no	= $this->crc_encrypt->decode($this->session->userdata('student_no'));
		$student_no	= $this->session->userdata('student_no');
		$student_info=$this->mstudent_model->getProfileInformation($student_id);
		$student_name=$this->crc_encrypt->decode($this->session->userdata('name'));
		$lesson_id=$_GET['lesson_id'];
		$lesson_code=$this->mlesson_model->getlesson_code($lesson_id);
        $assign_id=$_GET['assign_id'];
        $score=$_GET['score'];
        $score_value='~'.$lesson_id.'=>'.$score;
        $update_data=array(
			'score'=>$score_value
		);

		




		// $lesson_id=$this->crc_encrypt->decode($_GET['ls_id'];
		// echo $_GET['lesson_id'];
		// die();
		$lesson_code=$this->mlesson_model->getlesson_code($lesson_id);
		// print_r($lesson_code);
		// die();
		$lesson_code=$lesson_code['0']['lesson_id'];
		$assignment=$this->mlesson_model->getAssignmentForStudent($student_no);

		$lessons=json_decode($assignment['0']['total_lessons'], TRUE);
		$order=$lessons[0]['Order'];
		$i=0;
		foreach($lessons as $val)
		{	
		
			if($val['LessonCode']==$lesson_code)	
			{
				$order=$val['Order'];
					$lessons[$i]['completed_status']=1;
				
			}
			$i++;
		//	$val['current_slide']=$val['current_slide']+1;
		}
		//$lessons['1']['current_slide']=1;
		$lessons=json_encode($lessons);
		$assignment['0']['total_lessons']=$lessons;
		// print_r($assignment);
		// echo $assignment['0']['total_lessons'];
		// die();
		$up_array=array_reverse($assignment[0]);
		array_pop($up_array);
		// array_pop($assignment[0]);
		$assign_id=$assignment[0]['id'];
		$assignment[0]=array_reverse($up_array);
		$rs=$this->mlesson_model->updateAssignmentForStudent($assign_id,$assignment[0]);
		// $token=$this->mapi_model->getToken();
		// $this->mquiz_model->update_score($assigned_id,$update_data);
		//$rs1=$this->mapi_model->setStudentResult($student_no,$lesson_code,$token);
		//$rs=json_decode($rs1);
		// print_r($rs);
		// echo json_encode($this->session->userdata);
		// print_r($rs);
		// die();
		if($assignment['0']['completed_lessons']==$order)
		{
			$completed=$assignment['0']['completed_lessons'];
		}
		else{
			$completed=$order;
		}
		if($rs==true)
		{
        $data['result'] = $this->mquiz_model->update_score($assign_id,$update_data);
        $update_data2=array(
			'completed_lessons'=>$completed
        );
		$data['result'] = $this->mlesson_model->update_completion($assign_id,$update_data2);
		$notification=array(
			'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
			'name'=>$student_name, 
			'user_type'=>'Student',
			'status'=>'Completed'

		);
		$this->mnotification_model->insert_notification($notification);
		print_r($rs);
		// $data['sl_no']=$slider_number;
		// $this->load->view('front/score',$data);
	}
	else{
		echo "failed";
		// $this->load->view('dashboard',$data);
	}

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
